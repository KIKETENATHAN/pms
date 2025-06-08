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

// Fetch data from the database
function fetchTableData($conn, $tableName) {
    $query = "SELECT * FROM $tableName";
    $result = $conn->query($query);
    $data = [];
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    return $data;
}

$labInventory = fetchTableData($conn, 'lab_inventory');
$staff = fetchTableData($conn, 'staff');
$trainers = fetchTableData($conn, 'trainers');
$sections = fetchTableData($conn, 'sections');

// Convert data to JSON for JavaScript usage
$labInventoryJson = json_encode($labInventory);
$staffJson = json_encode($staff);
$trainersJson = json_encode($trainers);
$sectionsJson = json_encode($sections);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-r from-blue-100 via-blue-200 to-blue-300 min-h-screen flex flex-col">

<div class="container mx-auto py-6 flex-grow">
    <h1 class="text-4xl font-bold text-center text-blue-800 mb-8">Departmental Summaries</h1>

    <!-- Lab Inventory Section -->
    <div class="my-6">
        <h2 class="text-2xl font-bold text-blue-700 mb-4">Lab Inventory</h2>
        <div class="overflow-x-auto">
            <table class="table-auto w-full bg-white shadow-md rounded">
                <thead>
                    <tr class="bg-blue-300">
                        <?php foreach (array_keys($labInventory[0] ?? []) as $key): ?>
                            <th class="px-4 py-2 text-blue-800 font-semibold"><?php echo ucfirst($key); ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($labInventory as $row): ?>
                        <tr>
                            <?php foreach ($row as $value): ?>
                                <td class="border px-4 py-2 text-blue-700"><?php echo htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Staff Section -->
    <div class="my-6">
        <h2 class="text-2xl font-bold text-blue-700 mb-4">Staff</h2>
        <div class="overflow-x-auto">
            <table class="table-auto w-full bg-white shadow-md rounded">
                <thead>
                    <tr class="bg-blue-300">
                        <?php foreach (array_keys($staff[0] ?? []) as $key): ?>
                            <th class="px-4 py-2 text-blue-800 font-semibold"><?php echo ucfirst($key); ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($staff as $row): ?>
                        <tr>
                            <?php foreach ($row as $value): ?>
                                <td class="border px-4 py-2 text-blue-700"><?php echo htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Trainers Section -->
    <div class="my-6">
        <h2 class="text-2xl font-bold text-blue-700 mb-4">Trainers</h2>
        <div class="overflow-x-auto">
            <table class="table-auto w-full bg-white shadow-md rounded">
                <thead>
                    <tr class="bg-blue-300">
                        <?php foreach (array_keys($trainers[0] ?? []) as $key): ?>
                            <th class="px-4 py-2 text-blue-800 font-semibold"><?php echo ucfirst($key); ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($trainers as $row): ?>
                        <tr>
                            <?php foreach ($row as $value): ?>
                                <td class="border px-4 py-2 text-blue-700"><?php echo htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Sections Section -->
    <div class="my-6">
        <h2 class="text-2xl font-bold text-blue-700 mb-4">Sections</h2>
        <div class="overflow-x-auto">
            <table class="table-auto w-full bg-white shadow-md rounded">
                <thead>
                    <tr class="bg-blue-300">
                        <?php foreach (array_keys($sections[0] ?? []) as $key): ?>
                            <th class="px-4 py-2 text-blue-800 font-semibold"><?php echo ucfirst($key); ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sections as $row): ?>
                        <tr>
                            <?php foreach ($row as $value): ?>
                                <td class="border px-4 py-2 text-blue-700"><?php echo htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-blue-800 text-white py-4 text-center mt-auto">
    &copy; 2025 TVETPrime. All rights reserved.
</footer>

<script>
    const labInventoryData = <?php echo $labInventoryJson; ?>;
    const staffData = <?php echo $staffJson; ?>;
    const trainersData = <?php echo $trainersJson; ?>;
    const sectionsData = <?php echo $sectionsJson; ?>;

   
</script>

</body>
</html>
