<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "juice_c";
$conn = mysqli_connect($server, $user, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// $id = $_POST["id_1"];
$name = $_POST["name"];

// Convert the search input and column value to lowercase for case-insensitive search
$lowerName = strtolower($name);
$selectQuery = "SELECT * FROM juice WHERE juice_name = '$lowerName'";
$result = mysqli_query($conn, $selectQuery);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

echo "<table border='1'>
<tr>
<th>ID</th>
<th>Juice Name</th>
<th>Protein Value</th>
<th>Juice Price</th>
</tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['juice_id'] . "</td>";
    echo "<td>" . $row['juice_name'] . "</td>";
    echo "<td>" . $row['protein_value'] . "</td>";
    echo "<td>" . $row['juice_price'] . "</td>";
    echo "</tr>";
}

echo "</table>";

mysqli_close($conn);
?>
