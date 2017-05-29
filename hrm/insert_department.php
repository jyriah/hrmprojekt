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

$stmt = $conn->prepare("INSERT INTO jahhundoDepartment (department_name, department_desc, department_head, archived) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $department, $description, $head, $archived);
	
$department = htmlspecialchars($_POST["department"]);
$description = htmlspecialchars($_POST["description"]);
$head = htmlspecialchars($_POST["head"]);
$archived = "false";
	
$stmt->execute();

$stmt->close();
$conn->close();

showDepartments();
?>

