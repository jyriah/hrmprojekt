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

$stmt = $conn->prepare("INSERT INTO jahhundoPerson (firstname, lastname, department_id, position_id, email, archived) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $firstname, $lastname, $department, $position, $email, $archived);
	
$firstname = htmlspecialchars($_POST["firstname"]);
$lastname = htmlspecialchars($_POST["lastname"]);
$department = htmlspecialchars($_POST["department"]);
$position = htmlspecialchars($_POST["position"]);
$email = htmlspecialchars($_POST["email"]);
$archived = "false";

$stmt->execute();

$stmt->close();
$conn->close();

showEmployees();
?>

