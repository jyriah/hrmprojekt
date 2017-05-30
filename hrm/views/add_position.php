<?php
require_once("../dbconf.php");

mb_internal_encoding( "UTF-8" );

$conn = new MySQLi($host, $user, $password, $db);

// Check connection
if ($conn->connect_error) {
	echo "Andmebaasiga ühendumisel tekkis viga: " . $conn->connect_error;
}

$stmt = $conn->prepare("SELECT department_id, department_name FROM jahhundoDepartment WHERE archived='false'");

$stmt->execute();

$result = $stmt->get_result();


echo
"
  <table class='edit-page'>
	<tr>
	  <td>Ametinimetus: </td>
	  <td><input type='text' id='position' value='' maxlength='30'></input></td>
	</tr>
	<tr>
	<tr>
	  <td>Kirjeldus: </td>
	  <td><textarea id='description' rows='8' cols='21'></textarea></td>
	</tr>
	<tr>
	<tr>
	  <td>Osakond: </td>
	  <td>";
if ($result->num_rows > 0) {
	echo "<select id='department'>";
	
	while($row = $result->fetch_assoc()) {
		echo "<option value='" . $row["department_id"] . "'>" . $row["department_name"] . "</option>";
	}
	echo "</select>";
	  
} else {
	echo "";
}

echo 
	"</td>
	</tr>
	<tr>
	  <td></td>
	  <td><button onclick='insertPosition()'>Lisa</button></td>
	</tr>
  </table>
";

$stmt->close();
$conn->close();
?>
