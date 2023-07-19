<?php
class ModelTentang extends CI_Model
{
	public function showData()
	{
		return $this->db->get('tb_tentang');
	}
	public function tambahData($data, $table)
	{
		return $this->db->insert($table, $data);
	}
	public function editTentang($where, $table)
	{
		return $this->db->get_where($table, $where);
	}
	public function updateData($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
	public function hapusTentang($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
}
