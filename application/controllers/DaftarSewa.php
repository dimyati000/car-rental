<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DaftarSewa extends CI_Controller
{   
    public function __construct()
    {
       parent::__construct();
       $this->load->model('ModelAuth');
       $this->load->model('ModelFormSewa');
       if($this->session->userdata('roleId') != 1 && $this->session->userdata('roleId') != 2){
           $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
           <strong>Anda Harus Login Terlebih Dahulu !</strong>
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>');
         redirect('Auth/login');
       } 
    }
	// Tampilkan data penumpang
    public function penumpang()
    {   
        $idSewa = '';
        if($this->session->userdata('roleId') == 1){
            $created_by = '';
        }else{
            $created_by = $this->session->userdata('idUser');
        }
        $data['dataSewa'] = $this->ModelFormSewa->getDataPenumpang($idSewa, $created_by)->result();
        $this->load->view("layout/templateAdmin");
        $this->load->view("admin/daftarSewaPenumpang", $data);
    }

    public function barang()
    {   
        $idSewa = '';
        if($this->session->userdata('roleId') == 1){
            $created_by = '';
        }else{
            $created_by = $this->session->userdata('idUser');
        }
        $data['dataSewa'] = $this->ModelFormSewa->getDataBarang($idSewa, $created_by)->result();
        $this->load->view("layout/templateAdmin");
        $this->load->view("admin/daftarSewaBarang", $data);
    }

	// Cetak Nota Sewa Penumpang

	public function cetak_sewa_penumpang()
	{
        $idSewa = $this->input->get('idSewa');
        $tipeSewa = $this->input->get('tipeSewa');
        $data['dataSewa'] = $this->ModelFormSewa->getDataPenumpang($idSewa)->row_array();
        $data['title'] = "Form Sewa Penumpang"; 
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = "Form Sewa Penumpang.pdf";
        $this->pdf->load_view('admin/sewaPenumpangCetak.php', $data);
    }

	// Cetak Nota Sewa Barang
	public function cetak_sewa_barang()
	{
        $idSewa = $this->input->get('idSewa');
        $tipeSewa = $this->input->get('tipeSewa');
        $data['dataSewa'] = $this->ModelFormSewa->getDataBarang($idSewa)->row_array();
        $data['title'] = "Form Sewa Barang"; 
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = "Form Sewa Barang.pdf";
        $this->pdf->load_view('admin/sewaBarangCetak.php', $data);

        // if ($tipeSewa = $this->input->post('tipeSewa' == "SP")){
        //     $data['dataSewa'] = $this->ModelFormSewa->getDataPenumpang($idSewa)->row_array();
        //     $data['title'] = "Form Sewa Penumpang"; 
        //     $this->load->library('pdf');
        //     $this->pdf->setPaper('A4', 'landscape');
        //     $this->pdf->filename = "Form Sewa Penumpang.pdf";
        //     $this->pdf->load_view('admin/sewaPenumpangCetak.php', $data);
        // } else {
        //     $data['dataSewa'] = $this->ModelFormSewa->getDataBarang($idSewa)->row_array();
        //     $data['title'] = "Form Sewa Barang"; 
        //     $this->load->library('pdf');
        //     $this->pdf->setPaper('A4', 'landscape');
        //     $this->pdf->filename = "Form Sewa Barang.pdf";
        //     $this->pdf->load_view('admin/sewaBarangCetak.php', $data);
        // }
	}
	
	// Delete data sewa Penumpang
    public function delete_penumpang($idSewa)
    {
        $where = array('idSewa' => $idSewa);
        $this->ModelFormSewa->hapusSewa($where, 'tb_formsewa');
        redirect('../DaftarSewa/Penumpang');
    }
    
	// Delete data sewa Barang
    public function delete_barang($idSewa)
    {
        $where = array('idSewa' => $idSewa);
        $this->ModelFormSewa->hapusSewa($where, 'tb_formsewa');
        redirect('../DaftarSewa/Barang');
    }  
}
