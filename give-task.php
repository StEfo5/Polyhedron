<?php 
	$con = mysqli_connect('127.0.0.1', 'root', '', 'User');
	$q = mysqli_query($con, "SELECT * FROM  User1");
	$user1 = $q -> fetch_assoc();
	$con = mysqli_connect('127.0.0.1', 'root', '', $user1['company']);
	mysqli_query($con,"UPDATE Tasks SET performedBy='{$_GET['login']}' WHERE ID='{$_GET['ID']}'");
	mysqli_query($con,"UPDATE Employees SET performed='{$_GET['ID']}' WHERE login='{$_GET['login']}'");
	header('Location: admintasks.php');
 ?>