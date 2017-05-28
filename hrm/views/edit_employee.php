<?php
echo
"
<form action='modify_employee.php' method='POST'>
  <table class='edit-page'>
    <tr>
      <td>Eesnimi: </td>
      <td><input type='text' name='firstname' maxlength='30'></input></td>
    </tr>
    <tr>
      <td>Perenimi: </td>
      <td><input type='text' name='lastname' maxlength='30'></input></td>
    </tr>
    <tr>
    <tr>
      <td>Osakond: </td>
      <td><input type='text' name='department' maxlength='30'></input></td>
    </tr>
    <tr>
    <tr>
      <td>Amet: </td>
      <td><input type='text' name='position' maxlength='30'></input></td>
    </tr>
    <tr>
      <td></td>
      <td><button>Muuda</button></td>
    </tr>
  </table>
</form>
"
?>
