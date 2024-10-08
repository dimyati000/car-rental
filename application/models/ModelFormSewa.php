<?php
class ModelFormSewa extends CI_Model
{
	
    function get_list_count($key="", $idSewa="",  $created_by="", $jenisMobil="", $tanggal_awal="", $tanggal_akhir="", $tipeSewa="SP"){
		$q = "select count(*) as jml
		FROM `tb_formsewa` fs
		LEFT JOIN tb_pelanggan p ON fs.pelangganId = p.idPelanggan
		LEFT JOIN tb_mobil m ON fs.mobilId = m.idMobil 
		WHERE fs.tipeSewa = '$tipeSewa'
		AND concat(noSewa) like '%$key%' ";
		if ($idSewa != ""){
			$q .= " and fs.idSewa = '$idSewa'";
		}
		if ($created_by != ""){
			$q .= " and fs.created_by = '$created_by'";
		}
		if ($jenisMobil != ""){
			$q .= " and m.idMobil = '$jenisMobil'";
		}
		if ($tanggal_awal != ""){
			$q .= " and fs.tglBerangkat >= '$tanggal_awal'";
		}
		if ($tanggal_akhir != ""){
			$q .= " and fs.tglBerangkat <= '$tanggal_akhir'";
		}
		$query = $this->db->query($q)->row_array();
		return $query;
    }

    function getList_dataPenumpang($key="", $limit="", $offset="", $column="", $sort="", $idSewa="",  $created_by="", $jenisMobil="", $tanggal_awal="", $tanggal_akhir="", $tipeSewa="SP"){
        $q = "SELECT fs.idSewa, fs.noSewa, fs.tipeSewa, fs.tglBerangkat, fs.jamBerangkat, fs.tglKembali, fs.jamKembali, fs.rute, fs.muatan, fs.tipeTarif,
		fs.lamaSewa, fs.totalTarif, fs.dp, fs.overtime, fs.kurangBayar, fs.jasaSopir, fs.jasaAntar, fs.totalBayar, fs.klaim, fs.keterangan, fs.created_by, 
		p.namaPelanggan, p.noTelp, p.alamat, m.idMobil, m.jenisMobil, m.nopol,
		(
			SELECT GROUP_CONCAT(j.namaJaminan SEPARATOR ', ') jaminan
			FROM tb_jaminansewa s 
			left join tb_jaminan j on j.idJaminan = s.idJaminan 
			WHERE s.idSewa = fs.idSewa
		) namaJaminan
		FROM `tb_formsewa` fs
		LEFT JOIN tb_pelanggan p ON fs.pelangganId = p.idPelanggan
		LEFT JOIN tb_mobil m ON fs.mobilId = m.idMobil 
		WHERE fs.tipeSewa = '$tipeSewa'
		AND concat(noSewa) like '%$key%' ";
		if ($idSewa != ""){
			$q .= " and fs.idSewa = '$idSewa'";
		}
		if ($created_by != ""){
			$q .= " and fs.created_by = '$created_by'";
		}
		if ($jenisMobil != ""){
			$q .= " and m.idMobil = '$jenisMobil'";
		}
		if ($tanggal_awal != ""){
			$q .= " and fs.tglBerangkat >= '$tanggal_awal'";
		}
		if ($tanggal_akhir != ""){
			$q .= " and fs.tglBerangkat <= '$tanggal_akhir'";
		}
		$q .= " ORDER BY fs.tglBerangkat DESC, fs.noSewa DESC
		limit $limit offset $offset";
		$query = $this->db->query($q);
        return $query;
    }

	function getList_dataBarang($key="", $limit="", $offset="", $column="", $sort="", $idSewa="",  $created_by="", $jenisMobil="", $tanggal_awal="", $tanggal_akhir="", $tipeSewa="SB"){
        $q = "SELECT fs.idSewa, fs.noSewa, fs.tipeSewa, fs.tglBerangkat, fs.jamBerangkat, fs.tglKembali, fs.jamKembali, fs.rute, fs.muatan, fs.tipeTarif,
		fs.lamaSewa, fs.totalTarif, fs.dp, fs.overtime, fs.kurangBayar, fs.jasaSopir, fs.jasaAntar, fs.totalBayar, fs.klaim, fs.keterangan, fs.created_by, 
		p.namaPelanggan, p.noTelp, p.alamat, m.idMobil, m.jenisMobil, m.nopol,
		(
			SELECT GROUP_CONCAT(j.namaJaminan SEPARATOR ', ') jaminan
			FROM tb_jaminansewa s 
			left join tb_jaminan j on j.idJaminan = s.idJaminan 
			WHERE s.idSewa = fs.idSewa
		) namaJaminan
		FROM `tb_formsewa` fs
		LEFT JOIN tb_pelanggan p ON fs.pelangganId = p.idPelanggan
		LEFT JOIN tb_mobil m ON fs.mobilId = m.idMobil 
		WHERE fs.tipeSewa = '$tipeSewa'
		AND concat(noSewa) like '%$key%' ";
		if ($idSewa != ""){
			$q .= " and fs.idSewa = '$idSewa'";
		}
		if ($created_by != ""){
			$q .= " and fs.created_by = '$created_by'";
		}
		if ($jenisMobil != ""){
			$q .= " and m.idMobil = '$jenisMobil'";
		}
		if ($tanggal_awal != ""){
			$q .= " and fs.tglBerangkat >= '$tanggal_awal'";
		}
		if ($tanggal_akhir != ""){
			$q .= " and fs.tglBerangkat <= '$tanggal_akhir'";
		}
		$q .= " ORDER BY fs.tglBerangkat DESC, fs.noSewa DESC
		limit $limit offset $offset";
		$query = $this->db->query($q);
        return $query;
    }


    function get_all(){
      $query = $this->db->select('idSewa, noSewa')
              ->where('status', '1')
              ->order_by('noSewa', 'asc')
              ->get('tb_formsewa');
      return $query;
    }

	function getDataPenumpang($idSewa="", $created_by="", $jenisMobil="", $tanggal_awal="", $tanggal_akhir="", $tipeSewa="SP"){
		$q = "SELECT fs.idSewa, fs.noSewa, fs.tipeSewa, fs.tglBerangkat, fs.jamBerangkat, fs.tglKembali, fs.jamKembali, fs.rute, fs.muatan, fs.tipeTarif,
		fs.lamaSewa, fs.totalTarif, fs.dp, fs.overtime, fs.kurangBayar, fs.jasaSopir, fs.jasaAntar, fs.totalBayar, fs.klaim, fs.keterangan, fs.created_by, 
		p.namaPelanggan, p.noTelp, p.alamat, m.idMobil, m.jenisMobil, m.nopol,
		(
			SELECT GROUP_CONCAT(j.namaJaminan SEPARATOR ', ') jaminan
			FROM tb_jaminansewa s 
			left join tb_jaminan j on j.idJaminan = s.idJaminan 
			WHERE s.idSewa = fs.idSewa
		) namaJaminan
		FROM `tb_formsewa` fs
		LEFT JOIN tb_pelanggan p ON fs.pelangganId = p.idPelanggan
		LEFT JOIN tb_mobil m ON fs.mobilId = m.idMobil 
		WHERE fs.tipeSewa = '$tipeSewa' ";
		if ($idSewa != ""){
			$q .= " and fs.idSewa = '$idSewa'";
		}
		if ($created_by != ""){
			$q .= " and fs.created_by = '$created_by'";
		}
		if ($jenisMobil != ""){
			$q .= " and m.idMobil = '$jenisMobil'";
		}
		if ($tanggal_awal != ""){
			$q .= " and fs.tglBerangkat >= '$tanggal_awal'";
		}
		if ($tanggal_akhir != ""){
			$q .= " and fs.tglBerangkat <= '$tanggal_akhir'";
		}
		$q .= " ORDER BY fs.tglBerangkat DESC, fs.noSewa DESC";
		$query = $this->db->query($q);
		return $query;
	}

	function getDataBarang($idSewa="", $created_by="", $jenisMobil="", $tanggal_awal="", $tanggal_akhir="", $tipeSewa="SB"){
		$q = "SELECT fs.idSewa, fs.noSewa, fs.tipeSewa, fs.tglBerangkat, fs.jamBerangkat, fs.tglKembali, fs.jamKembali, fs.rute, fs.muatan, fs.tipeTarif,
		fs.lamaSewa, fs.totalTarif, fs.dp, fs.overtime, fs.kurangBayar, fs.jasaSopir, fs.jasaAntar, fs.totalBayar, fs.klaim, fs.keterangan, fs.created_by, 
		p.namaPelanggan, p.noTelp, p.alamat, m.idMobil, m.jenisMobil, m.nopol,
		(
			SELECT GROUP_CONCAT(j.namaJaminan SEPARATOR ', ') jaminan
			FROM tb_jaminansewa s 
			left join tb_jaminan j on j.idJaminan = s.idJaminan 
			WHERE s.idSewa = fs.idSewa
		) namaJaminan
		FROM `tb_formsewa` fs
		LEFT JOIN tb_pelanggan p ON fs.pelangganId = p.idPelanggan
		LEFT JOIN tb_mobil m ON fs.mobilId = m.idMobil
		WHERE fs.tipeSewa = '$tipeSewa' ";
		if ($idSewa != ""){
			$q .= " and fs.idSewa = '$idSewa'";
		}
		if ($created_by != ""){
			$q .= " and fs.created_by = '$created_by'";
		}
		if ($jenisMobil != ""){
			$q .= " and m.idMobil = '$jenisMobil'";
		}
		if ($tanggal_awal != ""){
			$q .= " and fs.tglBerangkat >= '$tanggal_awal'";
		}
		if ($tanggal_akhir != ""){
			$q .= " and fs.tglBerangkat <= '$tanggal_akhir'";
		}
		$q .= " ORDER BY fs.tglBerangkat DESC, fs.noSewa DESC";
		$query = $this->db->query($q);
		return $query;
	}
	// public function showData($keyword = null)
	// {
	// 	if($keyword){
	// 		$this->db->like('jenisMobil', $keyword);
	// 	}
	// 	return $this->db->get('tb_formsewa', $keyword);
	// }

	public function tambahSewa($data, $table)
	{
		return $this->db->insert($table, $data);
	}

	public function editSewaPenumpang($idSewa="", $tipeSewa="SP")
	{
		$q = "SELECT fs.idSewa, fs.noSewa, fs.tipeSewa, fs.tglBerangkat, fs.jamBerangkat, fs.tglKembali, fs.jamKembali, fs.rute, fs.muatan, fs.tipeTarif,
		fs.lamaSewa, fs.totalTarif, fs.dp, fs.overtime, fs.kurangBayar, fs.jasaSopir, fs.jasaAntar, fs.totalBayar, fs.klaim, fs.keterangan, fs.created_by, 
		fs.pelangganId, p.namaPelanggan, p.noTelp, p.alamat, m.jenisMobil, m.nopol, fs.mobilId,
		(
			SELECT GROUP_CONCAT(j.namaJaminan SEPARATOR ', ') jaminan
			FROM tb_jaminansewa s 
			left join tb_jaminan j on j.idJaminan = s.idJaminan 
			WHERE s.idSewa = fs.idSewa
		) namaJaminan,
		(
			SELECT GROUP_CONCAT(j.idJaminan SEPARATOR ', ') idJaminan
			FROM tb_jaminansewa s 
			left join tb_jaminan j on j.idJaminan = s.idJaminan 
			WHERE s.idSewa = fs.idSewa
		) idJaminan
		FROM `tb_formsewa` fs
		LEFT JOIN tb_pelanggan p ON fs.pelangganId = p.idPelanggan
		LEFT JOIN tb_mobil m ON fs.mobilId = m.idMobil 
		WHERE fs.tipeSewa = '$tipeSewa' ";
		if ($idSewa != ""){
			$q .= " and fs.idSewa = '$idSewa'";
		}

		$q .= " ORDER BY fs.tglBerangkat DESC, fs.noSewa DESC";
		$query = $this->db->query($q);
		return $query;
	}

	public function editSewaBarang($idSewa="", $tipeSewa="SB")
	{
		$q = "SELECT fs.idSewa, fs.noSewa, fs.tipeSewa, fs.tglBerangkat, fs.jamBerangkat, fs.tglKembali, fs.jamKembali, fs.rute, fs.muatan, fs.tipeTarif,
		fs.lamaSewa, fs.totalTarif, fs.dp, fs.overtime, fs.kurangBayar, fs.jasaSopir, fs.jasaAntar, fs.totalBayar, fs.klaim, fs.keterangan, fs.created_by, 
		fs.pelangganId, p.namaPelanggan, p.noTelp, p.alamat, m.jenisMobil, m.nopol, fs.mobilId,
		(
			SELECT GROUP_CONCAT(j.namaJaminan SEPARATOR ', ') jaminan
			FROM tb_jaminansewa s 
			left join tb_jaminan j on j.idJaminan = s.idJaminan 
			WHERE s.idSewa = fs.idSewa
		) namaJaminan,
		(
			SELECT GROUP_CONCAT(j.idJaminan SEPARATOR ', ') idJaminan
			FROM tb_jaminansewa s 
			left join tb_jaminan j on j.idJaminan = s.idJaminan 
			WHERE s.idSewa = fs.idSewa
		) idJaminan
		FROM `tb_formsewa` fs
		LEFT JOIN tb_pelanggan p ON fs.pelangganId = p.idPelanggan
		LEFT JOIN tb_mobil m ON fs.mobilId = m.idMobil 
		WHERE fs.tipeSewa = '$tipeSewa' ";
		if ($idSewa != ""){
			$q .= " and fs.idSewa = '$idSewa'";
		}

		$q .= " ORDER BY fs.tglBerangkat DESC, fs.noSewa DESC";
		$query = $this->db->query($q);
		return $query;
	}

	public function updateSewa($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function hapusSewa($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function find($idMobil)
	{
		$result = $this->db->where('idSewa', $idMobil)
			->limit(1)
			->get('tb_formsewa');
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return array();
		}
	}
	
	public function detailMobil($idMobil)
	{
		$result = $this->db->where('idSewa', $idMobil)->get('tb_formsewa');
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return false;
		}
	}

	public function insertBatch($table, $data)
	{
		return $this->db->insert_batch($table, $data);
	}

	public function deleteBatch($idSewas) {
		// Pastikan $idSewas tidak kosong sebelum mencoba menghapus
		if (!empty($idSewas)) {
			$this->db->where_in('id', $idSewas);
			$this->db->delete('tb_jaminansewa');
		}
	}

	// perbulan mulai dari 001 lagi
	function get_kode_penumpang($tbl,$kolom,$awal){
		date_default_timezone_set('Asia/Jakarta');
		$tgl = date('Y-m-d');
		$q = $this->db->query("SELECT MAX(LEFT($kolom,3)) AS kd_max FROM $tbl 
			WHERE MONTH(tglSewa)=MONTH('$tgl')
			AND YEAR(tglSewa)=YEAR('$tgl')
		");
		$kd = "";
		if($q->num_rows()>0){
			$data = $q->row_array();
			foreach($q->result() as $k){
				$tmp = intval($k->kd_max)+1;
				$kd = sprintf("%03s", $tmp);
			}
		}else{
			$kd = "001";
		}
		$newDate = date("dmY", strtotime($tgl));
		return $kd."/".$awal."/".$newDate;
	}

	// perbulan mulai dari 001 lagi
	function get_kode_barang($tbl,$kolom,$awal){
		date_default_timezone_set('Asia/Jakarta');
		$tgl = date('Y-m-d');
		$q = $this->db->query("SELECT MAX(LEFT($kolom,3)) AS kd_max FROM $tbl 
			WHERE MONTH(tglSewa)=MONTH('$tgl')
			AND YEAR(tglSewa)=YEAR('$tgl')
		");
		$kd = "";
		if($q->num_rows()>0){
			$data = $q->row_array();
			foreach($q->result() as $k){
				$tmp = intval($k->kd_max)+1;
				$kd = sprintf("%03s", $tmp);
			}
		}else{
			$kd = "001";
		}
		$newDate = date("dmY", strtotime($tgl));
		return $kd."/".$awal."/".$newDate;
	}
	
}
