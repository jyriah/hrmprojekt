<?php
require_once("../dbconf.php");

mb_internal_encoding( "UTF-8" );

$conn = new MySQLi($host, $user, $password, $db);

// Check connection
if ($conn->connect_error) {
	echo "Andmebaasiga ühendumisel tekkis viga: " . $conn->connect_error;
}

$stmt = $conn->prepare("SELECT * FROM jahhundoPosition WHERE position_id=?");

$stmt->bind_param("d", $_POST["id"]);

$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
} else {
	echo "Päringule ei leitud ühtegi vastust.";
}

echo
"
  <table class='edit-page'>
	<tr>
	  <td>Ametinimetus: </td>
	  <td><input type='text' id='position' value='".$row["position_name"]."' maxlength='30'></input></td>
	</tr>
	<tr>
	<tr>
	  <td>Kirjeldus: </td>
	  <td><textarea id='description' rows='8' cols='21'>" . $row["position_desc"] . "</textarea></td>
	</tr>
	<tr>
	<tr>
	  <td>Osakond: </td>
	  <td><input type='text' id='department' value='".$row["department_id"]."' maxlength='30'></input></td>
	</tr>
	<tr>
	  <td></td>
	  <td><button onclick='modifyPosition(" . $_POST["id"] . ")'>Muuda</button></td>
	</tr>
  </table>
";

$stmt->close();
$conn->close();
?>
