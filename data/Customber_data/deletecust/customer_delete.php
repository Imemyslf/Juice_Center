<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>juice data</title>
</head>
<body>
    <header>
        <nav>
            <a href="" target = "">Home</a>
            <a href="" target = "">Contact Us</a>
            <a href="" target = "">Sign up</a>
        </nav>
    </header>
    <form action="" method="post">
        <!-- id : <input type="number" name = "cust_id" placeholder="Enter you 4 digit id please"><br><br>
        <form action="" method="post"> -->
    id : <input type="number" name="cust_id" placeholder="Enter your 4-digit ID, please"><br><br>
    <input type="submit" name="submit"> &nbsp;&nbsp; <input type="reset">
</form>
<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "juice_c";
$conn = mysqli_connect($server, $user, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $cust_sno = mysqli_real_escape_string($conn, $_POST["cust_id"]);

    $selectQuery = "SELECT * FROM customer";
    $result = mysqli_query($conn, $selectQuery);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }
    echo "Before delete";
    echo "<table border='1'>
    <tr>
    <th>S.no</th>
    <th>Customer Name</th>
    <th>Email address</th>
    <th>Password</th>
    <th>Phone number</th>
    </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['cust_sno'] . "</td>";
        echo "<td>" . $row['cust_name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['pass_word'] . "</td>";
        echo "<td>" . $row['phone_number'] . "</td>";
        echo "</tr>";
    }

    echo "</table><br><br>";

    $checkQuery = "SELECT * FROM customer WHERE cust_sno = $cust_sno";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (!$checkResult) {
        die("Query failed: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($checkResult) > 0) {
        // Record exists, proceed with delete
        $deleteQuery = "DELETE FROM `customer` WHERE cust_sno = $cust_sno";

        // Execute the delete query
        if (mysqli_query($conn, $deleteQuery)) {
            echo '<script>alert("Deleted successful!");</script>';
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    } else {
        echo "Record with ID $id does not exist";
    }

    // Display data
    $selectQuery = "SELECT * FROM customer";
    $result = mysqli_query($conn, $selectQuery);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    
    echo "After delete";
    echo "<table border='1'>
    <tr>
    <th>S.no</th>
    <th>Customer Name</th>
    <th>Email address</th>
    <th>Password</th>
    <th>Phone number</th>
    </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['cust_sno'] . "</td>";
        echo "<td>" . $row['cust_name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['pass_word'] . "</td>";
        echo "<td>" . $row['phone_number'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
}

mysqli_close($conn);
?>
        
    </form>
    <footer>
        &copy
    </footer>
</body>
</html>


