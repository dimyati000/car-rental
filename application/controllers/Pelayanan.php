<?php
    class Pelayanan extends CI_Controller{
        public function __construct()
    {
       parent::__construct();
       $this->load->model('ModelProfile');
       if($this->session->userdata('roleId') != 2){
           $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
           <strong>Anda Harus Login Terlebih Dahulu !</strong>
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>');
         redirect('Auth/login');
       } 
    }
	// Tampilkan form service dibengkel
        public function dibengkel()
        {
            $id_user = $this->session->userdata('idUser');
            $data['user'] = $this->ModelProfile->get_byId($id_user)->row_array();
            $this->load->view('layout/templateUser');
            $this->load->view('layout/footerTemplate');
            $this->load->view('pelTmpt', $data);
        }
		// Tampilkan form home service
        public function homeService()
        {
            $id_user = $this->session->userdata('idUser');
            $data['user'] = $this->ModelProfile->get_byId($id_user)->row_array();
            $this->load->view('layout/templateUser');
            $this->load->view('layout/footerTemplate');
            $this->load->view('pelReg', $data);
        }

		// Tambah Data Kedua Layanan
        public function tambahLayanan()
        {
			$namaPelanggan = $this->input->post("namaPelanggan");
			$noWA = $this->input->post("noWA");
			// $jenisService = $this->input->post("jenisService");
			$kilometer = $this->input->post("kilometer");
            $alamat = $this->input->post("alamat");
            // $provinsi = $this->input->post("provinsi");
            $kota = $this->input->post("kota");
            $kecamatan = $this->input->post("kecamatan");
            $desa = $this->input->post("desa");
            $dusun = $this->input->post("dusun");
            $tipeKendaraan = $this->input->post("tipeKendaraan");
            $jenisLayanan = $this->input->post("jenisLayanan");
            $merk = $this->input->post("merkKendaraan");
            $nama = $this->input->post("namaKendaraan");
            // $seri = $this->input->post("seri");
            $warna = $this->input->post("warna");
            // $transmisi = $this->input->post("transmisi");
            // $jenisBensin = $this->input->post("bensin");
            $platNomor = $this->input->post("platNomor");
			$jadwalBooking = $this->input->post("jadwalBooking");
            $jenisKendala = $this->input->post("jenisKendala");
			$verifikasi = $this->input->post("verifikasi");
			
            $data = array(
				'namaPelanggan' => $namaPelanggan,
				'noWA' => $noWA,
				// 'jenisService' => $jenisService,
				'kilometer' => $kilometer,
                'alamat' => $alamat,
                // 'provinsi' => $provinsi,
                'kota' => $kota,
                'kecamatan' => $kecamatan,
                'desa' => $desa,
                'dusun' => $dusun,
                'tipeKendaraan' => $tipeKendaraan,
                'jenisLayanan' => $jenisLayanan,
                'merkKendaraan' => $merk, 
                'namaKendaraan' => $nama, 
                // 'seri' => $seri,
                'warna' => $warna,
                // 'transmisi' => $transmisi ,
                // 'jenisBensin' => $jenisBensin,
                'platNomor' => $platNomor,
                'jenisKendala' => $jenisKendala,
				'jadwalBooking' => $jadwalBooking,
                'tanggalPemesanan' => date('Y-m-d'),
				'verifikasi' => $verifikasi
            );
            $this->ModelService->tambahLayanan($data, 'tb_layanan');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
           <strong>Home Servise Berhasil Di Kirim !</strong>
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>');
            redirect('../Pelayanan/homeservice');
        }

        // Tambah Data Layanan Bengkel
        public function tambahLayananBengkel()
        {
			$namaPelanggan = $this->input->post("namaPelanggan");
			$noWA = $this->input->post("noWA");
			// $jenisService = $this->input->post("jenisService");
			$kilometer = $this->input->post("kilometer");
            $alamat = $this->input->post("alamat");
            // $provinsi = $this->input->post("provinsi");
            // $kota = $this->input->post("kota");
            // $kecamatan = $this->input->post("kecamatan");
            // $desa = $this->input->post("desa");
            // $dusun = $this->input->post("dusun");
            $tipeKendaraan = $this->input->post("tipeKendaraan");
            $jenisLayanan = $this->input->post("jenisLayanan");
            $merk = $this->input->post("merkKendaraan");
            $nama = $this->input->post("namaKendaraan");
            // $seri = $this->input->post("seri");
            $warna = $this->input->post("warna");
            // $transmisi = $this->input->post("transmisi");
            // $jenisBensin = $this->input->post("bensin");
            $platNomor = $this->input->post("platNomor");
			$jadwalBooking = $this->input->post("jadwalBooking");
            $jenisKendala = $this->input->post("jenisKendala");
			$verifikasi = $this->input->post("verifikasi");
			
            $data = array(
				'namaPelanggan' => $namaPelanggan,
				'noWA' => $noWA,
				// 'jenisService' => $jenisService,
				'kilometer' => $kilometer,
                'alamat' => $alamat,
                // 'provinsi' => $provinsi,
                // 'kota' => $kota,
                // 'kecamatan' => $kecamatan,
                // 'desa' => $desa,
                // 'dusun' => $dusun,
                'tipeKendaraan' => $tipeKendaraan,
                'jenisLayanan' => $jenisLayanan,
                'merkKendaraan' => $merk, 
                'namaKendaraan' => $nama, 
                // 'seri' => $seri,
                'warna' => $warna,
                // 'transmisi' => $transmisi ,
                // 'jenisBensin' => $jenisBensin,
                'platNomor' => $platNomor,
                'jenisKendala' => $jenisKendala,
				'jadwalBooking' => $jadwalBooking,
                'tanggalPemesanan' => date('Y-m-d'),
				'verifikasi' => $verifikasi
            );
            $this->ModelService->tambahLayanan($data, 'tb_layanan');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
           <strong>Servise Dibengkel Berhasil Di Kirim !</strong>
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>');
            redirect('../Pelayanan/dibengkel');
        }
    }
