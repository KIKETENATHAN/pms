<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paperless Management System - TVET Kenya</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-up': 'slideUp 0.6s ease-out',
                        'float': 'float 6s ease-in-out infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' }
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(30px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' }
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-20px)' }
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .bg-grid-pattern {
            background-image: radial-gradient(circle, #e5e7eb 1px, transparent 1px);
            background-size: 20px 20px;
        }
        .text-shadow {
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body class="bg-white">
    <!-- Navigation -->
    <nav class="bg-blue-700/95 backdrop-blur-sm border-b border-blue-800 sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-blue-800 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <span class="text-xl font-bold text-white">Paperless</span>
                        <div class="text-xs text-blue-200 font-medium">TVET PRIME</div>
                    </div>
                </div>

                <!-- Navigation Links -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#contact" class="text-blue-100 hover:text-white transition-colors font-medium">Contact</a>
                    <button onclick="openFeaturesModal()" class="bg-yellow-500 text-white hover:bg-orange-500 hover:text-white transition-colors font-medium px-6 py-2 rounded-lg">
                        Features
                    </button>
                    <button onclick="openLoginModal()" class="bg-yellow-500 text-white px-6 py-2 rounded-lg font-medium hover:bg-orange-500 hover:text-white transition-all transform hover:scale-105 shadow-lg">
                        Login
                    </button>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button onclick="toggleMobileMenu()" class="p-2 rounded-lg text-blue-100 hover:text-white hover:bg-blue-800 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Navigation -->
            <div id="mobileMenu" class="hidden md:hidden border-t border-blue-800 py-4 bg-blue-700/95">
                <div class="flex flex-col space-y-4">
                    <a href="#contact" class="text-blue-100 hover:text-white transition-colors">Contact Us</a>
                  <button onclick="openFeaturesModal()" class="bg-yellow-500 text-white hover:bg-orange-500 hover:text-white transition-colors font-medium px-6 py-2 rounded-lg">
                        Features
                    </button>
                    <button onclick="openLoginModal()" class="bg-yellow-500 text-white px-6 py-2 rounded-lg font-medium hover:bg-orange-500 hover:text-white transition-all transform hover:scale-105 shadow-lg">
                        Login
                    </button>
            </div>
        </div>
    </nav>

    <!-- Hero Section (Auto-fit Height to Content) -->
    <section class="relative overflow-hidden bg-gradient-to-br from-blue-50 via-white to-indigo-50 py-12">
        <div class="absolute inset-0 bg-grid-pattern opacity-5"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-8 animate-slide-up">
                    <div class="space-y-6">
                        <div class="inline-flex items-center px-4 py-2 bg-blue-100 text-blue-800 rounded-full text-sm font-medium">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <h1 class="text-xl font-bold bg-yellow-400 text-blue-900 px-4 py-1 rounded">
                                Empowering TVET Institutions in Kenya
                            </h1>
                        </div>
                        <h1 class="text-4xl lg:text-6xl font-bold text-gray-900 leading-tight text-shadow">
                            Go <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">Paperless</span> with Confidence
                        </h1>
                        <p class="text-xl text-gray-600 leading-relaxed">
                            Streamline TVET workflows, boost efficiency, enable real-time tracking, automate notifications, and enhance transparency for Kenyan institutions with our intelligent paperless management system.
                        </p>
                    </div>
                    <div class="flex items-center space-x-8 pt-4">
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-600">Free Training</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-600">24/7 Support</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-600">Secure & Compliant</span>
                        </div>
                    </div>
                </div>

                <div class="relative animate-float">
                    <!-- Add a photo here -->
                    <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=600&q=80" alt="TVET Institution" class="rounded-2xl shadow-2xl w-full max-w-md h-auto object-cover object-center mb-8 border-4 border-white">
                    <div class="relative z-10 bg-blue-600 rounded-2xl shadow-2xl p-8 transform rotate-3 hover:rotate-0 transition-transform duration-500">
                        <h3 class="text-2xl font-semibold text-white mb-4">Lets go Paperless!</h3>
                        <div class="absolute -top-4 -right-4 w-72 h-72 bg-gradient-to-br from-blue-400 to-indigo-500 rounded-full opacity-20 blur-3xl"></div>
                        <div class="absolute -bottom-8 -left-8 w-64 h-64 bg-gradient-to-br from-purple-400 to-pink-400 rounded-full opacity-20 blur-3xl"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Modal -->
    <div id="featuresModal" class="fixed inset-0 z-50 hidden items-center justify-center">
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-black/60 backdrop-blur-sm transition-opacity" onclick="closeFeaturesModal()"></div>
        <!-- Modal -->
        <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-3xl mx-4 transform transition-all">
            <!-- Header -->
            <div class="flex items-center justify-between p-6 border-b border-gray-100">
                <h2 class="text-2xl font-bold text-gray-900">Powerful Features for TVET Institutions</h2>
                <button onclick="closeFeaturesModal()" class="p-2 hover:bg-gray-100 rounded-full transition-colors">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="p-8">
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="group p-8 rounded-2xl border border-gray-100 hover:border-blue-200 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Streamlined Processes</h3>
                        <p class="text-gray-600 leading-relaxed">Digitize, accelerate, centralize, streamline, transparency.</p>
                    </div>
                    <div class="group p-8 rounded-2xl border border-gray-100 hover:border-blue-200 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                        <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Real-time Tracking</h3>
                        <p class="text-gray-600 leading-relaxed">Monitor progress, approvals, submissions instantly.</p>
                    </div>
                    <div class="group p-8 rounded-2xl border border-gray-100 hover:border-blue-200 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5v-5zM4 19h6v-2H4v2zM16 3H4v2h12V3zM4 7h12v2H4V7zM4 11h12v2H4v-2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Automated Notifications</h3>
                        <p class="text-gray-600 leading-relaxed">Instant alerts for workflow efficiency.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Features modal functions
        function openFeaturesModal() {
            const modal = document.getElementById('featuresModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }
        function closeFeaturesModal() {
            const modal = document.getElementById('featuresModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
        // Close modal when clicking outside
        document.addEventListener('click', function(event) {
            const modal = document.getElementById('featuresModal');
            if (event.target === modal) {
                closeFeaturesModal();
            }
        });
        // Close modal with Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeFeaturesModal();
            }
        });
    </script>

    <!-- Benefits Modal Trigger Button in Navbar -->
    <script>
        // Add this after DOM is loaded to avoid errors if nav is rendered before this script
        document.addEventListener('DOMContentLoaded', function() {
            // Add Benefits button to both desktop and mobile navs
            const navLinks = document.querySelectorAll('.md\\:flex.items-center.space-x-8, #mobileMenu .flex.flex-col');
            navLinks.forEach(nav => {
                // Prevent duplicate button
                if (!nav.querySelector('.benefits-modal-btn')) {
                    const btn = document.createElement('button');
                    btn.textContent = 'Benefits';
                    btn.className = 'benefits-modal-btn text-blue-100 hover:text-white transition-colors font-medium';
                    btn.type = 'button';
                    btn.onclick = openBenefitsModal;
                    if (nav.classList.contains('md:flex')) {
                        nav.insertBefore(btn, nav.children[1]);
                    } else {
                        btn.className += ' w-full';
                        nav.insertBefore(btn, nav.children[1]);
                    }
                }
            });
        });
    </script>

    <!-- Benefits Modal -->
    <div id="benefitsModal" class="fixed inset-0 z-50 hidden items-center justify-center">
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-black/60 backdrop-blur-sm transition-opacity" onclick="closeBenefitsModal()"></div>
        <!-- Modal -->
        <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-4xl mx-4 transform transition-all max-h-[90vh] overflow-y-auto">
            <!-- Header -->
            <div class="flex items-center justify-between p-6 border-b border-gray-100">
                <h2 class="text-2xl font-bold text-gray-900">Transform Your Institution</h2>
                <button onclick="closeBenefitsModal()" class="p-2 hover:bg-gray-100 rounded-full transition-colors">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="p-8">
                <div class="text-center space-y-4 mb-16">
                    <p class="text-xl text-gray-600">
                        Experience the benefits of going paperless with measurable results
                    </p>
                </div>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-shadow group">
                        <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Increased Efficiency</h3>
                        <p class="text-gray-600 leading-relaxed">Reduce paperwork and processing time by up to 80% with automated workflows and digital approvals.</p>
                        <div class="mt-4 flex items-center text-green-600 font-medium">
                            <span class="text-2xl font-bold">80%</span>
                            <span class="ml-2 text-sm">Time Saved</span>
                        </div>
                    </div>
                    <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-shadow group">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Improved Accuracy</h3>
                        <p class="text-gray-600 leading-relaxed">Minimize errors and ensure data integrity with automated validation and digital verification systems.</p>
                        <div class="mt-4 flex items-center text-blue-600 font-medium">
                            <span class="text-2xl font-bold">95%</span>
                            <span class="ml-2 text-sm">Error Reduction</span>
                        </div>
                    </div>
                    <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-shadow group">
                        <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Enhanced Transparency</h3>
                        <p class="text-gray-600 leading-relaxed">Track progress and receive updates in real-time with complete audit trails and accountability measures.</p>
                        <div class="mt-4 flex items-center text-indigo-600 font-medium">
                            <span class="text-2xl font-bold">100%</span>
                            <span class="ml-2 text-sm">Visibility</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Benefits modal functions
        function openBenefitsModal() {
            const modal = document.getElementById('benefitsModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }
        function closeBenefitsModal() {
            const modal = document.getElementById('benefitsModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
        // Close modal when clicking outside
        document.addEventListener('click', function(event) {
            const modal = document.getElementById('benefitsModal');
            if (event.target === modal) {
                closeBenefitsModal();
            }
        });
        // Close modal with Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeBenefitsModal();
            }
        });
    </script>

   <!--footer-->
<footer class="bg-blue-800 text-white py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center text-white text-sm whitespace-pre-line">
            &copy; 2023 Paperless Management System. | 
            <a href="https://www.tvetkenya.go.ke" class="text-blue-300 hover:text-white transition-colors">TVET PRIME</a> | All rights reserved.
        </div>
    </div>
</footer>

    <!-- Login Modal -->
    <div id="loginModal" class="fixed inset-0 z-50 hidden items-center justify-center">
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-black/60 backdrop-blur-sm transition-opacity" onclick="closeLoginModal()"></div>
        
        <!-- Modal -->
        <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-md mx-4 transform transition-all">
            <!-- Header -->
            <div class="flex items-center justify-between p-6 border-b border-gray-100">
                <h2 class="text-2xl font-bold text-gray-900">Welcome Back</h2>
                <button onclick="closeLoginModal()" class="p-2 hover:bg-gray-100 rounded-full transition-colors">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Form -->
            <form class="p-6 space-y-6" onsubmit="handleLogin(event)">
                <!-- Email Field -->
                <div class="space-y-2">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <div class="relative">
                        <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                        </svg>
                        <input type="email" id="email" name="email" class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="Enter your email" required>
                    </div>
                </div>

                <!-- Password Field -->
                <div class="space-y-2">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <div class="relative">
                        <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                        <input type="password" id="password" name="password" class="w-full pl-10 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="Enter your password" required>
                        <button type="button" onclick="togglePassword()" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600">
                            <svg id="eyeIcon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        <span class="ml-2 text-sm text-gray-600">Remember me</span>
                    </label>
                    <a href="#" class="text-sm text-blue-600 hover:text-blue-800 transition-colors">Forgot password?</a>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-blue-700 text-white py-3 px-4 rounded-lg font-medium hover:from-blue-700 hover:to-blue-800 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all transform hover:scale-[1.02]">
                    Sign In
                </button>
            </form>

            <!-- Footer -->
            <div class="p-6 pt-0 text-center">
                <p class="text-sm text-gray-600">
                    Don't have an account? 
                    <a href="#" class="text-blue-600 hover:text-blue-800 font-medium transition-colors">Contact Admin</a>
                </p>
            </div>
        </div>
    </div>

    <script>
        // Mobile menu toggle
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }

        // Login modal functions
        function openLoginModal() {
            const modal = document.getElementById('loginModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeLoginModal() {
            const modal = document.getElementById('loginModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        // Password toggle
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"></path>
                `;
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                `;
            }
        }

        // Handle login form submission
        function handleLogin(event) {
            event.preventDefault();
            const formData = new FormData(event.target);
            const loginData = {
                email: formData.get('email'),
                password: formData.get('password'),
                remember: formData.get('remember') === 'on'
            };
            
            // Here you would integrate with your Laravel backend
            console.log('Login attempt:', loginData);
            
            // Example: Send to Laravel backend
            // fetch('/api/login', {
            //     method: 'POST',
            //     headers: {
            //         'Content-Type': 'application/json',
            //         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            //     },
            //     body: JSON.stringify(loginData)
            // })
            // .then(response => response.json())
            // .then(data => {
            //     if (data.success) {
            //         window.location.href = '/dashboard';
            //     } else {
            //         alert('Login failed: ' + data.message);
            //     }
            // });
            
            alert('Login functionality ready for Laravel integration!');
        }

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Close modal when clicking outside
        document.addEventListener('click', function(event) {
            const modal = document.getElementById('loginModal');
            if (event.target === modal) {
                closeLoginModal();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeLoginModal();
            }
        });
    </script>
</body>
</html>