<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $server = "localhost";
        $user = "root";
        $password = "";
        $database = "juice_c";
        $conn = mysqli_connect($server, $user, $password, $database);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $selectQuery = "SELECT * FROM juice";
        $result = mysqli_query($conn, $selectQuery);

        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }

        echo "<table border='1'>
        <tr>
        <th>ID</th>
        <th>Juice Name</th>
        <th>Protein Value</th>
        <th>Juice Price</th>
        </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['juice_id'] . "</td>";
            echo "<td>" . $row['juice_name'] . "</td>";
            echo "<td>" . $row['protein_value'] . "</td>";
            echo "<td>" . $row['juice_price'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";

        mysqli_close($conn);
    ?>
</body>
</html>
