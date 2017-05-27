<?php
require_once("dbconf.php");

mb_internal_encoding( "UTF-8" );

$conn=mysqli_connect($host, $user, $password, $db);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $sql = "SELECT id, firstname, lastname FROM person";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          echo "Isiku ID: " . $row["id"]. " - Eesnimi: " . $row["firstname"]. ", Perenimi: " . $row["lastname"]. "<br>";
      }
  } else {
      echo "0 results";
  }

mysqli_close($conn);
phpinfo();
?>
