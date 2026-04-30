<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Razorpay extends BaseController
{
    public function index()
    {
        //
    }



 public function placeOrder()
    {
        $data = $this->request->getJSON(true);

        // 1️⃣ Save booking data first
        $bookingModel = new \App\Models\BookingModel();

        $bookingId = $bookingModel->insert([
            'name'   => $data['name'],
            'email'  => $data['email'],
            'phone'  => $data['phone'],
            'amount' => $data['price'],
            'status' => 'pending'
        ]);

        // 2️⃣ Create Razorpay Order
        $api = new Api('YOUR_KEY_ID', 'YOUR_SECRET');

        $order = $api->order->create([
            'receipt'         => 'booking_' . $bookingId,
            'amount'          => $data['price'] * 100, // in paise
            'currency'        => 'INR',
            'payment_capture' => 1
        ]);

        return $this->response->setJSON([
            'status' => 'success',
            'order_id' => $order['id'],
            'amount' => $order['amount'],
            'booking_id' => $bookingId,
            'key' => 'YOUR_KEY_ID'
        ]);
    }

}
