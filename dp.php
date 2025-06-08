<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body class="bg-gray-100">
    <div class="flex flex-col lg:flex-row h-screen">
        <!-- Sidebar -->
        <aside class="bg-blue-900 text-white w-full lg:w-1/4 p-4" id="sidebar">
            <h1 class="text-2xl font-bold mb-4">Department</h1>
            <a href="dp.php?page=sections" class="btn text-white w-full text-left mb-2 font-bold">
                <i class="fas fa-book"></i> Sections
            </a>
            <a href="dp.php?page=courses" class="btn text-white w-full text-left mb-2 font-bold">
                <i class="fas fa-book"></i> Courses
            </a>
            <a href="dp.php?page=trainers" class="btn text-white w-full text-left mb-2 font-bold">
                <i class="fas fa-chalkboard-teacher"></i> Trainers
            </a>
            <a href="dp.php?page=classes" class="btn text-white w-full text-left mb-2 font-bold">
                <i class="fas fa-school"></i> Total Classes
            </a>
            <a href="dp.php?page=requisitions" class="btn text-white w-full text-left mb-2 font-bold">
                <i class="fas fa-file-alt"></i> Requisitions
            </a>
            <a href="dp.php?page=labs" class="btn text-white w-full text-left mb-2 font-bold">
                <i class="fas fa-flask"></i> Labs
            </a>
            <a href="dp.php?page=staff" class="btn text-white w-full text-left mb-2 font-bold">
                <i class="fas fa-users"></i> Non-Teaching Staff
            </a>
            <a href="dp.php?page=profile" class="btn text-white w-full text-left mb-2 font-bold">
                <i class="fas fa-user"></i> Profile
            </a>
        </aside>

        <!-- Main Content -->
           <main class="flex-1 bg-[url('/pages/logo.png')] bg-auto bg-center bg-no-repeat flex flex-col justify-between p-6 overflow-y-auto" id="main-content">
    <?php if (!isset($_GET['page'])): ?>
        <!-- Welcome Remarks -->
        <div id="welcome-message" class="text-center text-2xl font-bold mb-10"></div>

        <!-- Cards Section -->
        <section class="flex justify-center items-center flex-grow">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Card 1 -->
                <div class="bg-white p-6 rounded-2xl shadow-lg transform hover:-translate-y-2 transition-transform duration-300">
                    <h3 class="text-lg font-bold mb-2 text-gray-800">Seamless Data Management</h3>
                    <p class="text-gray-600">
                        Manage all your records electronically with secure, centralized storage that eliminates paper clutter.
                    </p>
                    <div class="mt-4 flex justify-end">
                        <button class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors duration-300">
                            Learn More
                        </button>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-white p-6 rounded-2xl shadow-lg transform hover:-translate-y-2 transition-transform duration-300">
                    <h3 class="text-lg font-bold mb-2 text-gray-800">Real-Time Collaboration</h3>
                    <p class="text-gray-600">
                        Collaborate effortlessly with teams in real-time, sharing updates and accessing data from anywhere.
                    </p>
                    <div class="mt-4 flex justify-end">
                        <button class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition-colors duration-300">
                            Explore Features
                        </button>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bg-white p-6 rounded-2xl shadow-lg transform hover:-translate-y-2 transition-transform duration-300">
                    <h3 class="text-lg font-bold mb-2 text-gray-800">Eco-Friendly Solution</h3>
                    <p class="text-gray-600">
                        Adopt a sustainable approach by reducing paper usage and promoting a greener environment.
                    </p>
                    <div class="mt-4 flex justify-end">
                        <button class="bg-purple-500 text-white px-4 py-2 rounded-lg hover:bg-purple-600 transition-colors duration-300">
                            Get Started
                        </button>
                    </div>
                </div>
            </div>
        </section>
    <?php else: ?>
        <?php
        $page = $_GET['page'];
        $file = "pages/{$page}.php";

        if (file_exists($file)) {
            include $file;
        } else {
            echo "<h2 class='text-xl font-bold'>Page not found</h2>";
        }
        ?>
    <?php endif; ?>

    <!-- Footer -->
    <footer class="mt-10 p-4 bg-blue-900 text-white text-center rounded-lg">
        <p>&copy; 2025 TvetPrime. All Rights Reserved.</p>
    </footer>
</main>

<!-- JavaScript for Animating Welcome Message -->
<script>
    const welcomeMessage = "Welcome to the Department Dashboard";
    const colors = ["#1E3A8A", "#2563EB", "#3B82F6", "#60A5FA", "#93C5FD"];
    const container = document.getElementById("welcome-message");

    let index = 0;

    function animateMessage() {
        if (index < welcomeMessage.length) {
            const letter = document.createElement("span");
            letter.textContent = welcomeMessage[index];
            letter.style.color = colors[index % colors.length];
            letter.style.fontWeight = "bold";
            container.appendChild(letter);
            index++;
            setTimeout(animateMessage, 150); // Adjust speed here
        }
    }

    animateMessage();
</script>



    </div>

    <!-- Hamburger Menu for Small Devices -->
    <button class="lg:hidden fixed bottom-4 right-4 bg-blue-900 text-white p-3 rounded-full shadow-lg" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
    </button>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            if (sidebar) {
                sidebar.classList.toggle('hidden');
            }
        }
    </script>
</body>
</html>
