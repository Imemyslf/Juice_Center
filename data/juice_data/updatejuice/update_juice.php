<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Juice</title>
    <script>
        function showFields() {
            var selectedFields = document.getElementById("updateFields").value;
            var fields = ["juice_name", "juice_price", "protein_value"];

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
    <h2>Update Juice</h2>
    <form action="" method="post">
        <label for="juice_id">Juice ID:</label>
        <input type="text" name="juice_id" required>
        <br><br>

        <label for="updateFields">Select Fields to Update:</label>
        <select id="updateFields" name="updateFields[]" onchange="showFields()" multiple>
            <option value="juice_name">Juice Name:</option>
            <option value="juice_price">Juice Price</option>
            <option value="protein_value">Password</option>
        </select>
        <br><br>

        <div id="juice_nameContainer" style="display: none;">
            <label for="juice_name">Juice Name:</label>
            <input type="text" name="juice_name">
            <br><br>
        </div>

        <div id="juice_priceContainer" style="display: none;">
            <label for="juice_price">Juice Price:</label>
            <input type="text" name="juice_price">
            <br><br>
        </div>

        <div id="protein_valueContainer" style="display: none;">
            <label for="protein_value">Password:</label>
            <input type="password" name="protein_value">
            <br><br>
        </div>

        <input type="submit" name="submit" value="Update">
    </form>

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
        $juice_id = $_POST["juice_id"];
        $updateFields = $_POST["updateFields"];

        if (!empty($updateFields)) {
            $updateQuery = "UPDATE `juice` SET ";

            foreach ($updateFields as $field) {
                $value = mysqli_real_escape_string($conn, $_POST[$field]);
                $updateQuery .= "$field = '$value', ";
            }

            // Remove the trailing comma and space
            $updateQuery = rtrim($updateQuery, ', ');

            $updateQuery .= " WHERE juice_id = $juice_id";

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
</body>
</html>
