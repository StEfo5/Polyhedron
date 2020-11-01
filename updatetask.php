<?php 
	$con = mysqli_connect('127.0.0.1', 'root', '', 'User');
	$q = mysqli_query($con, "SELECT * FROM  User1");
	$user1 = $q -> fetch_assoc();
	$con = mysqli_connect('127.0.0.1', 'root', '', $user1['company']);
	mysqli_query($con,"UPDATE Tasks SET performedBy='Никто' WHERE ID='{$_GET['performed']}'");
	mysqli_query($con,"UPDATE Tasks SET link='Отсутствует' WHERE ID='{$_GET['performed']}'");
	mysqli_query($con,"UPDATE Tasks SET comment='Отсутствует' WHERE ID='{$_GET['performed']}'");
	header('Location: admintasks.php');
 ?>