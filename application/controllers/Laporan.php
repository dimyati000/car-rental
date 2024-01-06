<?php

class Laporan extends CI_Controller{
    public function __construct()
	{
			parent::__construct();
			$this->load->model('ModelLaporan');
            $this->load->model('ModelFormSewa');
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

    public function index()
    {   
        $idSewa = '';
        if($this->session->userdata('roleId') == 1){
            $created_by = '';
        }else{
            $created_by = $this->session->userdata('idUser');
        }
        $data['dataSewa'] = $this->ModelLaporan->getData($idSewa, $created_by)->result();
        $data['content'] = "laporan/index.php";
        $this->parser->parse('system/templateAdmin', $data);
    }
    
    //cetak laporan
    public function cetak_laporan() {
        $tanggal_awal = $this->input->get("tanggal_awal");
        $tanggal_akhir = $this->input->get("tanggal_akhir");
        $filter = array(
            'jenis_layanan' => $this->input->get('jenis_layanan'),
            'tanggal_awal' => ($this->input->get('tanggal_awal')) ? format_date($tanggal_awal, 'Y-m-d') : date("Y-m-d"),
            'tanggal_akhir' => ($this->input->get('tanggal_akhir')) ? format_date($tanggal_akhir, 'Y-m-d') : date("Y-m-d"),
        );

        $data['laporan'] = $this->ModelLaporan->getData($filter)->result();
        $data['tanggal_awal'] = $tanggal_awal;
        $data['tanggal_akhir'] = $tanggal_akhir;
        $data['title'] = "Laporan"; 

        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "Laporan.pdf";
        $this->pdf->load_view('system/laporan/cetak_laporan.php', $data);
    }

}
