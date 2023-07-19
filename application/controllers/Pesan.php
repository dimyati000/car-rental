<?php
	class Pesan extends CI_Controller{
		public function index()
		{
			$this->load->view('layout/templateAdmin');
        	$this->load->view('admin/chat');
		}
	}
