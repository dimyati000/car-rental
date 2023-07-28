<?php

class Laporan extends CI_Controller{
    public function __construct()
	{
			parent::__construct();
			// $this->load->model('ModelLaporan');
			// $this->load->model('ModelBarang');
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

    // Tampilkan data mobil
    public function index()
    {
        // $data['laporan'] = $this->ModelLaporan->showData()->result();
        $this->load->view("layout/templateAdmin");
        $this->load->view("admin/laporan");
    }

    public function laporan_pelayanan()
    {
        $tanggal_awal = $this->input->get("tanggal_awal");
        $tanggal_akhir = $this->input->get("tanggal_akhir");
        $filter = array(
            'jenis_layanan' => $this->input->get('jenis_layanan'),
            'tanggal_awal' => ($this->input->get('tanggal_awal')) ? format_date($tanggal_awal, 'Y-m-d') : date("Y-m-d"),
            'tanggal_akhir' => ($this->input->get('tanggal_akhir')) ? format_date($tanggal_akhir, 'Y-m-d') : date("Y-m-d"),
        );
        $data['laporan'] = $this->ModelLaporan->laporanDataPelayanan($filter)->result();
        $this->load->view("layout/templateAdmin");
        $this->load->view("laporan/laporan_pelayanan", $data);
    }

    //cetak laporan pelayanan
    public function cetak_laporan_pelayanan() {
        $tanggal_awal = $this->input->get("tanggal_awal");
        $tanggal_akhir = $this->input->get("tanggal_akhir");
        $filter = array(
            'jenis_layanan' => $this->input->get('jenis_layanan'),
            'tanggal_awal' => ($this->input->get('tanggal_awal')) ? format_date($tanggal_awal, 'Y-m-d') : date("Y-m-d"),
            'tanggal_akhir' => ($this->input->get('tanggal_akhir')) ? format_date($tanggal_akhir, 'Y-m-d') : date("Y-m-d"),
        );

        $data['laporan'] = $this->ModelLaporan->laporanDataPelayanan($filter)->result();
        $data['tanggal_awal'] = $tanggal_awal;
        $data['tanggal_akhir'] = $tanggal_akhir;
        $data['title'] = "Laporan Pelayanan"; 

        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "Laporan Pelayanan.pdf";
        $this->pdf->load_view('laporan/cetak_laporan_pelayanan.php', $data);
    }

    public function laporan_penjualan()
    {
        $tanggal_awal = $this->input->get("tanggal_awal");
        $tanggal_akhir = $this->input->get("tanggal_akhir");
        $filter = array(
            'tanggal_awal' => ($this->input->get('tanggal_awal')) ? format_date($tanggal_awal, 'Y-m-d') : date("Y-m-d"),
            'tanggal_akhir' => ($this->input->get('tanggal_akhir')) ? format_date($tanggal_akhir, 'Y-m-d') : date("Y-m-d"),
        );

        $data['invoice'] = $this->ModelLaporan->LaporanDataPenjualan($filter)->result();
        $this->load->view("layout/templateAdmin");
        $this->load->view("laporan/laporan_penjualan", $data);
    }

    //cetak laporan penjualan
    public function cetak_laporan_penjualan() {
        $tanggal_awal = $this->input->get("tanggal_awal");
        $tanggal_akhir = $this->input->get("tanggal_akhir");
        $filter = array(
            'tanggal_awal' => ($this->input->get('tanggal_awal')) ? format_date($tanggal_awal, 'Y-m-d') : date("Y-m-d"),
            'tanggal_akhir' => ($this->input->get('tanggal_akhir')) ? format_date($tanggal_akhir, 'Y-m-d') : date("Y-m-d"),
        );

        $data['invoice'] = $this->ModelLaporan->LaporanDataPenjualan($filter)->result();
        $data['tanggal_awal'] = $tanggal_awal;
        $data['tanggal_akhir'] = $tanggal_akhir;
        $data['title'] = "Laporan Penjualan"; 

        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "Laporan Penjualan.pdf";
        $this->pdf->load_view('laporan/cetak_laporan_penjualan.php', $data);
    }



	// Tambah data laporan
    public function tambahData()
    {
        $namaPemesan = $this->input->post('namaPemesan');
        $jenisLaporan = $this->input->post('jenisLaporan');
        $barangTerbeli = $this->input->post('barangTerbeli');
        $totalHarga = $this->input->post('totalHarga');
        $keterangan = $this->input->post('keterangan');
        $tanggalPemesanan = $this->input->post('tanggalPemesanan');
       
        $data = array(
            'namaPemesan' => $namaPemesan,
            'jenisLaporan'   => $jenisLaporan,
            'barangTerbeli'      => $barangTerbeli,
            'totalHarga'       => $totalHarga,
            'keterangan' => $keterangan,
            'tanggalPemesanan' => $tanggalPemesanan,
            'tanggalDibuat' => date('Y-m-d H:i:s')
        );
        $this->ModelLaporan->tambahLaporan($data, 'tb_laporan');
        redirect('../Laporan');
    }
	// Edit data laporan berdasarkan id
    public function edit($idLaporan)
    {
      $where = array('idLaporan' => $idLaporan);
      $data['laporan'] = $this->ModelLaporan->editLaporan($where, 'tb_laporan')->result();
      $this->load->view("layout/templateAdmin");
      $this->load->view("admin/editLaporan", $data); 
    }
	// Update data laporan
    public function update()
    {
        $idLaporan = $this->input->post('idLaporan');
        $namaPemesan = $this->input->post('namaPemesan');
        $jenisLaporan = $this->input->post('jenisLaporan');
        $barangTerbeli = $this->input->post('barangTerbeli');
        $totalHarga = $this->input->post('totalHarga');
        $keterangan = $this->input->post('keterangan');
        $tanggalPemesanan = $this->input->post('tanggalPemesanan');

        $data = array(
            'namaPemesan' => $namaPemesan,
            'jenisLaporan' => $jenisLaporan,
            'totalHarga' => $totalHarga,
            'barangTerbeli' => $barangTerbeli,
            'keterangan' => $keterangan,
            'tanggalPemesanan' => $tanggalPemesanan
        );
        $where = array(
            'idLaporan' => $idLaporan
        );
        $this->ModelBarang->updateData($where, $data, 'tb_laporan');
        redirect('../Laporan');
    }
	
	// Delete data laporan
    public function delete($idLaporan)
    {
        $where = array('idLaporan' => $idLaporan);
        $this->ModelLaporan->hapusData($where, 'tb_laporan');
        redirect('../Laporan');
    }    
}
