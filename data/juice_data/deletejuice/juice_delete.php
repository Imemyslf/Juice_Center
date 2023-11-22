<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Record</title>
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

        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #FFA500; /* Orange header background */
            padding: 10px;
            text-align: center;
            box-sizing: border-box;
        }

        nav {
            display: flex;
            justify-content: space-around;
            margin: 0;
        }

        nav a {
            text-decoration: none;
            color: white;
            font-weight: bold;
        }

        #formContainer {
            margin: 5vh;
            border: 2px solid black;
            border-radius: 10px;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            box-sizing: border-box;
        }

        form {
            margin: 20px;
            display: flex;
            flex-direction: column;
        }

        input {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"], input[type="reset"] {
            background-color: #FFA500;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover, input[type="reset"]:hover {
            background-color: #FF8C00;
        }

        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #FFA500; /* Orange footer background */
            padding: 10px;
            text-align: center;
            box-sizing: border-box;
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
    <div id="formContainer">
        <label for="juice">Delete Record</label>
        <form action="" method="post">
            Juice id : <input type="number" name="juice_id" placeholder="Enter your 4-digit ID, please"><br><br>
            <input type="submit" name="submit"> &nbsp;&nbsp; <input type="reset">
        </form>
    </div>
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
    $juice_id = mysqli_real_escape_string($conn, $_POST["juice_id"]);

    $selectQuery = "SELECT * FROM juice";
    $result = mysqli_query($conn, $selectQuery);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }
    echo "Before delete";
    echo "<table border='1'>
    <tr>
    <th>Juice id</th>
    <th>Juice Name</th>
    <th>Juice Price</th>
    <th>Protein value</th>
    </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['juice_id'] . "</td>";
        echo "<td>" . $row['juice_name'] . "</td>";
        echo "<td>" . $row['juice_price'] . "</td>";
        echo "<td>" . $row['protein_value'] . "</td>";
        echo "</tr>";
    }

    echo "</table><br><br>";

    $checkQuery = "SELECT * FROM juice WHERE juice_id = $juice_id";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (!$checkResult) {
        die("Query failed: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($checkResult) > 0) {
        // Record exists, proceed with delete
        $deleteQuery = "DELETE FROM `juice` WHERE juice_id = $juice_id";

        // Execute the delete query
        if (mysqli_query($conn, $deleteQuery)) {
            echo '<script>alert("Deleted successful!");</script>';
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    } else {
        echo "Record with ID $juice_id does not exist";
    }

    // Display data
    $selectQuery = "SELECT * FROM juice";
    $result = mysqli_query($conn, $selectQuery);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    
    echo "After delete";
    echo "<table border='1'>
    <tr>
    <th>Juice id</th>
    <th>Juice Name</th>
    <th>Juice Price</th>
    <th>Protein value</th>
    </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['juice_id'] . "</td>";
        echo "<td>" . $row['juice_name'] . "</td>";
        echo "<td>" . $row['juice_price'] . "</td>";
        echo "<td>" . $row['protein_value'] . "</td>";
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


