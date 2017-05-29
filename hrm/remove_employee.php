<?php
require_once("dbconf.php");
require_once("resources.php");

mb_internal_encoding( "UTF-8" );

$conn= new MySQLi($host, $user, $password, $db);
// Check connection
if ($conn->connect_error) {
	echo "Andmebaasiga ühendumisel tekkis viga: " . $conn->connect_error;
}
$stmt = $conn->prepare("UPDATE jahhundoPerson SET archived='true' WHERE id=?");

$stmt->bind_param("d", $id);

$id = $_POST["id"];
$stmt->execute();

$stmt->close();
$conn->close();

showEmployees();
?>
