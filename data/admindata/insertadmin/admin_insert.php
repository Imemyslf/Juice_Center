<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
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
            <a href="../../../dumu/contct.html" target = "">Contact Us <img src="../../../images/info.png" alt="Support img" width="20px"></a>
            <a href="../../Customber_data/insertcust/customer_data.php" target = "">Sign up <img src="../../../images/user.png" alt="user img" width="20px"></a> 
            <a href="../updateadmin/admin_update.php">Update<img src="../../../images/loading-arrow.png" alt="update img" width="20px"></a>
            <a href="../deleteadmin/admin_delete.php">Delete <img src="../../../images/delete-folder.png" alt="delete img" width="20px"></a>
            <a href="../searchadmin/admin_search.php">Search<img src="../../../images/loupe.png" alt="search img" width="20px"></a>
            <a href="../displayadmin/admin_display.php">Display<img src="../../../images/database-management.png" alt="display img" width="20px"></a>
        </nav>
    </header>
    <div id="formContainer">
    <h2>Admin Registration</h2>
    <form action="" method="post">
        <label for="cust_id">Admin id:</label>
        <input type="text" name="cust_id" required>
        <br><br>

        <label for="cust_name">Admin Name:</label>
        <input type="text" name="cust_name" required>
        <br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br><br>

        <label for="pass_word">Password:</label>
        <input type="password" name="pass_word" required>
        <br><br>

        <input type="submit" value="Register">
        <input type="reset" value = "Reset">
    </form>
    </div>
    
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

            $insertQuery = "INSERT INTO `admin` (ad_id, ad_name, ad_email, ad_pass) VALUES ('$cust_id','$cust_name', '$email', '$pass_word')";

            if (mysqli_query($conn, $insertQuery)) {
                echo '<script>alert("Insertion successful!");</script>';
            } else {
                echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
            }
        }

        mysqli_close($conn);
        ?>
    <footer>
    &copy ALL COPYRIGHT 2023 RESERVED TO JUICE CENTER.
    </footer>
</body>
</html>
