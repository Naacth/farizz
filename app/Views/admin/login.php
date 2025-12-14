<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Portfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        @keyframes pulse-ring {
            0% { transform: scale(0.8); opacity: 1; }
            100% { transform: scale(1.2); opacity: 0; }
        }
        .fade-in {
            animation: fadeIn 0.5s ease-out;
        }
        .float {
            animation: float 3s ease-in-out infinite;
        }
        .pulse-ring {
            animation: pulse-ring 2s ease-out infinite;
        }
        .gradient-bg {
            background: linear-gradient(135deg, #0ea5e9 0%, #0369a1 50%, #7dd3fc 100%);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
        }
        @keyframes gradientShift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
    </style>
</head>
<body class="gradient-bg min-h-screen flex items-center justify-center p-4 relative overflow-hidden">
    <!-- Floating Background Elements -->
    <div class="absolute top-20 left-10 w-32 h-32 bg-white/10 rounded-full blur-3xl float"></div>
    <div class="absolute bottom-20 right-10 w-40 h-40 bg-white/10 rounded-full blur-3xl float" style="animation-delay: 1s;"></div>
    <div class="absolute top-1/2 left-1/2 w-60 h-60 bg-white/5 rounded-full blur-3xl"></div>
    
    <div class="w-full max-w-md fade-in relative z-10">
        <!-- Logo/Header -->
        <div class="text-center mb-8">
            <div class="inline-block relative">
                <div class="absolute inset-0 bg-white/30 rounded-full pulse-ring"></div>
                <div class="relative bg-white p-6 rounded-full shadow-2xl float">
                    <i class="fas fa-user-shield text-sky-600 text-6xl"></i>
                </div>
            </div>
            <h1 class="text-4xl font-bold text-white mt-6 mb-2 drop-shadow-lg">Admin Panel</h1>
            <p class="text-sky-100 text-lg drop-shadow">Portfolio Management System</p>
        </div>

        <!-- Login Card -->
        <div class="bg-white/95 backdrop-blur-md rounded-2xl shadow-2xl p-8 border border-white/20">
            <div class="text-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Welcome Back!</h2>
                <p class="text-gray-600 text-sm">Please login to continue</p>
            </div>
            <!-- Flash Messages -->
            <?php if (session()->getFlashdata('error')): ?>
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-lg">
                    <div class="flex items-center">
                        <i class="fas fa-exclamation-circle mr-3 text-xl"></i>
                        <p class="font-medium"><?= session()->getFlashdata('error') ?></p>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('success')): ?>
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-lg">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle mr-3 text-xl"></i>
                        <p class="font-medium"><?= session()->getFlashdata('success') ?></p>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Login Form -->
            <form action="/admin/login" method="POST">
                <?= csrf_field() ?>
                
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-user mr-2 text-sky-600"></i>Username
                    </label>
                    <input type="text" name="username" required 
                           class="w-full px-4 py-3 border border-sky-300 rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent transition duration-300"
                           placeholder="Enter your username">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-lock mr-2 text-sky-600"></i>Password
                    </label>
                    <input type="password" name="password" required 
                           class="w-full px-4 py-3 border border-sky-300 rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent transition duration-300"
                           placeholder="Enter your password">
                </div>

                <button type="submit" 
                        class="w-full bg-gradient-to-r from-sky-500 via-blue-500 to-sky-600 hover:from-sky-600 hover:via-blue-600 hover:to-sky-700 text-white font-bold py-4 rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-105 flex items-center justify-center group">
                    <i class="fas fa-sign-in-alt mr-2 group-hover:translate-x-1 transition-transform"></i>
                    <span>Login to Dashboard</span>
                </button>
            </form>

            <!-- Back to Homepage Link -->
            <div class="mt-6 text-center">
                <a href="/" class="text-sky-600 hover:text-sky-800 font-medium transition duration-300 inline-flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i>Back to Homepage
                </a>
            </div>
        </div>

        <!-- Footer Info -->
        <div class="text-center mt-6 text-white text-sm drop-shadow">
            <p>&copy; <?= date('Y') ?> Portfolio Admin. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
