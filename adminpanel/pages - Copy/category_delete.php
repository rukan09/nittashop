<?php
include('check_admin.php');


require('connection.php');



	$catid = $_REQUEST['catid'];

	// INSERT INTO `Categories`(`catid`, `category_name`) VALUES ([value-1],[value-2])

	//INSERT INTO `categories`(`catid`, `category_name`) VALUES (NULL,[value-2])


	
	$sql = "DELETE FROM `categories` WHERE catid = '$catid'";
	
	

	$res = mysqli_query($con, $sql);

	
	header('location:category_list.php');
	