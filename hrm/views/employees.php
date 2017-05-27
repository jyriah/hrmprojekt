<?php
include("dbconf.php");

mb_internal_encoding( "UTF-8" );

$conn=mysqli_connect($host, $user, $password, $db);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Andmebaasiga ühendumisel tekkis viga: " . mysqli_connect_error();
  }

  $sql = "SELECT id, firstname, lastname, email, reg_date FROM person";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      echo "<table>
        <tr>
          <th>ID</th>
          <th>Eesnimi</th>
          <th>Perenimi</th>
          <th>Email</th>
          <th>Reg. aeg</th>
        </tr>";

      // output data of each row
      while($row = $result->fetch_assoc()) {
          echo "<tr><td>"
          . $row["id"]. "</td><td>"
          . $row["firstname"]. "</td><td>"
          . $row["lastname"]. "</td><td>"
          . $row["email"] . "</td><td>"
          . $row["reg_date"] . "</td><td class='button-cell'>"
          . "<button class='edit-button'>Muuda</button></td><td class='button-cell'>"
          . "<button onclick='deleteEmployee("
          . $row["id"]. ")'>Kustuta</button>"
          . "</td></tr>";
      }
      echo "</table>";
  } else {
      echo "Tulemused puuduvad";
  }

mysqli_close($conn);
?>
