<?php
session_start();

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection
$servername = "localhost"; // Replace with your server name or IP
$username = "qfmnqxie_paperless"; // Replace with your database username
$password = "Paperless@2025"; // Replace with your database password
$database = "qfmnqxie_tvet_system"; // Replace with your database name

// Create a new MySQLi connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process login if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate if both fields are filled
    if (empty($email) || empty($password)) {
        $error = "Please enter both email and password.";
    } else {
        // Prepare the query to fetch user data by email
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email); // "s" stands for string
        $stmt->execute();
        $result = $stmt->get_result();
        
        // Check if user was found
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Verify the password
            if (password_verify($password, $user['password'])) {
                // Set session variables
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['role'] = $user['role'];

                // Redirect based on role
                if ($user['role'] == 'admin') {
                    header("Location: admin.php");
                    exit();
                } elseif ($user['role'] == 'trainer') {
                    header("Location: profile.php");
                    exit();
                } else {
                    header("Location: student_dashboard.php");
                    exit();
                }
            } else {
                $error = "Incorrect password.";
            }
        } else {
            $error = "No user found with that email.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
    <!-- FontAwesome for the login icon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-white flex justify-center items-center h-screen">

    <div class="w-full max-w-md bg-blue-600 text-white rounded-lg p-6 shadow-xl">
        <div class="flex justify-center mb-4">
            <!-- Login Icon -->
            <i class="fas fa-user-lock text-4xl mb-2"></i>
        </div>
        <h2 class="text-2xl font-semibold text-center mb-6">Login</h2>

        <!-- Display error message if invalid login -->
        <?php if (isset($error)): ?>
            <div class="text-red-500 text-center mb-4"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST" action="login.php">
            <div class="mb-4">
                <label for="email" class="block text-white">Email</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 text-black" required>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-white">Password</label>
                <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 text-black" required>
            </div>

            <div class="mb-4 flex justify-between">
                <a href="forgot_password.php" class="text-sm text-blue-200 hover:underline" id="forgotPasswordLink">Forgot Password?</a>
                <button type="submit" class="px-4 py-2 bg-blue-700 text-white rounded-md">Login</button>
            </div>
        </form>

        <!-- Footer -->
        <footer class="text-center text-sm text-gray-300 mt-8">
            <p>© 2025 TVETPrime. All rights reserved </p>
        </footer>
    </div>

   <!-- <script>
        document.getElementById('forgotPasswordLink').addEventListener('click', function() {
            alert('Password reset functionality not implemented yet.');
        });
    </script> -->
</body>
</html>
