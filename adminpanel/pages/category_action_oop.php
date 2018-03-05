<?php

//require('connection.php');
require('../../classes/Category.php');

if ($_SERVER['REQUEST_METHOD']=="POST") {
	# code...


	$category_name = $_REQUEST['category_name'];

	$catid = $_REQUEST['catid'];

	// INSERT INTO `Categories`(`catid`, `category_name`) VALUES ([value-1],[value-2])

	//INSERT INTO `categories`(`catid`, `category_name`) VALUES (NULL,[value-2])


	$obj = new Category();

	$obj->insert_update($catid, $category_name);

}
else
{
	//header('location:category_add.php');
}
?>