<?php
// didefinisikan('BASEPATH') atau keluar('Tidak ada akses skrip langsung yang diperbolehkan');
defined('BASEPATH') or exit('No direct script access allowed');

use Ramsey\Uuid\Uuid;
class Register extends CI_Controller
{
    private $nama_menu  = "Register";     
    private $nama_sistem  = "Evano Trans System";     

    // Validasi Form Register dan menampilkan view register
    public function index()
    {
        $this->load->view("system/layout/headTemplateAdmin");
        $this->load->view("system/layout/jsTemplateAdmin");
        $data['title'] = $this->nama_menu." | ".$this->nama_sistem;
        $this->form_validation->set_rules('namaUser', 'Nama', 'required', [
            'required' => 'Nama Wajib Di isi'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required', [
            'required' => 'Username Wajib Di isi'
        ]);
        $this->form_validation->set_rules('alamat', 'alamat', 'required', [
            'required' => 'Alamat Wajib Di isi'
        ]);
        $this->form_validation->set_rules('noTelp', 'No Telp', 'required', [
            'required' => 'No Telp Wajib Di isi'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|matches[password2]', [
            'required' => 'Password Wajib Di isi',
            'matches'  => 'Password Tidak Cocok'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|matches[password]');

        if($this->form_validation->run() == FALSE){
            $this->load->view('auth/register', $data);
        }else{
            $idUser = Uuid::uuid4();
            $data = array(
                'idUser' => $idUser,
                'namaUser' => $this->input->post('namaUser'),
                'username' => $this->input->post('username'),
                'alamat' => $this->input->post('alamat'),
                'noTelp' => $this->input->post('noTelp'),
                'password' => $this->input->post('password'),
                'roleId' => 2
            );
            $this->db->insert('tb_user', $data);
            redirect('../Login');
        }
    }
}
