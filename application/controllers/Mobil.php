<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mobil extends CI_Controller
{
    public function __construct()
    {
       parent::__construct();
       $this->load->model('ModelJaminan');
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

		// Tampilkan data layanan service
    public function index()
    {
        $data['jaminan'] = $this->ModelJaminan->tampilkanData()->result();
        $this->load->view("layout/templateAdmin");
        $this->load->view("admin/mobil", $data);
        $this->load->view("layout/footerTemplateAdmin");
    }
		// edit layanan service
    public function edit($idLayanan)
    {
      $where = array('idLayanan' => $idLayanan);
      $data['pelayanan'] = $this->ModelService->editLayanan($where, 'tb_layanan')->result();
      $this->load->view("layout/templateAdmin");
      $this->load->view("admin/editLayanan", $data); 
    }
		// update layanan service
    public function update()
    {
        $idLayanan = $this->input->post('idLayanan');
        $namaPelanggan = $this->input->post('namaPelanggan');
        $tipeKendaraan = $this->input->post('tipeKendaraan');
        $merk = $this->input->post('merkKendaraan');
        $nama = $this->input->post('namaKendaraan');
        $transmisi = $this->input->post('transmisi');
        $jenisBensin = $this->input->post('jenisBensin');
        $platNomor = $this->input->post('platNomor');

        $data = array(
            'namaPelanggan' => $namaPelanggan,
            'tipeKendaraan' => $tipeKendaraan,
            'namaKendaraan' => $nama,
            'merkKendaraan' => $merk,
            'transmisi' => $transmisi,
            'jenisBensin' => $jenisBensin,
            'platNomor' => $platNomor
        );
        $where = array(
            'idLayanan' => $idLayanan
        );
        
        $this->ModelService->updateData($where, $data, 'tb_layanan');
        redirect('../Service');
    }
		// ambil data booking service
    public function BookingService()
    {
        $data['pelayanan'] = $this->ModelService->showDataBooking()->result();
        $this->load->view("layout/templateAdmin");
        $this->load->view("admin/bookingService", $data);
    }
		// Ambil detail booking service
    public function detailBooking($idLayanan)
    {
      $where = array('idLayanan' => $idLayanan);  
      $data['booking'] = $this->ModelService->detailBooking($where, 'tb_layanan')->result();
      $this->load->view("layout/templateAdmin");
      $this->load->view("admin/detailBooking", $data);
    }
		// Hapus data layanan
    public function delete($idLayanan)
    {
        $where = array('idLayanan' => $idLayanan);
        $this->ModelService->hapusData($where, 'tb_layanan');
        redirect('../Service/BookingService');
    }  
		// Proses layanan  
		public function proses($idLayanan)
    {
      $where = array('idLayanan' => $idLayanan);
      $data['pelayanan'] = $this->ModelService->editLayanan($where, 'tb_layanan')->result();
      $this->load->view("layout/templateAdmin");
      $this->load->view("admin/verifikasi", $data); 
    }
		// Verifikasi Layanan Service
    public function verifikasi()
    {
        $idLayanan = $this->input->post('idLayanan');
        $verifikasi = $this->input->post('verifikasi');

        $data = array(
            'verifikasi' => $verifikasi,
        );
        $where = array(
            'idLayanan' => $idLayanan
        );
        
        $this->ModelService->verifikasi($where, $data, 'tb_layanan');
        redirect('Service/BookingService');
    }
}
