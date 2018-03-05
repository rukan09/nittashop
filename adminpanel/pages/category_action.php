<?php

require('connection.php');

if ($_SERVER['REQUEST_METHOD']=="POST") {
	# code...


	$category_name = $_REQUEST['category_name'];

	$catid = $_REQUEST['catid'];

	// INSERT INTO `Categories`(`catid`, `category_name`) VALUES ([value-1],[value-2])

	//INSERT INTO `categories`(`catid`, `category_name`) VALUES (NULL,[value-2])


	if($catid >0)
	{


		$sql0 = "SELECT * FROM categories WHERE catid ='$catid'";
		$res0 = mysqli_query($con, $sql0);

		$row0 = mysqli_fetch_assoc($res0);
		$pre_category_name = $row0['category_name'];


		$check_flag = 0;

		if(strtolower($pre_category_name) != strtolower($category_name))
		{
			$sql2 = "SELECT * FROM categories WHERE catid !='$catid' AND category_name = '$category_name'";
			$res2 = mysqli_query($con, $sql2);

			$nums =  mysqli_num_rows($res2);

			if($nums >0)
			{
				$check_flag = 1;
			}
		}


		if($check_flag == 0)
		{
			$sql = "UPDATE `categories` SET `category_name`='$category_name' WHERE catid = '$catid'";
		}
		else
		{
			header('location:category_add.php');
		}

		


		// update query here
		
		
	}
	else
	{

		$sql0 = "SELECT * FROM categories WHERE category_name = '$category_name'";
		$res0 = mysqli_query($con, $sql0);

		$nums =  mysqli_num_rows($res0);

		
		if($nums >0)
		{
			
			header('location:category_add.php');
		}
		else
		{
			$sql = "INSERT INTO `Categories`(`catid`, `category_name`) VALUES (NULL, '$category_name')";
		}
		// insert query here
		
	}

	

	$res = mysqli_query($con, $sql);

	if(!$res)
	{
		header('location:category_add.php');
		//echo "Not inserted ". mysqli_error($res);
	}
	else
	{
		//echo "Inserted successfully";
		header('location:category_list.php');
	}

}
else
{
	header('location:category_add.php');
}
?>