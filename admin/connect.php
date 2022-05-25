<?php 

$dsn = 'mysql:host=localhost; dbname=elzeroecommerce';
$username = 'root';
$password = '';
$option = [
    PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8',
];

try{
    $conn = new PDO($dsn, $username, $password, $option);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    echo "Failed to connect" . $e->getMessage();
    die();
}



