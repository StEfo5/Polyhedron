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
		if ($user['login']==$user1['login']) {
			# code...
			break;
		}

	}
	$q = mysqli_query($con, "SELECT * FROM  Tasks");
	$num = mysqli_num_rows($q);
	for ($i=0; $i < $num; $i++) { 
		# code...
		$str = $q -> fetch_assoc();
		if ($str['ID']==$user['performed']) {
			# code...
			break;
		}

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
				
				<a href="ratings.php" class="text-dark-1 a-1 my-auto ">
					Сотрудники
				</a>
		
				<a href="main.php" class="text-dark-1 a-1 my-auto ml-4">
					Главная
				</a>
				<a href="news.php"  class="text-dark-1 a-1 my-auto ml-4">
					Новости
				</a>
				<form action="usertasks.php" class="ml-4 my-auto " method="GET">
					<button class="btn btn-green text-white">
						Задачи
					</button>
				</form>
			</div>
		</div>
	</div>
	<div class="col-9 mx-auto">
		<div class="row mt-3">
			<div class="col-4">
			 	<div class="col-12 bg-yellow shadow-sm rounded pt-2">
			 		<h4 class="text-center text-white">
			 			<?php 
			 				echo $str['name'];
			 			 ?>
			 		</h4>
			 		<div class=" row bg-light rounded border-yellow">
			 			<div class="col-12 pt-2 pb-3">
			 				<p class="mb-2">
				 				<?php 
					 				echo $str['description'];
					 			 ?>
			 				</p>
					 		<p class="mb-2">
					 			Количество баллов: 
					 			<?php 
					 				echo $str['points'];
					 			 ?>
					 		</p>
					 		<p class="mb-2">
					 			Последний срок:
					 			<?php 
					 				echo $str['deadline'];
					 			 ?>
					 		</p>
					 	</div>
			 		</div>
			 	</div>
		 	</div>
		 	<div class="col-8">
		 		<div class="col-12 bg-light shadow-sm rounded pt-3 pb-3">
		 			<form  action="insert-mytask.php" method="GET">
						<h6 class="">
							Ссылка на документ:
						</h6>
						<input class="form-control"  name="link">
							
						</input>
						<h6 class="mt-3">
							Коментарий:
						</h6>
						<textarea type="text" name="comment" placeholder="" class="form-control " style="height: 160px;"></textarea>
						<button class="btn text-white mt-3 btn-green">
							Отправить
						</button>
					</form>
		 		</div>
		 	</div>
		</div>
	</div>
</body>
</html>