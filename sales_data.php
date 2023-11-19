<?php

    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "juice_c";

    $conn = mysqli_connect($server,$user,$password,$database);

    if ($conn)
        echo "<br> Connected To Server Successfully";

    // $create = "CREATE TABLE sale (
    //             s_id int(3) PRIMARY KEY,
    //             available varchar(10),
    //             j_id int(4)
    //             )";
    
    // $query = mysqli_query($conn,$create);

    // if ($query)
    //     echo "<br>Table created successfully";

    // $close = mysqli_close($conn);

    // if($close)
    //     echo "<br>Server closed successfully";

    // $available = "50";
    // $juice_id  = 1001;
    $id = $_POST["id_1"];
    $available = $_POST["quan"];
    $juice_id  = $_POST["jid"];

    $data = "INSERT INTO `sale` (s_id, available, j_id) VALUES ('$id', '$available', '$juice_id')";

    $query = mysqli_query($conn,$data);
    
    if ($query)
        echo "<br>Data Inserted Successfully";

    $close = mysqli_close($conn);
    if($close)
            echo "<br>Server Closed Successfully";

?>