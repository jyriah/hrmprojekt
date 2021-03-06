<?php
include("dbconf.php");

mb_internal_encoding( "UTF-8" );

echo "<div class='header header-employees'>Töötajad</div>";

$order_number = 1;

$conn=mysqli_connect($host, $user, $password, $db);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Andmebaasiga ühendumisel tekkis viga: " . mysqli_connect_error();
  }

  $sql = "SELECT jahhundoPerson.id, jahhundoPerson.firstname, jahhundoPerson.lastname, jahhundoPerson.email, jahhundoDepartment.department_name, jahhundoPosition.position_name
  FROM jahhundoPerson 
  LEFT JOIN jahhundoPosition ON jahhundoPerson.position_id=jahhundoPosition.position_id 
  LEFT JOIN jahhundoDepartment ON jahhundoPerson.department_id=jahhundoDepartment.department_id 
  WHERE jahhundoPerson.archived='false' ORDER BY id";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
	  echo "<table>";
	  echo "<tr>";
	  echo "<th>Jrk.</th>";
	  echo "<th>Eesnimi</th>";
	  echo "<th>Perenimi</th>";
	  echo "<th>Email</th>";
	  echo "<th>Osakond</th>";
	  echo "<th>Amet</th>";
	  echo "</tr>";

      // output data of each row
      while($row = $result->fetch_assoc()) {
		  echo "<tr>";
		  echo "<td>" . $order_number . "</td>";
		  echo "<td>" . $row["firstname"] . "</td>";
		  echo "<td>" . $row["lastname"] . "</td>";
		  echo "<td>" . $row["email"] . "</td>";
		  echo "<td>" . $row["department_name"] . "</td>";
		  echo "<td>" . $row["position_name"] . "</td>";
		  echo "<td class='button-cell'><button class='edit-button' onclick='editEmployee(". $row["id"] . ")'>Muuda</button></td>";
		  echo "<td class='button-cell'><button onclick='deleteEmployee(" . $row["id"] . ")'>Arhiivi</button></td>";
		  echo "</tr>";
		  $order_number++;
      }
	  echo "</table>";
	  echo "<div><button class='add-button' onclick='addEmployee()'>Lisa töötaja</button></div>";
	  
  } else {
      echo "Päringule ei leitud ühtegi vastust.";
  }

mysqli_close($conn);
?>
