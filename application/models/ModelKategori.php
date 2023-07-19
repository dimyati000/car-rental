<?php 
    class ModelKategori extends CI_Model{
        public function dataKnalpot($keyword)
        {
			if($keyword){
				$this->db->like('namaBarang', $keyword);
				$this->db->or_like('kategori', $keyword);
			}
            return $this->db->get_where("tb_product", array('kategori' => 'Knalpot'));
        }
        public function dataBendaKecil($keyword)
        {
			if($keyword){
				$this->db->like('namaBarang', $keyword);
				$this->db->or_like('kategori', $keyword);
			}
            return $this->db->get_where("tb_product", array('kategori' => 'Benda Kecil'));
        }
        public function dataBodyMotor($keyword)
        {
			if($keyword){
				$this->db->like('namaBarang', $keyword);
				$this->db->or_like('kategori', $keyword);
			}
            return $this->db->get_where("tb_product", array('kategori' => 'Body Motor'));
        }
        public function dataMesinMotor($keyword)
        {
			if($keyword){
				$this->db->like('namaBarang', $keyword);
				$this->db->or_like('kategori', $keyword);
			}
            return $this->db->get_where("tb_product", array('kategori' => 'Mesin Motor'));
        }
    }
