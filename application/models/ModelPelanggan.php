<?php
class ModelPelanggan extends CI_Model
{
    function get_list_count($key=""){
        $query = $this->db->query("
            select count(*) as jml from tb_pelanggan
            where 
                concat(namaPelanggan) like '%$key%'
        ")->row_array();
        return $query;
    }

    function get_list_data($key="",  $limit="", $offset="", $column="", $sort=""){
        $query = $this->db->query("
            select * from tb_pelanggan
            where 
                concat(namaPelanggan) like '%$key%' 
            order by $column $sort
            limit $limit offset $offset
        ");
        return $query;
    }

    function get_all(){
      $query = $this->db->select('idPelanggan, namaPelanggan')
              ->where('status', '1')
              ->order_by('namaPelanggan', 'asc')
              ->get('tb_pelanggan');
      return $query;
    }

    public function showData(){
         // Menambahkan klausa ORDER BY ke query
        $this->db->order_by('namaPelanggan', 'ASC');
        
        return $this->db->get('tb_pelanggan');
    }
    
    public function tambahPelanggan($data, $table)
    {
            return $this->db->insert($table, $data);
    }

    public function editPelanggan($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function updateData($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    public function hapusData($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
  
}
