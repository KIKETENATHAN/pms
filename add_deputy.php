<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db_connection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the POST data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number']; // Fix for "phone_number" field
    $department = $_POST['department'];
    $role = $_POST['role']; // Get the role value from the form
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Prepare the SQL statement to insert data
    $sql = "INSERT INTO users (name, email, phone_number, department, password, role) 
            VALUES (?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        // Bind the parameters (note: "ssssss" for 6 parameters, all strings)
        $stmt->bind_param("ssssss", $name, $email, $phone_number, $department, $password, $role);

        // Execute the statement
        if ($stmt->execute()) {
            echo "<script>alert('Deputy added successfully'); window.location.href='admin.php';</script>";
        } else {
            echo "<script>alert('Error adding deputy: {$stmt->error}'); window.history.back();</script>";
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "<script>alert('Error preparing the statement'); window.history.back();</script>";
    }

    // Close the connection
    $conn->close();
}
?>
