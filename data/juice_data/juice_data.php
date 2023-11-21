<?php
    $id = $_POST["id_1"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $protein = $_POST["p_value"];

    echo $id."<br>".$name . "<br>". "<br>".$price . "<br>" . $protein."<br>";
    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "juice_c";
    $conn = mysqli_connect($server,$user,$password,$database);
    if ($conn){}
	else
	{
		echo "Connection Not Successsful";
		exit();
	}
    $q1 = "INSERT INTO `juice` (juice_id ,juice_name ,juice_price ,protein_value) VALUES ( '$id', '$name', '$price', '$protein')";


    $r1 = mysqli_query($conn,$q1);

    if ($r1)
        echo "<br>Data inserted successfully"; 
    else
        echo "<br>Data not inserted successfully";

    $exit = mysqli_close($conn);
    if($exit)
        echo "<br>exit successful";    
?>