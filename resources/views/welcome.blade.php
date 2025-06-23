<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paperless Management System</title>
    <!-- Link to your compiled Tailwind CSS -->
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <!-- Header Section -->
    <header class="bg-blue-500 text-white text-center p-4">
        <h1 class="text-3xl font-bold mb-2">Paperless Management System</h1>
        <p class="text-lg">Empowering TVET Institutions in Kenya</p>
    </header>


    <!-- Hero Section -->
    <section class="bg-white text-gray-600 p-4">
        <div class="container mx-auto flex flex-col md:flex-row items-center justify-between">
            <div class="md:w-1/2">
                <!-- Animated summary text overlay -->
                <div class="relative">
                    <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                        <span class="animate-marquee font-bold text-white bg-blue-500 bg-opacity-70 px-4 rounded">
                            Streamline TVET workflows, boost efficiency, enable real-time tracking, automate notifications, and enhance transparency for Kenyan institutions.
                        </span>
                    </div>
                    <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=800&q=80" alt="Hero Image" class="w-full h-auto rounded shadow-lg opacity-0 md:opacity-0">
                </div>

                <style>
                @keyframes marquee {
                    0%   { transform: translateX(100%); }
                    100% { transform: translateX(-100%); }
                }
                .animate-marquee {
                    display: inline-block;
                    white-space: nowrap;
                    animation: marquee 30s linear infinite;
                }
                </style>
            </div>

        </div>
    </section>

    <!-- Features Section -->
    <section class="container mx-auto p-4 pt-6 md:p-6 lg:p-12 xl:p-24">
        <h2 class="text-3xl font-bold mb-4 text-center">Features</h2>
        <div class="flex flex-wrap -mx-4">
            <div class="w-full md:w-1/2 xl:w-1/3 p-4">
                <div class="bg-blue-500 hover:bg-yellow-400 transition-colors duration-300 rounded shadow p-4 text-center group">
                    <h3 class="text-xl font-bold mb-2 text-white group-hover:text-gray-900 transition-colors duration-300">Streamlined Processess</h3>
                    <p class="text-white group-hover:text-gray-900 transition-colors duration-300">
                        Digitizes workflows, reduces paperwork, accelerates approvals, and centralizes records for efficient, transparent, and seamless operations in TVET institutions.
                    </p>
                </div>
            </div>
            <div class="w-full md:w-1/2 xl:w-1/3 p-4">
                <div class="bg-blue-500 hover:bg-yellow-400 transition-colors duration-300 rounded shadow p-4 text-center group">
                    <h3 class="text-xl font-bold mb-2 text-white group-hover:text-gray-900 transition-colors duration-300">Real-time Tracking</h3>
                    <p class="text-white group-hover:text-gray-900 transition-colors duration-300">
                        Instantly monitor document progress, approvals, and submissions for transparency, accountability, and timely actions within the paperless system.
                    </p>
                </div>
            </div>
            <div class="w-full md:w-1/2 xl:w-1/3 p-4">
                <div class="bg-blue-500 hover:bg-yellow-400 transition-colors duration-300 rounded shadow p-4 text-center group">
                    <h3 class="text-xl font-bold mb-2 text-white group-hover:text-gray-900 transition-colors duration-300">Automated Notifications</h3>
                    <p class="text-white group-hover:text-gray-900 transition-colors duration-300">
                        Automated notifications instantly alert users to document status, deadlines, and actions, ensuring timely responses and improved workflow efficiency.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="bg-white text-gray-600 p-4">
        <h2 class="text-3xl font-bold mb-4 text-center">Benefits</h2>
        <div class="flex flex-wrap -mx-4">
            <div class="w-full md:w-1/2 xl:w-1/3 p-4">
                <div class="bg-orange-500 hover:bg-yellow-400 transition-colors duration-300 rounded shadow p-4 text-center group">
                    <h3 class="text-xl font-bold mb-2 text-white group-hover:text-gray-900 transition-colors duration-300">Increased Efficiency</h3>
                    <p class="text-white group-hover:text-gray-900 transition-colors duration-300">Reduce paperwork and processing time</p>
                </div>
            </div>
            <div class="w-full md:w-1/2 xl:w-1/3 p-4">
                <div class="bg-orange-500 hover:bg-yellow-400 transition-colors duration-300 rounded shadow p-4 text-center group">
                    <h3 class="text-xl font-bold mb-2 text-white group-hover:text-gray-900 transition-colors duration-300">Improved Accuracy</h3>
                    <p class="text-white group-hover:text-gray-900 transition-colors duration-300">Minimize errors and ensure data integrity</p>
                </div>
            </div>
            <div class="w-full md:w-1/2 xl:w-1/3 p-4">
                <div class="bg-orange-500 hover:bg-yellow-400 transition-colors duration-300 rounded shadow p-4 text-center group">
                    <h3 class="text-xl font-bold mb-2 text-white group-hover:text-gray-900 transition-colors duration-300">Enhanced Transparency</h3>
                    <p class="text-white group-hover:text-gray-900 transition-colors duration-300">Track progress and receive updates in real-time</p>
                </div>
            </div>
        </div>
    </section>


    <!-- Call-to-Action Section -->
    <section class="bg-blue-500 text-white text-center p-4">
        <h2 class="text-3xl font-bold mb-2">Get Started Today!</h2>
        <button class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded">Contact Us</button>
    </section>

    <!-- Footer Section -->
    <footer class="bg-gray-200 text-gray-600 p-4 text-center">
        <p>&copy; 2023 Paperless Management System. All rights reserved.</p>
    </footer>
</body>
</html>
