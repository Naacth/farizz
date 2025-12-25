<?= $this->extend('layouts/public') ?>

<?= $this->section('content') ?>

<!-- Hero Section with Parallax -->
<section class="relative bg-gradient-to-r from-sky-600 via-blue-600 to-sky-700 dark:from-slate-900 dark:via-primary-900 dark:to-slate-900 text-white py-20 md:py-40 overflow-hidden">
    <!-- Animated Background Shapes -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-10 left-5 md:top-20 md:left-10 w-40 md:w-72 h-40 md:h-72 bg-white/10 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-10 right-5 md:bottom-20 md:right-20 w-48 md:w-96 h-48 md:h-96 bg-blue-300/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
    </div>

    <div class="container mx-auto px-4 text-center relative z-10 fade-in-up">
        <div class="mb-4 md:mb-6">
            <span class="inline-block bg-white/20 dark:bg-slate-800/40 backdrop-blur-sm px-4 md:px-6 py-2 rounded-full text-sky-100 font-medium text-sm md:text-base">
                <i class="fas fa-star mr-2"></i>Portfolio
            </span>
        </div>
        <h1 class="text-4xl sm:text-5xl md:text-7xl font-black mb-4 md:mb-6 leading-tight">
            Welcome to My
            <span class="block bg-gradient-to-r from-yellow-300 to-orange-300 bg-clip-text text-transparent">
                Portfolio
            </span>
        </h1>
        <p class="text-base md:text-2xl text-sky-100 dark:text-slate-300 max-w-3xl mx-auto mb-8 md:mb-12 leading-relaxed px-4">
            Explore my <strong>professional journey</strong> through activities, profile, and education
        </p>
        <div class="mt-8 md:mt-12 flex flex-col sm:flex-row justify-center gap-3 md:gap-6 px-4">
            <a href="/activity" class="group bg-white dark:bg-slate-800 text-sky-700 dark:text-primary-400 px-6 md:px-10 py-4 md:py-5 rounded-xl md:rounded-2xl font-bold hover:bg-sky-50 dark:hover:bg-slate-700 transition-all duration-300 inline-flex items-center justify-center shadow-2xl">
                <i class="fas fa-calendar-check mr-2 md:mr-3 text-xl md:text-3xl"></i>
                <div class="text-left">
                    <div class="text-xs md:text-sm text-sky-600 dark:text-primary-500">Explore</div>
                    <div class="text-base md:text-xl">Activities</div>
                </div>
            </a>
            <a href="/profile" class="group bg-gradient-to-r from-purple-500 to-pink-500 text-white px-6 md:px-10 py-4 md:py-5 rounded-xl md:rounded-2xl font-bold hover:from-purple-600 hover:to-pink-600 transition-all duration-300 inline-flex items-center justify-center shadow-2xl">
                <i class="fas fa-user-circle mr-2 md:mr-3 text-xl md:text-3xl"></i>
                <div class="text-left">
                    <div class="text-xs md:text-sm text-purple-100">View</div>
                    <div class="text-base md:text-xl">Profile</div>
                </div>
            </a>
            <a href="/education" class="group bg-gradient-to-r from-emerald-500 to-teal-500 text-white px-6 md:px-10 py-4 md:py-5 rounded-xl md:rounded-2xl font-bold hover:from-emerald-600 hover:to-teal-600 transition-all duration-300 inline-flex items-center justify-center shadow-2xl">
                <i class="fas fa-graduation-cap mr-2 md:mr-3 text-xl md:text-3xl"></i>
                <div class="text-left">
                    <div class="text-xs md:text-sm text-emerald-100">Discover</div>
                    <div class="text-base md:text-xl">Education</div>
                </div>
            </a>
        </div>
        
        <!-- Scroll Indicator -->
        <div class="mt-10 md:mt-16 animate-bounce hidden md:block">
            <i class="fas fa-chevron-down text-2xl md:text-3xl text-white/70"></i>
        </div>
    </div>
</section>

<!-- Overview Section -->
<section class="py-12 md:py-24 bg-gradient-to-br from-gray-50 to-white dark:from-slate-900 dark:to-slate-800 relative overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute top-0 right-0 w-32 md:w-64 h-32 md:h-64 bg-sky-100 dark:bg-primary-900/20 rounded-full blur-3xl opacity-50"></div>
    <div class="absolute bottom-0 left-0 w-48 md:w-96 h-48 md:h-96 bg-purple-100 dark:bg-purple-900/20 rounded-full blur-3xl opacity-50"></div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-10 md:mb-20 fade-in-up">
            <span class="inline-block bg-sky-100 dark:bg-primary-900/30 text-sky-700 dark:text-primary-400 px-3 md:px-4 py-1.5 md:py-2 rounded-full text-xs md:text-sm font-bold mb-3 md:mb-4">
                SECTIONS
            </span>
            <h2 class="text-3xl sm:text-4xl md:text-6xl font-black gradient-text mb-4 md:mb-6">
                Explore My Journey
            </h2>
            <div class="w-20 md:w-32 h-1.5 md:h-2 bg-gradient-to-r from-sky-500 to-purple-500 mx-auto rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-10 max-w-7xl mx-auto">
            <!-- Activities Card -->
            <div class="group relative">
                <div class="absolute inset-0 bg-gradient-to-r from-sky-400 to-blue-500 rounded-2xl md:rounded-3xl blur-xl opacity-50 group-hover:opacity-100 transition-opacity duration-500"></div>
                <a href="/activity" class="relative block bg-white dark:bg-slate-800 p-6 md:p-10 rounded-2xl md:rounded-3xl shadow-2xl hover-lift border border-gray-100 dark:border-slate-700 overflow-hidden">
                    <div class="absolute top-0 right-0 w-20 md:w-32 h-20 md:h-32 bg-sky-100 dark:bg-primary-900/20 rounded-full -mr-10 md:-mr-16 -mt-10 md:-mt-16 group-hover:scale-150 transition-transform duration-500"></div>
                    <div class="relative">
                        <div class="inline-block bg-gradient-to-r from-sky-500 to-blue-500 p-4 md:p-6 rounded-xl md:rounded-2xl mb-4 md:mb-6 group-hover:scale-110 transition-all duration-300 shadow-lg">
                            <i class="fas fa-calendar-check text-white text-3xl md:text-5xl"></i>
                        </div>
                        <h3 class="text-xl md:text-3xl font-black text-gray-800 dark:text-white mb-2 md:mb-4 group-hover:text-sky-600 transition-colors">Daily Activities</h3>
                        <p class="text-sm md:text-base text-gray-600 dark:text-slate-400 mb-4 md:mb-6 leading-relaxed">Track my daily professional activities with photos and videos</p>
                        <div class="flex items-center text-sky-600 dark:text-primary-500 font-bold gap-2 text-sm md:text-base">
                            <span>Explore Now</span>
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Profile Card -->
            <div class="group relative">
                <div class="absolute inset-0 bg-gradient-to-r from-purple-400 to-pink-500 rounded-2xl md:rounded-3xl blur-xl opacity-50 group-hover:opacity-100 transition-opacity duration-500"></div>
                <a href="/profile" class="relative block bg-white dark:bg-slate-800 p-6 md:p-10 rounded-2xl md:rounded-3xl shadow-2xl hover-lift border border-gray-100 dark:border-slate-700 overflow-hidden">
                    <div class="absolute top-0 right-0 w-20 md:w-32 h-20 md:h-32 bg-purple-100 dark:bg-purple-900/20 rounded-full -mr-10 md:-mr-16 -mt-10 md:-mt-16 group-hover:scale-150 transition-transform duration-500"></div>
                    <div class="relative">
                        <div class="inline-block bg-gradient-to-r from-purple-500 to-pink-500 p-4 md:p-6 rounded-xl md:rounded-2xl mb-4 md:mb-6 group-hover:scale-110 transition-all duration-300 shadow-lg">
                            <i class="fas fa-user-circle text-white text-3xl md:text-5xl"></i>
                        </div>
                        <h3 class="text-xl md:text-3xl font-black text-gray-800 dark:text-white mb-2 md:mb-4 group-hover:text-purple-600 transition-colors">Professional Profile</h3>
                        <p class="text-sm md:text-base text-gray-600 dark:text-slate-400 mb-4 md:mb-6 leading-relaxed">View my complete CV including contact and career summary</p>
                        <div class="flex items-center text-purple-600 dark:text-purple-400 font-bold gap-2 text-sm md:text-base">
                            <span>View Profile</span>
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Education Card -->
            <div class="group relative">
                <div class="absolute inset-0 bg-gradient-to-r from-emerald-400 to-teal-500 rounded-2xl md:rounded-3xl blur-xl opacity-50 group-hover:opacity-100 transition-opacity duration-500"></div>
                <a href="/education" class="relative block bg-white dark:bg-slate-800 p-6 md:p-10 rounded-2xl md:rounded-3xl shadow-2xl hover-lift border border-gray-100 dark:border-slate-700 overflow-hidden">
                    <div class="absolute top-0 right-0 w-20 md:w-32 h-20 md:h-32 bg-emerald-100 dark:bg-emerald-900/20 rounded-full -mr-10 md:-mr-16 -mt-10 md:-mt-16 group-hover:scale-150 transition-transform duration-500"></div>
                    <div class="relative">
                        <div class="inline-block bg-gradient-to-r from-emerald-500 to-teal-500 p-4 md:p-6 rounded-xl md:rounded-2xl mb-4 md:mb-6 group-hover:scale-110 transition-all duration-300 shadow-lg">
                            <i class="fas fa-graduation-cap text-white text-3xl md:text-5xl"></i>
                        </div>
                        <h3 class="text-xl md:text-3xl font-black text-gray-800 dark:text-white mb-2 md:mb-4 group-hover:text-emerald-600 transition-colors">Education History</h3>
                        <p class="text-sm md:text-base text-gray-600 dark:text-slate-400 mb-4 md:mb-6 leading-relaxed">Discover my educational journey from elementary to university</p>
                        <div class="flex items-center text-emerald-600 dark:text-emerald-400 font-bold gap-2 text-sm md:text-base">
                            <span>View Education</span>
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
