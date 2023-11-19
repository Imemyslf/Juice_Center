<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selected Juices</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 20px;
        }

        h2 {
            color: #3498db;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            text-align: left;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            background-color: #3498db;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        .total-price {
            font-weight: bold;
        }
    </style>
</head>
<body>
<header>
        <nav>
            <a href="" target = "">Home</a>
            <a href="" target = "">Contact Us</a>
            <a href="" target = "">Sign up</a>
        </nav>
    </header>

<h2>Selected Juices</h2>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if selected_juices array is set
    if (isset($_POST['selected_juices']) && !empty($_POST['selected_juices'])) {
        echo "<p>You have selected the following juices:</p>";
        echo "<ul>";

        $totalPrice = 0;

        // Loop through selected_juices array and display each selected juice and price
        foreach ($_POST['selected_juices'] as $selectedJuice) {
            list($juiceName, $juicePrice) = explode('|', $selectedJuice);
            echo "<li>{$juiceName} - {$juicePrice}</li>";
            $totalPrice += floatval($juicePrice);
        }

        echo "</ul>";

        // Display the total price
        echo "<p class='total-price'>Total Price: $" . number_format($totalPrice, 2) . "</p>";

        // Display the form for customer information
        echo "<form method='post' action='process_order.php'>";
        echo "<label for='customer_name'>Customer Name:</label>";
        echo "<input type='text' id='customer_name' name='customer_name' required>";

        echo "<label for='phone_number'>Phone Number:</label>";
        echo "<input type='tel' id='phone_number' name='phone_number' required>";

        echo "<label for='email_address'>Email Address:</label>";
        echo "<input type='email' id='email_address' name='email_address' required>";

        echo "<label for='mode_of_payment'>Mode of Payment:</label>";
        echo "<select id='mode_of_payment' name='mode_of_payment' required>";
        echo "<option value='credit_card'>Credit Card</option>";
        echo "<option value='debit_card'>Debit Card</option>";
        echo "<option value='Gpay' selected>GPay</option>";
        echo "</select>";

        echo "<input type='hidden' name='selected_juices' value='" . htmlspecialchars(implode(', ', $_POST['selected_juices'])) . "'>";

        echo "<br><br><button type='submit'>Submit Order</button>";
        echo "</form>";
    } else {
        echo "<p>No juices selected.</p>";
    }
} else {
    echo "<p>Invalid request.</p>";
}
?>
<footer>
        &copy
    </footer>
</body>
</html>
