<?php
$server = 'localhost';
$user = 'root';
$pass = '1234';
$dbName = 'transporte';

try{
	$pdo = new PDO('mysql:host='.$server.';dbname='.$dbName, $user, $pass);
    $pdo->exec("SET CHARACTER SET utf-8");
	$pdo->exec("SET lc_time_names = 'es_ES'");
}catch (PDOException $e) {
	echo "Error!: " . $e->getMessage() . "<br/>";
	die();
}