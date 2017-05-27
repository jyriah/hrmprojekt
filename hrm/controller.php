<?php
require_once("resources.php");

switch ($_GET["action"]) {
  case 'employees':
    getEmployees();
    break;

  case 'departments':
    echo "Osakonnad";
    break;

  case 'occupations':
    echo "Ametid";
    break;


  case 'freejobs':
    echo "Vakantsid";
    break;

  case 'candidates':
    echo "Kandidaadid";
    break;

  case 'appraisals':
    echo "Arenguvestlused";
    break;

  case 'trainings':
    echo "Koolitused";
    break;

  default:
    echo "Kõik muu";
    break;
}
?>
