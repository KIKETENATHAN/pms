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
    $name = $_POST['sectionName'];
    $head = $_POST['headName'];
    $phone = $_POST['phoneNumber'];
    $email = $_POST['emailAddress'];
    $students = $_POST['studentCount'];

    $stmt = $conn->prepare("INSERT INTO sections (name, head, phone, email, students) VALUES (?, ?, ?, ?, ?)");
    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("ssssi", $name, $head, $phone, $email, $students);

    if ($stmt->execute()) {
        header("Location: sections.php");
        exit;
    } else {
        echo "<div style='color: red; font-weight: bold;'>Error inserting data: " . $stmt->error . "</div>";
    }
    $stmt->close();
}

$sections = $conn->query("SELECT * FROM sections");
if (!$sections) {
    die("Error fetching sections: " . $conn->error);
}

// Fetch data for the pie chart
$chartData = $conn->query("SELECT name, students FROM sections");
$sectionNames = [];
$studentCounts = [];
while ($row = $chartData->fetch_assoc()) {
    $sectionNames[] = $row['name'];
    $studentCounts[] = $row['students'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Section Management</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    #formModal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      justify-content: center;
      align-items: center;
    }
    #formModal.active {
      display: flex;
    }
  </style>
</head>
<body class="bg-blue-100 p-6">

  <div class="container mx-auto max-w-4xl">
    <h1 class="text-2xl font-bold text-blue-800 mb-4">Section Management</h1>

    <!-- Trigger Button for Form -->
    <button onclick="openModal()" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700">
      Add Section
    </button>

    <!-- Form Modal -->
    <div id="formModal">
      <form method="POST" class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg">
        <h2 class="text-lg font-bold text-blue-700 mb-4">Add Section Information</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <div>
            <label for="sectionName" class="block text-blue-900 font-medium mb-1">Section Name</label>
            <input id="sectionName" name="sectionName" type="text" class="w-full p-2 border border-blue-300 rounded" required />
          </div>
          <div>
            <label for="headName" class="block text-blue-900 font-medium mb-1">Head of Section</label>
            <input id="headName" name="headName" type="text" class="w-full p-2 border border-blue-300 rounded" required />
          </div>
          <div>
            <label for="phoneNumber" class="block text-blue-900 font-medium mb-1">Phone Number</label>
            <input id="phoneNumber" name="phoneNumber" type="tel" class="w-full p-2 border border-blue-300 rounded" required />
          </div>
          <div>
            <label for="emailAddress" class="block text-blue-900 font-medium mb-1">Email Address</label>
            <input id="emailAddress" name="emailAddress" type="email" class="w-full p-2 border border-blue-300 rounded" required />
          </div>
          <div>
            <label for="studentCount" class="block text-blue-900 font-medium mb-1">Number of Students</label>
            <input id="studentCount" name="studentCount" type="number" class="w-full p-2 border border-blue-300 rounded" required />
          </div>
        </div>
        <div class="flex justify-end mt-4">
          <button type="button" onclick="closeModal()" class="bg-gray-400 text-white px-4 py-2 rounded shadow hover:bg-gray-500 mr-2">Cancel</button>
          <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700">Save Section</button>
        </div>
      </form>
    </div>

    <!-- Sections Table -->
    <div class="bg-blue-50 p-4 rounded-lg shadow-lg mt-6">
      <h2 class="text-lg font-bold text-blue-700 mb-2">Sections</h2>
      <table class="w-full table-auto text-left border-collapse">
        <thead>
          <tr class="bg-blue-200 text-blue-900">
            <th class="p-2">Section Name</th>
            <th class="p-2">Head</th>
            <th class="p-2">Phone</th>
            <th class="p-2">Email</th>
            <th class="p-2">No. of Students</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($section = $sections->fetch_assoc()): ?>
            <tr class="border-b bg-blue-50 hover:bg-blue-100 text-blue-900">
              <td class="p-2"><?= htmlspecialchars($section['name']) ?></td>
              <td class="p-2"><?= htmlspecialchars($section['head']) ?></td>
              <td class="p-2"><?= htmlspecialchars($section['phone']) ?></td>
              <td class="p-2"><?= htmlspecialchars($section['email']) ?></td>
              <td class="p-2"><?= htmlspecialchars($section['students']) ?></td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>

    <!-- Pie Chart Section -->
    <div class="bg-blue-50 p-4 rounded-lg shadow-lg mt-6">
      <h2 class="text-lg font-bold text-blue-700 mb-4">Section Student Distribution</h2>
      <div class="w-1/2 mx-auto">
        <canvas id="sectionChart"></canvas>
      </div>
    </div>
  </div>

  <script>
    function openModal() {
      document.getElementById('formModal').classList.add('active');
    }

    function closeModal() {
      document.getElementById('formModal').classList.remove('active');
    }

    // Chart.js Pie Chart
    const sectionChartCtx = document.getElementById('sectionChart').getContext('2d');
    const sectionChart = new Chart(sectionChartCtx, {
      type: 'pie',
      data: {
        labels: <?= json_encode($sectionNames) ?>,
        datasets: [{
          label: 'Number of Students',
          data: <?= json_encode($studentCounts) ?>,
          backgroundColor: [
            '#1E3A8A', '#2563EB', '#3B82F6', '#60A5FA', '#93C5FD'
          ],
          borderColor: '#ffffff',
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'top',
          },
        }
      }
    });
  </script>
</body>
</html>
