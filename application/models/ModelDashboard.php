<?php
class modelDashboard extends CI_Model{
	public function getPelanggan()
	{
		$data = "SELECT count(idPelanggan) as totalP FROM tb_pelanggan";
		$result = $this->db->query($data);
		return $result->row()->totalP;	
	}
	public function getMobil()
	{
		$data = "SELECT count(idMobil) as totalM FROM tb_mobil";
		$result = $this->db->query($data);
		return $result->row()->totalM;	
	}
	public function getSewaPenumpang($created_by="", $tipeSewa="SP")
	{
		$data = "SELECT count(idSewa) as totalSewaP
		FROM tb_formsewa
		WHERE tipeSewa = '$tipeSewa' ";
		if ($created_by != ""){
			$data .= " and created_by = '$created_by'";
		}
		$result = $this->db->query($data);
		return $result->row()->totalSewaP;	
	}
	public function getSewaBarang($created_by="", $tipeSewa="SB")
	{
		$data = "SELECT count(idSewa) as totalSewaB
		FROM tb_formsewa
		WHERE tipeSewa = '$tipeSewa' ";
		if ($created_by != ""){
			$data .= " and created_by = '$created_by'";
		}
		$result = $this->db->query($data);
		return $result->row()->totalSewaB;	
	}


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

  public function getDataSewaAktif(){
    $q = "
      SELECT fs.idSewa, fs.noSewa, fs.tipeSewa, fs.tglBerangkat, fs.jamBerangkat, fs.tglKembali, fs.jamKembali, fs.rute, fs.muatan, fs.tipeTarif,
      fs.lamaSewa, fs.totalTarif, fs.dp, fs.overtime, fs.kurangBayar, fs.jasaSopir, fs.jasaAntar, fs.totalBayar, fs.klaim, fs.keterangan, fs.created_by, 
      p.namaPelanggan, p.noTelp, p.alamat, m.idMobil, m.jenisMobil, m.nopol 
      FROM tb_formsewa fs
      LEFT JOIN tb_pelanggan p ON fs.pelangganId = p.idPelanggan
      LEFT JOIN tb_mobil m ON fs.mobilId = m.idMobil 
      WHERE fs.tglKembali = CURRENT_DATE()
      ORDER BY concat(fs.tglKembali, fs.jamKembali) ASC
    ";
		$query = $this->db->query($q);
		return $query;
  }
}
