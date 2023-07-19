<?php
class ModelBarang extends CI_Model
{
	public function showData($keyword = null)
	{
		if($keyword){
			$this->db->like('namaBarang', $keyword);
			$this->db->or_like('kategori', $keyword);
		}
		return $this->db->get('tb_product', $keyword);
	}
	public function tambahBarang($data, $table)
	{
		return $this->db->insert($table, $data);
	}
	public function editBarang($where, $table)
	{
		return $this->db->get_where($table, $where);
	}
	public function updateData($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
	public function hapusBarang($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	public function find($idBarang)
	{
		$result = $this->db->where('idBarang', $idBarang)
			->limit(1)
			->get('tb_product');
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return array();
		}
	}
	public function detailBarang($idBarang)
	{
		$result = $this->db->where('idBarang', $idBarang)->get('tb_product');
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return false;
		}
	}
}
