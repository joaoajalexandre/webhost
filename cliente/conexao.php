<?php 

	
$host = 'localhost';
$dbname = 'dbwebhost';
$user = 'root';
$password = '';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $password);
 ?>