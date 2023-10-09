<?php
class ModelFormSewa extends CI_Model
{
	function getData($idSewa=""){
		$q = "SELECT fs.idSewa, fs.noSewa, fs.tglBerangkat, fs.jamBerangkat, fs.tglKembali, fs.jamKembali, fs.rute, fs.tipeTarif, fs.lamaSewa,
		fs.totalTarif, fs.dp, fs.overtime, fs.kurangBayar, fs.jasaSopir, fs.jasaAntar, fs.totalBayar, fs.klaim, fs.keterangan, p.namaPelanggan,
		p.noTelp, p.alamat, m.jenisMobil, m.nopol,
		(
			SELECT GROUP_CONCAT(j.namaJaminan SEPARATOR ', ') jaminan
			FROM tb_jaminansewa s 
			left join tb_jaminan j on j.idJaminan = s.idJaminan 
			WHERE s.idSewa = fs.idSewa
		) namaJaminan
		FROM `tb_formsewa` fs
		LEFT JOIN tb_pelanggan p ON fs.pelangganId = p.idPelanggan
		LEFT JOIN tb_mobil m ON fs.mobilId = m.idMobil ";
		if ($idSewa != ""){
			$q .= " where idSewa = '$idSewa'";
		}
		$query = $this->db->query($q);
		return $query;
	}
	public function showData($keyword = null)
	{
		if($keyword){
			$this->db->like('jenisMobil', $keyword);
		}
		return $this->db->get('tb_formsewa', $keyword);
	}
	public function tambahSewa($data, $table)
	{
		return $this->db->insert($table, $data);
	}
	public function editSewa($where, $table)
	{
		return $this->db->get_where($table, $where);
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

	function generateKodeSiswa()
	{
		 // FORMAT SMA/TAHUN SEKARANG/0001
		 // EX : SMA/2020/0001
 
		 $this->db->select('RIGHT(kode,4) as kode', false);
		 $this->db->order_by("kode", "DESC");
		 $this->db->limit(1);
		 $query = $this->db->get('tb_siswa');
 
		 // SQL QUERY
		 // SELECT RIGHT(kode, 4) AS kode FROM tb_siswa
		 // ORDER BY kode
		 // LIMIT 1
 
		 // CEK JIKA DATA ADA
		 if($query->num_rows() <> 0)
		 {
			 $data       = $query->row(); // ambil satu baris data
			 $kodeSiswa  = intval($data->kode) + 1; // tambah 1
		 }else{
			 $kodeSiswa  = 1; // isi dengan 1
		 }
 
		 $lastKode = str_pad($kodeSiswa, 4, "0", STR_PAD_LEFT);
		 $tahun    = date("Y");
		 $SMA      = "SMA";
 
		 $newKode  = $SMA."/".$tahun."/".$lastKode;
 
		 return $newKode;  // return kode baru
 
	}

	
	// public function get_kode_sewa($awal,$clm,$table){
    //     $q = $this->db->query("SELECT MAX(LEFT($clm,3)) AS idmax FROM $table");
    //     $kd = "";
    //     if($q->num_rows()>0){
    //         foreach($q->result() as $k){
    //             $tmp = ((int)$k->idmax)+1;
    //         	$kd = sprintf("%03s", $tmp);
    //         }
    //     }else{
    //         $kd = "001";
    //     }
    //     $kodemax =  ."/".$kd."/".$awal;
    //     return $kodemax;
	// }
	
	// perbulan mulai dari 001 lagi
	function get_kode_sewa($tbl,$kolom,$awal){
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
		date_default_timezone_set('Asia/Jakarta');
		$newDate = date("dmY", strtotime($tgl));
		return $kd."/".$awal."/".$newDate;
	  }
	
}
