<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - <?= $title ?? 'Home' ?></title>
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
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }
        
        .hover-lift {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .hover-lift:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #0ea5e9 0%, #0369a1 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-sky-50 via-white to-blue-50">
    <!-- Navigation -->
    <nav class="bg-white/80 backdrop-blur-md shadow-lg border-b-4 border-sky-500 sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-user-circle text-sky-600 text-3xl"></i>
                    <h1 class="text-2xl font-bold gradient-text">My Portfolio</h1>
                </div>
                <div class="flex items-center space-x-6">
                    <a href="/" class="text-gray-700 hover:text-sky-600 transition duration-300 font-medium">
                        <i class="fas fa-home mr-1"></i>Home
                    </a>
                    <a href="/activity" class="text-gray-700 hover:text-sky-600 transition duration-300 font-medium">
                        <i class="fas fa-calendar-check mr-1"></i>Activities
                    </a>
                    <a href="/profile" class="text-gray-700 hover:text-sky-600 transition duration-300 font-medium">
                        <i class="fas fa-user mr-1"></i>Profile
                    </a>
                    <a href="/education" class="text-gray-700 hover:text-sky-600 transition duration-300 font-medium">
                        <i class="fas fa-graduation-cap mr-1"></i>Education
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-8">
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Footer -->
    <?php 
    $settingModel = new \App\Models\SettingModel();
    $settings = $settingModel->getAllSettings();
    ?>
    <footer class="relative bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white mt-20 overflow-hidden">
        <!-- Decorative elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-24 -right-24 w-96 h-96 bg-sky-500/10 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-purple-500/10 rounded-full blur-3xl"></div>
        </div>
        
        <div class="container mx-auto px-4 py-16 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                <!-- Brand Section -->
                <div class="md:col-span-2">
                    <div class="flex items-center space-x-3 mb-4">
                        <i class="fas fa-user-circle text-sky-400 text-4xl"></i>
                        <h3 class="text-3xl font-black bg-gradient-to-r from-sky-400 to-purple-400 bg-clip-text text-transparent">
                            <?= esc($settings['site_name'] ?? 'My Portfolio') ?>
                        </h3>
                    </div>
                    <p class="text-gray-400 leading-relaxed mb-6 max-w-md">
                        <?= esc($settings['site_description'] ?? 'Showcasing my professional journey.') ?>
                    </p>
                    <!-- Social Media -->
                    <div class="flex gap-4">
                        <?php if (!empty($settings['github_url'])): ?>
                        <a href="<?= esc($settings['github_url']) ?>" target="_blank" class="w-12 h-12 bg-gray-800 hover:bg-gradient-to-r hover:from-sky-500 hover:to-blue-500 rounded-xl flex items-center justify-center transition-all duration-300 transform hover:scale-110 hover:-translate-y-1 shadow-lg hover:shadow-sky-500/50">
                            <i class="fab fa-github text-xl"></i>
                        </a>
                        <?php endif; ?>
                        <?php if (!empty($settings['linkedin_url'])): ?>
                        <a href="<?= esc($settings['linkedin_url']) ?>" target="_blank" class="w-12 h-12 bg-gray-800 hover:bg-gradient-to-r hover:from-blue-500 hover:to-blue-600 rounded-xl flex items-center justify-center transition-all duration-300 transform hover:scale-110 hover:-translate-y-1 shadow-lg hover:shadow-blue-500/50">
                            <i class="fab fa-linkedin text-xl"></i>
                        </a>
                        <?php endif; ?>
                        <?php if (!empty($settings['instagram_url'])): ?>
                        <a href="<?= esc($settings['instagram_url']) ?>" target="_blank" class="w-12 h-12 bg-gray-800 hover:bg-gradient-to-r hover:from-pink-500 hover:to-rose-500 rounded-xl flex items-center justify-center transition-all duration-300 transform hover:scale-110 hover:-translate-y-1 shadow-lg hover:shadow-pink-500/50">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <?php endif; ?>
                        <?php if (!empty($settings['twitter_url'])): ?>
                        <a href="<?= esc($settings['twitter_url']) ?>" target="_blank" class="w-12 h-12 bg-gray-800 hover:bg-gradient-to-r hover:from-sky-400 hover:to-blue-500 rounded-xl flex items-center justify-center transition-all duration-300 transform hover:scale-110 hover:-translate-y-1 shadow-lg hover:shadow-sky-400/50">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h4 class="text-xl font-bold mb-6 flex items-center">
                        <i class="fas fa-link mr-2 text-sky-400"></i>
                        Quick Links
                    </h4>
                    <ul class="space-y-3">
                        <li>
                            <a href="/" class="text-gray-400 hover:text-sky-400 transition-colors flex items-center group">
                                <i class="fas fa-chevron-right mr-2 text-xs group-hover:translate-x-1 transition-transform"></i>
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="/activity" class="text-gray-400 hover:text-sky-400 transition-colors flex items-center group">
                                <i class="fas fa-chevron-right mr-2 text-xs group-hover:translate-x-1 transition-transform"></i>
                                Activities
                            </a>
                        </li>
                        <li>
                            <a href="/profile" class="text-gray-400 hover:text-sky-400 transition-colors flex items-center group">
                                <i class="fas fa-chevron-right mr-2 text-xs group-hover:translate-x-1 transition-transform"></i>
                                Profile
                            </a>
                        </li>
                        <li>
                            <a href="/education" class="text-gray-400 hover:text-sky-400 transition-colors flex items-center group">
                                <i class="fas fa-chevron-right mr-2 text-xs group-hover:translate-x-1 transition-transform"></i>
                                Education
                            </a>
                        </li>
                    </ul>
                </div>
                
                <!-- Contact Info -->
                <div>
                    <h4 class="text-xl font-bold mb-6 flex items-center">
                        <i class="fas fa-envelope mr-2 text-sky-400"></i>
                        Get in Touch
                    </h4>
                    <ul class="space-y-4">
                        <?php if (!empty($settings['contact_location'])): ?>
                        <li class="flex items-start text-gray-400">
                            <i class="fas fa-map-marker-alt mt-1 mr-3 text-sky-400"></i>
                            <span class="text-sm"><?= esc($settings['contact_location']) ?></span>
                        </li>
                        <?php endif; ?>
                        <?php if (!empty($settings['contact_email'])): ?>
                        <li class="flex items-start text-gray-400">
                            <i class="fas fa-envelope mt-1 mr-3 text-sky-400"></i>
                            <a href="mailto:<?= esc($settings['contact_email']) ?>" class="text-sm hover:text-sky-400 transition-colors">
                                <?= esc($settings['contact_email']) ?>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if (!empty($settings['contact_phone'])): ?>
                        <li class="flex items-start text-gray-400">
                            <i class="fas fa-phone mt-1 mr-3 text-sky-400"></i>
                            <span class="text-sm"><?= esc($settings['contact_phone']) ?></span>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            
            <!-- Divider -->
            <div class="border-t border-gray-700 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                    <p class="text-gray-400 text-sm">
                        &copy; <?= date('Y') ?> <?= esc($settings['site_name'] ?? 'My Portfolio') ?>. All rights reserved.
                    </p>
                    <div class="flex items-center gap-6 text-sm text-gray-400">
                        <span class="flex items-center">
                            <i class="fas fa-code mr-2 text-sky-400"></i>
                            Built with
                            <span class="text-sky-400 font-semibold mx-1">CodeIgniter 4</span>
                            &
                            <span class="text-sky-400 font-semibold ml-1">Tailwind CSS</span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
