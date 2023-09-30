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
}
