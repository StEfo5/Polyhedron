<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	
	<link href="style.css" rel="stylesheet">
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body class="">
	<?php
		$con = mysqli_connect('127.0.0.1', 'root', '', 'User');
		$q = mysqli_query($con, "SELECT * FROM  User1");
		$user1 = $q -> fetch_assoc();
		$connect = mysqli_connect("127.0.0.1", "root", "", $user1['company']);
		$query = mysqli_query($connect, "SELECT * FROM news");
		$num = mysqli_num_rows($query);
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
	?>
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
				<a href="main.php"  class="text-dark-1 a-1 my-auto ml-4">
					Главная
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
	<?php
		for($i=0; $i<$num; $i++) {
			$news = $query->fetch_assoc();
			echo '<div class="col-6 mt-4 mx-auto bg-yellow shadow-sm rounded pt-2">
		 		<h2 class="text-center text-white">'.$news['title'].'</h2>
		 		<div class=" row bg-light rounded border-yellow">
		 			<div class="col-12 pt-2 pb-3">
		 				<p class="mb-2">'.$news['article'].'</p>
				 		<p class="mb-0 text-secondary">
				 			Автор: '.$news['author'].'
				 		</p>
				 	</div>
		 		</div>
		 </div>';
		} 
	?>
	<div class="col-6 mt-4 mx-auto bg-light shadow-sm pt-3 pb-3">
		<form action="insert-news.php" method="GET">
			<input type="text" name="title" placeholder="Название" class="form-control mb-3">
			<textarea type="text" name="article" placeholder="Статья" class="form-control mb-3" style="height: 160px;"></textarea>
			<input type="text" name="author" placeholder="Автор" class="form-control mb-3">
			<button class="btn btn-success">Добавить новость</button>
		</form>
	</div>
	
	
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