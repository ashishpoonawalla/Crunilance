<?php
require_once('vendor/autoload.php');

$client = new \GuzzleHttp\Client();

$response = $client->request('GET', 'https://payout-api.cashfree.com/payout/v1.2/validation/bankDetails?name=ASHISH%20KUMAR%20UMAR&phone=7276116725&bankAccount=333229620&ifsc=SBIN0005413', [
  'headers' => [
    'Accept' => 'application/json',
    'Content-Type' => 'application/json',
  ],
]);

echo $response->getBody();