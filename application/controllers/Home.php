<?php
class Home extends CI_Controller
{
    private $nama_menu  = "Home";     
	private $nama_sistem  = "Evano Trans System";     

	// Memuat view home
    public function index()
    {
        $data['title'] = $this->nama_menu." | ".$this->nama_sistem;
        $this->load->view('homeCarHeader', $data);
        $this->load->view('homeCar');
        $this->load->view('homeCarFooter');
    }

	// Memuat view profil
    public function profile($idUser)
    {
        $data['profile'] = $this->ModelUser->showProfile($idUser);
        $this->load->view('layout/templateUser');
        $this->load->view('layout/footerTemplate');
        $this->load->view('ProfileUser', $data);
    }

	// Memuat view Tentang Kami
    public function about_us()
    {
		$this->load->view('homeHeader');
        $this->load->view('homeFooter');
        $this->load->view('About');
    }

	// Memuat view Tip Perawatan
    public function Perawatan()
    {
		$this->load->view('homeHeader');
        $this->load->view('homeFooter');
        $this->load->view('tipsPerawatan');
    }

	// Memuat view tips dan trik merawat motor
    public function tipsRawat()
    {
        $this->load->view('layout/templateUser');
        $this->load->view('layout/footerTemplate');
        $this->load->view('tipsRawat');
    }


	// Memuat view bantuan
    public function bantuan()
    {
		$data['tentang'] = $this->ModelTentang->showData()->result();
        $this->load->view('layout/templateUser');
        $this->load->view('layout/footerTemplate');
        $this->load->view('bantuan', $data);
    }
}
