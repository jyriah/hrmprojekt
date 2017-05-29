<?php
require_once("resources.php");
require_once("dbconf.php");

$conn = new MySQLi($host, $user, $password, $db);

if($conn->connect_error) {
	echo "Andmebaasiga ühendumisel tekkis viga: " . $conn->connect_error;
}

$stmt = $conn->prepare("UPDATE jahhundoDepartment SET department_name=?, department_desc=?, department_head=? WHERE department_id=?");

$stmt->bind_param("sssd", $department, $description, $head, $id);

$department = htmlspecialchars($_POST["department"]);
$description = htmlspecialchars($_POST["description"]);
$head = htmlspecialchars($_POST["head"]);
$id = htmlspecialchars($_POST["id"]);

$stmt->execute();

$stmt->close();
$conn->close();

showDepartments();
?>