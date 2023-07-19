<?php
class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('roleId') != 1) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
           <strong>Anda Harus Login Terlebih Dahulu !</strong>
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>');
         redirect('Auth/login');
        }
    }
	// tampilkan data invoice
    public function index()
    {
        // parent::__construct();
        $this->load->model('ModelTransaksi');
        $data['invoice'] = $this->ModelTransaksi->showData();
        $this->load->view("layout/templateAdmin");
        $this->load->view("admin/invoice", $data);
    }
    
	// tampilkan detail invoice
    public function detail($idInvoice)
    {
        $data['invoice'] = $this->ModelTransaksi->takeIdInvoices($idInvoice);
        $data['pesanan'] = $this->ModelTransaksi->takeIdPesanan($idInvoice);
        $this->load->view("layout/templateAdmin");
        $this->load->view("admin/detailInvoice", $data);
    }

	// tampilkan detail invoice
    public function cetak($idInvoice)
    {

        $data['invoice'] = $this->ModelTransaksi->takeIdInvoices($idInvoice);
        $data['pesanan'] = $this->ModelTransaksi->takeIdPesanan($idInvoice);
        $this->load->view("admin/detailInvoicecetak", $data);
    }

    
	// delete invoice
	public function delete($idInvoice)
    {
        $where = array('idInvoice' => $idInvoice);
        $this->ModelBarang->hapusBarang($where, 'tb_invoice');
        redirect('../Transaksi');
    }    
}
