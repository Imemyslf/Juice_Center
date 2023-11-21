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
        id : <input type="number" name = "id_1" placeholder="Enter you 4 digit id please"><br><br>
        Juice Name: <input type="text" name = "name" placeholder="Enter the Juice name please."><br><br>
        Juice Price: <input type="text" name = "price" placeholder="Enter the price of the juice"><br><br>
        Protein value: <input type="text" name = "p_value" placeholder="Enter Protein value of the juice."><br><br>
        <input type="submit"> &nbsp;&nbsp; <input type="reset">
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
            $id = $_POST["id_1"];
            $name = $_POST["name"];
            $price = $_POST["price"];
            $protein = $_POST["p_value"];

            $insertQuery = "INSERT INTO `juice` (juice_id ,juice_name ,juice_price ,protein_value) VALUES ( '$id', '$name', '$price', '$protein')";

            if (mysqli_query($conn, $insertQuery)) {
                echo '<script>alert("Insertion successful!");</script>';
            } else {
                echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
            }
        }

        mysqli_close($conn);
        ?>
    <footer>
        &copy
    </footer>
</body>
</html>