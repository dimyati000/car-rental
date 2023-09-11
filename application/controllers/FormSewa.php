<?php

defined('BASEPATH') or exit('No direct script access allowed');

class FormSewa extends CI_Controller
{   
    public function __construct()
    {
       parent::__construct();
       $this->load->model('ModelFormSewa');
       $this->load->model('ModelJaminan');
       $this->load->model('ModelPelanggan');
       $this->load->model('ModelMobil');
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
        // $data['barang'] = $this->ModelBarang->showData()->result();
        $this->load->view("layout/templateAdmin");
        $this->load->view("admin/formSewa");
    }
    // Mengarahkan ke halaman form penumpang
    public function sewaPenumpang()
    {   
        $data['jaminan'] = $this->ModelJaminan->showData()->result();
        $data['pelanggan'] = $this->ModelPelanggan->showData()->result();
        $data['mobil'] = $this->ModelMobil->showData()->result();
        $this->load->view("layout/templateAdmin");
        $this->load->view("admin/sewaPenumpang", $data);
    }
    // Mengarahkan ke halaman form barang
    public function sewaBarang()
    {   
        $data['jaminan'] = $this->ModelJaminan->showData()->result();
        $data['pelanggan'] = $this->ModelPelanggan->showData()->result();
        $data['mobil'] = $this->ModelMobil->showData()->result();
        $this->load->view("layout/templateAdmin");
        $this->load->view("admin/sewaBarang", $data);
    }
	// Tambah Data Sewa
    public function tambahData()
    {
        $idSewa = $this->input->post('idSewa');
        $noSewa = $this->input->post('noSewa');
        $tipeSewa = $this->input->post('tipeSewa');
        $idPelanggan = $this->input->post('idPelanggan');
        $idJaminan = $this->input->post('idJaminan');
        $idMobil = $this->input->post('idMobil');
        $rute = $this->input->post('rute');
        $data = array(
            'idSewa' => $idSewa,
            'noSewa' => $noSewa,
            'tipeSewa' => $tipeSewa,
            'pelangganId' => $idPelanggan,
            'mobilId' => $idMobil,
            'jaminanId' => $idJaminan,
            'rute' => $rute
        );
        $this->ModelFormSewa->tambahSewa($data, 'tb_formsewa');
        redirect('../DaftarSewa');
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
