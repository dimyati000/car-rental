<?php
class ModelMobil extends CI_Model
{
    function get_list_count($key=""){
        $query = $this->db->query("
            select count(*) as jml from tb_mobil
            where 
                concat(jenisMobil) like '%$key%'
        ")->row_array();
        return $query;
    }

    function get_list_data($key="",  $limit="", $offset="", $column="", $sort=""){
        $query = $this->db->query("
            select * from tb_mobil
            where 
                concat(jenisMobil) like '%$key%' 
            order by $column $sort
            limit $limit offset $offset
        ");
        return $query;
    }

    function get_all(){
      $query = $this->db->select('idMobil, jenisMobil')
              ->order_by('jenisMobil', 'asc')
              ->get('tb_mobil');
      return $query;
    }

	public function showData($keyword = null)
	{
		if($keyword){
			$this->db->like('jenisMobil', $keyword);
		}
		 // Menambahkan klausa ORDER BY ke query
        $this->db->order_by('jenisMobil', 'ASC');

		return $this->db->get('tb_mobil', $keyword);
	}
	public function showMobilReady($idSewa="")
	{
		$q = "
		select * from tb_mobil
		where idMobil NOT IN (
			SELECT mobilId from tb_formsewa 
			WHERE STR_TO_DATE(CONCAT(tglKembali, ' ', jamKembali),'%Y-%m-%d %H:%i:%s') >= NOW()
		";
		if ($idSewa!="") {
			$q .= " AND idSewa NOT IN ('$idSewa') ";
		}

		$q .= " 
			GROUP BY mobilid
			) 
			order by jenisMobil
		";

		$query = $this->db->query($q);
        return $query;
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
