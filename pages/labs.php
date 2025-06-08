<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
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

// Set character encoding
$conn->set_charset("utf8mb4");

// Fetch data for the bar chart
$chart_data = [];
$result = $conn->query("
    SELECT 
        SUM(CASE WHEN operational = 'yes' THEN 1 ELSE 0 END) AS operational_count,
        SUM(CASE WHEN operational = 'no' THEN 1 ELSE 0 END) AS non_operational_count
    FROM lab_inventory
");

if ($result) {
    $chart_data = $result->fetch_assoc();
}

// Fetch all data for the table
$table_data = $conn->query("SELECT * FROM lab_inventory ORDER BY upload_date DESC");

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Inventory Management</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-10">
        <h1 class="text-2xl font-bold text-center mb-5">Lab Inventory Management</h1>

        <!-- Bar Chart -->
        <div class="mt-10 w-1/2 mx-auto">
            <canvas id="inventoryChart"></canvas>
        </div>

        <!-- Table -->
        <div class="mt-10">
            <h2 class="text-xl font-bold mb-4">Inventory Data</h2>
            <table class="table-auto w-full bg-white rounded shadow-lg">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2">Equipment Name</th>
                        <th class="px-4 py-2">Description</th>
                        <th class="px-4 py-2">Manual Available</th>
                        <th class="px-4 py-2">Operational</th>
                        <th class="px-4 py-2">Calibration Date</th>
                        <th class="px-4 py-2">Next Calibration Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $table_data->fetch_assoc()): ?>
                        <tr class="border-t">
                            <td class="px-4 py-2"><?= htmlspecialchars($row['equipment_name']) ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($row['description']) ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($row['manual_available']) ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($row['operational']) ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($row['calibration_date']) ?></td>
                            <td class="px-4 py-2"><?= htmlspecialchars($row['next_calibration_date']) ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Bar chart configuration
        const ctx = document.getElementById('inventoryChart').getContext('2d');
        const inventoryChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Operational', 'Non-Operational'], // Updated X-axis
                datasets: [
                    {
                        label: 'Equipment Count',
                        data: [
                            <?= $chart_data['operational_count'] ?? 0 ?>, 
                            <?= $chart_data['non_operational_count'] ?? 0 ?>
                        ],
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.6)', // Operational
                            'rgba(255, 99, 132, 0.6)'  // Non-Operational
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)', // Operational
                            'rgba(255, 99, 132, 1)'  // Non-Operational
                        ],
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Operational Status', // Updated X-axis label
                            font: {
                                size: 14
                            }
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Count of Equipment', // Updated Y-axis label
                            font: {
                                size: 14
                            }
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        labels: {
                            font: {
                                size: 12
                            }
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
