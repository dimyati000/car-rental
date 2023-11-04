<?php
class ModelPelanggan extends CI_Model
{
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
