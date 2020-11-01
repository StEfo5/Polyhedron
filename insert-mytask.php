<?php
	$con = mysqli_connect('127.0.0.1', 'root', '', 'User');
	$q = mysqli_query($con, "SELECT * FROM  User1");
	$user1 = $q -> fetch_assoc();
	$con = mysqli_connect('127.0.0.1', 'root', '', $user1['company']);
	mysqli_query($con, "UPDATE Employees SET performed=0 WHERE login='{$user1['login']}'");
	mysqli_query($con, "UPDATE Tasks SET comment='{$_GET['comment']}' WHERE performedBy='{$user1['login']}'");
	mysqli_query($con, "UPDATE Tasks SET link='{$_GET['link']}' WHERE performedBy='{$user1['login']}'");
	header('Location: usertasks.php');
?>