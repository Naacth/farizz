<?= $this->extend('layouts/public') ?>

<?= $this->section('content') ?>

<!-- Page Header -->
<section class="relative bg-gradient-to-r from-emerald-600 via-teal-600 to-emerald-700 dark:from-slate-900 dark:via-emerald-900 dark:to-slate-900 text-white py-16 md:py-24 overflow-hidden">
    <div class="absolute inset-0">
        <div class="absolute top-5 left-5 md:top-10 md:left-10 w-32 md:w-64 h-32 md:h-64 bg-white/10 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-5 right-5 md:bottom-10 md:right-10 w-40 md:w-80 h-40 md:h-80 bg-teal-300/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 1.5s;"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center fade-in-up">
            <span class="inline-block bg-white/20 dark:bg-slate-800/40 backdrop-blur-sm px-4 md:px-6 py-2 rounded-full mb-3 md:mb-4 text-sm">
                <i class="fas fa-book-open mr-2"></i>Education
            </span>
            <h1 class="text-3xl sm:text-4xl md:text-6xl font-black mb-3 md:mb-4">
                Education <span class="bg-gradient-to-r from-yellow-300 to-orange-300 bg-clip-text text-transparent">History</span>
            </h1>
            <p class="text-base md:text-xl text-emerald-100 dark:text-slate-300 max-w-2xl mx-auto px-4">My journey from elementary to university</p>
        </div>
    </div>
</section>

<!-- Education Section -->
<section class="py-10 md:py-16 bg-gradient-to-br from-gray-50 to-white dark:from-slate-900 dark:to-slate-800 transition-colors duration-300">
    <div class="container mx-auto px-4">
        <!-- Enhanced Search and Filter -->
        <div class="max-w-5xl mx-auto mb-8 md:mb-12">
            <div class="bg-white dark:bg-slate-800 p-4 md:p-8 rounded-2xl md:rounded-3xl shadow-2xl border border-gray-100 dark:border-slate-700">
                <form method="GET" action="/education" class="flex flex-col md:flex-row flex-wrap gap-4 md:gap-6">
                    <div class="flex-1 min-w-0">
                        <label class="block text-xs md:text-sm font-bold text-gray-700 dark:text-slate-300 mb-2 md:mb-3">
                            <i class="fas fa-search mr-1 md:mr-2 text-emerald-600 dark:text-emerald-400"></i>Search
                        </label>
                        <input type="text" name="search" value="<?= esc($search) ?>" 
                               placeholder="Search..." 
                               class="w-full px-4 md:px-6 py-3 md:py-4 bg-white dark:bg-slate-900 border-2 border-gray-200 dark:border-slate-700 rounded-xl md:rounded-2xl focus:ring-4 focus:ring-emerald-200 dark:focus:ring-emerald-900/50 focus:border-emerald-500 dark:focus:border-emerald-500 focus:outline-none transition-all text-base md:text-lg dark:text-white">
                    </div>
                    <div class="flex gap-3 md:gap-4">
                        <div class="flex-1 md:w-40">
                            <label class="block text-xs md:text-sm font-bold text-gray-700 dark:text-slate-300 mb-2 md:mb-3">
                                <i class="fas fa-sort mr-1 text-emerald-600 dark:text-emerald-400"></i>Sort
                            </label>
                            <select name="sort_by" class="w-full px-3 md:px-6 py-3 md:py-4 border-2 border-gray-200 dark:border-slate-700 rounded-xl md:rounded-2xl focus:ring-4 focus:ring-emerald-200 dark:focus:ring-emerald-900/50 focus:border-emerald-500 dark:focus:border-emerald-500 appearance-none bg-white dark:bg-slate-900 text-sm md:text-lg font-medium dark:text-white">
                                <option value="start_year" <?= $sortBy === 'start_year' ? 'selected' : '' ?>>Year</option>
                                <option value="level" <?= $sortBy === 'level' ? 'selected' : '' ?>>Level</option>
                                <option value="institution_name" <?= $sortBy === 'institution_name' ? 'selected' : '' ?>>Name</option>
                            </select>
                        </div>
                        <div class="w-20 md:w-32">
                            <label class="block text-xs md:text-sm font-bold text-gray-700 dark:text-slate-300 mb-2 md:mb-3">Order</label>
                            <select name="sort_order" class="w-full px-2 md:px-6 py-3 md:py-4 border-2 border-gray-200 dark:border-slate-700 rounded-xl md:rounded-2xl focus:ring-4 focus:ring-emerald-200 dark:focus:ring-emerald-900/50 focus:border-emerald-500 dark:focus:border-emerald-500 appearance-none bg-white dark:bg-slate-900 text-sm md:text-lg font-medium dark:text-white">
                                <option value="ASC" <?= $sortOrder === 'ASC' ? 'selected' : '' ?>>↑</option>
                                <option value="DESC" <?= $sortOrder === 'DESC' ? 'selected' : '' ?>>↓</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex items-end w-full md:w-auto">
                        <button type="submit" class="w-full md:w-auto bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 text-white px-6 md:px-8 py-3 md:py-4 rounded-xl md:rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 font-bold text-base md:text-lg">
                            <i class="fas fa-filter mr-2"></i>Apply
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <?php if (!empty($education)): ?>
            <div class="max-w-5xl mx-auto">
                <!-- Timeline -->
                <div class="relative">
                    <!-- Timeline Line (only visible on desktop) -->
                    <div class="absolute left-4 md:left-1/2 top-0 bottom-0 w-0.5 md:w-1 bg-gradient-to-b from-emerald-400 to-teal-500 transform md:-translate-x-1/2"></div>
                    
                    <div class="space-y-6 md:space-y-12">
                        <?php foreach ($education as $index => $edu): ?>
                            <div class="relative">
                                <!-- Timeline Node -->
                                <div class="absolute left-4 md:left-1/2 w-4 h-4 md:w-6 md:h-6 bg-white dark:bg-slate-900 border-4 
                                    <?php
                                    switch($edu['level']) {
                                        case 'SD': echo 'border-green-500'; break;
                                        case 'SMP': echo 'border-blue-500'; break;
                                        case 'SMA': echo 'border-purple-500'; break;
                                        case 'Kuliah': echo 'border-emerald-500'; break;
                                        default: echo 'border-gray-500';
                                    }
                                    ?>
                                    rounded-full transform -translate-x-1/2 md:-translate-x-1/2 z-10 shadow-lg">
                                </div>
                                
                                <!-- Content Card -->
                                <div class="ml-10 md:ml-0 <?= $index % 2 === 0 ? 'md:mr-[52%]' : 'md:ml-[52%]' ?> group">
                                    <div class="relative bg-white dark:bg-slate-800 p-4 md:p-8 rounded-xl md:rounded-3xl shadow-xl border-l-4 md:border-l-8
                                        <?php
                                        switch($edu['level']) {
                                            case 'SD': echo 'border-green-500'; break;
                                            case 'SMP': echo 'border-blue-500'; break;
                                            case 'SMA': echo 'border-purple-500'; break;
                                            case 'Kuliah': echo 'border-emerald-500'; break;
                                            default: echo 'border-gray-500';
                                        }
                                        ?>
                                        group-hover:-translate-y-1 md:group-hover:-translate-y-2 transition-all duration-300">
                                        
                                        <div class="flex flex-wrap items-center gap-2 md:gap-3 mb-3 md:mb-4">
                                            <span class="px-3 md:px-5 py-1.5 md:py-2 rounded-full text-xs md:text-sm font-black shadow-lg
                                                <?php
                                                switch($edu['level']) {
                                                    case 'SD': echo 'bg-gradient-to-r from-green-500 to-emerald-500 text-white'; break;
                                                    case 'SMP': echo 'bg-gradient-to-r from-blue-500 to-sky-500 text-white'; break;
                                                    case 'SMA': echo 'bg-gradient-to-r from-purple-500 to-pink-500 text-white'; break;
                                                    case 'Kuliah': echo 'bg-gradient-to-r from-emerald-500 to-teal-500 text-white'; break;
                                                    default: echo 'bg-gray-500 text-white';
                                                }
                                                ?>">
                                                <i class="fas fa-graduation-cap mr-1 md:mr-2"></i>
                                                <?= esc($edu['level']) ?>
                                            </span>
                                            <span class="bg-gray-100 dark:bg-slate-900 px-2 md:px-4 py-1.5 md:py-2 rounded-full text-gray-700 dark:text-slate-300 font-bold text-xs md:text-sm flex items-center">
                                                <i class="fas fa-calendar-alt mr-1 md:mr-2 text-emerald-600 dark:text-emerald-400"></i>
                                                <?= esc($edu['start_year']) ?> - <?= $edu['end_year'] ? esc($edu['end_year']) : 'Now' ?>
                                            </span>
                                        </div>
                                        
                                        <h3 class="text-lg md:text-2xl font-black text-gray-800 dark:text-white mb-2 md:mb-3 group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition-colors">
                                            <i class="fas fa-school text-emerald-600 dark:text-emerald-400 mr-1 md:mr-2"></i>
                                            <?= esc($edu['institution_name']) ?>
                                        </h3>
                                        
                                        <?php if ($edu['description']): ?>
                                            <div class="mt-3 md:mt-4 bg-gray-50 dark:bg-slate-900/50 p-3 md:p-4 rounded-xl md:rounded-2xl border border-gray-200 dark:border-slate-700">
                                                <p class="text-sm md:text-base text-gray-700 dark:text-slate-300 leading-relaxed"><?= nl2br(esc($edu['description'])) ?></p>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Enhanced Pagination -->
                <?php if ($pager): ?>
                    <div class="mt-10 md:mt-16 flex justify-center">
                        <div class="bg-white dark:bg-slate-800 rounded-xl md:rounded-2xl shadow-xl px-4 md:px-8 py-3 md:py-5 border border-gray-100 dark:border-slate-700">
                            <?= $pager->links() ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php else: ?>
            <div class="text-center py-16 md:py-24 px-4">
                <div class="inline-block bg-gray-100 dark:bg-slate-800 p-6 md:p-8 rounded-full mb-4 md:mb-6">
                    <i class="fas fa-book-open text-4xl md:text-6xl text-gray-400 dark:text-slate-600"></i>
                </div>
                <p class="text-xl md:text-2xl text-gray-500 dark:text-slate-400 font-bold mb-3 md:mb-4">No education records</p>
                <p class="text-sm md:text-base text-gray-400 dark:text-slate-500 mb-6 md:mb-8">Add your education history</p>
                <a href="/" class="inline-block bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 text-white px-6 md:px-8 py-3 md:py-4 rounded-xl md:rounded-2xl font-bold shadow-lg hover:shadow-2xl transition-all text-sm md:text-base">
                    <i class="fas fa-home mr-2"></i>Back to Home
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>

<?= $this->endSection() ?>
