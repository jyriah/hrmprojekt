<?php
include("dbconf.php");

mb_internal_encoding( "UTF-8" );

echo "<div class='header header-departments'>Osakonnad</div>";

$order_number = 1;

$conn=mysqli_connect($host, $user, $password, $db);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Andmebaasiga ühendumisel tekkis viga: " . mysqli_connect_error();
  }

  $sql = "SELECT * FROM jahhundoDepartment WHERE archived='false' ORDER BY department_name";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
	  echo "<table>";
	  echo "<tr>";
	  echo "<th>Jrk.</th>";
	  echo "<th>Osakonna nimi</th>";
	  echo "<th>Kirjeldus</th>";
	  echo "<th>Juht</th>";
	  echo "</tr>";

      // output data of each row
      while($row = $result->fetch_assoc()) {
		  echo "<tr>";
		  echo "<td>" . $order_number . "</td>";
		  echo "<td>" . $row["department_name"] . "</td>";
		  echo "<td>" . $row["department_desc"] . "</td>";
		  echo "<td>" . $row["department_head"] . "</td>";
		  echo "<td class='button-cell'><button class='edit-button' onclick='editDepartment(". $row["department_id"] . ")'>Muuda</button></td>";
		  echo "<td class='button-cell'><button onclick='deleteDepartment(" . $row["department_id"] . ")'>Arhiivi</button></td>";
		  echo "</tr>";
		  $order_number++;
      }
	  echo "</table>";
	  echo "<div><button class='add-button' onclick='addDepartment()'>Lisa osakond</button></div>";
	  
  } else {
      echo "Päringule ei leitud ühtegi vastust.";
  }

mysqli_close($conn);
?>

