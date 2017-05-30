<?php
require_once("resources.php");
require_once("dbconf.php");

mb_internal_encoding( "UTF-8" );

$conn = new MySQLi($host, $user, $password, $db);
// Check connection
if ($conn->connect_error)
{
	echo "Andmebaasiga ühendumisel tekkis viga: " . $conn->connect_error;
}

$stmt = $conn->prepare("UPDATE jahhundoPerson SET firstname=?, lastname=?, department=?, position=?, email=? WHERE id=?");
$stmt->bind_param("sssssd", $firstname, $lastname, $department, $position, $email, $id);
	
$firstname = htmlspecialchars($_POST["firstname"]);
$lastname = htmlspecialchars($_POST["lastname"]);
$department = htmlspecialchars($_POST["department"]);
$position = htmlspecialchars($_POST["position"]);
$email = htmlspecialchars($_POST["email"]);
$id = htmlspecialchars($_POST["id"]);

$stmt->execute();

$stmt->close();
$conn->close();

showEmployees();
?>

