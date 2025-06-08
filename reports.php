<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TVET Admissions Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex">
    <?php
    // Initialize error reporting
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    // Database connection
    $host = "localhost";
    $db_name = "qfmnqxie_tvet_system";
    $username = "qfmnqxie_paperless";
    $password = "Paperless@2025";

    $conn = new mysqli($host, $username, $password, $db_name);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Insert data into the admissions table
        $first_name = $_POST['first_name'];
        $second_name = $_POST['second_name'];
        $id_number = $_POST['id_number'];
        $department = $_POST['department'];
        $course = $_POST['course'];
        $gender = $_POST['gender'];
        $medical = $_POST['medical'];
        $age = $_POST['age'];

        $stmt = $conn->prepare("INSERT INTO admissions (first_name, second_name, id_number, department, course, gender, medical, age) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssi", $first_name, $second_name, $id_number, $department, $course, $gender, $medical, $age);
        $stmt->execute();
        $stmt->close();
    }

    // Fetch data for table and charts
    $result = $conn->query("SELECT * FROM admissions");
    $students = [];
    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }

    $course_data = $conn->query("SELECT course, COUNT(*) as count FROM admissions GROUP BY course");
    $courses = [];
    while ($row = $course_data->fetch_assoc()) {
        $courses[] = $row;
    }

    $gender_data = $conn->query("SELECT gender, COUNT(*) as count FROM admissions GROUP BY gender");
    $genders = [];
    while ($row = $gender_data->fetch_assoc()) {
        $genders[] = $row;
    }

    $conn->close();
    ?>

    <!-- Sidebar -->
    <aside class="bg-blue-600 text-white w-64 space-y-6 py-7 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out" id="sidebar">
        <a href="#" class="text-white text-2xl font-bold block px-4">Dashboard</a>
        <nav>
            <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700">Home</a>
            <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700">Admissions</a>
            <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-blue-700">Reports</a>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Header -->
        <header class="bg-blue-600 text-white py-4 px-4 flex justify-between items-center">
            <h1 class="text-xl font-bold">TVET Admissions Dashboard</h1>
            <button class="text-white md:hidden focus:outline-none" onclick="toggleSidebar()">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </header>

        <main class="p-4">
            <!-- Add Student Button -->
            <div class="mb-4">
                <button onclick="document.getElementById('formModal').classList.remove('hidden')" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Add Student</button>
            </div>

            <!-- Data Capture Form -->
            <div id="formModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                <div class="bg-white p-6 rounded shadow-md w-full max-w-md">
                    <h2 class="text-lg font-bold mb-4">Student Admission Form</h2>
                    <form method="POST" action="">
                        <div class="mb-2">
                            <label class="block font-bold">First Name</label>
                            <input type="text" name="first_name" class="border w-full p-2 rounded" required>
                        </div>
                        <div class="mb-2">
                            <label class="block font-bold">Second Name</label>
                            <input type="text" name="second_name" class="border w-full p-2 rounded" required>
                        </div>
                        <div class="mb-2">
                            <label class="block font-bold">ID Number</label>
                            <input type="text" name="id_number" class="border w-full p-2 rounded" required>
                        </div>
                        <div class="mb-2">
                            <label class="block font-bold">Department</label>
                            <input type="text" name="department" class="border w-full p-2 rounded" required>
                        </div>
                        <div class="mb-2">
                            <label class="block font-bold">Course Admitted</label>
                            <input type="text" name="course" class="border w-full p-2 rounded" required>
                        </div>
                        <div class="mb-2">
                            <label class="block font-bold">Gender</label>
                            <select name="gender" class="border w-full p-2 rounded" required>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label class="block font-bold">Medical Needs</label>
                            <select name="medical" class="border w-full p-2 rounded" required>
                                <option value="No">No</option>
                                <option value="Yes">Yes</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label class="block font-bold">Age</label>
                            <input type="number" name="age" class="border w-full p-2 rounded" required>
                        </div>
                        <div class="flex justify-end mt-4">
                            <button type="button" onclick="document.getElementById('formModal').classList.add('hidden')" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 mr-2">Cancel</button>
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Save</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Data Table -->
            <div class="overflow-x-auto bg-white rounded shadow-md p-4">
                <table class="w-full border-collapse border border-gray-200">
                    <thead>
                        <tr>
                            <th class="border p-2">First Name</th>
                            <th class="border p-2">Second Name</th>
                            <th class="border p-2">ID Number</th>
                            <th class="border p-2">Department</th>
                            <th class="border p-2">Course</th>
                            <th class="border p-2">Gender</th>
                            <th class="border p-2">Medical</th>
                            <th class="border p-2">Age</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($students as $student): ?>
                            <tr>
                                <td class="border p-2"><?php echo htmlspecialchars($student['first_name']); ?></td>
                                <td class="border p-2"><?php echo htmlspecialchars($student['second_name']); ?></td>
                                <td class="border p-2"><?php echo htmlspecialchars($student['id_number']); ?></td>
                                <td class="border p-2"><?php echo htmlspecialchars($student['department']); ?></td>
                                <td class="border p-2"><?php echo htmlspecialchars($student['course']); ?></td>
                                <td class="border p-2"><?php echo htmlspecialchars($student['gender']); ?></td>
                                <td class="border p-2"><?php echo htmlspecialchars($student['medical']); ?></td>
                                <td class="border p-2"><?php echo htmlspecialchars($student['age']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Charts -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
                <div class="bg-white p-4 rounded shadow-md">
                    <h3 class="text-lg font-bold mb-2">Courses Bar Chart</h3>
                    <canvas id="coursesChart"></canvas>
                </div>
                <div class="bg-white p-4 rounded shadow-md">
                    <h3 class="text-lg font-bold mb-2">Gender Pie Chart</h3>
                    <canvas id="genderChart"></canvas>
                </div>
            </div>
        </main>
    </div>
    <script>
        const sectionsData = <?php echo json_encode($sections); ?>;

        // Prepare data for chart
        const sectionLabels = sectionsData.map(section => section.name || `Section ${section.id}`);
        const sectionCapacities = sectionsData.map(section => parseInt(section.capacity || 0));

        // Render Sections Chart (Bar Chart)
        new Chart(document.getElementById('sectionsChart'), {
            type: 'bar',
            data: {
                labels: sectionLabels,
                datasets: [{
                    label: 'Capacity',
                    data: sectionCapacities,
                    backgroundColor: 'rgba(255, 206, 86, 0.6)',
                    borderColor: 'rgba(255, 206, 86, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    </script>
</body>
</html>
