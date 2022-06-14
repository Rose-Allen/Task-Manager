<?php

function debug($item){
    echo "<pre>";
    print_r($item);
    echo "</pre>";
}

$host = 'localhost';
$root = 'root';
$password = '';
$db_name = 'testing';
$dsn = "mysql::host=$host;dbname=$db_name;";
$pdo = new PDO($dsn,$root,$password);





