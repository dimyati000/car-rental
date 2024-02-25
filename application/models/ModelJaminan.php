<?php
class ModelJaminan extends CI_Model
{
    function get_list_count($key=""){
        $query = $this->db->query("
            select count(*) as jml from tb_jaminan
            where 
                concat(namaJaminan) like '%$key%'
        ")->row_array();
        return $query;
    }

    function get_list_data($key="",  $limit="", $offset="", $column="", $sort=""){
        $query = $this->db->query("
            select * from tb_jaminan
            where 
                concat(namaJaminan) like '%$key%' 
            order by $column $sort
            limit $limit offset $offset
        ");
        return $query;
    }

    function get_all(){
      $query = $this->db->select('idJaminan, namaJaminan')
              ->where('status', '1')
              ->order_by('namaJaminan', 'asc')
              ->get('tb_jaminan');
      return $query;
    }

	public function showData($keyword = null)
	{
		if($keyword){
			$this->db->like('namaJaminan', $keyword);
		}
		return $this->db->get('tb_jaminan', $keyword);
	}
	public function tambahJaminan($data, $table)
	{
		return $this->db->insert($table, $data);
	}
	public function editJaminan($where, $table)
	{
		return $this->db->get_where($table, $where);
	}
	public function updateData($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
	public function hapusJaminan($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	public function find($idJaminan)
	{
		$result = $this->db->where('idJaminan', $idJaminan)
			->limit(1)
			->get('tb_jaminan');
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return array();
		}
	}
	public function detailJaminan($idJaminan)
	{
		$result = $this->db->where('idJaminan', $idJaminan)->get('tb_jaminan');
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return false;
		}
	}
}
