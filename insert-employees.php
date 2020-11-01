<?php
	$con = mysqli_connect('127.0.0.1', 'root', '', 'User');
	$q = mysqli_query($con, "SELECT * FROM  User1");
	$user1 = $q -> fetch_assoc();
	$connect = mysqli_connect("127.0.0.1", "root", '', $user1['company']);
	mysqli_query($connect, "INSERT INTO Employees (ID, name, points, password, login, img, performed) VALUES ('', '{$_GET['name']}', '0', '{$_GET['password']}', '{$_GET['login']}', '{$_GET['img']}', '0')");
	header('Location: ratings.php');
?>