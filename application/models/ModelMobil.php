<?php
class ModelMobil extends CI_Model
{
	public function showData($keyword = null)
	{
		if($keyword){
			$this->db->like('jenisMobil', $keyword);
		}
		 // Menambahkan klausa ORDER BY ke query
        $this->db->order_by('jenisMobil', 'ASC');

		return $this->db->get('tb_mobil', $keyword);
	}
	public function tambahMobil($data, $table)
	{
		return $this->db->insert($table, $data);
	}
	public function editMobil($where, $table)
	{
		return $this->db->get_where($table, $where);
	}
	public function updateMobil($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
	public function hapusMobil($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	public function find($idMobil)
	{
		$result = $this->db->where('idMobil', $idMobil)
			->limit(1)
			->get('tb_mobil');
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return array();
		}
	}
	public function detailMobil($idMobil)
	{
		$result = $this->db->where('idMobil', $idMobil)->get('tb_mobil');
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return false;
		}
	}
}
