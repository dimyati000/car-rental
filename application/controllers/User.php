<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
    {
       parent::__construct();
       if($this->session->userdata('roleId') != 1 && $this->session->userdata('roleId') != 2){
           $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
           <strong>Anda Harus Login Terlebih Dahulu !</strong>
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>');
         redirect('Auth/login');
       } 
    }
	// tampilkan data barang dan fitur cari barang
	public function index()
	{
		if($this->input->post('input')){
			$data['keyword'] = $this->input->post('keyword');
		}else{
			$data['keyword'] = null;
		}

		$data['barang'] = $this->ModelBarang->showData($data['keyword'])->result();
		$this->load->view("layout/template");
		$this->load->view("index", $data);
	}
	// tambah ke keranjang
	public function tambahKeranjang($idBarang)
    {
        $barang = $this->ModelBarang->find($idBarang);
				$qty = $this->input->post("qty");

        $data = array(
            'id' 	   => $barang->idBarang,
            'qty'      => $qty,
            'price'    => $barang->harga,
            'name'     => $barang->namaBarang
        );
        $this->cart->insert($data);
				
				// $jumlah= $barang->stok-$qty;
				// $dataupdate = array(
				// 	'stok'      => $jumlah,
				// );
				// $this->db->where($idBarang);
				// $this->db->update("tb_product", $dataupdate);
        redirect('../User');
    }
	// data detail keranjang
	public function detailKeranjang()
	{
		$this->load->view("layout/template");
		$this->load->view("keranjang");
	}
	// hapus semua data keranjang
	public function hapusKeranjang()
	{
		$this->cart->destroy();
		redirect('../User');
	}
	// public function pembayaran()
	// {
	// 	$this->load->view("layout/template");
	// 	$this->load->view("pembayaran");
	// }

	// proses pesanan
	public function prosesPesanan()
	{
		$is_processed = $this->ModelTransaksi->index();
		if($is_processed){
		$this->cart->destroy();
		$this->load->view("layout/template");
		$this->load->view("prosesPesanan");
		}else{
			echo "Maaf, Pesanan Anda Gagal Diproses";
		}
	}
	//  detail barang
	public function detail($idBarang)
	{
		$data['barang'] = $this->ModelBarang->detailBarang($idBarang);
		$this->load->view("layout/template");
		$this->load->view("detailBarang", $data);
	}
}
