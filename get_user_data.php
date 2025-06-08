<?php
session_start();
// Assuming you have user data stored in the session after login
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    // Fetch user data from database
    $conn = new mysqli('localhost', 'username', 'password', 'database');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT name, phone_number, role FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        echo json_encode($user); // Return user data as JSON
    } else {
        echo json_encode(["error" => "User not found"]);
    }
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(["error" => "No user logged in"]);
}
?>
