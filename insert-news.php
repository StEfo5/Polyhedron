<?php
	$con = mysqli_connect('127.0.0.1', 'root', '', 'User');
	$q = mysqli_query($con, "SELECT * FROM  User1");
	$user1 = $q -> fetch_assoc();
	$connect = mysqli_connect("127.0.0.1", "root", '', $user1['company']);
	$query = mysqli_query($connect, "INSERT INTO news (title, article, author) VALUES ('{$_GET['title']}', '{$_GET['article']}', '{$_GET['author']}')");
	$insert_news_query = mysqli_query($connect, $query);
	header('Location: news.php');
?>