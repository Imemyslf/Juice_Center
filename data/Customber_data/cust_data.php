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
        echo "Registration successful";
    } else {
        echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
