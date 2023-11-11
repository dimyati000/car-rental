<?php

defined('BASEPATH') or exit('No direct script access allowed');

use Ramsey\Uuid\Uuid;
class Jaminan extends CI_Controller
{   
    public function __construct()
    {
       parent::__construct();
       $this->load->model('ModelJaminan');
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
	// Tampilkan jaminan
    public function index()
    {   
        $data['jaminan'] = $this->ModelJaminan->showData()->result();
        $this->load->view("layout/templateAdmin");
        $this->load->view("admin/jaminan", $data);
    }
	// Tambah jaminan
    public function tambahData()
    {
        $idJaminan = Uuid::uuid4();
        $namaJaminan = $this->input->post('namaJaminan');
        $data = array(
                'idJaminan' => $idJaminan,
                'namaJaminan' => $namaJaminan
            );
        $this->ModelJaminan->tambahJaminan($data, 'tb_jaminan');
        redirect('../Jaminan');
    }
	// Edit jaminan
    public function edit($idJaminan)
    {
        $where = array('idJaminan' => $idJaminan);
        $data['jaminan'] = $this->ModelJaminan->editJaminan($where, 'tb_jaminan')->row_array();
        $this->load->view('layout/templateAdmin');
        $this->load->view('admin/editJaminan', $data);
    }
    public function getById($idJaminan)
    {
        $where = array('idJaminan' => $idJaminan);
        $data['data'] = $this->ModelJaminan->editJaminan($where, 'tb_jaminan')->row_array();
        // $this->load->view('layout/templateAdmin');
        // $this->load->view('admin/editJaminan', $data);
        echo json_encode($data);
    }
	// Update jaminan 
    public function update()
    {
        $idJaminan = $this->input->post('idJaminan');
        $namaJaminan = $this->input->post('editNamaJaminan');
     
        $data = array(
            'namaJaminan' => $namaJaminan,
        );
        $where = array(
            'idJaminan' => $idJaminan
        );
        $this->ModelJaminan->updateData($where, $data, 'tb_jaminan');
        redirect('../Jaminan');
    }
	// Delete jaminan
    public function delete($idJaminan)
    {
        $where = array('idJaminan' => $idJaminan);
        $this->ModelJaminan->hapusJaminan($where, 'tb_jaminan');
        redirect('../Jaminan');
    }    
}
