<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juice Pamphlet</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        /* table {
            border-radius: 50%;
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        } */

        table {
        border-collapse: separate;
        border-spacing: 0;
        border-radius: 15px; /* Adjust the border-radius value */
        overflow: hidden;
        width: 50%;
        margin: 20px auto;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    th, td {
        padding: 10px;
        text-align: left;
        border: none; /* Remove borders from td elements */
    }

        th {
            background-color: #3498db;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #ecf0f1;
        }

        tr:hover {
            background-color: #d4e6f1;
        }

        a {
            text-decoration: none;
            color: #3498db;
            font-weight: bold;
        }

        a:hover {
            color: #2c3e50;
        }

        #button-container {
        display: flex;
        justify-content: space-between;
        width: 20%; /* Adjust the width of the container */
        margin: 10px auto;
    }

    #click, #rs {
        width: 100px; /* Adjust the width of the buttons */
        padding: 10px;
    }
    </style>
    <script>
        function uncheckCheckboxes() {
            var checkboxes = document.getElementsByName('selected_juices[]');
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = false;
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
    <?php
    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "juice_c";
    $conn = mysqli_connect($server,$user,$password,$database);

    // Check the connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "Select * from juice";
    $ta_sql = mysqli_query($conn, $sql);

    // Check the query execution
    // if (!$ta_sql) {
    //     die("Query failed: " . mysqli_error($conn));
    // }
    // ?>

    <form action="selected_jp1.php" method="post">
        <table align="center" border="1px">
            <tr>
                <th>juice name</th>
                <th>juice price</th>
                <th>Protein value</th>
            </tr>

            <?php
                while($row = mysqli_fetch_array($ta_sql)){
                    ?>
                    <tr>
                        <td>
                           <input type="checkbox" name="selected_juices[]" value="<?php echo $row['juice_name'] . '|' . $row['juice_price']; ?>">
                           <a href="" >
                            <?php echo $row['juice_name']; ?>
                            </a> 
                        </td>
                        <td>
                            <?php echo $row['juice_price']; ?>
                        </td>
                        <td>
                            <?php echo $row['protein_value']; ?>
                        </td>
                    </tr>
                <?php
                }
            ?>
        </table>
        <div id="button-container">
            <button id="click" type="submit">Submit</button>
            <input id="rs" type="reset" value="Reset" onclick="uncheckCheckboxes()">
        </div>
    </form>
    <footer>
        &copy
    </footer>
</body>
</html>
