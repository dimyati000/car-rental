<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{ 
	private $nama_menu  = "Pelanggan";     
  private $nama_sistem  = "Evano Trans System";     
  
    public function __construct()
    {
       parent::__construct();
       $this->load->model('ModelPelanggan');
       if($this->session->userdata('roleId') != 1 && $this->session->userdata('roleId') != 2){
           $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
           <strong>Anda Harus Login Terlebih Dahulu !</strong>
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>');
         redirect('../Login');
       } 
    }
		// Tampilkan data pelanggan  
    public function index()
    {
      $data['title'] = $this->nama_menu." | ".$this->nama_sistem; 
      $data['pelanggan'] = $this->ModelPelanggan->showData()->result();
      $data['content'] = "pelanggan/index.php";
      $this->parser->parse('system/templateAdmin', $data);
    }

      
    public function fetch_data(){
      $pg     = ($this->input->get("page") != "") ? $this->input->get("page") : 1;
      $key	  = ($this->input->get("search") != "") ? strtoupper(quotes_to_entities($this->input->get("search"))) : "";
      $limit	= $this->input->get("limit");
      $offset = ($limit*$pg)-$limit;
      $column = $this->input->get("sortby");
      $sort   = $this->input->get("sorttype");
      
      $page              = array();
      $page['limit']     = $limit;
      $page['count_row'] = $this->ModelPelanggan->get_list_count($key)['jml'];
      $page['current']   = $pg;
      $page['list']      = gen_paging($page);
      $data['paging']    = $page;
      $data['list']      = $this->ModelPelanggan->get_list_data($key, $limit, $offset, $column, $sort);

      $this->load->view('sistem/kategori/list_data',$data);
  }

    
    // Tambah Data pelanggan
    public function tambahData()
    {
      $idPelanggan = $this->input->post('idPelanggan');
      $nik = $this->input->post('nik');
      $namaPelanggan = $this->input->post('namaPelanggan');
      $noTelp = $this->input->post('noTelp');
      $alamat = $this->input->post('alamat');
      $fotoKtp = $_FILES['fotoKtp']['name'];
        if($fotoKtp = ''){

        }else{
            $config ['upload_path'] = 'assets/uploads/ktp/';
            $config ['allowed_types'] = 'jpg|jpeg|png|gif';
            
            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('fotoKtp')){
                echo "Upload Foto KTP Gagal";
            }else{
                $fotoKtp = $this->upload->data('file_name');
            }
        }
        $data = array(
          'idPelanggan' => $idPelanggan,
          'nik' => $nik,
          'namaPelanggan' => $namaPelanggan,
          'noTelp' => $noTelp,
          'alamat' => $alamat,
          'fotoKtp' => $fotoKtp
        );
        $this->ModelPelanggan->tambahPelanggan($data, 'tb_pelanggan');
        redirect('../Pelanggan');
    }
		// edit pelanggan  
    public function edit($idPelanggan)
    {
      $where = array('idPelanggan' => $idPelanggan);
      $data['pelanggan'] = $this->ModelPelanggan->editPelanggan($where, 'tb_pelanggan')->result();
      $this->load->view("layout/templateAdmin");
      $this->load->view("admin/editPelanggan", $data); 
      $this->load->view("layout/footerTemplateAdmin");
    }
		// update pelanggan  
    public function update()
    {
        $idPelanggan = $this->input->post('idPelanggan');
        $nik = $this->input->post('nik');
        $namaPelanggan = $this->input->post('namaPelanggan');
        $noTelp = $this->input->post('noTelp');
        $alamat = $this->input->post('alamat');
        if($fotoKtp = $_FILES['fotoKtp']['name']){
          $config ['upload_path'] = 'assets/uploads/ktp/';
          $config ['allowed_types'] = 'jpg|jpeg|png|gif';
          
          $this->load->library('upload', $config);
          if(!$this->upload->do_upload('fotoKtp')){
              echo "Upload Foto KTP Gagal";
          }else{
              $fotoKtp = $this->upload->data('file_name');
          }
          $data = array(
            'nik' => $nik,
            'namaPelanggan' => $namaPelanggan,
            'noTelp' => $noTelp,
            'alamat' => $alamat,
            'fotoKtp' => $fotoKtp,
        );
        }else{
          $data = array(
            'nik' => $nik,
            'namaPelanggan' => $namaPelanggan,
            'noTelp' => $noTelp,
            'alamat' => $alamat,
          );
        }
        $where = array(
            'idPelanggan' => $idPelanggan
        );
        
        $this->ModelPelanggan->updateData($where, $data, 'tb_pelanggan');
        redirect('../Pelanggan');
    }
		// Hapus data pelanggan
    public function delete($idpelanggan)
    {
        $where = array('idpelanggan' => $idpelanggan);
        $this->ModelPelanggan ->hapusData($where, 'tb_pelanggan');
        redirect('../Pelanggan');
    } 
}
