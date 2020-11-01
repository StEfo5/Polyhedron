<?php 
	$con = mysqli_connect('127.0.0.1', 'root', '', 'User');
	$q = mysqli_query($con, "SELECT * FROM  User1");
	$user1 = $q -> fetch_assoc();
	$con = mysqli_connect('127.0.0.1', 'root', '', $user1['company']);
	mysqli_query($con, "INSERT INTO Tasks (name, description, points, performedBy, deadline, link, comment) VALUES ('{$_GET['name']}', '{$_GET['description']}', '{$_GET['points']}', 'Никто', '{$_GET['deadline']}', 'Отсутствует', 'Отсутствует')");
	header('Location: admintasks.php');
 ?>