<?php
// Database connection
$host = "localhost";
$db_name = "qfmnqxie_tvet_system";
$username = "qfmnqxie_paperless";
$password = "Paperless@2025";

$conn = new mysqli($host, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $course = $_POST['course'];
    $level = $_POST['highestLevel'];
    $employee_no = $_POST['employeeNo'];
    $phone = $_POST['phoneNumber'];
    $email = $_POST['emailAddress'];
    $section = $_POST['section'];

    // Insert data into trainers table
    $stmt = $conn->prepare("INSERT INTO trainers (name, course, highest_level, employee_no, phone, email, section) VALUES (?, ?, ?, ?, ?, ?, ?)");
    if ($stmt) {
        $stmt->bind_param("sssssss", $name, $course, $level, $employee_no, $phone, $email, $section);
        $stmt->execute();
        $stmt->close();
    } else {
        echo "<div style='color: red; font-weight: bold;'>Error: " . $conn->error . "</div>";
    }
}

// Fetch trainers data from the database
$result = $conn->query("SELECT * FROM trainers");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainers Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // Open and close popover form
        function toggleForm() {
            const form = document.getElementById('popover-form');
            form.classList.toggle('hidden');
        }
    </script>
</head>
<body class="bg-gray-100 p-6">
    <div class="container mx-auto max-w-6xl">
        <h1 class="text-3xl font-bold text-blue-800 mb-6">Trainers Management</h1>

        <!-- Button to open form -->
        <button onclick="toggleForm()" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700">
            Add Trainer
        </button>

        <!-- PopoverForm -->
        <div id="popover-form" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <div class="bg-white rounded-lg shadow-lg w-96 max-h-screen overflow-y-auto p-6">
                <h2 class="text-xl font-bold text-blue-700 mb-4">Add Trainer Information</h2>
                <form method="POST">
                    <div class="mb-4">
                        <label for="name" class="block text-blue-900 font-medium mb-1">Name</label>
                        <input id="name" name="name" type="text" class="w-full p-2 border border-blue-300 rounded" required />
                    </div>
                    <div class="mb-4">
                        <label for="course" class="block text-blue-900 font-medium mb-1">Course</label>
                        <input id="course" name="course" type="text" class="w-full p-2 border border-blue-300 rounded" required />
                    </div>
                    <div class="mb-4">
                        <label for="highestLevel" class="block text-blue-900 font-medium mb-1">Highest Level of Education</label>
                        <input id="highestLevel" name="highestLevel" type="text" class="w-full p-2 border border-blue-300 rounded" required />
                    </div>
                    <div class="mb-4">
                        <label for="employeeNo" class="block text-blue-900 font-medium mb-1">Employee No.</label>
                        <input id="employeeNo" name="employeeNo" type="text" class="w-full p-2 border border-blue-300 rounded" required />
                    </div>
                    <div class="mb-4">
                        <label for="phoneNumber" class="block text-blue-900 font-medium mb-1">Phone Number</label>
                        <input id="phoneNumber" name="phoneNumber" type="tel" class="w-full p-2 border border-blue-300 rounded" required />
                    </div>
                    <div class="mb-4">
                        <label for="emailAddress" class="block text-blue-900 font-medium mb-1">Email Address</label>
                        <input id="emailAddress" name="emailAddress" type="email" class="w-full p-2 border border-blue-300 rounded" required />
                    </div>
                    <div class="mb-4">
                        <label for="section" class="block text-blue-900 font-medium mb-1">Section</label>
                        <input id="section" name="section" type="text" class="w-full p-2 border border-blue-300 rounded" required />
                    </div>
                    <div class="flex justify-between">
                        <button type="button" onclick="toggleForm()" class="bg-gray-400 text-white px-4 py-2 rounded shadow hover:bg-gray-500">Cancel</button>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700">Save</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Trainers Table -->
        <div class="mt-6 bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-xl font-bold text-blue-700 mb-4">Trainers</h2>
            <table class="w-full table-auto border-collapse">
                <thead>
                    <tr class="bg-blue-200 text-blue-900">
                        <th class="p-2 border">Name</th>
                        <th class="p-2 border">Course</th>
                        <th class="p-2 border">Highest Level of Education</th>
                        <th class="p-2 border">Employee No.</th>
                        <th class="p-2 border">Phone</th>
                        <th class="p-2 border">Email</th>
                        <th class="p-2 border">Section</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="p-2 border"><?= htmlspecialchars($row['name']) ?></td>
                            <td class="p-2 border"><?= htmlspecialchars($row['course']) ?></td>
                            <td class="p-2 border"><?= htmlspecialchars($row['highest_level']) ?></td>
                            <td class="p-2 border"><?= htmlspecialchars($row['employee_no']) ?></td>
                            <td class="p-2 border"><?= htmlspecialchars($row['phone']) ?></td>
                            <td class="p-2 border"><?= htmlspecialchars($row['email']) ?></td>
                            <td class="p-2 border"><?= htmlspecialchars($row['section']) ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
