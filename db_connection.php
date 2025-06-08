<?php
$servername = "localhost"; // Replace with your server name or IP
$username = "qfmnqxie_paperless"; // Replace with your database username
$password = "Paperless@2025"; // Replace with your database password
$database = "qfmnqxie_tvet_system"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
