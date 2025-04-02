<?php
require 'vendor/autoload.php'; // Include Stripe PHP library

\Stripe\Stripe::setApiKey('sk_test_51N5EO8SDb10zWUfws82N0nBPWgOV8B843TnGm7Mvs3RsvVWOkjPLInk3ZGsNIuLIUaMWQU2yd8UDKBTWkRQNYyVV00nJhDeXLD'); // Replace with your Stripe Secret Key

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $amount = htmlspecialchars($_POST['amount']); // Amount in USD
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);

    if (!empty($amount) && !empty($name) && !empty($email)) {
        try {
            // Create a Stripe Checkout Session
            $session = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => 'Payment for ' . $name,
                        ],
                        'unit_amount' => $amount * 100, // Amount in cents
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'customer_email' => $email,
                'success_url' => 'http://localhost/Vidya/student/success.php',
                'cancel_url' => 'http://localhost/Vidya/student/cancel.php',
            ]);

            // Redirect to Stripe Checkout
            header("Location: " . $session->url);
            exit;
        } catch (Exception $e) {
            $message = "Error: " . $e->getMessage();
        }
    } else {
        $message = "All fields are required.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stripe Checkout</title>
    
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    justify-content: center; /* Center vertically */
    align-items: center; /* Center horizontally */
    height: 100vh; /* Full viewport height */
}

.checkout-container {
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
    text-align: center;
    margin: 0; /* Remove any margin to ensure proper centering */
    position: absolute;
    left: 550px;
}
        .checkout-container h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .checkout-container form {
            display: flex;
            flex-direction: column;
        }
        .checkout-container label {
            margin-bottom: 5px;
            font-weight: bold;
        }
        .checkout-container input {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .checkout-container button {
            padding: 10px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .checkout-container button:hover {
            background-color: #218838;
        }
        .message {
            margin-top: 15px;
            padding: 10px;
            border-radius: 4px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
        .cont{
    width: 100%;
    height: 100%;
    position: relative;
}
.container {
  width: 80%;
  max-width: 1200px;
  margin-top: 70px;
  padding: 20px;
  background-color: #ffffff;
  box-shadow: 3px 3px 10px 8px rgb(0 0 0 / 10%);
  border-radius: 5px;
  font-family: 'Montserrat', sans-serif;
  font-style: bold;
}
ul {
list-style-type: none;
margin: 0;
margin-bottom: 2%;
padding: 0;
/* margin-left: -0.5%;
margin-right: -0.5%;
margin-top: -0.5%; */
overflow: hidden;
background-color: #333;
position: sticky;
top: 0;
font-family: Arial, Helvetica, sans-serif;
}

li {
float: left;
/* border-right: 1px solid #bbb; */
font-size: 0.88rem;
text-transform: uppercase;
border: none;
}

li a {
display: block;
color: white;
text-align: center;
padding: 14px 16px;
text-decoration: none;
}
li:last-child {
border-right: none;
}


/* Change the link color to #111 (black) on hover */
li a:hover {
background-color: #111;
}

.active {
  /* background-color: #04AA6D; */
}
.logout
{
  background-color: red;
  float:right;
}

    </style>
</head>
<body>
<div class="cont">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="st_home.php">Find teacher</a></li>
          <li><a href="your_teachers.php">Your teacher</a></li>
          <li><a href="rejected_requests.php">Rejected request</a></li>
          <li class="active"><a href="student_edit_profile.php">Edit profile</a></li>
          <li><a href="pay.php">Pay</a></li>
          <li class="logout"><a href="logout.php">Log out</a></li>

        </ul>
    <div style="align:center" class="checkout-container">
        <h2>Stripe Checkout</h2>
        <?php if (!empty($message)): ?>
            <div class="message <?php echo isset($success) && $success ? 'success' : 'error'; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        <form method="POST" action="">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="amount">Amount (USD)</label>
            <input type="number" id="amount" name="amount" required>

            <button type="submit">Proceed to Payment</button>
        </form>
    </div>
</body>
</html>