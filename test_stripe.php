<?php
require 'vendor/autoload.php'; // Include Stripe PHP library

\Stripe\Stripe::setApiKey('sk_test_51N5EO8SDb10zWUfws82N0nBPWgOV8B843TnGm7Mvs3RsvVWOkjPLInk3ZGsNIuLIUaMWQU2yd8UDKBTWkRQNYyVV00nJhDeXLD'); // Replace with your Stripe Secret Key

try {
    $balance = \Stripe\Balance::retrieve(); // Retrieve account balance
    print_r($balance); // Print the balance details
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage(); // Print any errors
}