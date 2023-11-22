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
            padding: 10px;
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
    <script>
        function showFields() {
            var selectedFields = document.getElementById("updateFields").value;
            var fields = ["ad_name", "ad_email", "ad_pass"];

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
            <a href="" target = "">Home</a>
            <a href="" target = "">Contact Us</a>
            <a href="" target = "">Sign up</a>
        </nav>
    </header>
    <div id="formContainer">
    <h2>Update Admin</h2>
    <form action="" method="post">
        <label for="ad_id">Admin ID:</label>
        <input type="text" name="ad_id" required>
        <br><br>

        <label for="updateFields">Select Fields to Update:</label>
        <select id="updateFields" name="updateFields[]" onchange="showFields()" >
            <option value="ad_name">Admin Name</option>
            <option value="ad_email">Email</option>
            <option value="ad_pass">Password</option>
        </select>
        <br><br>

        <div id="ad_nameContainer" style="display: none;">
            <label for="ad_name">Admin Name:</label>
            <input type="text" name="ad_name">
            <br><br>
        </div>

        <div id="ad_emailContainer" style="display: none;">
            <label for="ad_email">Email:</label><br>
            <input type="email" name="ad_email">
            <br><br>
        </div>

        <div id="ad_pass" style="display: none;">
            <label for="ad_pass">Password:</label>
            <input type="password" name="ad_pass">
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
        $ad_id = $_POST["ad_id"];
        $updateFields = $_POST["updateFields"];

        if (!empty($updateFields)) {
            $updateQuery = "UPDATE `admin` SET ";

            foreach ($updateFields as $field) {
                $value = mysqli_real_escape_string($conn, $_POST[$field]);
                $updateQuery .= "$field = '$value', ";
            }

            // Remove the trailing comma and space
            $updateQuery = rtrim($updateQuery, ', ');

            $updateQuery .= " WHERE ad_id = $ad_id";

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
