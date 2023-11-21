<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Customer</title>
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
    <h2>Update Customer</h2>
    <form action="" method="post">
        <label for="cust_id">Customer ID:</label>
        <input type="text" name="cust_id" required>
        <br><br>

        <label for="updateFields">Select Fields to Update:</label>
        <select id="updateFields" name="updateFields[]" onchange="showFields()" multiple>
            <option value="cust_name">Customer Name</option>
            <option value="email">Email</option>
            <option value="pass_word">Password</option>
            <option value="phone_number">Phone Number</option>
        </select>
        <br><br>

        <div id="cust_nameContainer" style="display: none;">
            <label for="cust_name">Customer Name:</label>
            <input type="text" name="cust_name">
            <br><br>
        </div>

        <div id="emailContainer" style="display: none;">
            <label for="email">Email:</label>
            <input type="email" name="email">
            <br><br>
        </div>

        <div id="pass_wordContainer" style="display: none;">
            <label for="pass_word">Password:</label>
            <input type="password" name="pass_word">
            <br><br>
        </div>

        <div id="phone_numberContainer" style="display: none;">
            <label for="phone_number">Phone Number:</label>
            <input type="text" name="phone_number">
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
</body>
</html>
