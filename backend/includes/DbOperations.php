<?php
/*
A class that organise the database operation.
*/
class DbOperations{
	/*
	Parameters:
		variable private con;
		function __construct:
	*/

	private $con;

	function __construct(){
		// calls the method from DbConnect.
		require_once dirname(__FILE__).'/DbConnect.php';

		$db = new DbConnect();

		$this->con = $db->connect();
	}
/* CRUD --> Create*/

function createUser($username, $email, $password){

	/*function createUser creates the user data base
	 Parameters:
				 $username (VARCHAR): 100 characters
				 $email (VARCHAR): 100 characters
				 $password (Text): N/A
	 Variables:
				$stmt: Prepares the function that will use to send the input into the
							data base. Where the in built function prepare contains sql.
	*/

	$password = md5($pass);

	 //prepare function will have an sql insert query
	$stmt = $this->con->prepare("INSERT INTO `user` (`id`, `username`, `password`,
		 `email`) VALUES (NULL, ?,?,?);");
		// this binds the parameters needed for the sql querey
	$stmt->bind_param("sss",$username, $password, $email);

	// This line will be called and data will be inseted into our database.
	//stmt->execute
	if($stmt->execute()) {

			return true;

		} else {

			return false;

				}

		}



}
 ?>
