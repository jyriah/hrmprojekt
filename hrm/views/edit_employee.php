<?php
require_once("../dbconf.php");

mb_internal_encoding( "UTF-8" );

$conn = new MySQLi($host, $user, $password, $db);

// Check connection
if ($conn->connect_error) {
	echo "Andmebaasiga ühendumisel tekkis viga: " . $conn->connect_error;
}

$stmt = $conn->prepare("SELECT * FROM jahhundoPerson WHERE id=?");

$stmt->bind_param("d", $id);

$id = htmlspecialchars($_POST["id"]);

$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
	$row1 = $result->fetch_assoc();
} else {
	echo "Päringule ei leitud ühtegi vastust.";
}

echo
"
  <table class='edit-page'>
	<tr>
	  <td>Eesnimi: </td>
	  <td><input type='text' id='firstname' value='".$row1["firstname"]."' maxlength='30'></input></td>
	</tr>
	<tr>
	  <td>Perenimi: </td>
	  <td><input type='text' id='lastname' value='".$row1["lastname"]."' maxlength='30'></input></td>
	</tr>
	<tr>
	<tr>
	  <td>Osakond: </td>
	  <td>";

$stmt = $conn->prepare("SELECT department_id, department_name FROM jahhundoDepartment WHERE archived='false'");

$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
	echo "<select id='department'>";
	
	while($row = $result->fetch_assoc()) {
		echo "<option value='" . $row["department_id"];
		
		echo "'>" . $row["department_name"] . "</option>";
	}
	echo "</select>";
	
} else {
	echo "";
}

echo 
	"</td>
	</tr>
	<tr>
	<tr>
	  <td>Amet: </td>
	  <td>";
$stmt = $conn->prepare("SELECT position_id, position_name FROM jahhundoPosition WHERE archived='false'");

$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
	echo "<select id='position'>";
	
	while($row = $result->fetch_assoc()) {
		echo "<option value='" . $row["position_id"] . "'>" . $row["position_name"] . "</option>";
	}
	echo "</select>";
	  
} else {
	echo "";
}

echo 
	"</td>
	</tr>
	<tr>
	  <td>E-mail: </td>
	  <td><input type='text' id='email' value='".$row1["email"]."' maxlength='30'></input></td>
	</tr>
	<tr>
	  <td></td>
	  <td><button onclick='modifyEmployee(" . htmlspecialchars($_POST["id"]) . ")'>Muuda</button></td>
	</tr>
  </table>
";
mysqli_close($conn);
?>
