


<?php
  require "db_connection.php";
  if($con) {
    $name = ucwords($_GET["name"]);
    $contact_number = $_GET["contact_number"];
    $address = ucwords($_GET["address"]);
    
    $query = "SELECT * FROM doctors WHERE UPPER(NAME) = '".strtoupper($name)."'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
  
    if($row){
      $count = $row['count'] + 1;
      $query="UPDATE doctors SET count=$count WHERE UPPER(NAME) = '".strtoupper($name)."'";
      $result = mysqli_query($con, $query);
      echo "Doctor with name $name,$count already exists!";
    }
    else {
      $count = 1;
      $query = "INSERT INTO doctors (NAME, CONTACT_NUMBER, ADDRESS, count) VALUES('$name', '$contact_number', '$address', '$count')";
      $result = mysqli_query($con, $query);
      if(!empty($result))
  			echo "$name added... $address";
  		else
  			echo "Failed to add $name!";
    }
  }
?>

