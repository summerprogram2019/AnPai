<?php
// this is script that will connect to the database

/*
class Db Connect:
			Parameters:
				variable con: The connection variable, where the data base is connected
											to.
				function __construct:

*/
class DbConnect{
	private $con;
	function __construct(){

	}

	function connect(){
		//method

		include_once dirname(__FILE__).'/constants.php';
		// con variable is used to connect to the data base.
		$this->con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

		if (mysqli_connect_error()){
			echo "Failed to connect with data base".mysqli_connect_err();
		}

		return $this->con;
	}

}
 ?>
