<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Snap extends MY_Controller {

    public function index()
    {
    	$this->load->view('checkout_snap');
    }

    public function token()
    {
		// Required
		$transaction_details = array(
		  'order_id' => rand(),
		  'gross_amount' => $this->input->post('gross_amount'), // no decimal allowed for creditcard
		);

		// Optional
		$item1_details = array(
		  'id' => $this->input->post('id'),
		  'price' => $this->input->post('price'),
		  'quantity' => $this->input->post('quantity'),
		  'name' => $this->input->post('name'),
		);

		// Optional
		$billing_address = array(
		  'first_name'    => "Yusuf",
		  'last_name'     => "Supriadi",
		  'address'       => "Jl. Terusan Karang Sari",
		  'city'          => "Kota Cimahi",
		  'postal_code'   => "40534",
		  'phone'         => "085315064694",
		  'country_code'  => 'IDN'
		);

		// Optional
		$shipping_address = array(
		  'first_name'    => "Yusuf",
		  'last_name'     => "Supriadi",
		  'address'       => "Jl. Terusan Karang Sari",
		  'city'          => "Kota Cimahi",
		  'postal_code'   => "40534",
		  'phone'         => "085315064694",
		  'country_code'  => 'IDN'
		);

		// Optional
		$customer_details = array(
		  'first_name'    => "Yusuf",
		  'last_name'     => "Supriadi",
		  'email'         => "yusufdolenk2@gmail.com",
		  'phone'         => "085315064694",
		  'billing_address'  => $billing_address,
		  'shipping_address' => $shipping_address
		);

		// Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O",$time),
            'unit' => 'minute', 
            'duration'  => 2
        );
        
        $transaction_data = array(
            'transaction_details'=> $transaction_details,
            'item_details'       => $item1_details,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
    }

    public function finish()
    {
// 		$result = json_decode($this->input->post('result_data')); 
// 		print_r($result);
		
		$this->data['finish'] = json_decode($this->input->post('result_data')); 
		$this->load->view('konfirmasi', $this->data);
    }
}