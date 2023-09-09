<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DaftarSewa extends CI_Controller
{   
    public function __construct()
    {
       parent::__construct();
       $this->load->model('ModelFormSewa');
       if($this->session->userdata('roleId') != 1){
           $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
           <strong>Anda Harus Login Terlebih Dahulu !</strong>
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>');
         redirect('Auth/login');
       } 
    }
	// Tampilkan data barang
    public function index()
    {   
        $data['dataSewa'] = $this->ModelFormSewa->getData()->result();
        $this->load->view("layout/templateAdmin");
        $this->load->view("admin/daftarSewa", $data);
    }
	// Tambah Data barang
    public function tambahData()
    {
        $namaBarang = $this->input->post('namaBarang');
        $kategori = $this->input->post('kategori');
        $harga = $this->input->post('harga');
        $keterangan = $this->input->post('keterangan');
        $stok = $this->input->post('stok');
        $gambar = $_FILES['gambar']['name'];
        if($gambar = ''){}else{
            $config ['upload_path'] = './uploads';
            $config ['allowed_types'] = 'jpg|jpeg|png|gif';
            
            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('gambar')){
                echo "Upload Gambar Gagal";
            }else{
                $gambar = $this->upload->data('file_name');
            }
        }
        $data = array(
            'namaBarang' => $namaBarang,
            'kategori'   => $kategori,
            'harga'      => $harga,
            'keterangan' => $keterangan,
            'stok'       => $stok,
            'gambar'     => $gambar
        );
        $this->ModelBarang->tambahBarang($data, 'tb_product');
        redirect('../DataBarang');
    }
    
	public function cetak_form_sewa()
	{
        $idSewa = $this->input->get('idSewa');
        $data['dataSewa'] = $this->ModelFormSewa->getData($idSewa)->row_array();
		$data['title'] = "Form Sewa Penumpang"; 

		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = "Form Sewa Penumpang.pdf";
		$this->pdf->load_view('admin/sewaPenumpangCetak.php', $data);
	}
	// Edit Data Barang
    public function edit($idBarang)
    {
        $where = array('idBarang' => $idBarang);
        $data['barang'] = $this->ModelBarang->editBarang($where, 'tb_product')->result();
        $this->load->view('layout/templateAdmin');
        $this->load->view('admin/editBarang', $data);
    }
	// Update data barang 
    public function update()
    {
        $idBarang = $this->input->post('idBarang');
        $namaBarang = $this->input->post('namaBarang');
        $kategori = $this->input->post('kategori');
        $harga = $this->input->post('harga');
        $keterangan = $this->input->post('keterangan');
        $stok = $this->input->post('stok');

        $data = array(
            'namaBarang' => $namaBarang,
            'kategori'   => $kategori,
            'harga'      => $harga,
            'keterangan' => $keterangan,
            'stok'       => $stok
        );
        $where = array(
            'idBarang' => $idBarang
        );
        $this->ModelBarang->updateData($where, $data, 'tb_product');
        redirect('../DataBarang');
    }
	// Delete data barang
    public function delete($idBarang)
    {
        $where = array('idBarang' => $idBarang);
        $this->ModelBarang->hapusBarang($where, 'tb_product');
        redirect('../DataBarang');
    }    
}
