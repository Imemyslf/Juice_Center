<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display customber details</title>
</head>
<body>
<header>
        <nav>
            <a href="" target = "">Home</a>
            <a href="" target = "">Contact Us</a>
            <a href="" target = "">Sign up</a>
        </nav>
    </header>
    <?php
        $server = "localhost";
        $user = "root";
        $password = "";
        $database = "juice_c";
        $conn = mysqli_connect($server, $user, $password, $database);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $selectQuery = "SELECT * FROM customer";
        $result = mysqli_query($conn, $selectQuery);

        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }

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

        mysqli_close($conn);
    ?>
    <footer>
        &copy
    </footer>
</body>
</html>
