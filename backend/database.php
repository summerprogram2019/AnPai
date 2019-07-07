// database setup
<?php
   $con=mysqli_connect("example.com","username","password");
   $sql="CREATE DATABASE my_db";
   if (mysqli_query($con,$sql)) {
      echo "Database my_db created successfully";
   }
?>
