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
$sql = "INSERT INTO jahhundoPerson (firstname, lastname, department, position, email) VALUES ('"
	. htmlspecialchars($_POST["firstname"])  . "', '" 
	. htmlspecialchars($_POST["lastname"]) . "', '"
	. htmlspecialchars($_POST["department"]) . "', '"
	. htmlspecialchars($_POST["position"]) . "', '"
	. htmlspecialchars($_POST["email"]) . "')";
if ($conn->query($sql) !== TRUE) {
	echo "Lisamisel tekkis viga: " . $conn->error;
}
mysqli_close($conn);
showEmployees();
?>

