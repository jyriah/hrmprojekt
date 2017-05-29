<?php
require_once("resources.php");
require_once("dbconf.php");

$conn = new MySQLi($host, $user, $password, $db);

if($conn->connect_error) {
	echo "Andmebaasiga ühendumisel tekkis viga: " . $conn->connect_error;
}

$stmt = $conn->prepare("UPDATE jahhundoPosition SET position_name=?, position_desc=?, department_id=? WHERE position_id=?");

$stmt->bind_param("sssd", $position, $description, $department_id, $id);

$position = htmlspecialchars($_POST["position"]);
$description = htmlspecialchars($_POST["description"]);
$department_id = htmlspecialchars($_POST["department"]);
$id = htmlspecialchars($_POST["id"]);

$stmt->execute();

$stmt->close();
$conn->close();

showPositions();
?>