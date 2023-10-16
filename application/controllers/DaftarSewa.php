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
    public function penumpang()
    {   
        $data['dataSewa'] = $this->ModelFormSewa->getDataPenumpang()->result();
        $this->load->view("layout/templateAdmin");
        $this->load->view("admin/daftarSewaPenumpang", $data);
    }

    public function barang()
    {   
        $data['dataSewa'] = $this->ModelFormSewa->getDataBarang()->result();
        $this->load->view("layout/templateAdmin");
        $this->load->view("admin/daftarSewaBarang", $data);
    }

	// Cetak Nota Sewa
	public function cetak_form_sewa()
	{
        $idSewa = $this->input->get('idSewa');
        $tipeSewa = $this->input->get('tipeSewa');

        if ($tipeSewa = $this->input->post('tipeSewa' == "SP")){
            $data['dataSewa'] = $this->ModelFormSewa->getDataPenumpang($idSewa)->row_array();
            $data['title'] = "Form Sewa Penumpang"; 
            $this->load->library('pdf');
            $this->pdf->setPaper('A4', 'landscape');
            $this->pdf->filename = "Form Sewa Penumpang.pdf";
            $this->pdf->load_view('admin/sewaPenumpangCetak.php', $data);
        } else {
            $data['dataSewa'] = $this->ModelFormSewa->getDataBarang($idSewa)->row_array();
            $data['title'] = "Form Sewa Barang"; 
            $this->load->library('pdf');
            $this->pdf->setPaper('A4', 'landscape');
            $this->pdf->filename = "Form Sewa Barang.pdf";
            $this->pdf->load_view('admin/sewaBarangCetak.php', $data);
        }
	}
	// Delete data sewa
    public function delete($idSewa)
    {
        $where = array('idSewa' => $idSewa);
        $this->ModelFormSewa->hapusSewa($where, 'tb_formsewa');
        redirect('../DaftarSewa');
    }     
}
