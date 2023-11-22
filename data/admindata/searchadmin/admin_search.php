<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Customer</title>
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
        function showInput() {
            var selectedField = document.getElementById("searchField").value;
            var inputContainer = document.getElementById("inputContainer");
            var inputType = "text";

            // If the selected field is "email" or "pass_word", use type="password"
            if (selectedField === "email") {
                inputType = "email";
            }
            // if (selectedField === "pass_word") {
            //     inputType = "password";
            // }

            // Display the input textbox
            inputContainer.innerHTML = '<label for="searchValue">Enter ' + selectedField + ':</label>' +
                '<input type="' + inputType + '" name="searchValue" id="searchValue" required>';
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
    <h2>Search Admin</h2>
    <form action="" method="post">

        <label for="searchField">Select Field to Search:</label>
        <select id="searchField" name="searchField" onchange="showInput()">
            <option value="ad_id">Admin ID</option>
            <option value="ad_name">Admin Name</option>
            <option value="ad_email">Email</option>
            <!-- <option value="pass_word">Password</option> -->
        </select>
        <br><br>

        <div id="inputContainer"></div>

        <input type="submit" name="submit" value="Search">
        <input type="reset">
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

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
        $searchField = $_POST["searchField"];
        $searchValue = mysqli_real_escape_string($conn, $_POST["searchValue"]);

        if (!empty($searchField) && !empty($searchValue)) {
            $searchQuery = "SELECT * FROM `admin` WHERE `$searchField` = '$searchValue'";
            
            // Execute the search query
            $result = mysqli_query($conn, $searchQuery);

            if (!$result) {
                die("Query failed: " . mysqli_error($conn));
            }

            // Check if there are matching records
            $numRows = mysqli_num_rows($result);

            if ($numRows > 0) {
                // Display the matching records
                echo "<h3>Search Results:</h3>";
                echo "<table border='1'>
                <tr>
                <th>Admin ID</th>
                <th>Admin Name</th>
                <th>Email address</th>
                <th>Password</th>
                </tr>";

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['ad_id'] . "</td>";
                    echo "<td>" . $row['ad_name'] . "</td>";
                    echo "<td>" . $row['ad_email'] . "</td>";
                    echo "<td>" . $row['ad_pass'] . "</td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "No matching records found.";
            }
        } else {
            echo "Please select a field and enter a search value.";
        }
    }

    mysqli_close($conn);
?>
<footer>
        &copy
    </footer>
</body>
</html>
