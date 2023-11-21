<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Customer</title>
    <script>
        function showInput() {
            var selectedField = document.getElementById("searchField").value;
            var inputContainer = document.getElementById("inputContainer");
            var inputType = "text";

            // If the selected field is "email" or "pass_word", use type="password"
            if (selectedField === "email") {
                inputType = "email";
            }
            if (selectedField === "pass_word") {
                inputType = "password";
            }

            // Display the input textbox
            inputContainer.innerHTML = '<label for="searchValue">Enter ' + selectedField + ':</label>' +
                '<input type="' + inputType + '" name="searchValue" id="searchValue" required>';
        }
    </script>
</head>
<body>
    <h2>Search Customer</h2>
    <form action="" method="post">

        <label for="searchField">Select Field to Search:</label>
        <select id="searchField" name="searchField" onchange="showInput()">
            <option value="cust_sno">Customer Serial Number</option>
            <option value="cust_name">Customer Name</option>
            <option value="email">Email</option>
            <option value="pass_word">Password</option>
            <option value="phone_number">Phone Number</option>
        </select>
        <br><br>

        <div id="inputContainer"></div>

        <input type="submit" name="submit" value="Search">
        <input type="reset">
    </form>
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
</body>
</html>
