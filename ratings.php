<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Рейтинги</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	<!--Соединение-->
	<?php
		$con = mysqli_connect('127.0.0.1', 'root', '', 'User');
		$q = mysqli_query($con, "SELECT * FROM  User1");
		$user1 = $q -> fetch_assoc();
		$connect = mysqli_connect("127.0.0.1", "root", "", $user1['company']);
		$q1 = mysqli_query($connect, "SELECT * FROM  Employees");
		$nu = mysqli_num_rows($q1);
		for ($i=0; $i < $nu; $i++) { 
			# code...
			$user = $q1 -> fetch_assoc();
			if ($user['login']==$user1['login']) {
				# code...
				break;
			}

		}
		$query = mysqli_query($connect, "SELECT * FROM Employees ORDER BY points DESC");
		$num = mysqli_num_rows($query);
	?>
	<!--Шапка-->
	<div class="bg-light shadow-sm">
		<div class="col-9 mx-auto">
			<div class="row ">
				<div class="col-5 mr-auto">
					<div class="row">
						<img src="img/icon.png" class="icon">
						<h2 class="my-auto mr-auto text-dark-1 ml-2">Polyhedron</h2>
					</div>
				</div>
				<a href="main.php"  class="text-dark-1 a-1 my-auto">
					Главная
				</a>
				
				<a href="news.php" class="text-dark-1 a-1 my-auto ml-4">
					Новости
				</a>
		
				<?php 
					if ($user['performed'] != 0) {
						# code...
						echo '<a href="mytask.php" class="text-dark-1 a-1 my-auto ml-4">
					Моя задача
				</a>';
					}
					else echo '<a href="" class="a1 text-dark-1 a-1 my-auto ml-4">
					Моя задача
				</a>';
				 ?>
				<form action="<?php 
					if($user1['login']=='admin' && $user1['password']=='admin') echo 'admintasks.php';
					else echo 'usertasks.php';
				 ?>" class="ml-4 my-auto " method="GET">
					<button class="btn btn-green text-white">
						Задачи
					</button>
				</form>
			</div>
		</div>
	</div>
	<!--Рейтинги-->
	<div class="col-5 bg-light mx-auto rounded mt-3 shadow-sm pt-3 pb-0">
		<div class="row">
			<p class="col-2">
				Место
			</p>
			<p class="col-9">
				Имя
			</p>
			<p >
				Баллы
			</p>
		</div>
		<?php
    		for ($i=1; $i<$num; $i++) { 
        		$member_rate = $query->fetch_assoc();
        		echo "<div class='row'>
				<h5 class='col-2'>".$i."</h5>
				<h5 class='col-9'>".$member_rate["name"]."</h1>
				<h5 class=''>".$member_rate["points"]."</p>
		</div>";
    		}
		?>
		
	</div>
	<?php 
		if ($user1['login']=='admin' && $user1['password']=='admin') {
			# code...
			echo '<div class="col-5 mt-4 mx-auto bg-light shadow-sm pt-3 pb-3">
		<form action="insert-employees.php" method="GET">
			<input type="text" name="name" placeholder="ФИО" class="form-control mb-3">
			<input type="text" name="login" placeholder="Логин" class="form-control mb-3">
			<input type="text" name="password" placeholder="Пароль" class="form-control mb-3">
			<input type="text" name="img" placeholder="Фото" class="form-control mb-3">
			<button class="btn btn-success">Добавить сотрудника</button>
		</form>
	</div>';
		}
	 ?>
	 
	<script src="https://apps.elfsight.com/p/platform.js" defer></script> <div class="elfsight-app-180dc20f-a32d-4e49-930c-5d111a95ed47"></div>
</body>
</html>
<?php 
 	if ($user['performed'] == 0) {
 		# code...
 		echo "<script language='javascript'>
 	let mytask = document.querySelector('.a1');
 	mytask.onclick = function(){
 		alert('Вы ещё не выбрали задачу');
 	}
 </script>";
 	}
  ?>