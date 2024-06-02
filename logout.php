<!-- <?php
  require "php/db_connection.php";

  if($con) {
    $query = "UPDATE admin_credentials SET IS_LOGGED_IN = 'true'";
    $result = mysqli_query($con, $query);
  }
?> -->
<?php
 header("Location: login.php");?> 
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Logout</title>
     
    <!-- <script src="js/restrict.js"></script> -->
  </head>
  <body>

  </body>
</html>
