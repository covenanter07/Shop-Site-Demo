
<?php

require __DIR__ . '/../vendor/autoload.php'; // Ensure the path to autoload is correct

// Load environment variables from the .env file
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();


$host = $_ENV['DB_HOST'];
$username = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];
$database = $_ENV['DB_DATABASE'];

$con = mysqli_connect($host, $username, $password, $database);

if (!$con) {
    die("Connection Failed:" . mysqli_connect_error());
}


