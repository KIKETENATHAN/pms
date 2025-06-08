<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .loading-spinner {
      border: 4px solid transparent;
      border-top: 4px solid #4F46E5; /* Blue */
      border-radius: 50%;
      width: 24px;
      height: 24px;
      animation: spin 1s linear infinite;
    }

    @keyframes spin {
      from {
        transform: rotate(0deg);
      }
      to {
        transform: rotate(360deg);
      }
    }
  </style>
</head>
<body class="bg-gray-100">

<div class="flex h-screen overflow-hidden">
  <!-- Sidebar -->
  <aside id="sidebar" class="bg-blue-600 text-white w-64 p-4 space-y-4 hidden md:block">
    <h2 class="text-xl font-bold">Admin Dashboard</h2>
    <button id="toggleSidebar" class="block md:hidden bg-blue-500 px-4 py-2 rounded">
      Close Sidebar
    </button>
    <ul class="space-y-2">
      <?php
        $sections = [
          "departments" => "Departments",
          "reports" => "Reports",
          "procurement" => "Procurement",
          "registry" => "Registry",
          "dp_academics" => "DP Academics",
          "dp_admin" => "DP Admin",
          "accommodations" => "Accommodations"
        ];

        foreach ($sections as $key => $label) {
          echo "<li><a href='{$key}.php' class='w-full block text-left hover:bg-blue-700 p-2' data-section='{$key}'>{$label}</a></li>";
        }
      ?>
    </ul>
      <button class="w-full block text-left bg-blue-700 p-2 rounded" id="addDeputyBtn">Add Deputy</button>
   
    <a href="logout.php">Logout</a>
  </aside>

  <!-- Main Content -->
  <div class="flex-1 flex flex-col">
    <header class="bg-blue-600 text-white px-4 py-3 flex justify-between items-center">
      <h1 class="text-lg font-bold">Manage Institution</h1>
      <button id="hamburger" class="block md:hidden">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
      </button>
    </header>
    <main id="mainContent" class="p-4 overflow-y-auto">
      <div class="text-center text-gray-500">Select an option from the sidebar.</div>

      <!-- Display user data 
      <div id="userInfo" class="p-4 bg-white rounded-lg shadow-lg mb-4">
        <h3 class="text-xl font-bold">Welcome, <span id="name"></span></h3>
        <p>Phone Number: <span id="phone_number"></span></p>
        <p>Role: <span id="role"></span></p>
      </div>-->

      <section class="flex justify-center items-center flex-grow">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <!-- Card 1 -->
          <div class="bg-white p-6 rounded-2xl shadow-lg transform hover:-translate-y-2 transition-transform duration-300">
            <h3 class="text-lg font-bold mb-2 text-gray-800">Seamless Data Management</h3>
            <p class="text-gray-600">Manage all your records electronically with secure, centralized storage that eliminates paper clutter.</p>
            <div class="mt-4 flex justify-end">
              <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors duration-300">Learn More</button>
            </div>
          </div>

          <!-- Card 2 -->
          <div class="bg-white p-6 rounded-2xl shadow-lg transform hover:-translate-y-2 transition-transform duration-300">
            <h3 class="text-lg font-bold mb-2 text-gray-800">Real-Time Collaboration</h3>
            <p class="text-gray-600">Collaborate effortlessly with teams in real-time, sharing updates and accessing data from anywhere.</p>
            <div class="mt-4 flex justify-end">
              <button class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition-colors duration-300">Explore Features</button>
            </div>
          </div>

          <!-- Card 3 -->
          <div class="bg-white p-6 rounded-2xl shadow-lg transform hover:-translate-y-2 transition-transform duration-300">
            <h3 class="text-lg font-bold mb-2 text-gray-800">Eco-Friendly Solution</h3>
            <p class="text-gray-600">Adopt a sustainable approach by reducing paper usage and promoting a greener environment.</p>
            <div class="mt-4 flex justify-end">
              <button class="bg-purple-500 text-white px-4 py-2 rounded-lg hover:bg-purple-600 transition-colors duration-300">Get Started</button>
            </div>
          </div>
        </div>
      </section>
    </main>
    
    <!-- Modal for Adding Deputy -->
    <div id="addDeputyModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
      <div class="bg-white rounded-lg shadow-lg w-96">
        <div class="p-4 border-b">
          <h2 class="text-lg font-bold">Add Deputy</h2>
        </div>
        <form action="add_deputy.php" method="POST" class="p-4">
          <div class="mb-4">
            <label for="name" class="block text-sm font-medium">Name</label>
            <input type="text" name="name" id="name" required class="w-full border rounded p-2">
          </div>
          <div class="mb-4">
            <label for="email" class="block text-sm font-medium">Email</label>
            <input type="email" name="email" id="email" required class="w-full border rounded p-2">
          </div>
          <div class="mb-4">
            <label for="phone_number" class="block text-sm font-medium">Phone Number</label>
            <input type="tel" name="phone_number" id="phone_number" required class="w-full border rounded p-2">
          </div>
          <div class="mb-4">
            <label for="role" class="block text-sm font-medium">Role</label>
            <select name="role" id="role" required class="w-full border rounded p-2">
              <option value="deputyadmin">Deputy Admin</option>
              <option value="deputyacademics">Deputy Academics</option>
            </select>
          </div>
          <div class="mb-4">
            <label for="password" class="block text-sm font-medium">Password</label>
            <input type="password" name="password" id="password" required class="w-full border rounded p-2">
          </div>
          <div class="flex justify-end space-x-2">
            <button type="button" id="closeModal" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Add</button>
          </div>
        </form>
      </div>
    </div>

    <!-- Footer -->
    <footer class="mt-10 p-4 bg-blue-900 text-white text-center rounded-lg">
      <p>&copy; 2025 TvetPrime. All Rights Reserved.</p>
    </footer>
  </div>
</div>

<!-- JavaScript -->
<script>
  const addDeputyBtn = document.getElementById('addDeputyBtn');
  const addDeputyModal = document.getElementById('addDeputyModal');
  const closeModal = document.getElementById('closeModal');
  const userInfo = document.getElementById('userInfo');
  const userName = document.getElementById('userName');
  const userPhoneNumber = document.getElementById('userPhoneNumber');
  const userRole = document.getElementById('userRole');

  // Display user info
  document.addEventListener("DOMContentLoaded", function() {
    // Fetch user data (example)
    fetch('get_user_data.php') // Assuming you have a PHP script to fetch user data
      .then(response => response.json())
      .then(data => {
        userName.textContent = data.username;
        userPhoneNumber.textContent = data.phone_number;
        userRole.textContent = data.role;
      });
  });

  addDeputyBtn.addEventListener('click', () => {
    addDeputyModal.classList.remove('hidden');
  });

  closeModal.addEventListener('click', () => {
    addDeputyModal.classList.add('hidden');
  });
</script>

</body>
</html>
