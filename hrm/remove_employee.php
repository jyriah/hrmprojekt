<?php
require_once("dbconf.php");
require_once("resources.php");

mb_internal_encoding( "UTF-8" );

$conn=mysqli_connect($host, $user, $password, $db);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Andmebaasiga ühendumisel tekkis viga: " . mysqli_connect_error();
  }
  $sql = "UPDATE jahhundoPerson SET archived='true' WHERE id=". $_POST["id"];

  if ($conn->query($sql) !== TRUE) {
      echo "Arhiveerimisel tekkis viga: " . $conn->error;
  }
mysqli_close($conn);
showEmployees();
?>
