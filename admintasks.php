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
	$q = mysqli_query($con, "SELECT * FROM  Tasks ORDER BY deadline DESC");
	$num = mysqli_num_rows($q);
	$str = [];
	for ($i=$num-1; $i >= 0; $i--) { 
		# code...
		$str[$i] = $q -> fetch_assoc();
	}
	$q = mysqli_query($con, "SELECT * FROM  Employees ORDER BY points DESC");
	$nu = mysqli_num_rows($q);
	$users = [];
	for ($i=$nu-1; $i > 0; $i--) { 
		# code...
		$users[$i] = $q -> fetch_assoc();
	}
	$date = date("Y.m.d H:i");
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
				<a href="news.php"  class="text-dark-1 a-1 my-auto ml-4">
					Новости
				</a>
		
				<a href="main.php" class="text-dark-1 a-1 my-auto ml-4">
					Главная
				</a>
				<?php 
					if ($user['performed'] != 0) {
						# code...
						echo '<form action="mytask.php" class="ml-4 my-auto " method="GET">
					<button class="btn btn-green text-white">
						Моя задача
					</button>
				</form>';
					}
					else echo '<button class="btn btn-green text-white my-auto ml-4">
						Моя задача
					</button>';
				 ?>
			</div>
		</div>
	</div>
	<div class= "row pl-3 pr-3">
		<?php 
			for ($i=0; $i < $num; $i++) { 
				# code...
				echo '<div class="col-3 mt-4 ">
					 	<div class="col-12 bg-yellow shadow-sm rounded pt-2">
					 		<h4 class="text-center text-white">'.$str[$i]['name'].'</h4>
					 		<div class=" row bg-light rounded border-yellow">
					 			<div class="col-12 pt-2 pb-3">
					 				<p class="mb-2">'.$str[$i]['description'].'</p>
							 		<p class="mb-2">
							 			Баллов за задачу: '.$str[$i]['points'].'
							 		</p>
							 		<p class="mb-2">
							 			Срок сдачи: '; if ($str[$i]['deadline']>$date) {
							 				# code...
							 				echo $str[$i]['deadline'];
							 			}
							 			else echo 'Истек';
							 			 echo '
							 		</p>
							 		<p class="mb-2">
							 			Выполняет: '.$str[$i]['performedBy'].'
							 		</p>
							 		<p class="mb-2">
							 			Ссылка на документ: <a href="'.$str[$i]['link'].'">'.$str[$i]['link'].'</a>
							 		</p>
							 		<p class="mb-2">
							 			Комментарий: '.$str[$i]['comment'].'
							 		</p>';
				 if ($str[$i]['link']!='Отсутствует' || $str[$i]['comment']!='Отсутствует') {
				 	# code...
				 	echo 			'<form action="deletetask.php" method="GET">
									 	<input class="d-none" type="" name="performed" value="'.$str[$i]['ID'].'">
									 	<input class="d-none" type="" name="performedBy" value="'.$str[$i]['performedBy'].'">
									 	<button class="btn btn-gray text-white mt-1">
											Поставить баллы
										</button>
									 </form>';
					echo 			'<form action="updatetask.php" method="GET">
									 	<input class="d-none" type="" name="performed" value="'.$str[$i]['ID'].'">
									 	<button class="btn btn-gray text-white mt-3 mb-2">
											Возобновить задачу
										</button>
									 </form>';
				 }
				 else if($str[$i]['performedBy']=='Никто' && $date<$str[$i]['deadline']){
				 	echo 			'
									 <div class="input-group">
									 	<form action="give-task.php" method="GET">
											<select name="login" class="mt-1 custom-select" id="inputGroupSelect04" aria-label="Example select with button addon">
											    <option selected>Выберите...</option>';
											    for($j=1;$j<$nu;$j++){
											    	if ($users[$j]['performed']==0) {
											    		# code...
											    		echo '<option value="'.$users[$j]['login'].'">'.$users[$j]['login'].'</option>';
											    	}
											    }
									echo    '</select>
											<input class="d-none" type="" name="ID" value="'.$str[$i]['ID'].'">
											<button class="btn btn-gray text-white mt-3 mb-2" type="">Поручить</button>
										</form>
									</div>
									 ';
				 }
					 		echo '<form action="deletetask2.php" method="GET">
									 	<input class="d-none" type="" name="performed" value="'.$str[$i]['ID'].'">
									 	<input class="d-none" type="" name="performedBy" value="'.$str[$i]['performedBy'].'">
									 	<button class="btn btn-gray text-white mt-1">
											Удалить
										</button>
									 </form>
								</div>
					 		</div>
					 	</div>
					 </div>';
			}
			
		 ?>
	</div>
	<div class="col-6 mt-4 mx-auto bg-light shadow-sm pt-3 pb-3">
		<form action="insert-task.php" method="GET">
			<input type="text" name="name" placeholder="Название" class="form-control mb-3">
			<textarea type="text" name="description" placeholder="Описание" class="form-control mb-3" style="height: 160px;"></textarea>
			<input type="text" name="points" placeholder="Баллов за задачу" class="form-control mb-3">
			<input type="text" name="deadline" placeholder="Срок сдачи: YYYY-MM-DD HH:MM" class="form-control mb-3">
			<button class="btn btn-success">Добавить задачу</button>
		</form>
	</div>
		 <script src="https://apps.elfsight.com/p/platform.js" defer></script> <div class="elfsight-app-180dc20f-a32d-4e49-930c-5d111a95ed47"></div>
 </body>
 </html>
 <?php 
 	if ($user['performed'] == 0) {
 		# code...
 		echo "<script language='javascript'>
 	let mytask = document.querySelector('.btn-green');
 	mytask.onclick = function(){
 		alert('Вы ещё не выбрали задачу');
 	}
 </script>";
 	}
  ?>
 