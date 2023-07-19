<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Snap extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ModelProfile');
		$params = array('server_key' => 'SB-Mid-server-lgoSF5wQSlKr2pEspwc__hd6', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');
	}

	public function index()
	{
		$id_user = $this->session->userdata('idUser');
		$data['user'] = $this->ModelProfile->get_byId($id_user)->row_array();
		$idInvoice = $this->input->get("idInvoice");
		$this->load->view("layout/template");
		$this->load->view('checkout_snap', $data);
	}
	// Ambil data dari form pembayaran
	public function token()
	{
		$nama = $this->input->post("nama");
		$alamat = $this->input->post("alamat");
		$noTelp = $this->input->post("noTelp");
		$email = $this->input->post("email");
		$bayar = $this->input->post("bayar");

		// Required
		$transaction_details = array(
			'order_id' => rand(),
			'gross_amount' => $bayar, // no decimal allowed for creditcard
		);

		// Optional
		$item1_details = array(
			'id' => 'a1',
			'price' => $bayar,
			'quantity' => 1,
			'name' => "Pembayaran Barang"
		);

		// Optional
		$item_details = array($item1_details);

		// // Optional
		// $billing_address = array(
		//   'first_name'    => "Andri",
		//   'last_name'     => "Litani",
		//   'address'       => "Mangga 20",
		//   'city'          => "Jakarta",
		//   'postal_code'   => "16602",
		//   'phone'         => "081122334455",
		//   'country_code'  => 'IDN'
		// );

		// Optional
		$shipping_address = array(
			'first_name'    => $nama,
			'address'       => $alamat,
			'city'          => ", Jember",
			'phone'         => $noTelp,
			'country_code'  => 'IDN'
		);

		// Optional
		$customer_details = array(
			'first_name'    => $nama,
			'phone'         => $noTelp,
			'email'         => $email,
			'shipping_address' => $shipping_address
		);

		// Data yang akan dikirim untuk request redirect_url.
		$credit_card['secure'] = true;
		//ser save_card true to enable oneclick or 2click
		//$credit_card['save_card'] = true;

		$time = time();
		$custom_expiry = array(
			'start_time' => date("Y-m-d H:i:s O", $time),
			'unit' => 'day',
			'duration'  => 1
		);

		$transaction_data = array(
			'transaction_details' => $transaction_details,
			'item_details'       => $item_details,
			'customer_details'   => $customer_details,
			'credit_card'        => $credit_card,
			'expiry'             => $custom_expiry
		);

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
	}
// kirim data ke tb_midtrans
	public function finish()
	{
		$result = json_decode($this->input->post('result_data'), true);
		$nama = $this->input->post("nama");
		$alamat = $this->input->post("alamat");
		$noTelp = $this->input->post("noTelp");
		$email = $this->input->post("email");
		$data = [
			"order_id" => $result['order_id'],
			"nama" => $nama,
			"alamat" => $alamat,
			"gross_amount" => $result['gross_amount'],
			"payment_type" => $result['payment_type'],
			"transaction_time" => $result['transaction_time'],
			"bank" => $result['va_numbers'][0]['bank'],
			"va_number" => $result['va_numbers'][0]['va_number'],
			"pdf_url" => $result['pdf_url'],
			"status_code" => $result['status_code'],
			"noTelp" => $noTelp,
			"email" => $email
		];

		$is_processed = $this->ModelTransaksi->index();
		$save = $this->db->insert("tb_midtrans", $data);
		if ($save && $is_processed) {
			$this->cart->destroy();
			$this->load->view("layout/templateUser");
			$this->load->view("prosesPesanan");
		} else {
			echo "Gagal";
		}
	}
}
