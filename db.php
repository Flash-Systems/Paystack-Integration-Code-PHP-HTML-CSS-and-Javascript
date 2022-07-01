<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "payment";


//set the data source

$dsn = "mysql:host=".$host.";dbname=";
//Creating the pdo instance
$pdo = new PDO($dsn, $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
?>