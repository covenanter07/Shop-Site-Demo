
<?php

require __DIR__ . '/../vendor/autoload.php'; // Ensure the path to autoload is correct

// Note: Remove dotenv loading as we're using Zeabur environment variables
//$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
//$dotenv->load();

$host = $_ENV['MYSQL_HOST'];
$username = $_ENV['MYSQL_USERNAME'];
$password = $_ENV['MYSQL_PASSWORD'];
$database = $_ENV['MYSQL_DATABASE'];
$port = $_ENV['MYSQL_PORT'] ?? 3306; // Use 3306 as default if MYSQL_PORT is not set

$con = mysqli_connect($host, $username, $password, $database, $port);

if (!$con) {
    die("Connection Failed:" . mysqli_connect_error());
}


