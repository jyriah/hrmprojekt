<?php
require_once("resources.php");
require_once("dbconf.php");

$conn = new MySQLi($host, $user, $password, $db);

if($conn->connect_error) {
	echo "Andmebaasiga ühendumisel tekkis viga: " . $conn->connect_error;
}

$stmt = $conn->prepare("UPDATE jahhundoPosition SET position_name=?, position_desc=?, department_id=? WHERE position_id=?");

$stmt->bind_param("sssd", $position, $description, $department_id, $id);

$position = $_POST["position"];
$description = $_POST["description"];
$department_id = $_POST["department"];
$id = $_POST["id"];

$stmt->execute();

$stmt->close();
$conn->close();

showPositions();
?>