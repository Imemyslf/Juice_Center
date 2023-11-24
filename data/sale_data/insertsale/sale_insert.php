<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sale Data Insertion</title>
    <style>
    body {
        margin: 0;
        padding: 0;
        background-image: url("../../../images/pexels-lukas-616409.jpg");
        /* Replace with the path to your image */
        background-size: cover;
        /* Adjust the background size as needed */
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
        background-color: rgba(0, 228, 181, 0.7);
        /* Orange header background */
        padding: 23px 8px;
        text-align: center;
        box-sizing: border-box;
        box-shadow: 0 4px 8px rgba(110, 0, 0, 0.4);
        /* Shadow at the bottom */
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

    input[type="submit"],
    input[type="reset"] {
        background-color: #FFA500;
        color: white;
        cursor: pointer;
    }

    input[type="submit"]:hover,
    input[type="reset"]:hover {
        background-color: #FF8C00;
    }

    footer {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: #FFA500;
        /* Orange footer background */
        padding: 10px;
        text-align: center;
        box-sizing: border-box;
    }
    </style>
</head>

<body>
    <header>
        <nav>
            <a href="../../h_data.html" target="">Home<img src="../../../images/3d-house.png" alt="Home img"
                    width="20px"></a>
            <a href="/project1/Juice_Center/dumu/contct.html" target="">Contact Us <img src="../../../images/info.png"
                    alt="Support img" width="20px"></a>
            <a href="" target="">Sign up <img src="../../../images/user.png" alt="user img" width="20px"></a>
            <a href="../updatesale/sale_update.php">Update<img src="../../../images/loading-arrow.png" alt="update img"
                    width="20px"></a>
            <a href="../deletesale/sale_delete.php">Delete <img src="../../../images/delete-folder.png" alt="delete img"
                    width="20px"></a>
            <a href="../searchsale/sale_search.php">Search<img src="../../../images/loupe.png" alt="search img"
                    width="20px"></a>
            <a href="../displaysale/sale_display.php">Display<img src="../../../images/database-management.png"
                    alt="display img" width="20px"></a>
        </nav>
    </header>
    <div id="formContainer">
        <h2 style="text-align: center;">Insert A Record In Sale</h2>
        <form action="" method="post">
            <label for="sale_id">sale id:</label>
            <input type="text" name="sale_id" placeholder="Eg:1" required>
            <br><br>

            <label for="sold">Sold:</label>
            <input type="text" name="sold" placeholder="Eg:10" required>
            <br><br>

            <label for="j_id">Juice id:</label>
            <input type="text" name="j_id" placeholder="Eg:1001" required>
            <br><br>

            <input type="submit" value="Register">
            <input type="reset" value="Reset">
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
            $sale_id = $_POST["sale_id"];
            $sold = $_POST["sold"];
            $juice_id = $_POST["j_id"];

            $insertQuery = "INSERT INTO `sale` (s_id, sold, juice_id) VALUES ('$sale_id','$sold', '$juice_id')";

            if (mysqli_query($conn, $insertQuery)) {
                echo '<script>alert("Insertion successful!");</script>';
            } else {
                echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
            }
        }

        mysqli_close($conn);
        ?>
    <footer>
        &copy ALL COPYRIGHTS 2023 RESERVED TO JUICE CENTER.
    </footer>
</body>

</html>