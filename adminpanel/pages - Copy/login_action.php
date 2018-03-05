<?php
session_start();

require('connection.php');

//echo $_SERVER['REQUEST_METHOD'];



if($_SERVER['REQUEST_METHOD']=="POST"){
	//echo "submited";

	//echo $_POST['email'];

	//echo $_GET['email'];

	$email = $_REQUEST['email'];
	$password = $_REQUEST['password'];



	$sql = "SELECT * FROM `users` WHERE email='$email' AND password ='$password'";

	$res = mysqli_query($con, $sql);

	//print_r($res);

	$row =  mysqli_fetch_assoc($res);
	//print_r($row);
	$nums =  mysqli_num_rows($res);
	//print_r($nums);

	if($nums == 1)
	{
		if($row['active'] == 1)
		{
			if($row['role_id'] == 1)
			{
				$_SESSION['userid'] = $row['userid'];
				$_SESSION['user_type'] = 'Admin';
				header('location:index.php');
				// Admin
			}
			elseif($row['role_id'] == 2)
			{
				$_SESSION['userid'] = $row['userid'];
				$_SESSION['user_type'] = 'Visitor';
				header('location:../../index.php');
				// Visitor
			}
			else
			{
				header('location:../../index.php');
			}

		}
	}
	else
	{
		header('location:../../index.php');
	}

	// if(!$res)
	// {
	// 	//echo "Not inserted ". mysqli_error($res);
	// }
	// else
	// {
	// 	//echo "Inserted successfully";
	// 	header('location:login.php');
	// }

}
else
{
	echo "not submited";
}
?>