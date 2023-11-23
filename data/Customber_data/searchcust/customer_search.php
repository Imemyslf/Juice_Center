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
            <a href="../../h_data.html" target = "">Home<img src="../../../images/3d-house.png" alt="Home img" width="20px"></a>
            <a href="../../../dumu/contct.html" target = "">Contact Us <img src="../../../images/info.png" alt="Support img" width="20px"></a>
            <a href="../../Customber_data/insertcust/customer_data.php" target = "">Sign up <img src="../../../images/user.png" alt="user img" width="20px"></a> 
            <a href="../updatecust/u_c.php">Update<img src="../../../images/loading-arrow.png" alt="update img" width="20px"></a>
            <a href="../deletecust/customer_delete.php">Delete <img src="../../../images/delete-folder.png" alt="delete img" width="20px"></a>
            <a href="../searchcust/customer_search.php">Search<img src="../../../images/loupe.png" alt="search img" width="20px"></a>
            <a href="../displaycust/cust_display.php">Display<img src="../../../images/database-management.png" alt="display img" width="20px"></a>
        </nav>
    </header>
    <div id="formContainer">
    <h2>Search Customer</h2>
    <form action="" method="post">

        <label for="searchField">Select Field to Search:</label>
        <select id="searchField" name="searchField" onchange="showInput()">
            <option value="cust_sno">Customer Serial Number</option>
            <option value="cust_name">Customer Name</option>
            <option value="email">Email</option>
            <!-- <option value="pass_word">Password</option> -->
            <option value="phone_number">Phone Number</option>
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
            $searchQuery = "SELECT * FROM `customer` WHERE `$searchField` = '$searchValue'";
            
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
                <th>S.no</th>
                <th>Customer Name</th>
                <th>Email address</th>
                <th>Password</th>
                <th>Phone number</th>
                </tr>";

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['cust_sno'] . "</td>";
                    echo "<td>" . $row['cust_name'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['pass_word'] . "</td>";
                    echo "<td>" . $row['phone_number'] . "</td>";
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
&copy ALL COPYRIGHT 2023 RESERVED TO JUICE CENTER.
    </footer>
</body>
</html>
