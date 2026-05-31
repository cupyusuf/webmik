<?php

namespace App\Controllers;

use App\Libraries\Midtrans;

class Payment extends \App\Controllers\BaseController
{
    public function __construct()
    {
        // initialize Midtrans from env or defaults
        new Midtrans();
    }

    public function snapToken()
    {
        $request = $this->request;
        $id = $request->getPost('id');
        $price = (int) $request->getPost('price');
        $quantity = (int) $request->getPost('quantity');
        $name = $request->getPost('name');
        $gross_amount = (int) $request->getPost('gross_amount');

        $transaction_details = [
            'order_id' => uniqid(),
            'gross_amount' => $gross_amount,
        ];

        $item = [
            'id' => $id,
            'price' => $price,
            'quantity' => $quantity,
            'name' => $name,
        ];

        $params = [
            'transaction_details' => $transaction_details,
            'item_details' => [$item],
        ];

        try {
            $token = Midtrans::getSnapToken($params);
            return $this->response->setBody($token);
        } catch (\Exception $e) {
            return $this->response->setStatusCode(500)->setBody($e->getMessage());
        }
    }

    public function vtweb()
    {
        $transaction_details = [
            'order_id' => uniqid(),
            'gross_amount' => 200000,
        ];

        $items = [
            ['id' => 'item1', 'price' => 100000, 'quantity' => 1, 'name' => 'Adidas f50'],
            ['id' => 'item2', 'price' => 50000, 'quantity' => 2, 'name' => 'Nike N90'],
        ];

        $customer_details = [
            'first_name' => 'Andri',
            'last_name' => 'Setiawan',
            'email' => 'andrisetiawan@me.com',
            'phone' => '081322311801',
        ];

        $transaction_data = [
            'payment_type' => 'vtweb',
            'vtweb' => ['credit_card_3d_secure' => true],
            'transaction_details' => $transaction_details,
            'item_details' => $items,
            'customer_details' => $customer_details,
        ];

        try {
            $vtweb_url = Midtrans::vtweb_charge($transaction_data);
            return redirect()->to($vtweb_url);
        } catch (\Exception $e) {
            return $this->response->setStatusCode(500)->setBody($e->getMessage());
        }
    }

    public function vtdirect_cc_charge()
    {
        $token_id = $this->request->getPost('token_id');
        $transaction_details = [
            'order_id' => uniqid(),
            'gross_amount' => 10000,
        ];

        $transaction_data = [
            'payment_type' => 'credit_card',
            'credit_card' => [
                'token_id' => $token_id,
                'bank' => 'bni',
            ],
            'transaction_details' => $transaction_details,
        ];

        try {
            $response = Midtrans::vtdirect_charge($transaction_data);
            return $this->response->setBody(json_encode($response));
        } catch (\Exception $e) {
            return $this->response->setStatusCode(500)->setBody($e->getMessage());
        }
    }
}
