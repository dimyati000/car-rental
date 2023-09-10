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
	// Cetak Nota Sewa
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
	// Delete data sewa
    public function delete($idSewa)
    {
        $where = array('idSewa' => $idSewa);
        $this->ModelFormSewa->hapusSewa($where, 'tb_formsewa');
        redirect('../DaftarSewa');
    }     
}
