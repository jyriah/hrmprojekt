<?php
require_once("resources.php");

switch ($_GET["action"]) {
  case 'employees':
    showEmployees();
    break;

  case 'departments':
    showDepartments();
    break;

  case 'positions':
	showPositions();
    break;


  case 'freejobs':
    echo "<p class='coming-soon'>Varsti tulemas.</p>";
    break;

  case 'candidates':
    echo "<p class='coming-soon'>Varsti tulemas.</p>";
    break;

  case 'appraisals':
    echo "<p class='coming-soon'>Varsti tulemas.</p>";
    break;

  case 'trainings':
    echo "<p class='coming-soon'>Varsti tulemas.</p>";
    break;

  default:
    echo "Kõik muu";
    break;
}
?>
