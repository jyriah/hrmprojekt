<?php
include("dbconf.php");

mb_internal_encoding( "UTF-8" );

$order_number = 1;

$conn=mysqli_connect($host, $user, $password, $db);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Andmebaasiga ühendumisel tekkis viga: " . mysqli_connect_error();
  }

  $sql = "SELECT id, firstname, lastname, email, department, position FROM jahhundoPerson WHERE archived='false' ORDER BY id";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      echo "<table>
        <tr>
          <th>Jrk.</th>
          <th>Eesnimi</th>
          <th>Perenimi</th>
          <th>E-mail</th>
          <th>Osakond</th>
          <th>Amet</th>
        </tr>";

      // output data of each row
      while($row = $result->fetch_assoc()) {
          echo "<tr><td>"
          . $order_number. "</td><td>"
          . $row["firstname"]. "</td><td>"
          . $row["lastname"]. "</td><td>"
          . $row["email"] . "</td><td>"
          . $row["department"] . "</td><td>"
          . $row["position"] . "</td>"
          . "<td class='button-cell'>"
          . "<button class='edit-button' onclick='editEmployee("
          . $row["id"]
          . ")'>Muuda</button></td><td class='button-cell'>"
          . "<button onclick='deleteEmployee("
          . $row["id"]. ")'>Arhiivi</button>"
          . "</td></tr>";
          $order_number++;
      }
      echo "</table>";
	  echo "<div><button class='add-button' onclick='addEmployee()'>Lisa töötaja</button></div>";
  } else {
      echo "Päringule ei leitud ühtegi vastust.";
  }

mysqli_close($conn);
?>
