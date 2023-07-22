<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
    public function __construct()
    {
       parent::__construct();
       $this->load->model('ModelPelanggan');
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
        $data['pelanggan'] = $this->ModelPelanggan->showData()->result();
        $this->load->view("layout/templateAdmin");
        $this->load->view("admin/pelanggan", $data);
        $this->load->view("layout/footerTemplateAdmin");
    }
		// edit layanan service
    public function edit($idPelanggan)
    {
      $where = array('idPelanggan' => $idPelanggan);
      $data['pelanggan'] = $this->ModelPelanggan->editPelanggan($where, 'tb_pelanggan')->result();
      $this->load->view("layout/templateAdmin");
      $this->load->view("admin/editPelanggan", $data); 
    }
		// update pelanggan service
    public function update()
    {
        $idPelanggan = $this->input->post('idPelanggan');
        $nik = $this->input->post('nik');
        $namaPelanggan = $this->input->post('namaPelanggan');
        $noTelp = $this->input->post('noTelp');
        $alamat = $this->input->post('alamat');

        $data = array(
            'nik' => $nik,
            'namaPelanggan' => $namaPelanggan,
            'noTelp' => $noTelp,
            'alamat' => $alamat,
        );
        $where = array(
            'idPelanggan' => $idPelanggan
        );
        
        $this->ModelPelanggan->updateData($where, $data, 'tb_pelanggan');
        redirect('../Pelanggan');
    }
		// Hapus data layanan
    public function delete($idLayanan)
    {
        $where = array('idLayanan' => $idLayanan);
        $this->ModelService->hapusData($where, 'tb_layanan');
        redirect('../Service/BookingService');
    } 
}
