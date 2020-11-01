<?php 
	$con = mysqli_connect('127.0.0.1', 'root', '', 'User');
	$q = mysqli_query($con, "SELECT * FROM  User1");
	$user1 = $q -> fetch_assoc();
	$con = mysqli_connect('127.0.0.1', 'root', '', $user1['company']);
	mysqli_query($con, "UPDATE Employees SET performed = '{$_GET['performed']}' WHERE login = '{$_GET['performedBy']}'");
	mysqli_query($con, "UPDATE Tasks SET performedBy = '{$_GET['performedBy']}' WHERE ID = '{$_GET['performed']}'");
	header('Location: usertasks.php');
 ?>