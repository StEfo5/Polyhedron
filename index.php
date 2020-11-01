<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>логин</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link href="style.css" rel="stylesheet">
</head>
<body>
	<div class="bg-light shadow-sm">
		<div class="col-6 mx-auto">
			<div class="row ">
				<img src="img/icon.png" class="icon">
				<h2 class="my-auto mr-auto text-dark-1 ml-2">Polyhedron</h2>
			</div>
		</div>
	</div>
	<div class="col-6 ml-3 bg-white mx-auto">
		<form  action="user.php" method="GET">
			<h6 class="mt-3">
				Логин:
			</h6>
			<input class="form-control"  name="login">
				
			</input>
			<h6 class="mt-3">
				Пароль:
			</h6>
			<div class="form-group">
    			<input name="password" type="password" class="form-control" id="exampleInputPassword1">
  			</div>
			<h6 class="mt-3">
				Компания:
			</h6>
			<input class="form-control" name="company">
				
			</input>
			<button class="btn text-white mt-4 btn-green">
				Войти
			</button>
		</form>
	</div>
</body>
</html>