<?php

$merchantID = 'your_merchant_id'; // Replace with your ZarinPal Merchant ID
$amount = '1000000'; // Amount will be based on Toman
$authority = $_GET['Authority'];

if ($_GET['Status'] == 'OK') {
    // Use the sandbox URL for testing, replace with the production URL for live transactions
    $client = new SoapClient('https://sandbox.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);
    #########################
    //$client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);
    $client = new SoapClient('https://sandbox.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

    $result = $client->PaymentVerification([
        'MerchantID' => $merchantID,
        'Authority' => $authority,
        'Amount' => $amount,
    ]);

    // Extract transaction ID from the result
    $transactionID = isset($result->RefID) ? $result->RefID : null;

    if ($result->Status == 100) {
        $message = "Payment successfully completed";
    } else {
        $message = "Payment failed. Status: {$result->Status}";
    }
} else {
    $message = "Transaction canceled by the user";
}

// Unset any session variables if needed

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="5;url=localhost/dashboard">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Status</title>
</head>
<body>
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f4f4f4;
    }

    button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 20px;
    }

    button:hover {
        background-color: #45a049;
    }
</style>
<div style="text-align: center; padding: 50px;">
    <h1><?php echo $message ?></h1>
    <p><?php if (isset($transactionID)) { echo "Transaction ID: $transactionID"; } ?></p>
    <p>You will be redirected to the destination page in a few seconds</p>
    <button>Exit Early</button>
</div>
</body>
</html>
