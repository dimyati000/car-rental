<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ModelDashboard');
		if ($this->session->userdata('roleId') != 1) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
           <strong>Anda Harus Login Terlebih Dahulu !</strong>
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>');
			redirect('Auth/login');
		}
	}
	// Mengambil Data Dashboard Dari Model Dashboard
	public function index()
	{
		$data['totalL'] = $this->ModelDashboard->getService();
		$data['totalS'] = $this->ModelDashboard->getSpareJual();
		$inv = $this->ModelDashboard->getsum();
		$kml = $this->ModelDashboard->getKasir() . "000";
		$bry = $this->ModelDashboard->getBayar();
		$smt = $bry - $kml;
		$total = $inv + $smt;
		$data['totalK'] = $total;
		$data['totalB'] = $this->ModelDashboard->getKasir();
		$data['totalSt'] = $this->ModelDashboard->getStok();
		$this->load->view("layout/templateAdmin");
		$this->load->view("admin/index", $data);
	}
}
