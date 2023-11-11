<?php

defined('BASEPATH') or exit('No direct script access allowed');

use Ramsey\Uuid\Uuid;
class Mobil extends CI_Controller
{
  private $nama_sistem  = "Evano Trans System";     
	private $nama_menu  = "Dashboard";     
  
    public function __construct()
    {
       parent::__construct();
       $this->load->model('ModelMobil');
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

    // Tambah Data Mobil
    public function tambahMobil()
    {
      $idMobil = Uuid::uuid4();
      $jenisMobil = $this->input->post('jenisMobil');
      $merkMobil = $this->input->post('merkMobil');
      $nopol = $this->input->post('nopol');
      $tahun = $this->input->post('tahun');
      $harga12 = $this->input->post('harga12');
      $harga24 = $this->input->post('harga24');
      $bahanBakar = $this->input->post('bahanBakar');
      $warna = $this->input->post('warna');
      $denda = $this->input->post('denda');
      $seat = $this->input->post('seat');
      if ($statusTersedia = $this->input->post('statusTersedia')){
        $statusTersedia;
      } else {
        $statusTersedia = ($this->input->post('statusTersedia' != "") ? $this->input->post('statusTersedia') : "0");
      }
      $gambarMobil = $_FILES['gambarMobil']['name'];
        if($gambarMobil = ''){

        }else{
            $config ['upload_path'] = 'assets/uploads/mobil/';
            $config ['allowed_types'] = 'jpg|jpeg|png|gif';
            
            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('gambarMobil')){
                echo "Upload Foto Mobil Gagal";
            }else{
                $gambarMobil = $this->upload->data('file_name');
            }
        }
        $data = array(
          'idMobil' => $idMobil,
          'jenisMobil' => $jenisMobil,
          'merkMobil' => $merkMobil,
          'nopol' => $nopol,
          'tahun' => $tahun,
          'harga12' => $harga12,
          'harga24' => $harga24,
          'bahanBakar' => $bahanBakar,
          'warna' => $warna,
          'denda' => $denda,
          'seat' => $seat,
          'statusTersedia' => $statusTersedia,
          'gambarMobil' => $gambarMobil
        );
        $this->ModelMobil->tambahMobil($data, 'tb_mobil');
        redirect('../Mobil');
    }
		// Tampilkan data mobil
    public function index()
    {
        $data['mobil'] = $this->ModelMobil->showData()->result();
        $this->load->view("layout/templateAdmin");
        $this->load->view("admin/mobil", $data);
    }
		// edit data mobil
    public function editMobil($idMobil)
    {
      $where = array('idMobil' => $idMobil);
      $data['mobil'] = $this->ModelMobil->editMobil($where, 'tb_mobil')->result();
      $this->load->view("layout/templateAdmin");
      $this->load->view("admin/editMobil", $data); 
    }
		// update layanan service
    public function updateMobil()
    {
        $idMobil = $this->input->post('idMobil');
        $jenisMobil = $this->input->post('jenisMobil');
        $merkMobil = $this->input->post('merkMobil');
        $nopol = $this->input->post('nopol');
        $tahun = $this->input->post('tahun');
        $harga12 = $this->input->post('harga12');
        $harga24 = $this->input->post('harga24');
        $bahanBakar = $this->input->post('bahanBakar');
        $warna = $this->input->post('warna');
        $denda = $this->input->post('denda');
        $seat = $this->input->post('seat');
        $statusTersedia = $this->input->post('statusTersedia');
        if($gambarMobil = $_FILES['gambarMobil']['name']){
          $config ['upload_path'] = 'assets/uploads/mobil/';
          $config ['allowed_types'] = 'jpg|jpeg|png|gif';
          
          $this->load->library('upload', $config);
          if(!$this->upload->do_upload('gambarMobil')){
              echo "Upload Foto Mobil Gagal";
          }else{
              $gambarMobil = $this->upload->data('file_name');
          }
        $data = array(
            'jenisMobil' => $jenisMobil,
            'merkMobil' => $merkMobil,
            'nopol' => $nopol,
            'tahun' => $tahun,
            'harga12' => $harga12,
            'harga24' => $harga24,
            'bahanBakar' => $bahanBakar,
            'warna' => $warna,
            'denda' => $denda,
            'seat' => $seat,
            'statusTersedia' => $statusTersedia,
            'gambarMobil' => $gambarMobil
        );
      }else{
        $data = array(
          'jenisMobil' => $jenisMobil,
          'merkMobil' => $merkMobil,
          'nopol' => $nopol,
          'tahun' => $tahun,
          'harga12' => $harga12,
          'harga24' => $harga24,
          'bahanBakar' => $bahanBakar,
          'warna' => $warna,
          'denda' => $denda,
          'seat' => $seat,
          'statusTersedia' => $statusTersedia
        );
      }
      $where = array(
        'idMobil' => $idMobil
      );
        $this->ModelMobil->updateMobil($where, $data, 'tb_mobil');
        redirect('../Mobil');
    }
	
		// Hapus data mobil
    public function delete($idMobil)
    {
        $where = array('idMobil' => $idMobil);
        $this->ModelMobil->hapusMobil($where, 'tb_mobil');
        redirect('../Mobil');
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
