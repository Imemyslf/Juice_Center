<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Juice Sales</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #FFE4B5; /* Light orange background */
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            border-color:black; 
        }
        
        th {
            background-color: #FFA500; /* Orange header background */
            color: white;
        }
    </style>
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

    $query = "SELECT juice_id, juice_name, juice_price, sold FROM juice NATURAL JOIN sale";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    echo "<h2>Juice Sales Details</h2>";
    echo "<table>
            <tr>
                <th>Juice ID</th>
                <th>Juice Name</th>
                <th>Juice Price</th>
                <th>Sold</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>" . $row['juice_id'] . "</td>
                <td>" . $row['juice_name'] . "</td>
                <td>" . $row['juice_price'] . "</td>
                <td>" . $row['sold'] . "</td>
              </tr>";
    }

    echo "</table>";

    mysqli_close($conn);
    ?>
</body>
</html>
