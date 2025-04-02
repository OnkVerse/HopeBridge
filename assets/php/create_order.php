<?php
require 'env.php';

require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;

header("Content-Type: application/json");

// Initialize Razorpay with your key and secret
$api_key = getenv('RAZORPAY_KEY');
$api_secret = getenv('RAZORPAY_SECRET');

$api = new Api($api_key, $api_secret);

// Get JSON data from request
$data = json_decode(file_get_contents("php://input"), true);
$amount = $data['amount'];

// Create an order
$order = $api->order->create([
    'amount' => $amount,
    'currency' => 'INR',
    'receipt' => 'order_receipt_' . uniqid()
]);

echo json_encode(['order_id' => $order->id]);
?>