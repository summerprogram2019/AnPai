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
/* Create.Read.Update.Delete (CRUD) --> Create*/

	public function createUser($username, $email, $pass){
		/*function createUser creates the user data base
		 Parameters:
					 $username (VARCHAR): 100 characters
					 $email (VARCHAR): 100 characters
					 $password (Text): N/A
		 Variables:
					$stmt: Prepares the function that will use to send the input into the
								data base. Where the in built function prepare contains sql.
		*/

		if($this->isUserExist($username, $email)) {

				return 0; // returns 1 if user already exists.

		} else {
					$password = md5($pass);
					 //prepare function will have an sql insert query
					 // things that must be done, is to construct checkstatement that ensures
					 //username and email has to be unquine.
					$stmt = $this->con->prepare("INSERT INTO `user` (`id`, `username`, `password`,
						 `email`) VALUES (NULL,?,?,?);");
						// this binds the parameters needed for the sql querey
					$stmt->bind_param("sss",$username, $password, $email);

			// This line will be called and data will be inserted into our database.
			//stmt->execute
					if($stmt->execute()) {

							return 1;

						} else {

							return 2;

								}

						}


					}

	 private function isUserExist($username, $email) {

		 //function will return truth or false.
		 $stmt = $this->con->prepare(" SELECT id FROM user WHERE username = ? OR
			 email = ?");
		 $stmt->bind_param("ss", $username, $email);
		 $stmt->execute();
		 $stmt->store_result();
		 return $stmt->num_rows > 0; //this values

	 }



}
 ?>
