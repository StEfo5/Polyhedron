<?php 
	$con = mysqli_connect('127.0.0.1', 'root', '', 'User');
	$q = mysqli_query($con, "SELECT * FROM  User1");
	$user = $q -> fetch_assoc();
	$con = mysqli_connect('127.0.0.1', 'root', '', $_POST['company']);
	$q = mysqli_query($con, "SELECT * FROM  Employees");
	$num = mysqli_num_rows($q);
	for ($i=0; $i < $num; $i++) { 
		# code...
		$user = $q -> fetch_assoc();
		if ($user['login']==$_POST['login']) {
			# code...
			break;
		}

	}
	$q = mysqli_query($con, "SELECT * FROM  Tasks ORDER BY points DESC");
	$num = mysqli_num_rows($q);
	$str = [];
	for ($i=0; $i < $num; $i++) { 
		# code...
		$str[$i] = $q -> fetch_assoc();
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	<div class="bg-light shadow-sm">
		<div class="col-9 mx-auto">
			<div class="row ">
				<div class="col-5 mr-auto">
					<div class="row">
						<img src="img/icon.png" class="icon">
						<h2 class="my-auto mr-auto text-dark-1 ml-2">Polyhedron</h2>
					</div>
				</div>
				<form action="employees.php" method="POST"  class="my-auto ">
					<?php 
						echo '<input class="d-none" type="" name="login" value="'.$_POST['login'].'">';
						echo '<input class="d-none" type="" name="password" value="'.$_POST['password'].'">';
						echo '<input class="d-none" type="" name="company" value="'.$_POST['company'].'">';
					 ?>
					<a href="" class="text-dark-1 a-1">
						Сотрудники
					</a>
				</form>
				<form action="mytasks.php" method="POST"  class="ml-4 my-auto ">
					<?php 
						echo '<input class="d-none" type="" name="login" value="'.$_POST['login'].'">';
						echo '<input class="d-none" type="" name="password" value="'.$_POST['password'].'">';
						echo '<input class="d-none" type="" name="company" value="'.$_POST['company'].'">';
					 ?>
					<a href="" class="text-dark-1 a-1">
						Мои задачи
					</a>
				</form>
				<?php 
					if ($_POST['login']=='admin' && $_POST['password']=='admin') {
						# code...
						echo '<form action="addtask.php" class="ml-4 my-auto ">
						<input class="d-none" type="" name="login" value="'.$_POST['login'].'">
						<input class="d-none" type="" name="password" value="'.$_POST['password'].'">
						<input class="d-none" type="" name="company" value="'.$_POST['company'].'">
						<button class="btn btn-green text-white">
							Добавить задачу
						</button>
					</form>';
					}
					else {
						echo '<form action="tasks.php" class="ml-4 my-auto ">
						<input class="d-none" type="" name="login" value="'.$_POST['login'].'">
						<input class="d-none" type="" name="password" value="'.$_POST['password'].'">
						<input class="d-none" type="" name="company" value="'.$_POST['company'].'">
						<button class="btn btn-green text-white">
							Мои задачи
						</button>
					</form>';
					}
				 ?>
			</div>
		</div>
	</div>
	<div class= "row pl-3 pr-3">
		<?php 
			for ($i=0; $i < $num; $i++) { 
				# code...
				echo '<div class="col-3 mt-4">
		 	<div class="col-12 bg-yellow shadow-sm rounded pt-2">
		 		<h4 class="text-center text-white">'.$str[$i]['name'].'</h4>
		 		<div class=" row bg-light rounded border-yellow">
		 			<div class="col-12 pt-2 pb-3">
		 				<p class="mb-2">'.$str[$i]['description'].'</p>
				 		<p class="mb-2">
				 			Баллов за задачу: '.$str[$i]['points'].'
				 		</p>
				 		<p class="mb-2">
				 			Последний срок: '.$str[$i]['deadline'].'
				 		</p>
				 		<p class="mb-2">
				 			Выполняет: '.$str[$i]['performedBy'].'
				 		</p>';
				 if ($str[$i]['performedBy']=='Никто' && $user['performed']=='') {
				 	# code...
				 	echo '<form action="tasks.php" method="POST">
		 	<input class="d-none" type="" name="performed" value="'.$str[$i]['ID'].'">
		 	<input class="d-none" type="" name="performedBy" value="'.$user['ID'].'">
		 	<input class="d-none" type="" name="login" value="'.$_POST['login'].'">
			<input class="d-none" type="" name="password" value="'.$_POST['password'].'">
			<input class="d-none" type="" name="company" value="'.$_POST['company'].'">
		 	<button class="btn btn-gray text-white">
				Получить
			</button>
		 </form>';
				 }
		 		echo '</div>
		 		</div>
		 	</div>
		 </div>';
			}
			mysqli_query($con, "UPDATE Employees SET performed='{$_POST['performed']}' WHERE ID='{$_POST['performedBy']}'");
			mysqli_query($con, "UPDATE Tasks SET performedBy='{$_POST['performedBy']}' WHERE ID='{$_POST['performed']}'");
			
		 ?>

	</div>
</body>
</html>