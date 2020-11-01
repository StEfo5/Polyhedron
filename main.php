<?php 
	$con = mysqli_connect('127.0.0.1', 'root', '', 'User');
	$q = mysqli_query($con, "SELECT * FROM  User1");
	$user1 = $q -> fetch_assoc();
	$con = mysqli_connect('127.0.0.1', 'root', '', $user1['company']);
	$q = mysqli_query($con, "SELECT * FROM  Employees ORDER BY points DESC");
	$num = mysqli_num_rows($q);
	$str = [];
	for ($i=0; $i < $num; $i++) { 
		# code...
		$str[$i] = $q -> fetch_assoc();
		if ($str[$i]['login']==$user1['login']) {
			# code...
			$user=$str[$i];
		}
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link href="style.css" rel="stylesheet">
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
				<a href="news.php"  class="text-dark-1 a-1 my-auto ml-4">
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
	<div class="col-9 mx-auto text-center mt-3 pt-3">
		<h1 class="">
			Сотрудники Месяца
		</h1>
		<div class="d-flex mt-5"> 
			<div class="col-3 my-auto bg-light rounded shadow-sm pt-3 pb-2 ml-auto text-center">
				<?php 
					echo '<img class="w-100 rounded" src="'.$str[1]['img'].'">';
				 ?>
				 <h5 class="mt-3">
				 	<?php echo $str[1]['name'] ?>
				 </h5>
				 <p class="mt-3">
				 	Количество баллов: 
				 	<?php echo $str[1]['points'] ?>
				 </p>
			</div>
			<div class="col-3 my-auto bg-light rounded shadow-sm pt-3 pb-2 ml-4 mr-4">
				<?php 
					echo '<img class="w-100 rounded" src="'.$str[0]['img'].'">';
				 ?>
				 <h5 class="mt-3">
				 	<?php echo $str[0]['name'] ?>
				 </h5>
				 <p class="mt-3">
				 	Количество баллов: 
				 	<?php echo $str[0]['points'] ?>
				 </p>
			</div>
			<div class="col-3 my-auto bg-light rounded shadow-sm pt-3 pb-2 mr-auto">
				<?php 
					echo '<img class="w-100 rounded" src="'.$str[2]['img'].'">';
				 ?>
				 <h5 class="mt-3">
				 	<?php echo $str[2]['name'] ?>
				 </h5>
				 <p class="mt-3">
				 	Количество баллов: 
				 	<?php echo $str[2]['points'] ?>
				 </p>
			</div>
		</div>
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