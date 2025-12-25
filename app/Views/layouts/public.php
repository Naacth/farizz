<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - <?= $title ?? 'Home' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Outfit', 'sans-serif'],
                    },
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
                        },
                        dark: {
                            bg: '#0f172a',
                            card: '#1e293b',
                            text: '#f1f5f9'
                        }
                    },
                    animation: {
                        'gradient': 'gradient 8s linear infinite',
                        'float': 'float 3s ease-in-out infinite',
                    },
                    keyframes: {
                        gradient: {
                            '0%, 100%': { 'background-size': '200% 200%', 'background-position': 'left center' },
                            '50%': { 'background-size': '200% 200%', 'background-position': 'right center' },
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-10px)' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Outfit', sans-serif; }
        
        .glass {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        .dark .glass {
            background: rgba(15, 23, 42, 0.7);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .fade-in-up { animation: fadeInUp 0.6s ease-out; }
        
        .hover-lift { transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); }
        .hover-lift:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #0ea5e9 0%, #0369a1 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .dark .gradient-text {
            background: linear-gradient(135deg, #38bdf8 0%, #818cf8 100%);
            -webkit-background-clip: text;
        }

        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }
        .dark ::-webkit-scrollbar-thumb { background: #334155; }
    </style>
    <script>
        if (localStorage.getItem('darkMode') === 'true' || 
            (!('darkMode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>
<body class="bg-slate-50 dark:bg-dark-bg text-slate-900 dark:text-dark-text transition-colors duration-300">
    <!-- Navigation -->
    <nav class="glass sticky top-0 z-50 border-b border-slate-200/50 dark:border-slate-800/50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-2 group">
                    <div class="w-10 h-10 bg-primary-600 rounded-xl flex items-center justify-center text-white shadow-lg group-hover:rotate-12 transition-transform">
                        <i class="fas fa-user-circle text-xl"></i>
                    </div>
                    <h1 class="text-2xl font-black gradient-text">Portfolio.</h1>
                </div>
                
                <div class="hidden md:flex items-center space-x-8">
                    <a href="/" class="hover:text-primary-500 transition-colors font-semibold flex items-center gap-2">
                        <i class="fas fa-home text-sm opacity-70"></i>Home
                    </a>
                    <a href="/activity" class="hover:text-primary-500 transition-colors font-semibold flex items-center gap-2">
                        <i class="fas fa-calendar-alt text-sm opacity-70"></i>Activities
                    </a>
                    <a href="/profile" class="hover:text-primary-500 transition-colors font-semibold flex items-center gap-2">
                        <i class="fas fa-user text-sm opacity-70"></i>Profile
                    </a>
                    <a href="/education" class="hover:text-primary-500 transition-colors font-semibold flex items-center gap-2">
                        <i class="fas fa-graduation-cap text-sm opacity-70"></i>Education
                    </a>
                    
                    <!-- Dark Mode Toggle -->
                    <button onclick="toggleDarkMode()" class="w-10 h-10 flex items-center justify-center rounded-xl bg-slate-200 dark:bg-slate-800 transition-colors hover:ring-2 ring-primary-500">
                        <i id="theme-icon" class="fas fa-moon dark:text-yellow-400"></i>
                    </button>
                </div>

                <!-- Mobile menu button can go here -->
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="min-h-[70vh]">
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Footer -->
    <?php 
    $settingModel = new \App\Models\SettingModel();
    $settings = $settingModel->getAllSettings();
    ?>
    <footer class="bg-white dark:bg-slate-900 border-t border-slate-200 dark:border-slate-800 mt-20">
        <div class="container mx-auto px-4 py-16">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
                <div class="md:col-span-2">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-8 h-8 bg-primary-600 rounded flex items-center justify-center text-white">
                            <i class="fas fa-bolt text-xs"></i>
                        </div>
                        <h3 class="text-2xl font-black gradient-text">
                            <?= esc($settings['site_name'] ?? 'Portfolio') ?>
                        </h3>
                    </div>
                    <p class="text-slate-500 dark:text-slate-400 leading-relaxed mb-8 max-w-md">
                        <?= esc($settings['site_description'] ?? 'Showcasing my professional journey and experiences.') ?>
                    </p>
                    <div class="flex gap-4">
                        <?php 
                        $socials = [
                            ['url' => $settings['github_url'] ?? '', 'icon' => 'fab fa-github', 'color' => 'hover:bg-slate-800'],
                            ['url' => $settings['linkedin_url'] ?? '', 'icon' => 'fab fa-linkedin', 'color' => 'hover:bg-blue-600'],
                            ['url' => $settings['instagram_url'] ?? '', 'icon' => 'fab fa-instagram', 'color' => 'hover:bg-pink-600'],
                            ['url' => $settings['twitter_url'] ?? '', 'icon' => 'fab fa-twitter', 'color' => 'hover:bg-sky-500'],
                        ];
                        foreach ($socials as $social): if (!empty($social['url'])): ?>
                        <a href="<?= esc($social['url']) ?>" target="_blank" class="w-10 h-10 border border-slate-200 dark:border-slate-800 rounded-lg flex items-center justify-center transition-all duration-300 transform hover:scale-110 hover:-translate-y-1 hover:text-white <?= $social['color'] ?>">
                            <i class="<?= $social['icon'] ?> text-lg"></i>
                        </a>
                        <?php endif; endforeach; ?>
                    </div>
                </div>

                <div>
                    <h4 class="text-sm font-bold uppercase tracking-widest text-slate-400 mb-6">Explore</h4>
                    <ul class="space-y-4">
                        <li><a href="/" class="text-slate-600 dark:text-slate-400 hover:text-primary-500 transition-colors">Homepage</a></li>
                        <li><a href="/activity" class="text-slate-600 dark:text-slate-400 hover:text-primary-500 transition-colors">Our Activities</a></li>
                        <li><a href="/profile" class="text-slate-600 dark:text-slate-400 hover:text-primary-500 transition-colors">User Profiles</a></li>
                        <li><a href="/education" class="text-slate-600 dark:text-slate-400 hover:text-primary-500 transition-colors">Academics</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-sm font-bold uppercase tracking-widest text-slate-400 mb-6">Contact</h4>
                    <ul class="space-y-4 text-slate-600 dark:text-slate-400">
                        <?php if (!empty($settings['contact_location'])): ?>
                        <li class="flex items-start gap-3">
                            <i class="fas fa-map-marker-alt mt-1 text-primary-500"></i>
                            <span class="text-sm leading-relaxed"><?= esc($settings['contact_location']) ?></span>
                        </li>
                        <?php endif; ?>
                        <?php if (!empty($settings['contact_email'])): ?>
                        <li class="flex items-center gap-3">
                            <i class="fas fa-envelope text-primary-500"></i>
                            <a href="mailto:<?= esc($settings['contact_email']) ?>" class="text-sm hover:text-primary-500 transition-colors"><?= esc($settings['contact_email']) ?></a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>

            <div class="mt-16 pt-8 border-t border-slate-200 dark:border-slate-800 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-slate-500 text-sm">
                    &copy; <?= date('Y') ?> <?= esc($settings['site_name'] ?? 'Portfolio') ?>. Crafts with <i class="fas fa-heart text-rose-500"></i>.
                </p>
                <div class="flex items-center gap-2 text-xs text-slate-400 bg-slate-100 dark:bg-slate-800 px-4 py-2 rounded-full">
                    <i class="fas fa-code"></i>
                    <span>CI4 + TailwindCSS</span>
                </div>
            </div>
        </div>
    </footer>

    <script>
        function toggleDarkMode() {
            const html = document.documentElement;
            const icon = document.getElementById('theme-icon');
            const isDark = html.classList.toggle('dark');
            localStorage.setItem('darkMode', isDark);
            
            if (isDark) {
                icon.classList.replace('fa-moon', 'fa-sun');
                icon.classList.add('text-yellow-400');
            } else {
                icon.classList.replace('fa-sun', 'fa-moon');
                icon.classList.remove('text-yellow-400');
            }
        }

        // Initialize icon
        document.addEventListener('DOMContentLoaded', () => {
            const isDark = document.documentElement.classList.contains('dark');
            const icon = document.getElementById('theme-icon');
            if (isDark) {
                icon.classList.replace('fa-moon', 'fa-sun');
                icon.classList.add('text-yellow-400');
            }
        });
    </script>
</body>
</html>
