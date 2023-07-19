<?php
    class ModelChart extends CI_Model{
        
        public function showData(){
            return $this->db->get('tb_product');   
        }
    }