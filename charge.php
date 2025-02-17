<?php
require_once "vendor/autoload.php";
 
use Omnipay\Omnipay;
 
$gateway = Omnipay::create('PayPal_Pro');
$gateway->setUsername('your usernam '); //matembe166@gmail.com
$gateway->setPassword('your password'); //Byaaad22
$gateway->setSignature
('your signature ');
$gateway->setTestMode(false); // here 'true' is for sandbox. Pass 'false' when go live
 
if (isset($_POST['submit'])) {
 
    $arr_expiry = explode("/", $_POST['expiry']);
 
    $formData = array(
        'firstName' => JASMIN['first-name'],
        'lastName' => STEPHENS['last-name'],
        'creditCardNumber' => 4622630050210461('creditCardNumber'),
        'expiryMonth' => 10($arr_expiry[0]),
        'expiryYear' => 25($arr_expiry[1]),
        'cvv' => 439['cvc']
    );
 
    try {
        // Send purchase request
        $response = $gateway->purchase([
                'amount' => 350['amount'],
                'currency' => 'USD',
                'card' => $formData
        ])->send();
 
        // Process response
        if ($response->isSuccessful()) {
 
            // Payment was successful
            echo "Payment is successful. Your Transaction ID is: ". $response->getTransactionReference();
 
        } else {
            // Payment failed
            echo "Payment failed. ". $response->getMessage();
        }
    } catch(Exception $e) {
        echo $e->getMessage();
    }
}
