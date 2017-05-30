<?php
include("dbconf.php");

mb_internal_encoding( "UTF-8" );

echo "<div class='header header-positions'>Ametid</div>";

$order_number = 1;

$conn=mysqli_connect($host, $user, $password, $db);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Andmebaasiga ühendumisel tekkis viga: " . mysqli_connect_error();
  }

  $sql = "SELECT jahhundoPosition.*, jahhundoDepartment.department_name FROM jahhundoPosition LEFT JOIN jahhundoDepartment ON jahhundoPosition.department_id=jahhundoDepartment.department_id WHERE jahhundoPosition.archived='false' ORDER BY position_name";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
	  echo "<table>";
	  echo "<tr>";
	  echo "<th>Jrk.</th>";
	  echo "<th>Ametinimetus</th>";
	  echo "<th>Kirjeldus</th>";
	  echo "<th>Osakond</th>";
	  echo "</tr>";
	  
      while($row = $result->fetch_assoc()) {
		  echo "<tr>";
		  echo "<td>" . $order_number . "</td>";
		  echo "<td>" . $row["position_name"] . "</td>";
		  echo "<td class='description'>" . $row["position_desc"] . "</td>";
		  echo "<td>" . $row["department_name"] . "</td>";
		  echo "<td class='button-cell'><button class='edit-button' onclick='editPosition(". $row["position_id"] . ")'>Muuda</button></td>";
		  echo "<td class='button-cell'><button onclick='deletePosition(" . $row["position_id"] . ")'>Arhiivi</button></td>";
		  echo "</tr>";
		  $order_number++;
      }
	  echo "</table>";
	  echo "<div><button class='add-button' onclick='addPosition()'>Lisa ametinimetus</button></div>";
	  
  } else {
      echo "Päringule ei leitud ühtegi vastust.";
  }

mysqli_close($conn);
?>

