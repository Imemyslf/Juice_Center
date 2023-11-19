<?php
    $id = $_POST["sr_no"];
    $name = $_POST["fname"];
    $emai = $_POST["email_id"];
    $pass = $_POST["pass_id"];
    $custid = $_POST["id_1"];

    echo $id."<br>".$name . "<br>". $emai."<br>". $pass . "<br>" .$custid . "<br>";
    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "juice_c";
    $conn = mysqli_connect($server,$user,$password,$database);
    if ($conn)
		echo "Connection Sucessful";
	else
	{
		echo "Connection Not Successsful";
		exit();
	}
    $q1 = "INSERT INTO `customer` ( cust_name, email, pass_word, cust_id) VALUES ( '$name', '$emai', '$pass', '$custid')";


    $r1 = mysqli_query($conn,$q1);

    if ($r1)
        echo "Data inserted successfully";
    else
        echo "Data not inserted successfully";

    $exit = mysqli_close($conn);
    if($exit)
        echo "<br>exit successful";    
?>