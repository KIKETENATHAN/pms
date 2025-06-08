<?php
$host = "localhost";
$db_name = "qfmnqxie_tvet_system";
$username = "qfmnqxie_paperless";
$password = "Paperless@2025";

$conn = new mysqli($host, $username, $password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

header('Content-Type: application/json');

$course = $_POST['course'] ?? '';
if ($course) {
    $stmt = $conn->prepare("SELECT * FROM admissions WHERE course = ?");
    $stmt->bind_param("s", $course);
    $stmt->execute();
    $result = $stmt->get_result();

    $students = [];
    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }

    echo json_encode($students);
    $stmt->close();
}

$conn->close();
