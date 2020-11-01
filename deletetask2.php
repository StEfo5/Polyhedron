<?php 
	$con = mysqli_connect('127.0.0.1', 'root', '', 'User');
	$q = mysqli_query($con, "SELECT * FROM  User1");
	$user1 = $q -> fetch_assoc();
	$con = mysqli_connect('127.0.0.1', 'root', '', $user1['company']);
	if ($_GET['perdormedBy']!='Никто') {
		# code...
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
		if ($str['link']=='Отсутствует' && $str['comment']=='Отсутствует') {
			# code...
			mysqli_query($con, "UPDATE Employees SET performed=0 WHERE login='{$_GET['performedBy']}'");
		}
	}
	mysqli_query($con,"DELETE FROM Tasks WHERE ID='{$_GET['performed']}'");
	header('Location: admintasks.php');
 ?>