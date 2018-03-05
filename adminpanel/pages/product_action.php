<?php

require('connection.php');

if ($_SERVER['REQUEST_METHOD']=="POST") {
	# code...


	$product_id = $_REQUEST['product_id'];
	$product_name = $_REQUEST['product_name'];
	$product_price = $_REQUEST['product_price'];
	$product_details = $_REQUEST['product_details'];
	$product_status = $_REQUEST['product_status'];
	$product_stock_in = $_REQUEST['product_stock_in'];
	$product_category = $_REQUEST['product_category'];


	

	// INSERT INTO `Categories`(`catid`, `category_name`) VALUES ([value-1],[value-2])

	//INSERT INTO `categories`(`catid`, `category_name`) VALUES (NULL,[value-2])


	$product_image ="";

	$target_dir = "../../uploads/";
	$target_file = $target_dir . basename($_FILES["product_image"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["product_image"]["tmp_name"]);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }
	}
	// Check if file already exists
	// if (file_exists($target_file)) {
	//     echo "Sorry, file already exists.";
	//     $uploadOk = 0;
	// }
	// Check file size
	if ($_FILES["product_image"]["size"] > 500000) {
	    echo "Sorry, your file is too large.";
	    $uploadOk = 0;
	}
	// Allow certain file formats

	$image_type_allow  =  array('jpg', 'jpeg', 'png', 'gif');


	if(!in_array($imageFileType, $image_type_allow))
	{
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	    $uploadOk = 0;
	}

	// if($imageFileType != "jpg") {
	//     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	//     $uploadOk = 0;
	// }
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	    if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
	        echo "The file ". basename( $_FILES["product_image"]["name"]). " has been uploaded.";

	        $product_image = 'uploads/'.basename( $_FILES["product_image"]["name"]);
	    } else {
	        echo "Sorry, there was an error uploading your file.";
	    }
	}




	if($product_id >0)
	{
		// update query here

		if($product_image !="")
		{

		$sql = "UPDATE `products` SET `product_name`='$product_name',`product_price`='$product_price',`product_details`='$product_details',`product_image`='$product_image',`product_status`='$product_status',`product_category`='$product_category',`product_stock_in`='$product_stock_in',`updated_at`=now() WHERE product_id = '$product_id'";
		}
		else
		{
			$sql = "UPDATE `products` SET `product_name`='$product_name',`product_price`='$product_price',`product_details`='$product_details',`product_status`='$product_status',`product_category`='$product_category',`product_stock_in`='$product_stock_in',`updated_at`=now() WHERE product_id = '$product_id'";
		}
	}
	else
	{
		// insert query here
		$sql = "INSERT INTO `products`(`product_id`, `product_name`, `product_price`, `product_details`, `product_image`, `product_status`, `product_category`, `product_stock_in`, `created_at`) VALUES (NULL,'$product_name','$product_price','$product_details','$product_image','$product_status','$product_category','$product_stock_in',now())";
	}

	

	$res = mysqli_query($con, $sql);

	if(!$res)
	{
		header('location:product_add.php');
		//echo "Not inserted ". mysqli_error($res);
	}
	else
	{
		//echo "Inserted successfully";
		header('location:product_list.php');
	}

}
else
{
	header('location:product_add.php');
}
?>