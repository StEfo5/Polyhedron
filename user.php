<?php 
	$con = mysqli_connect('127.0.0.1', 'root', '', 'User');
	$q = mysqli_query($con, "SELECT * FROM  Companies");
	$num = mysqli_num_rows($q);
	mysqli_query($con, "DELETE FROM User1 WHERE ID = 1");
	mysqli_query($con, "INSERT INTO User1 (login, password, ID, company) VALUES ('{$_GET['login']}', '{$_GET['password']}', '1', '{$_GET['company']}')");
	for ($i=0; $i <$num ; $i++) { 
		# code...
		$str = $q -> fetch_assoc();
		if ($str['name'] == $_GET['company']) {
			# code...
			break;
		}
	}
	if ($i<$num) {
		# code...
		$con = mysqli_connect('127.0.0.1', 'root', '', $_GET['company']);
		$q = mysqli_query($con, "SELECT * FROM  Employees");
		$num = mysqli_num_rows($q);
		for ($i=0; $i < $num; $i++) { 
			# code...
			$str = $q -> fetch_assoc();
			if ($str['login'] == $_GET['login'] && $str['password'] == $_GET['password']) {
				# code...
				break;
			}
		}
		if ($i<$num) {
			# code...
			mysqli_query($con, "DELETE FROM User1 WHERE ID = 1");
			mysqli_query($con, "INSERT INTO User1 (login, password, ID, company) VALUES ('{$_GET['login']}', '{$_GET['password']}', '1', '{$_GET['company']}')");
			header('Location: main.php');
		}
		else {
			header('Location: index.php');
		}

	}
	else {
		header('Location: index.php');
	}
 ?>
