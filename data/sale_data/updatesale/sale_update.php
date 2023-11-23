<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Customer</title>
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
    <script>
    function showFields() {
        var selectedFields = document.getElementById("updateFields").value;
        var fields = ["Sold_value", "j_id"];

        fields.forEach(function(field) {
            var element = document.getElementById(field + "Container");
            if (selectedFields.includes(field)) {
                element.style.display = "block";
            } else {
                element.style.display = "none";
            }
        });
    }
    </script>
</head>

<body>
    <header>
        <nav>
            <a href="../../h_data.html" target="">Home<img src="../../../images/3d-house.png" alt="Home img"
                    width="20px"></a>
            <a href="../../../dumu/contct.html" target="">Contact Us <img src="../../../images/info.png"
                    alt="Support img" width="20px"></a>
            <a href="../../log_in.php" target="">Sign up <img src="../../../images/user.png" alt="user img"
                    width="20px"></a>
            <a href="../insertsale/sale_insert.php">insert <img src="../../../images/edit.png" alt="insert img"
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
        <h2>Update Sale Record</h2>
        <form action="" method="post">
            <label for="sale_id">Sale ID:</label>
            <input type="text" name="sale_id" required>
            <br><br>

            <label for="updateFields">Select Fields to Update:</label>
            <select id="updateFields" name="updateFields[]" onchange="showFields()">
                <option value="Sold_value">Sold</option>
                <option value="j_id">Juice Id</option>
            </select>
            <br><br>

            <div id="Sold_valueContainer" style="display: none;">
                <label for="Sold_value">Sold :</label>
                <input type="text" name="Sold_value">
                <br><br>
            </div>

            <div id="j_idContainer" style="display: none;">
                <label for="j_id">Juice Id:</label><br>
                <input type="text" name="j_id">
                <br><br>
            </div>

            <input type="submit" name="submit" value="Update">
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
        $sale_id = $_POST["sale_id"];
        $updateFields = $_POST["updateFields"];
    
        if (!empty($updateFields)) {
            $updateQuery = "UPDATE `sale` SET ";
    
            foreach ($updateFields as $field) {
                $value = mysqli_real_escape_string($conn, $_POST[$field]);
                $updateQuery .= "$field = '$value', ";
            }
    
            // Remove the trailing comma and space
            $updateQuery = rtrim($updateQuery, ', ');
    
            $updateQuery .= " WHERE s_id = $sale_id;";
    
            // Execute the update query
            if (mysqli_query($conn, $updateQuery)) {
                echo '<script>alert("Update successful!");</script>';
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
        } else {
            echo "No fields selected for update.";
        }
    }

    mysqli_close($conn);
    ?>
    <footer>
        &copy
    </footer>
</body>

</html>