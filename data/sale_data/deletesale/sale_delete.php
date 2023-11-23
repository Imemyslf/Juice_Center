<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Customer Detail</title>
    <style>
     body {
            margin: 0;
            padding: 0;
            background-image: url("../../../images/pexels-lukas-616409.jpg");  /* Replace with the path to your image */
            background-size: cover; /* Adjust the background size as needed */
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
    background-color: rgba(0, 228, 181, 0.7); /* Orange header background */
    padding: 23px 8px;
    text-align: center;
    box-sizing: border-box;
    box-shadow: 0 4px 8px rgba(110, 0, 0, 0.4); /* Shadow at the bottom */
        }

        nav {
            display: flex;
            justify-content: space-around;
            margin: 0;
        }

        nav a {
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
            background: linear-gradient(to right, blue, orange);
            -webkit-background-clip: text;
            color: transparent;
        }

        #formContainer {
            margin: 5vh;
            border: 2px solid black;
            border-radius: 10px;
            padding: 10px;
            background-color: silver;
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
            margin-bottom: 10px;
            padding: 5px;
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
            <a href="../../h_data.html" target = "">Home<img src="../../../images/3d-house.png" alt="Home img" width="20px"></a>
            <a href="/project1/Juice_Center/dumu/contct.html" target = "">Contact Us <img src="../../../images/info.png" alt="Support img" width="20px"></a>
            <a href="../../Customber_data/insertcust/customer_data.php" target = "">Sign up <img src="../../../images/user.png" alt="user img" width="20px"></a> 
            <a href="../updatesale/sale_update.php">Update<img src="../../../images/loading-arrow.png" alt="update img" width="20px"></a>
            <a href="../deletesale/sale_delete.php">Delete <img src="../../../images/delete-folder.png" alt="delete img" width="20px"></a>
            <a href="../searchsale/sale_search.php">Search<img src="../../../images/loupe.png" alt="search img" width="20px"></a>
            <a href="../displaysale/sale_display.php">Display<img src="../../../images/database-management.png" alt="display img" width="20px"></a>
        </nav>
    </header>
    <div id="formContainer">
    <form action="" method="post">
    Sale id : <input type="number" name="sale_id" placeholder="eg: 5"><br><br>
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
    $sale_id = mysqli_real_escape_string($conn, $_POST["sale_id"]);

    $selectQuery = "SELECT * FROM sale";
    $result = mysqli_query($conn, $selectQuery);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    $checkQuery = "SELECT * FROM sale WHERE s_id = $sale_id";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (!$checkResult) {
        die("Query failed: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($checkResult) > 0) {
        // Record exists, proceed with delete
        $deleteQuery = "DELETE FROM `sale` WHERE s_id = $sale_id";

        // Execute the delete query
        if (mysqli_query($conn, $deleteQuery)) {
            echo '<script>alert("Deleted successful!");</script>';
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    } else {
        echo "Record with ID $sale_id does not exist";
    }

    // Display data
    $selectQuery = "SELECT * FROM sale";
    $result = mysqli_query($conn, $selectQuery);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }
}

mysqli_close($conn);
?>
        
    </form>
    <footer>
        &copy
    </footer>
</body>
</html>


