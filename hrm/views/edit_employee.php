<?php
require_once("../dbconf.php");

mb_internal_encoding( "UTF-8" );

$conn=mysqli_connect($host, $user, $password, $db);

// Check connection
if (mysqli_connect_errno()) {
 echo "Andmebaasiga ühendumisel tekkis viga: " . mysqli_connect_error();
}

$sql = "SELECT * FROM jahhundoPerson WHERE id=". $_POST["id"];

$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
} else {
	echo "Päringule ei leitud ühtegi vastust.";
}

echo
"
  <table class='edit-page'>
	<tr>
	  <td>Eesnimi: </td>
	  <td><input type='text' id='firstname' value='".$row["firstname"]."' maxlength='30'></input></td>
	</tr>
	<tr>
	  <td>Perenimi: </td>
	  <td><input type='text' id='lastname' value='".$row["lastname"]."' maxlength='30'></input></td>
	</tr>
	<tr>
	<tr>
	  <td>Osakond: </td>
	  <td><input type='text' id='department' value='".$row["department"]."' maxlength='30'></input></td>
	</tr>
	<tr>
	<tr>
	  <td>Amet: </td>
	  <td><input type='text' id='position' value='".$row["position"]."' maxlength='30'></input></td>
	</tr>
	<tr>
	  <td>E-mail: </td>
	  <td><input type='text' id='email' value='".$row["email"]."' maxlength='30'></input></td>
	</tr>
	<tr>
	  <td></td>
	  <td><button onclick='modifyEmployee(" . $_POST["id"] . ")'>Muuda</button></td>
	</tr>
  </table>
";
mysqli_close($conn);
?>
