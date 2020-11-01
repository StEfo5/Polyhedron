<?php 
	$con = mysqli_connect('127.0.0.1', 'root', '', 'User');
	$q = mysqli_query($con, "SELECT * FROM  User1");
	$user1 = $q -> fetch_assoc();
	$con = mysqli_connect('127.0.0.1', 'root', '', $user1['company']);
	$q = mysqli_query($con, "SELECT * FROM  Employees");
	$num = mysqli_num_rows($q);
	for ($i=0; $i < $num; $i++) { 
		# code...
		$user = $q -> fetch_assoc();
		if ($user['login']==$_GET['performedBy']) {
			# code...
			break;
		}

	}
	$q = mysqli_query($con, "SELECT * FROM  Tasks");
	$num = mysqli_num_rows($q);
	for ($i=0; $i < $num; $i++) { 
		# code...
		$str = $q -> fetch_assoc();
		if ($str['ID']==$_GET['performed']) {
			# code...
			break;
		}

	}
	mysqli_query($con,"DELETE FROM Tasks WHERE ID='{$_GET['performed']}'");
	$points = $user['points']+$str['points'];
	mysqli_query($con,"UPDATE Employees SET points='{$points}' WHERE login='{$_GET['performedBy']}'");
	header('Location: admintasks.php');
 ?>