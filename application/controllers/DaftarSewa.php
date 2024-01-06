<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DaftarSewa extends CI_Controller
{   
    private $nama_sistem  = "Evano Trans System"; 

    public function __construct()
    {
       parent::__construct();
       $this->load->model('ModelAuth');
       $this->load->model('ModelFormSewa');
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
	// Tampilkan data penumpang
    public function penumpang()
    {   
        $data['title'] = "Daftar Sewa Penumpang"." | ".$this->nama_sistem; 
        $idSewa = '';
        if($this->session->userdata('roleId') == 1){
            $created_by = '';
        }else{
            $created_by = $this->session->userdata('idUser');
        }
        $tanggal_awal = $this->input->get("tanggal_awal");
        $tanggal_akhir = $this->input->get("tanggal_akhir");
        $data['dataSewa'] = $this->ModelFormSewa->getDataPenumpang($idSewa, $created_by, $tanggal_awal, $tanggal_akhir)->result();
        $data['content'] = "daftarSewa/penumpang.php";
        $this->parser->parse('system/templateAdmin', $data);
    }

    public function barang()
    {   
        $data['title'] = "Daftar Sewa Barang"." | ".$this->nama_sistem; 
        $idSewa = '';
        if($this->session->userdata('roleId') == 1){
            $created_by = '';
        }else{
            $created_by = $this->session->userdata('idUser');
        }
        $tanggal_awal = $this->input->get("tanggal_awal");
        $tanggal_akhir = $this->input->get("tanggal_akhir");
        $data['dataSewa'] = $this->ModelFormSewa->getDataBarang($idSewa, $created_by, $tanggal_awal, $tanggal_akhir)->result();
        $data['content'] = "daftarSewa/barang.php";
        $this->parser->parse('system/templateAdmin', $data);
    }

	// Cetak Nota Sewa Penumpang

	public function cetak_sewa_penumpang()
	{
        $idSewa = $this->input->get('idSewa');
        $tipeSewa = $this->input->get('tipeSewa');
        $data['dataSewa'] = $this->ModelFormSewa->getDataPenumpang($idSewa)->row_array();
        $data['title'] = "Form Sewa Penumpang"; 
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = "Form Sewa Penumpang.pdf";
        $this->pdf->load_view('system/sewaPenumpangCetak.php', $data);
    }

	// Cetak Nota Sewa Barang
	public function cetak_sewa_barang()
	{
        $idSewa = $this->input->get('idSewa');
        $tipeSewa = $this->input->get('tipeSewa');
        $data['dataSewa'] = $this->ModelFormSewa->getDataBarang($idSewa)->row_array();
        $data['title'] = "Form Sewa Barang"; 
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = "Form Sewa Barang.pdf";
        $this->pdf->load_view('system/sewaBarangCetak.php', $data);

        // if ($tipeSewa = $this->input->post('tipeSewa' == "SP")){
        //     $data['dataSewa'] = $this->ModelFormSewa->getDataPenumpang($idSewa)->row_array();
        //     $data['title'] = "Form Sewa Penumpang"; 
        //     $this->load->library('pdf');
        //     $this->pdf->setPaper('A4', 'landscape');
        //     $this->pdf->filename = "Form Sewa Penumpang.pdf";
        //     $this->pdf->load_view('admin/sewaPenumpangCetak.php', $data);
        // } else {
        //     $data['dataSewa'] = $this->ModelFormSewa->getDataBarang($idSewa)->row_array();
        //     $data['title'] = "Form Sewa Barang"; 
        //     $this->load->library('pdf');
        //     $this->pdf->setPaper('A4', 'landscape');
        //     $this->pdf->filename = "Form Sewa Barang.pdf";
        //     $this->pdf->load_view('admin/sewaBarangCetak.php', $data);
        // }
	}

    public function cetak_laporan_penumpang()
	{
        $idSewa = $this->input->get('idSewa');
        $tipeSewa = $this->input->get('tipeSewa');
        $data['dataSewa'] = $this->ModelFormSewa->getDataPenumpang($idSewa)->row_array();
        $data['title'] = "Form Sewa Penumpang"; 
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = "Form Sewa Penumpang.pdf";
        $this->pdf->load_view('system/sewaPenumpangLaporan.php', $data);
    }

    public function cetak_laporan_barang()
	{
        $idSewa = $this->input->get('idSewa');
        $tipeSewa = $this->input->get('tipeSewa');
        $data['dataSewa'] = $this->ModelFormSewa->getDataBarang($idSewa)->row_array();
        $data['title'] = "Form Sewa Barang"; 
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->filename = "Form Sewa Barang.pdf";
        $this->pdf->load_view('system/sewaBarangLaporan.php', $data);
    }
	
	// Delete data sewa Penumpang
    public function delete_penumpang($idSewa)
    {
        $where = array('idSewa' => $idSewa);
        $this->ModelFormSewa->hapusSewa($where, 'tb_formsewa');

        // Dapatkan ID dari tb_jaminansewa berdasarkan idSewa
        $idSewas = $this->db->select('id')->from('tb_jaminansewa')->where('idSewa', $idSewa)->get()->result_array();

        // Buat array dari hasil query
        $idSewaArray = array();
        foreach ($idSewas as $row) {
            $idSewaArray[] = $row['id'];
        }    
        
        // Hapus data dari tb_jaminansewa menggunakan fungsi deleteBatch
        $this->ModelFormSewa->deleteBatch($idSewaArray);

        redirect('../DaftarSewa/Penumpang');
    }

    // Contoh di dalam model atau controller
    public function getDynamicIds($idSewa) {
        // Implementasi logika untuk mengembalikan ID secara dinamis
        // Misalnya, dapatkan ID dari database atau sumber data lainnya
        $dynamicIds = $this->db->select('id')->from('tb_jaminansewa')->where('condition', 'value')->get()->result_array();
        
        // Ambil hanya nilai ID dari hasil query
        $ids = array_column($dynamicIds, 'id');

        return $ids;
    }
    
	// Delete data sewa Barang
    public function delete_barang($idSewa)
    {
        $where = array('idSewa' => $idSewa);
        $this->ModelFormSewa->hapusSewa($where, 'tb_formsewa');
        redirect('../DaftarSewa/Barang');
    }  
}
