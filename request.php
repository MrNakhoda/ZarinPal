<?php

$merchantID = 'your_merchant_id'; // Replace with your Merchant ID
$productName = 'product_name'; // Replace with the name of your product
$callbackURL = 'http://localhost/verify.php'; // Replace with your callback URL
$amount = '1000000'; // Replace with the amount in Toman
$email = 'user@email.com'; // Replace with user's email
$phoneNumber = 'user_phone_number'; // Replace with user's phone number

try {
    // Initialize the SOAP client for ZarinPal payment gateway
    // Use the sandbox URL for testing, replace with the production URL for live transactions
    $client = new SoapClient('https://sandbox.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);
    #########################
    //$client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);
    // Send payment request to ZarinPal
    $result = $client->PaymentRequest([
        'MerchantID'     => $merchantID,
        'Amount'         => $amount,
        'Description'    => $productName,
        'Email'          => $email,
        'Mobile'         => $phoneNumber,
        'CallbackURL'    => $callbackURL,
    ]);

    // Redirect the user to the payment URL
    if ($result->Status == 100) {
        //sandbox
        header('Location: https://sandbox.zarinpal.com/pg/StartPay/'.$result->Authority);
        #####################
        //header('Location: https://www.zarinpal.com/pg/StartPay/'.$result->Authority);
    } else {
        throw new Exception('ERR: '.$result->Status);
    }
} catch (Exception $e) {
    // Handle errors here, display an error message to the user or take necessary actions
    echo 'Error: ' . 'Contact support, there was an issue with the bank';
}
