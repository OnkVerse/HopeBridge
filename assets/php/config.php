<?php
require 'env.php';
// Razorpay API configuration

$razorpay_config = array(
    'api_key' => getenv('RAZORPAY_KEY'),
    'api_secret' => getenv('RAZORPAY_SECRET'),
);

// Other configurations, if needed
?>
