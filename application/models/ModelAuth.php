<?php
class ModelAuth extends CI_Model
{
	public function cekLogin()
	{
		$namaUser = set_value('namaUser');
		$username = set_value('username');
		$password = set_value('password');
		$result = $this->db->where('username', $username)
			->where('password', $password)
			->limit(1)
			->get('tb_user');
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return array();
		}
	}

	public function getUser()
	{
		$data = "SELECT namaUser FROM tb_user";
		$result = $this->db->query($data);	
	}
	
}
