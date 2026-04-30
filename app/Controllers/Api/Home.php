<?php

namespace App\Controllers\Api;


use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Razorpay\Api\Api;

class Home extends BaseController
{
    public function index()
    {
        //
    }

    public function place_order()
    {
        $data = $this->request->getJSON(true);

        $modelId = $data['model_id'] ?? null;
        if (!$modelId) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Car model not selected.']);
        }

        $modelM    = new \App\Models\ModelsModel();
        $brandM    = new \App\Models\BrandsModel();
        $checkoutM = new \App\Models\CheckoutModel();

        $carModel = $modelM->find($modelId);
        if (!$carModel) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Model not found.']);
        }

        $brand = $brandM->find($carModel['brand_id']);

        $insertData = [
            'name'              => $data['name'] ?? '',
            'phone'             => $data['mobile'] ?? '',
            'service_address'   => $data['address'] ?? '',
            'additional_notes'  => $data['note'] ?? '',
            'car_brand'         => $brand['name'] ?? '',
            'car_model'         => $carModel['name'],
            'car_price'         => $carModel['price'],
            'status'            => 'pending',
            'created_at'        => date('Y-m-d H:i:s')
        ];

        try {


            $bookingId = $checkoutM->insert($insertData);
            // Razorpay Setup
          $api = new Api(
    'rzp_test_SIgVzXlNASZySR',
    'LMy7Z7HT9AIHl2IK3IsyOoQx'
);

            $order = $api->order->create([
                'receipt'         => 'booking_' . $bookingId,
                'amount'          => $carModel['price'] * 100,
                'currency'        => 'INR',
                'payment_capture' => 1
            ]);

            // Save order_id
            $checkoutM->update($bookingId, [
                'order_id' => $order['id']
            ]);

            return $this->response->setJSON([
                'status'      => 'success',
                'booking_id'  => $bookingId,
                'order_id'    => $order['id'],
                'amount'      => $order['amount'],
                'key'         => 'rzp_test_SIgVzXlNASZySR'
            ]);
        } catch (\Exception $e) {

            return $this->response->setJSON([
                'status'  => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }


    public function verify_payment()
    {
        $data = $this->request->getJSON(true);

        $checkoutM = new \App\Models\CheckoutModel();
        $paymentM  = new \App\Models\PaymentModel();

        $booking = $checkoutM->find($data['booking_id']);

        if (!$booking) {
            return $this->response->setJSON(['status' => 'failed']);
        }

      $api = new Api(
    'rzp_test_SIgVzXlNASZySR',
    'LMy7Z7HT9AIHl2IK3IsyOoQx'
);

        try {

            $attributes = [
                'razorpay_order_id'   => $booking['order_id'],
                'razorpay_payment_id' => $data['razorpay_payment_id'],
                'razorpay_signature'  => $data['razorpay_signature']
            ];

            $api->utility->verifyPaymentSignature($attributes);

            // ✅ 1. Insert into payments table
            $paymentM->insert([
                'booking_id'          => $booking['id'],
                'razorpay_order_id'   => $booking['order_id'],
                'razorpay_payment_id' => $data['razorpay_payment_id'],
                'razorpay_signature'  => $data['razorpay_signature'],
                'amount'              => $booking['car_price'],
                'currency'            => 'INR',
                'payment_status'      => 'success',
                'created_at'          => date('Y-m-d H:i:s')
            ]);

            // ✅ 2. Update checkout status
          $checkoutM->update($booking['id'], [
    'status' => 'confirmed'
]);
            session()->set('last_booking_id', $booking['id']);
            
            return $this->response->setJSON(['status' => 'verified']);
        } catch (\Exception $e) {

            return $this->response->setJSON([
                'status' => 'failed',
                'error'  => $e->getMessage()
            ]);
        }
    }


    private function sendBookingEmail($bookingId)
    {
        $checkoutM = new \App\Models\CheckoutModel();
        $booking   = $checkoutM->find($bookingId);

        $email = \Config\Services::email();
        $email->setTo('webdeveloperaonebox@gmail.com');
        $email->setSubject('New Paid Booking: ' . $booking['car_model']);
        $email->setMailType('html');

        $message = "
        <h2>New Paid Booking</h2>
        <p><strong>Name:</strong> {$booking['name']}</p>
        <p><strong>Phone:</strong> {$booking['phone']}</p>
        <p><strong>Model:</strong> {$booking['car_model']}</p>
        <p><strong>Amount:</strong> ₹{$booking['car_price']}</p>
        ";

        $email->setMessage($message);
        $email->send();
    }
}
