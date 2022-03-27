<?php
	ob_start();
	session_start();

	date_default_timezone_set("Asia/Manila");

	include 'inventoryconfig.php';

	if(!isset($_SESSION['name'])){
			header("Location: index.php");
		}

?>

<!DOCTYPE html>
<html>
<head>
	<script src="jscss/jquery-3.1.1.min.js"></script>
<script src="jscss/Chart.min.js"></script>
<script src="jscss/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="jscss/bootstrap.min.css">
	<title></title>
</head>
<body>

Stock Level Chart per Department<br><br>
<form action="stocklevelchart.php" method="POST">
	<select name="dept">
		<option>Office of the President</option>
		<option>VPA</option>
		<option>VPAA</option>
		<option>Registrar</option>
		<option>OSA</option>
		<option>DCE</option>
		<option>DASTE</option>
		<option>DBE</option>
	</select>
	&nbsp
	<input type="submit" name="submit" value="Done">
</form>
</body>
</html>