<?php

require('connection.php');

//echo $_SERVER['REQUEST_METHOD'];



if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD']=="POST"){
	//echo "submited";

	//echo $_POST['email'];

	//echo $_GET['email'];

	$email = $_REQUEST['email'];
	$password = $_REQUEST['password'];
	$firstName = $_REQUEST['firstName'];
	$lastName = $_REQUEST['lastName'];
	$country = $_REQUEST['country'];

	$active = 1;
	$role_id = 1;

	$sql = "INSERT INTO `users`(`userid`, `email`, `password`, `first_name`, `last_name`, `country`, `active`, `role_id`, `created_at`) VALUES (NULL,'$email','$password','$firstName','$lastName','$country','$active','$role_id',now())";

	$res = mysqli_query($con, $sql);

	if(!$res)
	{
		//echo "Not inserted ". mysqli_error($res);
	}
	else
	{
		//echo "Inserted successfully";
		header('location:login.php');
	}

}
else
{
	echo "not submited";
}
?>