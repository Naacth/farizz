<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Admin Panel' ?> - Portfolio</title>
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
        .hover-scale {
            transition: all 0.3s ease-in-out;
        }
        .hover-scale:hover {
            transform: scale(1.02);
        }
        .sidebar-active {
            background: linear-gradient(135deg, #0ea5e9 0%, #0369a1 100%);
            color: white !important;
        }
        .sidebar-active i {
            color: white !important;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-100 via-gray-50 to-slate-100 min-h-screen">
    <!-- Top Navigation -->
    <nav class="bg-gradient-to-r from-slate-900 via-gray-900 to-slate-900 text-white shadow-2xl sticky top-0 z-50">
        <div class="container mx-auto px-6">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-sky-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-user-shield text-white text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl font-black">Admin Panel</h1>
                        <p class="text-gray-400 text-xs">Portfolio Management</p>
                    </div>
                </div>
                <div class="flex items-center space-x-6">
                    <a href="/" target="_blank" class="flex items-center gap-2 text-gray-300 hover:text-white transition px-4 py-2 rounded-lg hover:bg-white/10">
                        <i class="fas fa-external-link-alt"></i>
                        <span>View Site</span>
                    </a>
                    <div class="flex items-center gap-3 px-4 py-2 bg-white/10 rounded-xl">
                        <div class="w-8 h-8 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center">
                            <i class="fas fa-user text-white text-sm"></i>
                        </div>
                        <span class="font-medium"><?= session()->get('admin_username') ?></span>
                    </div>
                    <a href="/admin/logout" class="bg-red-500 hover:bg-red-600 text-white px-5 py-2 rounded-xl transition-all duration-300 flex items-center gap-2 font-medium shadow-lg hover:shadow-red-500/50">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Sidebar + Content -->
    <div class="container mx-auto px-6 py-8">
        <div class="flex gap-8">
            <!-- Sidebar -->
            <div class="w-72 flex-shrink-0">
                <div class="bg-white rounded-2xl shadow-xl p-6 sticky top-24 border border-gray-100">
                    <h2 class="text-sm font-bold text-gray-500 mb-4 tracking-wider uppercase">
                        Navigation
                    </h2>
                    <ul class="space-y-2">
                        <li>
                            <a href="/admin/dashboard" class="flex items-center p-4 rounded-xl hover:bg-gradient-to-r hover:from-sky-500 hover:to-blue-600 hover:text-white transition-all duration-300 text-gray-700 group">
                                <div class="w-10 h-10 bg-sky-100 group-hover:bg-white/20 rounded-xl flex items-center justify-center mr-4">
                                    <i class="fas fa-tachometer-alt text-sky-600 group-hover:text-white"></i>
                                </div>
                                <span class="font-semibold">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/activity" class="flex items-center p-4 rounded-xl hover:bg-gradient-to-r hover:from-sky-500 hover:to-blue-600 hover:text-white transition-all duration-300 text-gray-700 group">
                                <div class="w-10 h-10 bg-orange-100 group-hover:bg-white/20 rounded-xl flex items-center justify-center mr-4">
                                    <i class="fas fa-calendar-check text-orange-600 group-hover:text-white"></i>
                                </div>
                                <span class="font-semibold">Activities</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/profile" class="flex items-center p-4 rounded-xl hover:bg-gradient-to-r hover:from-purple-500 hover:to-pink-600 hover:text-white transition-all duration-300 text-gray-700 group">
                                <div class="w-10 h-10 bg-purple-100 group-hover:bg-white/20 rounded-xl flex items-center justify-center mr-4">
                                    <i class="fas fa-user-circle text-purple-600 group-hover:text-white"></i>
                                </div>
                                <span class="font-semibold">My Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/education" class="flex items-center p-4 rounded-xl hover:bg-gradient-to-r hover:from-emerald-500 hover:to-teal-600 hover:text-white transition-all duration-300 text-gray-700 group">
                                <div class="w-10 h-10 bg-emerald-100 group-hover:bg-white/20 rounded-xl flex items-center justify-center mr-4">
                                    <i class="fas fa-graduation-cap text-emerald-600 group-hover:text-white"></i>
                                </div>
                                <span class="font-semibold">Education</span>
                            </a>
                        </li>
                    </ul>
                    
                    <div class="border-t border-gray-200 mt-6 pt-6">
                        <h2 class="text-sm font-bold text-gray-500 mb-4 tracking-wider uppercase">
                            Configuration
                        </h2>
                        <ul class="space-y-2">
                            <li>
                                <a href="/admin/settings" class="flex items-center p-4 rounded-xl hover:bg-gradient-to-r hover:from-gray-700 hover:to-gray-900 hover:text-white transition-all duration-300 text-gray-700 group">
                                    <div class="w-10 h-10 bg-gray-100 group-hover:bg-white/20 rounded-xl flex items-center justify-center mr-4">
                                        <i class="fas fa-cog text-gray-600 group-hover:text-white"></i>
                                    </div>
                                    <span class="font-semibold">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="flex-1">
                <!-- Flash Messages -->
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 text-green-800 p-5 mb-6 rounded-2xl shadow-lg animate-pulse">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-green-500 rounded-xl flex items-center justify-center mr-4">
                                <i class="fas fa-check text-white text-lg"></i>
                            </div>
                            <p class="font-semibold"><?= session()->getFlashdata('success') ?></p>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('error')): ?>
                    <div class="bg-gradient-to-r from-red-50 to-rose-50 border border-red-200 text-red-800 p-5 mb-6 rounded-2xl shadow-lg">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-red-500 rounded-xl flex items-center justify-center mr-4">
                                <i class="fas fa-exclamation text-white text-lg"></i>
                            </div>
                            <p class="font-semibold"><?= session()->getFlashdata('error') ?></p>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('errors')): ?>
                    <div class="bg-gradient-to-r from-red-50 to-rose-50 border border-red-200 text-red-800 p-5 mb-6 rounded-2xl shadow-lg">
                        <div class="flex items-start">
                            <div class="w-10 h-10 bg-red-500 rounded-xl flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fas fa-exclamation-triangle text-white"></i>
                            </div>
                            <div>
                                <p class="font-bold mb-2">Please fix the following errors:</p>
                                <ul class="list-disc list-inside space-y-1">
                                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                        <li><?= esc($error) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Page Content -->
                <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
                    <?= $this->renderSection('content') ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="mt-16 py-8 bg-gradient-to-r from-slate-900 via-gray-900 to-slate-900 text-white">
        <div class="container mx-auto px-6 text-center">
            <p class="text-gray-400">&copy; <?= date('Y') ?> Portfolio Admin Panel. Built with <span class="text-sky-400">CodeIgniter 4</span> & <span class="text-sky-400">Tailwind CSS</span></p>
        </div>
    </footer>
</body>
</html>
