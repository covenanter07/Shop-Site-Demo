<?php

require __DIR__ . '/../vendor/autoload.php';

// 讀取環境變數
$host = getenv('DB_HOST');
$username = getenv('DB_USERNAME');
$password = getenv('DB_PASSWORD');
$database = getenv('DB_DATABASE');

// 連接 MySQL
$con = mysqli_connect($host, $username, $password, $database);

if (!$con) {
    die("Connection Failed: " . mysqli_connect_error());
}
?>

