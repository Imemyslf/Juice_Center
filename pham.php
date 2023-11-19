<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juice Pamphlet</title>
    <style>
    </style>
</head>
<body>

</body>
</html>
<?php
    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "juice_c";
    $conn = mysqli_connect($server,$user,$password,$database);

    $sql = "Select * from juice";
    $ta_sql = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
           body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px;
            text-align: left;
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
    </style>
</head>
<body>
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
                       <a href="sign_up.html" target="_blank" ><?php echo $row['juice_name']; ?></a> 
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
</body>
</html>