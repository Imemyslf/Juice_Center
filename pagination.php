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
</head>
<body>
    <table align="center" border="1px">
        <tr>
            <th>Juice id</th>
            <th>juice name</th>
            <th>juice price</th>
            <th>Protein value</th>
        </tr>

        <?php
            while($row = mysqli_fetch_array($ta_sql)){
                ?>
                <tr>
                    <td>
                        <?php echo $row['juice_id']; ?>
                    </td>
                    <td>
                        <?php echo $row['juice_name']; ?>
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