<?php
require_once("resources.php");
require_once("dbconf.php");

mb_internal_encoding( "UTF-8" );

$conn=mysqli_connect($host, $user, $password, $db);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Andmebaasiga ühendumisel tekkis viga: " . mysqli_connect_error();
  }
  $sql = "UPDATE jahhundoPerson SET firstname='"
	  . htmlspecialchars($_POST["firstname"])  . "', lastname='" 
	  . htmlspecialchars($_POST["lastname"]) . "', department='"
	  . htmlspecialchars($_POST["department"]) . "', position='"
	  . htmlspecialchars($_POST["position"]) . "', email='"
	  . htmlspecialchars($_POST["email"])
	  . "' WHERE id=". $_POST["id"];

  if ($conn->query($sql) !== TRUE) {
      echo "Muutmisel tekkis viga: " . $conn->error;
  }
mysqli_close($conn);
showEmployees();
?>

