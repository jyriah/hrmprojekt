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

$stmt = $conn->prepare("INSERT INTO jahhundoPosition (position_name, position_desc, department_id, archived) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $position, $description, $department, $archived);
	
$position = htmlspecialchars($_POST["position"]);
$description = htmlspecialchars($_POST["description"]);
$department = htmlspecialchars($_POST["department"]);
$archived = "false";
	
$stmt->execute();

$stmt->close();
$conn->close();

showPositions();
?>

