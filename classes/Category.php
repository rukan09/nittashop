<?php 

require('Connection.php');

	class Category{

		var $catid = 0;
		var $category_name = "";
		

		var $host = "localhost";
		var $db_user = "root";
		var $db_pass ="";
		var $db_name ="lict_us_42";

		var $con = "";



		public function __construct()
		{


			$this->con = new Mysqli($this->host, $this->db_user, $this->db_pass, $this->db_name);
			 return $this->con;
			//$this->con = new Connection();

			// if($this->con && !mysqli_connect_error())
			// {
			// 	echo "connected";
			// }
			// else
			// {
			// 	echo "Not connected";
			// }
		}




		// Insert and Update category
		public function insert_update($catid, $category_name)
		{
			//return $this->con;



			//$con = new Connection();

			//print_r($con);

			if($catid >0)
			{


				$sql0 = "SELECT * FROM categories WHERE catid ='$catid'";
				$res0 = mysqli_query($this->con, $sql0);

				$row0 = mysqli_fetch_assoc($res0);
				$pre_category_name = $row0['category_name'];


				$check_flag = 0;

				if(strtolower($pre_category_name) != strtolower($category_name))
				{
					$sql2 = "SELECT * FROM categories WHERE catid !='$catid' AND category_name = '$category_name'";
					$res2 = mysqli_query($this->con, $sql2);

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
					//echo $check_flag;
					header('location:category_add.php');
				}

				


				// update query here
				
				
			}
			else
			{

				$sql0 = "SELECT * FROM categories WHERE category_name = '$category_name'";
				$res0 = mysqli_query($this->con, $sql0);

				$nums =  mysqli_num_rows($res0);

				
				if($nums >0)
				{
					//echo $nums;
					
					header('location:category_add.php');
				}
				else
				{
					$sql = "INSERT INTO `Categories`(`catid`, `category_name`) VALUES (NULL, '$category_name')";
				}
				// insert query here
				
			}

			

			$res = mysqli_query($this->con, $sql);

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


		// Delete category
		public function delete()
		{
			
		}

	}


	//$obj = new Category();

	//print_r($obj->insert_update());

 ?>