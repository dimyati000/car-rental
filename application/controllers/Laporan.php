<?php

class Laporan extends CI_Controller{
    public function __construct()
	{
			parent::__construct();
			$this->load->model('ModelLaporan');
	}

    //cetak laporan pelayanan
    public function cetak_laporan() {
        $tanggal_awal = $this->input->get("tanggal_awal");
        $tanggal_akhir = $this->input->get("tanggal_akhir");
        $filter = array(
            'jenis_layanan' => $this->input->get('jenis_layanan'),
            'tanggal_awal' => ($this->input->get('tanggal_awal')) ? format_date($tanggal_awal, 'Y-m-d') : date("Y-m-d"),
            'tanggal_akhir' => ($this->input->get('tanggal_akhir')) ? format_date($tanggal_akhir, 'Y-m-d') : date("Y-m-d"),
        );

        $data['laporan'] = $this->ModelLaporan->getDataPenumpang($filter)->result();
        $data['tanggal_awal'] = $tanggal_awal;
        $data['tanggal_akhir'] = $tanggal_akhir;
        $data['title'] = "Laporan Pelayanan"; 

        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "Laporan Pelayanan.pdf";
        $this->pdf->load_view('system/cetak_laporan.php', $data);
    }

    public function index()
    {
        $tanggal_awal = $this->input->get("tanggal_awal");
        $tanggal_akhir = $this->input->get("tanggal_akhir");
        $filter = array(
            'tanggal_awal' => ($this->input->get('tanggal_awal')) ? format_date($tanggal_awal, 'Y-m-d') : date("Y-m-d"),
            'tanggal_akhir' => ($this->input->get('tanggal_akhir')) ? format_date($tanggal_akhir, 'Y-m-d') : date("Y-m-d"),
        );

        $data['laporan'] = $this->ModelLaporan->getDataPenumpang($filter)->result();
        $data['content'] = "laporan/index.php";
      $this->parser->parse('system/templateAdmin', $data);
    }

	// Delete data laporan
    public function delete($idLaporan)
    {
        $where = array('idLaporan' => $idLaporan);
        $this->ModelLaporan->hapusData($where, 'tb_laporan');
        redirect('../Laporan');
    }    
}
