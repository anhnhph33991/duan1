<?php

$host = DB_HOST;
$dbname = DB_NAME;
$user = DB_USER;
$pass = DB_PASS;


try {
	// db postgres
	// $connect = new PDO("pgsql:host=$host;dbname=$dbname", $user, $pass);
	// db mysql
	$connect = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
	debug('Connect Faild ' . $e->getMessage());
}
