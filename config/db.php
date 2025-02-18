<?php

require __DIR__ . '/../vendor/autoload.php'; // Ensure the path to autoload is correct

// Load environment variables from the .env file (only in local development)
if (file_exists(__DIR__ . '/../.env')) {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
    $dotenv->load();
}

// Read the environment variables
$host = getenv('DB_HOST') ?: $_ENV['DB_HOST'] ?? 'hkg1.clusters.zeabur.com';  // Fallback to localhost if not found
$username = getenv('DB_USERNAME') ?: $_ENV['DB_USERNAME'] ?? 'root';
$password = getenv('DB_PASSWORD') ?: $_ENV['DB_PASSWORD'] ?? 'wsYfAS7013BxzU98CXVTIO45HFEL6p2M';
$database = getenv('DB_DATABASE') ?: $_ENV['DB_DATABASE'] ?? 'zeabur';

// Create the MySQL connection
$con = mysqli_connect($host, $username, $password, $database);

if (!$con) {
    die("Connection Failed: " . mysqli_connect_error());
}

echo "✅ 連線成功！";

