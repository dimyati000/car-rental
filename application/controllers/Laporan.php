<?php

class Laporan extends CI_Controller{
    public function __construct()
	{
			parent::__construct();
            $this->load->model('ModelMobil');
			$this->load->model('ModelLaporan');
            $this->load->model('ModelFormSewa');
            if($this->session->userdata('roleId') != 1 && $this->session->userdata('roleId') != 2){
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Anda Harus Login Terlebih Dahulu !</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
              redirect('../Login');
            } 
	}

    public function index()
    {   
        $idSewa = '';
        $tanggal_awal = $this->input->get("tanggal_awal");
        $tanggal_akhir = $this->input->get("tanggal_akhir");
        $namaPelanggan = $this->input->get("nama_pelanggan");
        $jenis_sewa = $this->input->get("jenis_sewa");
        if($this->session->userdata('roleId') == 1){
            $created_by = '';
        }else{
            $created_by = $this->session->userdata('idUser');
        }
        $data['dataSewa'] = $this->ModelLaporan->getData($idSewa, $created_by)->result();
        $data['content'] = "laporan/index.php";
        $this->parser->parse('system/templateAdmin', $data);
    }
    
    public function cetak_laporan_penumpang()
	{
        $jenisMobil = $this->input->get("jenisMobil");
        $tanggal_awal = $this->input->get("tanggal_awal");
        $tanggal_akhir = $this->input->get("tanggal_akhir");
        $data['dataSewa'] = $this->ModelLaporan->getDataPenumpang($jenisMobil, $tanggal_awal, $tanggal_akhir)->result();
        $data['mobil'] = $this->ModelMobil->showData()->result();
        $data['title'] = "Form Sewa Penumpang";
        $data['jenisMobil'] = $jenisMobil;
        $data['tanggal_awal'] = $tanggal_awal;
        $data['tanggal_akhir'] = $tanggal_akhir;
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "Form Sewa Penumpang.pdf";
        $this->pdf->load_view('system/sewaPenumpangLaporan.php', $data);
    }

    public function cetak_laporan_barang()
	{
        $jenisMobil = $this->input->get("jenisMobil");
        $tanggal_awal = $this->input->get("tanggal_awal");
        $tanggal_akhir = $this->input->get("tanggal_akhir");
        $data['dataSewa'] = $this->ModelLaporan->getDataBarang($jenisMobil, $tanggal_awal, $tanggal_akhir)->result();
        $data['mobil'] = $this->ModelMobil->showData()->result();
        $data['title'] = "Form Sewa Barang"; 
        $data['jenisMobil'] = $jenisMobil;
        $data['tanggal_awal'] = $tanggal_awal;
        $data['tanggal_akhir'] = $tanggal_akhir;
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "Form Sewa Barang.pdf";
        $this->pdf->load_view('system/sewaBarangLaporan.php', $data);
    }
}
