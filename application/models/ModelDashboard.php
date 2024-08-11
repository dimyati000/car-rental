<?php
class modelDashboard extends CI_Model{
	public function getPelanggan($created_by="")
	{
		$data = "SELECT count(idPelanggan) as totalP FROM tb_pelanggan";
		// Tambahkan klausa WHERE jika diperlukan
		if ($created_by != "") {
			$data .= " WHERE created_by = ?";
			// Siapkan parameter untuk query
			$params = [$created_by];
		} else {
			// Tidak ada parameter jika tidak ada kondisi WHERE
			$params = [];
		}
		// Jalankan query dengan parameter
		$result = $this->db->query($data, $params);
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

	public function getDataSewaAktif($created_by=""){
		$q = "
		SELECT fs.idSewa, fs.noSewa, fs.tipeSewa, fs.tglBerangkat, fs.jamBerangkat, fs.tglKembali, fs.jamKembali, fs.rute, fs.muatan, fs.tipeTarif,
		fs.lamaSewa, fs.totalTarif, fs.dp, fs.overtime, fs.kurangBayar, fs.jasaSopir, fs.jasaAntar, fs.totalBayar, fs.klaim, fs.keterangan, fs.created_by, 
		p.namaPelanggan, p.noTelp, p.alamat, m.idMobil, m.jenisMobil, m.nopol 
		FROM tb_formsewa fs
		LEFT JOIN tb_pelanggan p ON fs.pelangganId = p.idPelanggan
		LEFT JOIN tb_mobil m ON fs.mobilId = m.idMobil 
		WHERE fs.tglKembali = CURRENT_DATE()";
		if ($created_by != ""){
			$q .= " and fs.created_by = '$created_by'";
		}
		$q .= " ORDER BY concat(fs.tglKembali, fs.jamKembali) ASC";
		$query = $this->db->query($q);
		return $query;
	}
	
    function get_list_count($key=""){
		$q = "select count(*) jml FROM tb_mobil m 
		WHERE concat(jenisMobil, nopol) like '%$key%'
		AND m.idMobil NOT IN (
			SELECT mobilId from tb_formsewa 
			WHERE STR_TO_DATE(CONCAT(tglKembali, ' ', jamKembali),'%Y-%m-%d %H:%i:%s') >= NOW()
			GROUP BY mobilid
		)
		";
			$query = $this->db->query($q)->row_array();
			return $query;
    }

	public function getDataMobilReady($key="", $limit="", $offset="", $column="", $sort=""){
		$q = "
		SELECT m.* FROM tb_mobil m 
		WHERE concat(jenisMobil, nopol) like '%$key%'
		and m.idMobil NOT IN (
			SELECT mobilId from tb_formsewa 
			WHERE STR_TO_DATE(CONCAT(tglKembali, ' ', jamKembali),'%Y-%m-%d %H:%i:%s') >= NOW()
			GROUP BY mobilid
		)
		";
			$q .= " ORDER BY m.jenisMobil ASC
			limit $limit offset $offset";
			$query = $this->db->query($q);
			return $query;
	}	
}
