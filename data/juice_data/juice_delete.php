<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "juice_c";
$conn = mysqli_connect($server, $user, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the ID from the form
$id = $_POST["id_1"];

// Check if the record with the given ID exists
$checkQuery = "SELECT * FROM juice WHERE juice_id = $id";
$checkResult = mysqli_query($conn, $checkQuery);

if (!$checkResult) {
    die("Query failed: " . mysqli_error($conn));
}

if (mysqli_num_rows($checkResult) > 0) {
    // Record exists, proceed with delete
    $deleteQuery = "DELETE FROM `juice` WHERE juice_id = $id";

    // Execute the delete query
    if (mysqli_query($conn, $deleteQuery)) {
        echo "Deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "Record with ID $id does not exist";
}

// Display remaining data
$selectQuery = "SELECT * FROM juice";
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
