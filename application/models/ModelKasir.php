<?php
class ModelKasir extends CI_Model{
    public function showData(){
        return $this->db->get('tb_kasir');
    }
    public function tambahData($data, $table)
    {
			return $this->db->insert($table, $data);
    }
		public function hapusData($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
