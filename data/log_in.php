<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script>
        function redirecttohome(){
            window.location.href = "../../data/h_data.html";
        }
    </script>
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
            height: 100vh;
        }

        #loginContainer {
            border: 2px solid black;
            border-radius: 10px;
            padding: 20px;
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
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #FFA500;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #FF8C00;
        }
    </style>
</head>
<body>
    <div id="loginContainer">
        <h2>Login</h2>
        <form action="" onsubmit = "redirecttoohome()" method="post">
            Email: <input type="text" name="email" placeholder="Enter your email" required><br>
            Password: <input type="password" name="password" placeholder="Enter your password" required><br>
            <input type="submit" value="Login">
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    // Check if the entered email and password match any record in the admin table
    $query = "SELECT * FROM `admin` WHERE ad_email ='$email' AND ad_pass ='$password'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    if ($result ) {
        // Login successful
        // echo "Login successful";
        header("Location :../data/h_data.html");
        exit();
    } else {
        // Login failed
        header("Location: login_page.html?loginFailed=true");
        exit();
    }
}

mysqli_close($conn);
?>

</body>
</html>
