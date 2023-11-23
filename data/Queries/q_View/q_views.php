<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Query Result View</title>
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
            width: 50%;
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
        echo "Connection failed";
    }

    // Creating the view
    $createViewQuery = "CREATE VIEW Cust_detail AS SELECT cust_sno, cust_name, email FROM customer";
    $createViewResult = mysqli_query($conn, $createViewQuery);

    if (!$createViewResult) {
        echo "Error in creating view";
    }

    // Selecting from the view
    $selectViewQuery = "SELECT * FROM Cust_detail";
    $selectViewResult = mysqli_query($conn, $selectViewQuery);

    if (!$selectViewResult) {
        echo "Error in selecting view";
    }

    echo "<h2>Customer Details View</h2>";
    echo "<table>
            <tr>
                <th>Customer S.No</th>
                <th>Customer Name</th>
                <th>Email</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($selectViewResult)) {
        echo "<tr>
                <td>" . $row['cust_sno'] . "</td>
                <td>" . $row['cust_name'] . "</td>
                <td>" . $row['email'] . "</td>
              </tr>";
    }

    echo "</table>";

    // Drop the view after use (optional)
    $dropViewQuery = "DROP VIEW IF EXISTS Cust_detail";
    $dropViewResult = mysqli_query($conn, $dropViewQuery);

    if (!$dropViewResult) {
        echo "Error in dropping the view";
    }

    mysqli_close($conn);
    ?>
</body>
</html>
