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
        var fields = ["cust_name", "email", "pass_word", "phone_number"];

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
            <a href="../../Customber_data/insertcust/customer_data.php" target="">Sign up <img
                    src="../../../images/user.png" alt="user img" width="20px"></a>
            <a href="../insertcust/customer_data.php">Insert <img src="../../../images/edit.png" alt="delete img"
                    width="20px"></a>
            <a href="../deletecust/customer_delete.php">Delete <img src="../../../images/delete-folder.png"
                    alt="delete img" width="20px"></a>
            <a href="../searchcust/customer_search.php">Search<img src="../../../images/loupe.png" alt="search img"
                    width="20px"></a>
            <a href="../displaycust/cust_display.php">Display<img src="../../../images/database-management.png"
                    alt="display img" width="20px"></a>
        </nav>
    </header>
    <div id="formContainer">
        <h2>Update Customer</h2>
        <form action="" method="post">
            <label for="cust_id">Customer ID:</label>
            <input type="text" name="cust_id" placeholder="Eg:1" required>
            <br><br>

            <label for="updateFields">Select Fields to Update:</label>
            <select id="updateFields" name="updateFields[]" onchange="showFields()">
                <option value="cust_name">Customer Name</option>
                <option value="email">Email</option>
                <option value="pass_word">Password</option>
                <option value="phone_number">Phone Number</option>
            </select>
            <br><br>

            <div id="cust_nameContainer" style="display: none;">
                <label for="cust_name">Customer Name:</label>
                <input type="text" name="cust_name" placeholder="Eg:Kishan">
                <br><br>
            </div>

            <div id="emailContainer" style="display: none;">
                <label for="email">Email:</label><br>
                <input type="email" name="email" placeholder="Eg:ks@gmail.com">
                <br><br>
            </div>

            <div id="pass_wordContainer" style="display: none;">
                <label for="pass_word">Password:</label>
                <input type="password" name="pass_word" minlength="6" maxlenght="10" placeholder="">
                <br><br>
            </div>

            <div id="phone_numberContainer" style="display: none;">
                <label for="phone_number">Phone Number:</label>
                <input type="text" name="phone_number" maxlenght="10" placeholder="Eg:1234567890">
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
        $cust_sno = $_POST["cust_id"];
        $updateFields = $_POST["updateFields"];

        if (!empty($updateFields)) {
            $updateQuery = "UPDATE `customer` SET ";

            foreach ($updateFields as $field) {
                $value = mysqli_real_escape_string($conn, $_POST[$field]);
                $updateQuery .= "$field = '$value', ";
            }

            // Remove the trailing comma and space
            $updateQuery = rtrim($updateQuery, ', ');

            $updateQuery .= " WHERE cust_sno = $cust_sno";

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
        &copy ALL COPYRIGHT 2023 RESERVED TO JUICE CENTER.
    </footer>
</body>

</html>