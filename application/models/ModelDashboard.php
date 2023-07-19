<?php
class modelDashboard extends CI_Model{
	public function getsum()
	{
		$data = "SELECT sum(gross_amount) as total FROM tb_midtrans";
		$result = $this->db->query($data);
		return $result->row()->total;
	}
	public function getService()
	{
		$data = "SELECT count(idLayanan) as totalL FROM tb_layanan";
		$result = $this->db->query($data);
		return $result->row()->totalL;	
	}
	public function getSpareJual()
	{
		$data = "SELECT sum(jumlah) as totalS FROM tb_pesanan";
		$result = $this->db->query($data);
		return $result->row()->totalS;	
	}
	public function getStok()
	{
		$data = "SELECT sum(stok) as totalSt FROM tb_product";
		$result = $this->db->query($data);
		return $result->row()->totalSt;	
	}
	public function getKasir()
	{
		$data = "SELECT sum(kembalian) as totalK FROM tb_kasir";
		$result = $this->db->query($data);
		return $result->row()->totalK;
	}
	public function getBayar()
	{
		$data = "SELECT sum(bayar) as totalB FROM tb_kasir";
		$result = $this->db->query($data);
		return $result->row()->totalB;
	}
}
