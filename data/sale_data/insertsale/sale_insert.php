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
        <label for="sale_id">sale id:</label>
        <input type="text" name="sale_id" required>
        <br><br>

        <label for="avail">Available:</label>
        <input type="text" name="avail" required>
        <br><br>

        <label for="j_id">Juice id:</label>
        <input type="text" name="j_id" required>
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
            $sale_id = $_POST["sale_id"];
            $avail = $_POST["avail"];
            $juice_id = $_POST["j_id"];

            $insertQuery = "INSERT INTO `sale` (s_id, available, j_id) VALUES ('$sale_id','$avail', '$juice_id')";

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
