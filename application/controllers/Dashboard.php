<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	private $nama_menu  = "Dashboard";     
	private $nama_sistem  = "Evano Trans System";     

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ModelAuth');
		$this->load->model('ModelDashboard');
		$this->load->library('parser');
		if ($this->session->userdata('roleId') != 1 && $this->session->userdata('roleId') != 2) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
           <strong>Anda Harus Login Terlebih Dahulu !</strong>
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>');
			redirect('../Login');
		}
	}
	// Mengambil Data Dashboard Dari Model Dashboard
	public function index()
	{
		$data['title'] = $this->nama_menu." | ".$this->nama_sistem;
		$data['totalP'] = $this->ModelDashboard->getPelanggan();
		$data['totalM'] = $this->ModelDashboard->getMobil();
		if($this->session->userdata('roleId') == 1){
            $created_by = '';
        }else{
            $created_by = $this->session->userdata('idUser');
        }
		$data['totalSewaP'] = $this->ModelDashboard->getSewaPenumpang($created_by);
		$data['totalSewaB'] = $this->ModelDashboard->getSewaBarang($created_by);
		$data['content'] = "dashboard/index.php";
		$this->parser->parse('system/templateAdmin', $data);
	}
}
