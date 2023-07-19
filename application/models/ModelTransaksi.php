<?php
class ModelTransaksi extends CI_Model
{
	public function index()
	{
		date_default_timezone_set('Asia/Jakarta');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$noTelp = $this->input->post("noTelp");
		$email = $this->input->post("email");

		$invoice = array(
			'nama' => $nama,
			'alamat'      => $alamat,
			'noTelp'      => $noTelp,
			'email'		  => $email,	 
			'tanggalPemesanan' => date('Y-m-d H:i:s'),
			'batasPembayaran'  => date('Y-m-d H:i:s', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 1, date('Y'))),
		);
		$this->db->insert('tb_invoice', $invoice);
		$idInvoice = $this->db->insert_id();

		foreach ($this->cart->contents() as $items) {
			$data = array(
				'idInvoice' => $idInvoice,
				'idBarang'  => $items['id'],
				'namaBarang' => $items['name'],
				'jumlah'    => $items['qty'],
				'harga'     => $items['price']
			);
			$this->db->insert('tb_pesanan', $data);
		}
		return TRUE;
	}
	public function showData($result = null)
	{
		$result = $this->db->get('tb_invoice');
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return false;
		}
	}
	public function takeIdInvoices($idInvoice)
	{
		$result = $this->db->where('idInvoice', $idInvoice)->limit(1)->get('tb_invoice');
		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return false;
		}
	}
	public function takeIdPesanan($idInvoice)
	{
		$result = $this->db->where('idInvoice', $idInvoice)->get('tb_pesanan');
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return false;
		}
	}
}
