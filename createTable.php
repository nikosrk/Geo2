<?php
	session_start();
	include "connect.php";
	
	$sql = "SELECT pop FROM countries WHERE pop > 3000000 ";
	$result = mysqli_query($link, $sql) or die(mysqli_error($link));
	
	echo $result 
	
	
	


?>
