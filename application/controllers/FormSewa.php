<?php

defined('BASEPATH') or exit ('No direct script access allowed');

use Ramsey\Uuid\Uuid;
class FormSewa extends CI_Controller
{   
    public function __construct()
    {
       parent::__construct();
       $this->load->model('ModelFormSewa');
       $this->load->model('ModelJaminan');
       $this->load->model('ModelPelanggan');
       $this->load->model('ModelMobil');
    //    $this->load->model("ModelFormSewa", "kodee"); // load model
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
        $data['kodeSewa']  = $this->ModelFormSewa->get_kode_penumpang("tb_formSewa","noSewa","ET-SP"); 
        $this->load->view("layout/templateAdmin");
        $this->load->view("admin/sewaPenumpang", $data);
    }

    // Mengarahkan ke halaman form barang
    public function sewaBarang()
    {   
        $data['jaminan'] = $this->ModelJaminan->showData()->result();
        $data['pelanggan'] = $this->ModelPelanggan->showData()->result();
        $data['mobil'] = $this->ModelMobil->showData()->result();
        $data['kodeSewa']  = $this->ModelFormSewa->get_kode_barang("tb_formSewa","noSewa","ET-SB"); 
        $this->load->view("layout/templateAdmin");
        $this->load->view("admin/sewaBarang", $data);
    }

	// Tambah Data Sewa
    public function tambahDataPenumpang()
    {
        $idSewa = Uuid::uuid4();
        $noSewa = $this->input->post('noSewa');
        $tglSewa = date('Y-m-d H:i:s');
        $tipeSewa = $this->input->post('tipeSewa');
        $idPelanggan = $this->input->post('idPelanggan');
        $idJaminan = $this->input->post('idJaminan');
        $idMobil = $this->input->post('idMobil');
        $tglBerangkat = $this->input->post('tglBerangkat');
        $jamBerangkat = $this->input->post('jamBerangkat');
        $tglKembali = $this->input->post('tglKembali');
        $jamKembali = $this->input->post('jamKembali');
        $tipeTarif = $this->input->post('tipeTarif');
        $lamaSewa = $this->input->post('lamaSewa');
        $totalTarif = $this->input->post('totalTarif');
        $dp = $this->input->post('dp');
        $jasaAntar = $this->input->post('jasaAntar');
        $jasaSopir = $this->input->post('jasaSopir');
        $kurangBayar = $this->input->post('kurangBayar');
        $totalBayar = $this->input->post('totalBayar');
        $overtime = $this->input->post('overtime');
        $rute = $this->input->post('rute');
        $keterangan = $this->input->post('keterangan');
        $jam1 = date("H:i:s", strtotime($jamBerangkat));
        $jam2 = date("H:i:s", strtotime($jamKembali));
		
        $data = array(
            'idSewa' => $idSewa,
            'noSewa' => $noSewa,
            'tglSewa' => $tglSewa,
            'tipeSewa' => $tipeSewa,
            'pelangganId' => $idPelanggan,
            // 'jaminanId' => $idJaminan, (sudah dibawah)
            'mobilId' => $idMobil,
            'tglBerangkat' => $tglBerangkat,
            'jamBerangkat' => $jam1,
            'tglKembali' => $tglKembali,
            'jamKembali' => $jam2,
            'tipeTarif' => $tipeTarif,
            'lamaSewa' => $lamaSewa,
            'totalTarif' => $totalTarif,
            'dp' => $dp,
            'jasaAntar' => $jasaAntar,
            'jasaSopir' => $jasaSopir,
            'kurangBayar' => $kurangBayar,
            'totalBayar' => $totalBayar,
            'overtime' => $overtime,
            'rute' => $rute,
            'keterangan' => $keterangan
        );
        $this->ModelFormSewa->tambahSewa($data, 'tb_formsewa');

        // insert jaminan sewa
        $jaminans = array();  
        foreach($idJaminan AS $key => $val){
            $uuidJaminan = Uuid::uuid4();
            $jaminans[] = array(
                'id'        => $uuidJaminan,
                'idSewa'    => $idSewa,
                'idJaminan' => $val,
            );
        }
        $this->ModelFormSewa->insertBatch('tb_jaminansewa', $jaminans);
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

    public function load_mobil(){
        $idMobil = $this->input->post('idMobil');
        $where = array('idMobil' => $idMobil);
        $mobil = $this->ModelMobil->editMobil($where, 'tb_mobil')->row_array();
        $response['success'] = TRUE;
        $response['data'] = $mobil;
        echo json_encode($response);  
    }
}
