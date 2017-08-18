<?php
	$uname = 'root';
	$pass = '';
	$host = 'localhost';
	$db = 'hng';

	$dsn = "mysql:host=$host;dbname=$db";

	try {

		$con = new PDO($dsn, $uname, $pass);
	} catch(PDOException $e) {
		header('HTTP/1.1 500 Database Error');
		exit;
	}

	if(!$con) {
		die('Coulld not Connect to Database.');
	}

	$res = $con->query('SELECT * FROM hng_users ORDER BY id');

	$users = $res->fetchAll(PDO::FETCH_OBJ);
	

	foreach ($users as $key => $user) {
		echo $user->id  . ' | ' . $user->name . ' | ' . $user->school . ' | ' . $user->username . '<br/>';
	}