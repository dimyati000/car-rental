<?php
    class Register extends CI_Controller{
		// Validasi Form Register dan menampilkan view register
        public function index()
        {
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
                $this->load->view('layout/register');
            }else{
                $data = array(
                    'idUser' => '',
                    'namaUser' => $this->input->post('namaUser'),
                    'username' => $this->input->post('username'),
                    'alamat' => $this->input->post('alamat'),
                    'noTelp' => $this->input->post('noTelp'),
                    'password' => $this->input->post('password'),
                    'roleId' => 2
                );
                $this->db->insert('tb_user', $data);
                redirect('Auth/login');
            }
        }
    }
