<?php 

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    private $nama_menu  = "Login";     
    private $nama_sistem  = "Evano Trans System";     

    // Check Validasi User
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelAuth');
    }

    // Jika role 1 berarti admin , jika role 2 berarti user
    public function index()
    {
        $this->load->view("layout/headTemplateAdmin");
        $this->load->view("layout/jsTemplateAdmin");
        $data['title'] = $this->nama_menu." | ".$this->nama_sistem;
        $this->form_validation->set_rules('username', 'Username', 'required', [
            'required' => 'Username Wajib Di isi'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required' => 'Password Wajib Di isi'
        ]);
        if($this->form_validation->run() == FALSE){
            $this->load->view('Login', $data);
        }else{
            $auth = $this->ModelAuth->cekLogin();
            if($auth == FALSE)
            {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Username atau Password anda salah</strong>. Silahkan coba lagi !
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('Login');
            }else{
                $this->session->set_userdata('idUser', $auth->idUser);
                $this->session->set_userdata('namaUser', $auth->namaUser);
                $this->session->set_userdata('username', $auth->username);                   
                $this->session->set_userdata('roleId', $auth->roleId);
                switch($auth->roleId){
                    case 1 : redirect('../Dashboard');
                    break;
                    case 2 : redirect('../Dashboard');
                    break;
                    default: break; 
                }
            }
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Login');
    }
}

