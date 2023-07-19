<?php 
    class Kategori extends CI_Controller{
        public function __construct()
    {
       parent::__construct();
       if($this->session->userdata('roleId') != 2){
           $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
           <strong>Anda Harus Login Terlebih Dahulu !</strong>
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>');
         redirect('Auth/login');
       } 
    }
	// Tampilkan data kategori knalpot
        public function knalpot()
        {
			if($this->input->post('input')){
				$data['keyword'] = $this->input->post('keyword');
			}else{
				$data['keyword'] = null;
			}
	
            $data['knalpot'] = $this->ModelKategori->dataKnalpot($data['keyword'])->result();
            $this->load->view("layout/template");
            $this->load->view('kategori/knalpot', $data);
        }
		// Tampilkan data kategori benda kecil
        public function bendaKecil()
        {
			if($this->input->post('input')){
				$data['keyword'] = $this->input->post('keyword');
			}else{
				$data['keyword'] = null;
			}
	
            $data['bendaKecil'] = $this->ModelKategori->dataBendaKecil($data['keyword'])->result();
            $this->load->view("layout/template");
            $this->load->view('kategori/bendaKecil', $data);
        }
		// Tampilkan data kategori body motor
        public function bodyMotor()
        {
			if($this->input->post('input')){
				$data['keyword'] = $this->input->post('keyword');
			}else{
				$data['keyword'] = null;
			}
	
            $data['bodyMotor'] = $this->ModelKategori->dataBodyMotor($data['keyword'])->result();
            $this->load->view("layout/template");
            $this->load->view('kategori/bodyMotor', $data);
        }
		// Tampilkan data kategori mesin motor
        public function mesinMotor()
        {
			if($this->input->post('input')){
				$data['keyword'] = $this->input->post('keyword');
			}else{
				$data['keyword'] = null;
			}
	
            $data['mesinMotor'] = $this->ModelKategori->dataMesinMotor($data['keyword'])->result();
            $this->load->view("layout/template");
            $this->load->view('kategori/mesinMotor', $data);
        }
    }
