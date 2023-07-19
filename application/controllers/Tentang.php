<?php
class Tentang extends CI_Controller
{
	// tampilkan data tentang
	public function __construct()
	{
			parent::__construct();
			$this->load->model('ModelTentang');
	}

	public function index()
	{
		$data['tentang'] = $this->ModelTentang->showData()->result();
		$this->load->view("layout/templateAdmin");
		$this->load->view("admin/setting", $data);
	}
	// tambah view tambah tentang
	public function add()
	{
		$this->load->view("layout/templateAdmin");
		$this->load->view("admin/tambahTentang");
	}
	// kirim data tambah ke table
	public function tambah()
	{
		$menuTentang = $this->input->post("menuTentang");
		$deskripsi = $this->input->post("deskripsi");

		$data = array(
			'menuTentang' => $menuTentang,
			'deskripsi'   => $deskripsi
		);
		$this->ModelTentang->tambahData($data, 'tb_tentang');
		redirect("../Tentang");
	}
	// edit data tentang
	public function edit($idTentang)
	{
		$where = array('idTentang' => $idTentang);
        $data['tentang'] = $this->ModelTentang->editTentang($where, 'tb_tentang')->result();
        $this->load->view('layout/templateAdmin');
        $this->load->view('admin/editTentang', $data);
	}
	// update data tentang
	public function update()
	{
		$idTentang = $this->input->post("idTentang");
		$menuTentang = $this->input->post("menuTentang");
		$deskripsi = $this->input->post("deskripsi");

		$data = array(
			'menuTentang' => $menuTentang,
			'deskripsi'   => $deskripsi
		);
		$where = array(
			'idTentang' => $idTentang
		);
		$this->ModelTentang->updateData($where, $data, 'tb_tentang');
		redirect("../Tentang");
	}
	public function delete($idTentang)
	{
		$where = array(
			'idTentang' => $idTentang
		);
		$this->ModelTentang->hapusTentang($where, 'tb_tentang');
        redirect('../Tentang');
	}
}
