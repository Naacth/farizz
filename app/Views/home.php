<?= $this->extend('layouts/public') ?>

<?= $this->section('content') ?>

<!-- Hero Section with Parallax -->
<section class="relative bg-gradient-to-r from-sky-600 via-blue-600 to-sky-700 dark:from-slate-900 dark:via-primary-900 dark:to-slate-900 text-white py-40 overflow-hidden">
    <!-- Animated Background Shapes -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-20 left-10 w-72 h-72 bg-white/10 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-20 right-20 w-96 h-96 bg-blue-300/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
        <div class="absolute top-1/2 left-1/3 w-64 h-64 bg-sky-300/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 2s;"></div>
    </div>

    <div class="container mx-auto px-4 text-center relative z-10 fade-in-up">
        <div class="mb-6">
            <span class="inline-block bg-white/20 dark:bg-slate-800/40 backdrop-blur-sm px-6 py-2 rounded-full text-sky-100 font-medium mb-6">
                <i class="fas fa-star mr-2"></i>Professional Portfolio
            </span>
        </div>
        <h1 class="text-7xl font-black mb-6 leading-tight">
            Welcome to My
            <span class="block bg-gradient-to-r from-yellow-300 to-orange-300 bg-clip-text text-transparent">
                Portfolio
            </span>
        </h1>
        <p class="text-2xl text-sky-100 dark:text-slate-300 max-w-3xl mx-auto mb-12 leading-relaxed">
            Explore my <strong>professional journey</strong> through daily activities, career profile, and educational achievements
        </p>
        <div class="mt-12 flex justify-center gap-6 flex-wrap">
            <a href="/activity" class="group bg-white dark:bg-slate-800 text-sky-700 dark:text-primary-400 px-10 py-5 rounded-2xl font-bold hover:bg-sky-50 dark:hover:bg-slate-700 transition-all duration-300 inline-flex items-center shadow-2xl hover:shadow-sky-300/50 transform hover:scale-110 hover:-translate-y-2">
                <i class="fas fa-calendar-check mr-3 text-3xl group-hover:rotate-12 transition-transform"></i>
                <div class="text-left">
                    <div class="text-sm text-sky-600 dark:text-primary-500">Explore</div>
                    <div class="text-xl">Activities</div>
                </div>
            </a>
            <a href="/profile" class="group bg-gradient-to-r from-purple-500 to-pink-500 text-white px-10 py-5 rounded-2xl font-bold hover:from-purple-600 hover:to-pink-600 transition-all duration-300 inline-flex items-center shadow-2xl hover:shadow-purple-300/50 transform hover:scale-110 hover:-translate-y-2">
                <i class="fas fa-user-circle mr-3 text-3xl group-hover:rotate-12 transition-transform"></i>
                <div class="text-left">
                    <div class="text-sm text-purple-100">View</div>
                    <div class="text-xl">Profile</div>
                </div>
            </a>
            <a href="/education" class="group bg-gradient-to-r from-emerald-500 to-teal-500 text-white px-10 py-5 rounded-2xl font-bold hover:from-emerald-600 hover:to-teal-600 transition-all duration-300 inline-flex items-center shadow-2xl hover:shadow-emerald-300/50 transform hover:scale-110 hover:-translate-y-2">
                <i class="fas fa-graduation-cap mr-3 text-3xl group-hover:rotate-12 transition-transform"></i>
                <div class="text-left">
                    <div class="text-sm text-emerald-100">Discover</div>
                    <div class="text-xl">Education</div>
                </div>
            </a>
        </div>
        
        <!-- Scroll Indicator -->
        <div class="mt-16 animate-bounce">
            <i class="fas fa-chevron-down text-3xl text-white/70"></i>
        </div>
    </div>
</section>

<!-- Overview Section -->
<section class="py-24 bg-gradient-to-br from-gray-50 to-white dark:from-slate-900 dark:to-slate-800 relative overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute top-0 right-0 w-64 h-64 bg-sky-100 dark:bg-primary-900/20 rounded-full blur-3xl opacity-50"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-purple-100 dark:bg-purple-900/20 rounded-full blur-3xl opacity-50"></div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-20 fade-in-up">
            <span class="inline-block bg-sky-100 dark:bg-primary-900/30 text-sky-700 dark:text-primary-400 px-4 py-2 rounded-full text-sm font-bold mb-4">
                PORTFOLIO SECTIONS
            </span>
            <h2 class="text-6xl font-black gradient-text mb-6">
                Explore My Journey
            </h2>
            <div class="w-32 h-2 bg-gradient-to-r from-sky-500 to-purple-500 mx-auto rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 max-w-7xl mx-auto">
            <!-- Activities Card -->
            <div class="group relative">
                <div class="absolute inset-0 bg-gradient-to-r from-sky-400 to-blue-500 rounded-3xl blur-xl opacity-50 group-hover:opacity-100 transition-opacity duration-500"></div>
                <a href="/activity" class="relative block bg-white dark:bg-slate-800 p-10 rounded-3xl shadow-2xl hover-lift border border-gray-100 dark:border-slate-700 overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-sky-100 dark:bg-primary-900/20 rounded-full -mr-16 -mt-16 group-hover:scale-150 transition-transform duration-500"></div>
                    <div class="relative">
                        <div class="inline-block bg-gradient-to-r from-sky-500 to-blue-500 p-6 rounded-2xl mb-6 group-hover:scale-110 group-hover:rotate-6 transition-all duration-300 shadow-lg">
                            <i class="fas fa-calendar-check text-white text-5xl"></i>
                        </div>
                        <h3 class="text-3xl font-black text-gray-800 dark:text-white mb-4 group-hover:text-sky-600 transition-colors">Daily Activities</h3>
                        <p class="text-gray-600 dark:text-slate-400 mb-6 leading-relaxed">Track and showcase my daily professional activities with stunning photos and videos</p>
                        <div class="flex items-center text-sky-600 dark:text-primary-500 font-bold group-hover:gap-4 gap-2 transition-all">
                            <span>Explore Now</span>
                            <i class="fas fa-arrow-right group-hover:translate-x-2 transition-transform"></i>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Profile Card -->
            <div class="group relative">
                <div class="absolute inset-0 bg-gradient-to-r from-purple-400 to-pink-500 rounded-3xl blur-xl opacity-50 group-hover:opacity-100 transition-opacity duration-500"></div>
                <a href="/profile" class="relative block bg-white dark:bg-slate-800 p-10 rounded-3xl shadow-2xl hover-lift border border-gray-100 dark:border-slate-700 overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-purple-100 dark:bg-purple-900/20 rounded-full -mr-16 -mt-16 group-hover:scale-150 transition-transform duration-500"></div>
                    <div class="relative">
                        <div class="inline-block bg-gradient-to-r from-purple-500 to-pink-500 p-6 rounded-2xl mb-6 group-hover:scale-110 group-hover:rotate-6 transition-all duration-300 shadow-lg">
                            <i class="fas fa-user-circle text-white text-5xl"></i>
                        </div>
                        <h3 class="text-3xl font-black text-gray-800 dark:text-white mb-4 group-hover:text-purple-600 transition-colors">Professional Profile</h3>
                        <p class="text-gray-600 dark:text-slate-400 mb-6 leading-relaxed">View my complete CV including contact information and career summary</p>
                        <div class="flex items-center text-purple-600 dark:text-purple-400 font-bold group-hover:gap-4 gap-2 transition-all">
                            <span>View Profile</span>
                            <i class="fas fa-arrow-right group-hover:translate-x-2 transition-transform"></i>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Education Card -->
            <div class="group relative">
                <div class="absolute inset-0 bg-gradient-to-r from-emerald-400 to-teal-500 rounded-3xl blur-xl opacity-50 group-hover:opacity-100 transition-opacity duration-500"></div>
                <a href="/education" class="relative block bg-white dark:bg-slate-800 p-10 rounded-3xl shadow-2xl hover-lift border border-gray-100 dark:border-slate-700 overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-100 dark:bg-emerald-900/20 rounded-full -mr-16 -mt-16 group-hover:scale-150 transition-transform duration-500"></div>
                    <div class="relative">
                        <div class="inline-block bg-gradient-to-r from-emerald-500 to-teal-500 p-6 rounded-2xl mb-6 group-hover:scale-110 group-hover:rotate-6 transition-all duration-300 shadow-lg">
                            <i class="fas fa-graduation-cap text-white text-5xl"></i>
                        </div>
                        <h3 class="text-3xl font-black text-gray-800 dark:text-white mb-4 group-hover:text-emerald-600 transition-colors">Education History</h3>
                        <p class="text-gray-600 dark:text-slate-400 mb-6 leading-relaxed">Discover my educational journey from elementary school to university</p>
                        <div class="flex items-center text-emerald-600 dark:text-emerald-400 font-bold group-hover:gap-4 gap-2 transition-all">
                            <span>View Education</span>
                            <i class="fas fa-arrow-right group-hover:translate-x-2 transition-transform"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
