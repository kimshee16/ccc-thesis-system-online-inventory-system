<?php
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Barcode Generator</title>
</head>
<body>
<form action="barcode.php" method="POST">
Type the barcode: <input type="text" name="barcode" autocomplete="off" required> <input type="submit" name="submit" value="Submit">
</form>
</body>
</html>