<?php
ob_start();
include 'barcode128.php';
echo "<center><div style='height: 30%; width: 50%;'>";
echo "<p>".bar128(stripcslashes($_POST['barcode']))."</p></div></center>";
?>