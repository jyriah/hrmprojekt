<?php
require_once("../dbconf.php");

mb_internal_encoding( "UTF-8" );

$conn = new MySQLi($host, $user, $password, $db);

// Check connection
if ($conn->connect_error) {
	echo "Andmebaasiga ühendumisel tekkis viga: " . $conn->connect_error;
}
echo
"
  <table class='edit-page'>
	<tr>
	  <td>Osakonna nimi: </td>
	  <td><input type='text' id='department' value='' maxlength='30'></input></td>
	</tr>
	<tr>
	<tr>
	  <td>Kirjeldus: </td>
	  <td><textarea id='description' rows='8' cols='21'></textarea></td>
	</tr>
	<tr>
	<tr>
	  <td>Juht: </td>
	  <td>";

$stmt = $conn->prepare("SELECT id, firstname, lastname FROM jahhundoPerson WHERE archived='false'");

$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
	echo "<select id='head'>";
	
	while($row = $result->fetch_assoc()) {
		echo "<option value='" . $row["id"] . "'>" . $row["firstname"] . " ". $row["lastname"] . "</option>";
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
	  <td><button onclick='insertDepartment()'>Lisa</button></td>
	</tr>
  </table>
";

?>
