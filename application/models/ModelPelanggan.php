<?php
class ModelPelanggan extends CI_Model
{
    function get_list_count($key="", $created_by=""){
        $q = "select count(*) as jml from tb_pelanggan
        where concat(namaPelanggan) like '%$key%' ";
        if ($created_by != ""){
            $q .= " and created_by = '$created_by'";
        }
        $query = $this->db->query($q)->row_array();
        return $query;
    }

    function get_list_data($key="",  $limit="", $offset="", $column="", $sort="", $created_by=""){
        $q = "select * from tb_pelanggan
            where concat(namaPelanggan) like '%$key%' ";
            if ($created_by != ""){
                $q .= " and created_by = '$created_by'";
            }
        $q .= " order by $column $sort limit $limit offset $offset ";
        $query = $this->db->query($q);
        return $query;
    }

    function get_all(){
      $query = $this->db->select('idPelanggan, namaPelanggan')
              ->order_by('namaPelanggan', 'asc')
              ->get('tb_pelanggan');
      return $query;
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
