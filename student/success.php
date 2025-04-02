<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .success-container {
            display: none; /* Hide the container initially */
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }
        .success-container h1 {
            color: #28a745;
            margin-bottom: 20px;
        }
        .success-container p {
            color: #333;
            margin-bottom: 20px;
        }
        .success-container button {
            padding: 10px 20px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .success-container button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="success-container" id="successPopup">
        <h1>Payment Successful!</h1>
        <p>Thank you for your payment. Your transaction has been completed successfully.</p>
        <button onclick="redirectToHome()">OK</button>
    </div>

    <script>
        // Show the popup when the page loads
        window.onload = function() {
            document.getElementById('successPopup').style.display = 'block';
        };

        // Redirect to index.php when the user clicks "OK"
        function redirectToHome() {
            window.location.href = 'student_profile.php';
        }
    </script>
</body>
</html>