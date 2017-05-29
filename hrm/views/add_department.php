<?php

echo
"
  <table class='edit-page'>
	<tr>
	  <td>Osakonna nimi: </td>
	  <td><input type='text' id='department' value='' maxlength='30'></input></td>
	</tr>
	<tr>
	<tr>
	  <td>Kirjeldus: </td>
	  <td><textarea id='description' rows='8' cols='21'></textarea></td>
	</tr>
	<tr>
	<tr>
	  <td>Juht: </td>
	  <td><input type='text' id='head' value='' maxlength='30'></input></td>
	</tr>
	<tr>
	  <td></td>
	  <td><button onclick='insertDepartment()'>Lisa</button></td>
	</tr>
  </table>
";

?>
