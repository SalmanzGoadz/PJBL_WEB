<?php

/*Install Midtrans PHP Library (https://github.com/Midtrans/midtrans-php)
composer require midtrans/midtrans-php
                              
Alternatively, if you are not using **Composer**, you can download midtrans-php library 
(https://github.com/Midtrans/midtrans-php/archive/master.zip), and then require 
the file manually.   

require_once dirname(__FILE__) . '/pathofproject/Midtrans.php'; */
require_once dirname(__FILE__) . '/midtrans-php-master/Midtrans.php'; 

//SAMPLE REQUEST START HERE

// Set your Merchant Server Key
\Midtrans\Config::$serverKey = 'SB-Mid-server-LEdKaLbR-juUVy0IRebb7wKr';
// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
\Midtrans\Config::$isProduction = false;
// Set sanitization on (default)
\Midtrans\Config::$isSanitized = true;
// Set 3DS transaction for credit card to true
\Midtrans\Config::$is3ds = true;

$total = isset($_POST['total']) ? (int) $_POST['total'] : 0;
$items = isset($_POST['items']) ? json_decode($_POST['items'], true) : [];

if ($total <= 0 || empty($items)) {
  http_response_code(400);
  echo 'Data tidak valid.';
  exit;
}


$params = array(
    'transaction_details' => array(
        'order_id' => rand(),
        'gross_amount' => $_POST['total'],
    ),

    'item_details' => json_decode($_POST['items'],true),

    'customer_details' => array(
        'first_name' => $_POST['name'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],
        'meja'  => $_POST['meja'],
        
    ),
);

$snapToken = \Midtrans\Snap::getSnapToken($params);
echo $snapToken;
?>