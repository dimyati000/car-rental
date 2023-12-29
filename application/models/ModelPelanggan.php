<?php
class ModelPelanggan extends CI_Model
{
    function get_list_count($key="", $status="1"){
        $query = $this->db->query("
            select count(*) as jml from m_kategori_produk
            where 
                concat(nama) like '%$key%' and status = '$status'
        ")->row_array();
        return $query;
    }

    function get_list_data($key="",  $limit="", $offset="", $column="", $sort="", $status="1"){
        $query = $this->db->query("
            select * from m_kategori_produk
            where 
                concat(nama) like '%$key%' 
                and status = '$status'
            order by $column $sort
            limit $limit offset $offset
        ");
        return $query;
    }

    function get_all(){
      $query = $this->db->select('id, nama')
              ->where('status', '1')
              ->order_by('nama', 'asc')
              ->get('m_kategori_produk');
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
