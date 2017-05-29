<?php
echo
"
  <table class='edit-page'>
	<tr>
	  <td>Ametinimetus: </td>
	  <td><input type='text' id='position' value='' maxlength='30'></input></td>
	</tr>
	<tr>
	<tr>
	  <td>Kirjeldus: </td>
	  <td><textarea id='description' rows='8' cols='21'></textarea></td>
	</tr>
	<tr>
	<tr>
	  <td>Osakond: </td>
	  <td><input type='text' id='department' value='' maxlength='30'></input></td>
	</tr>
	<tr>
	  <td></td>
	  <td><button onclick='insertPosition()'>Lisa</button></td>
	</tr>
  </table>
";
?>
