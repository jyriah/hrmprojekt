<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Personali App</title>
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
<link href="css/styles.css" type="text/css" rel="stylesheet">
<script src="js/app.js"></script>
</head>

<bodY>
<div class="main">
<div class="menu">
	<ul>
		<li><a href="#" onclick="loadView('employees')">Töötajad</a></li>
		<li><a href="#" onclick="loadView('departments')">Osakonnad</a></li>
		<li><a href="#" onclick="loadView('positions')">Ametid</a></li>
		<!--
		<li><a href="#" onclick="loadView('freejobs')">Vakantsid</a></li>
		<li><a href="#" onclick="loadView('candidates')">Kandidaadid</a></li>
		<li><a href="#" onclick="loadView('appraisals')">Arenguvestlused</a></li>
		<li><a href="#" onclick="loadView('trainings')">Koolitused</a></li>
		-->
	</ul>
</div>
<div id="data"></div>
</div>
</body>
</html>
<?php
?>
