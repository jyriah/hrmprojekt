<?php
require_once("resources.php");

switch ($_GET["action"]) {
  case 'employees':
    showEmployees();
    break;

  case 'departments':
    echo "Osakonnad varsti kohe-kohe tulemas";
    break;

  case 'occupations':
    echo "Ametid varsti kohe-kohe tulemas";
    break;


  case 'freejobs':
    echo "Vakantsid varsti kohe-kohe tulemas";
    break;

  case 'candidates':
    echo "Kandidaadid varsti kohe-kohe tulemas";
    break;

  case 'appraisals':
    echo "Arenguvestlused varsti kohe-kohe tulemas";
    break;

  case 'trainings':
    echo "Koolitused varsti kohe-kohe tulemas";
    break;

  default:
    echo "Kõik muu";
    break;
}
?>
