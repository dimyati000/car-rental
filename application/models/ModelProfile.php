<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class ModelProfile extends CI_Model {
       
    public function get_byId($id)
    {
        $query = $this->db->where('idUser', $id)
                  ->get('tb_user');

                  return $query;
    }

    
	public function updateKendaraan($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
    
	public function updateDiri($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
    }
    /* End of file User_m.php */    
?>