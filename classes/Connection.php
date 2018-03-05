<?php 



	class Connection{

		var $host = "localhost";
		var $db_user = "root";
		var $db_pass ="";
		var $db_name ="lict_us_42";

		var $con = "";



		public function __construct()
		{
			 $this->con = new Mysqli($this->host, $this->db_user, $this->db_pass, $this->db_name);
			 return $this->con;
		}




		

	}

 ?>