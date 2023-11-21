<?php
    
	$conn = mysqli_connect("localhost","root","","juice_c");
	if ($conn)
		echo "Connection Sucessful";
	else
	{
		echo "Connection Not Successsful";
		exit();
	}
	
	// $create = "create database Juice_C";
	// $r1 = mysqli_query($conn,$create);
	
	// if ($r1)
	// 	echo "<br>database deleted successful";
	// else
	// 	echo "<br>error";
	
	// $exit = mysqli_close($conn);

	// $table = "CREATE TABLE juice
	// 			(
	// 			juice_id int(4) PRIMARY KEY ,
	// 			juice_name varchar(20) NOT NULL,
	// 			juice_price int(3),
	// 			nutrition_value float
	// 			)";
	
	$table = "ALTER TABLE `customer`
	ADD AUTO_INCREMENT PRIMARY KEY cust_sno int(3)`";
	
	$r1 = mysqli_query($conn, $table);
	if ($r1)
		echo "<br>Table created successfully";
	else
		echo "<br>Error in creating table";
	
	$exit = mysqli_close($conn);
	if($exit)
		echo "<br>exit successful";
	
?>