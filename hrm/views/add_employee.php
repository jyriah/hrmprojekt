<?php
echo
"
  <table class='edit-page'>
	<tr>
	  <td>Eesnimi: </td>
	  <td><input type='text' id='firstname' value='' maxlength='30'></input></td>
	</tr>
	<tr>
	  <td>Perenimi: </td>
	  <td><input type='text' id='lastname' value='' maxlength='30'></input></td>
	</tr>
	<tr>
	<tr>
	  <td>Osakond: </td>
	  <td><input type='text' id='department' value='' maxlength='30'></input></td>
	</tr>
	<tr>
	<tr>
	  <td>Amet: </td>
	  <td><input type='text' id='position' value='' maxlength='30'></input></td>
	</tr>
	<tr>
	  <td>E-mail: </td>
	  <td><input type='text' id='email' value='' maxlength='30'></input></td>
	</tr>
	<tr>
	  <td></td>
	  <td><button onclick='insertEmployee()'>Lisa</button></td>
	</tr>
  </table>
";
?>
