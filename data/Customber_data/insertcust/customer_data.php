<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration</title>
</head>
<body>
    <h2>Customer Registration</h2>
    <form action="" method="post">
        <label for="cust_id">Customer id:</label>
        <input type="text" name="cust_id" required>
        <br><br>

        <label for="cust_name">Customer Name:</label>
        <input type="text" name="cust_name" required>
        <br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br><br>

        <label for="pass_word">Password:</label>
        <input type="password" name="pass_word" required>
        <br><br>

        <label for="phone_number">Phone Number:</label>
        <input type="tel" name="phone_number" required>
        <br><br>

        <input type="submit" value="Register">
        <input type="reset" value = "Reset">
    </form>
    <?php
        $server = "localhost";
        $user = "root";
        $password = "";
        $database = "juice_c"; // Replace with your actual database name
        $conn = mysqli_connect($server, $user, $password, $database);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $cust_id = $_POST["cust_id"];
            $cust_name = $_POST["cust_name"];
            $email = $_POST["email"];
            $pass_word = $_POST["pass_word"];
            $phone_number = $_POST["phone_number"];

            $insertQuery = "INSERT INTO `customer` (cust_sno, cust_name, email, pass_word, phone_number) VALUES ('$cust_id','$cust_name', '$email', '$pass_word', '$phone_number')";

            if (mysqli_query($conn, $insertQuery)) {
                echo '<script>alert("Insertion successful!");</script>';
            } else {
                echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
            }
        }

        mysqli_close($conn);
        ?>

</body>
</html>
