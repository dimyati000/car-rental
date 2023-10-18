<?php
    class ModelUser extends CI_Model{
        public function showProfile($idUser){
            $result = $this->db->where('idUser', $idUser)->get('tb_user');
            if($result->num_rows() > 0){
                return $result->result();
            }else{
                return false;
            }
        }
    }
