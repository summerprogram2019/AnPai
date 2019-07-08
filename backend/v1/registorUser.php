<?php

// calling the DbOperation so we can be able to send, input data into database
require_once '../includes/DbOperations.php' ;

// post method ?? WHAT IS A POST METHOD
if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
    /* if post method occurs then we need to check if the user has provided the
    correct imput, like id, username, password, email.
    */
    if (
        isset($_POST['username']) and
        isset($_POST['email']) and isset($_POST['password'])
          ) {
            /*

            Once the data has been provided, this allows the data to be
            operated: To operate the data we will import use the script
            DbOperations;
            */

            // creating a $db operation object, which will allow data to be sent.
            $db = new DbOperations();

            /*
            Method that has been called from DbOperations;

              CreatUser:
                Parameters;
                  username:
                  email:
                  password:
            */

            //Below code keeps track on the how the database is being used, and
            //tracks the if return 1, the doesnt exist, return 2 if error occurs
            // returns 0) if user already exists.

            $results = $db->createUser ($_POST['username'],
            $_POST['email'],$_POST['password']);

            if ($results == 1 )
            ) {
                $response['error'] = false;
                $response['message'] = "User has been created";
            } elseif ($results = 2) {
                $response ['error'] = true;
                $response ['message'] = "An error has occured";
            } elseif ($results == 0) {

              $response ['error'] = true;
              $response ['message'] = " It looks like you already exist. Please
              used a different user or email." ;

            }

    } else {

      $response['error'] = true;
      $response['message'] = "required fields are missing";

    }

} else {

  $response['error'] = true;
  $response[ 'message' ] = " Invalid Request";
}

//data interchange format to communicate from another device with web services
// json is a format used these day.

echo json_encode($response);

 ?>
