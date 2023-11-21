<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Juice</title>
    <script>
        function showInput() {
            var selectedField = document.getElementById("searchField").value;
            var inputContainer = document.getElementById("inputContainer");
            var inputType = "text";

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
    <h2>Search Juice</h2>
    <form action="" method="post">

        <label for="searchField">Select Field to Search:</label>
        <select id="searchField" name="searchField" onchange="showInput()">
            <option value="Juice_id">Juice ID</option>
            <option value="Juice_name">Juice Name</option>
            <option value="Juice_price">Juice Price</option>
            <option value="Protein_value">Protein Value</option>
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
        $searchQuery = "SELECT * FROM `juice` WHERE `$searchField` = '$searchValue'";
        
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
