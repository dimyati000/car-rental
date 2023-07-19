<?php
class Kasir extends CI_Controller
{
	public function __construct()
	{
			parent::__construct();
			$this->load->model('ModelKasir');
	}

	public function index()
	{
		$this->load->view("layout/templateAdmin");
		$this->load->view("admin/kasir");
	}

	public function cetak_data_kasir()
	{
		$data['data_kasir'] = $this->ModelKasir->showData()->result();
		$data['title'] = "Laporan Data Kasir"; 

		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "Laporan Data Kasir.pdf";
		$this->pdf->load_view('admin/kasirCetak.php', $data);
	}

	// Tambah Data Kasir
	public function tambahData()
	{
		$nama = $this->input->post('nama');
		$tanggal = $this->input->post('tanggal');
		$keterangan = $this->input->post('keterangan');
		$sub_total = $this->input->post('sub_total');
		$nama_barang = $this->input->post('namaBarang');
		$bayar = $this->input->post('bayar');
		$kembalian = $this->input->post('kembalian');
		$data = array(
			'namaPelanggan' => $nama,
			'tanggal'=> $tanggal,
			'keterangan' => $keterangan,
			'namaBarang' => $nama_barang,
			'total' => $sub_total,
			'bayar' => $bayar,
			'kembalian' => $kembalian 
		);
		$this->ModelKasir->tambahData($data, 'tb_kasir');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
           <strong>Transaksi Berhasil Di Simpan !</strong>
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>');
        redirect('../Kasir');
	} 

	// Tampilkan Data kasir
	public function data()
	{
        $data['kasir'] = $this->ModelKasir->showData()->result();
		$this->load->view("layout/templateAdmin");
		$this->load->view("admin/menuKasir", $data);	
	}
	
	// delete Data Kasir
	public function delete($id)
    {
        $where = array('id' => $id);
        $this->ModelKasir->hapusData($where, 'tb_kasir');
        redirect('Kasir/data');
    }    
}
