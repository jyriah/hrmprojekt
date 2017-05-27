<?php
require_once("dbconf.php");

mb_internal_encoding( "UTF-8" );

$conn=mysqli_connect($host, $user, $password, $db);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
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
          <th></th>
          <th></th>
        </tr>";

      // output data of each row
      while($row = $result->fetch_assoc()) {
          echo "<tr><td>"
          . $row["id"]. "</td><td>"
          . $row["firstname"]. "</td><td>"
          . $row["lastname"]. "</td><td>"
          . $row["email"] . "</td><td>"
          . $row["reg_date"] . "</td><td>"
          . "<button>Muuda</button></td><td>"
          . "<button>Kustuta</button>"
          . "</td></tr>";
      }
      echo "</table>";
  } else {
      echo "0 results";
  }

mysqli_close($conn);
?>
