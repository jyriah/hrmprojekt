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
<form action='modify_employee.php' method='POST'>
  <table class='edit-page'>
	<tr>
	  <td>Eesnimi: </td>
	  <td><input type='text' name='firstname' value='".$row["firstname"]."' maxlength='30'></input></td>
	</tr>
	<tr>
	  <td>Perenimi: </td>
	  <td><input type='text' name='lastname' value='".$row["lastname"]."' maxlength='30'></input></td>
	</tr>
	<tr>
	<tr>
	  <td>Osakond: </td>
	  <td><input type='text' name='department' value='".$row["department"]."' maxlength='30'></input></td>
	</tr>
	<tr>
	<tr>
	  <td>Amet: </td>
	  <td><input type='text' name='position' value='".$row["position"]."' maxlength='30'></input></td>
	</tr>
	<tr>
	  <td>E-mail: </td>
	  <td><input type='text' name='position' value='".$row["email"]."' maxlength='30'></input></td>
	</tr>
	<tr>
	  <td></td>
	  <td><button>Muuda</button></td>
	</tr>
  </table>
</form>
";
mysqli_close($conn);
?>
