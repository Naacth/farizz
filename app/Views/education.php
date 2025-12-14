<?= $this->extend('layouts/public') ?>

<?= $this->section('content') ?>

<!-- Page Header -->
<section class="relative bg-gradient-to-r from-emerald-600 via-teal-600 to-emerald-700 text-white py-24 overflow-hidden">
    <div class="absolute inset-0">
        <div class="absolute top-10 left-10 w-64 h-64 bg-white/10 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-10 right-10 w-80 h-80 bg-teal-300/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 1.5s;"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center fade-in-up">
            <span class="inline-block bg-white/20 backdrop-blur-sm px-6 py-2 rounded-full mb-4">
                <i class="fas fa-book-open mr-2"></i>Learning Journey
            </span>
            <h1 class="text-6xl font-black mb-4">
                Education <span class="bg-gradient-to-r from-yellow-300 to-orange-300 bg-clip-text text-transparent">History</span>
            </h1>
            <p class="text-xl text-emerald-100 max-w-2xl mx-auto">My educational journey from elementary to university</p>
        </div>
    </div>
</section>

<!-- Education Section -->
<section class="py-16 bg-gradient-to-br from-gray-50 to-white">
    <div class="container mx-auto px-4">
        <?php if (!empty($education)): ?>
            <div class="max-w-5xl mx-auto">
                <!-- Timeline -->
                <div class="relative">
                    <!-- Timeline Line -->
                    <div class="absolute left-8 md:left-1/2 top-0 bottom-0 w-1 bg-gradient-to-b from-emerald-400 to-teal-500 transform md:-translate-x-1/2"></div>
                    
                    <div class="space-y-12">
                        <?php foreach ($education as $index => $edu): ?>
                            <div class="relative <?= $index % 2 === 0 ? 'md:pr-1/2' : 'md:pl-1/2 md:text-right' ?>">
                                <!-- Timeline Node -->
                                <div class="absolute left-8 md:left-1/2 w-6 h-6 bg-white border-4 
                                    <?php
                                    switch($edu['level']) {
                                        case 'SD': echo 'border-green-500'; break;
                                        case 'SMP': echo 'border-blue-500'; break;
                                        case 'SMA': echo 'border-purple-500'; break;
                                        case 'Kuliah': echo 'border-emerald-500'; break;
                                        default: echo 'border-gray-500';
                                    }
                                    ?>
                                    rounded-full transform md:-translate-x-1/2 z-10 shadow-lg">
                                </div>
                                
                                <!-- Content Card -->
                                <div class="ml-20 md:ml-0 <?= $index % 2 === 0 ? 'md:mr-12' : 'md:ml-12' ?> group">
                                    <!-- Glow Effect -->
                                    <div class="absolute inset-0 
                                        <?php
                                        switch($edu['level']) {
                                            case 'SD': echo 'bg-gradient-to-r from-green-300 to-emerald-400'; break;
                                            case 'SMP': echo 'bg-gradient-to-r from-blue-300 to-sky-400'; break;
                                            case 'SMA': echo 'bg-gradient-to-r from-purple-300 to-pink-400'; break;
                                            case 'Kuliah': echo 'bg-gradient-to-r from-emerald-300 to-teal-400'; break;
                                            default: echo 'bg-gradient-to-r from-gray-300 to-gray-400';
                                        }
                                        ?>
                                        rounded-3xl blur-xl opacity-0 group-hover:opacity-40 transition-opacity duration-500">
                                    </div>
                                    
                                    <div class="relative bg-white p-8 rounded-3xl shadow-xl border-l-8
                                        <?php
                                        switch($edu['level']) {
                                            case 'SD': echo 'border-green-500'; break;
                                            case 'SMP': echo 'border-blue-500'; break;
                                            case 'SMA': echo 'border-purple-500'; break;
                                            case 'Kuliah': echo 'border-emerald-500'; break;
                                            default: echo 'border-gray-500';
                                        }
                                        ?>
                                        group-hover:-translate-y-2 transition-all duration-300">
                                        
                                        <div class="flex flex-wrap items-center gap-3 mb-4">
                                            <span class="px-5 py-2 rounded-full text-sm font-black shadow-lg
                                                <?php
                                                switch($edu['level']) {
                                                    case 'SD': echo 'bg-gradient-to-r from-green-500 to-emerald-500 text-white'; break;
                                                    case 'SMP': echo 'bg-gradient-to-r from-blue-500 to-sky-500 text-white'; break;
                                                    case 'SMA': echo 'bg-gradient-to-r from-purple-500 to-pink-500 text-white'; break;
                                                    case 'Kuliah': echo 'bg-gradient-to-r from-emerald-500 to-teal-500 text-white'; break;
                                                    default: echo 'bg-gray-500 text-white';
                                                }
                                                ?>">
                                                <i class="fas fa-graduation-cap mr-2"></i>
                                                <?= esc($edu['level']) ?>
                                            </span>
                                            <span class="bg-gray-100 px-4 py-2 rounded-full text-gray-700 font-bold text-sm flex items-center">
                                                <i class="fas fa-calendar-alt mr-2 text-emerald-600"></i>
                                                <?= esc($edu['start_year']) ?> - <?= $edu['end_year'] ? esc($edu['end_year']) : 'Present' ?>
                                            </span>
                                        </div>
                                        
                                        <h3 class="text-2xl font-black text-gray-800 mb-3 group-hover:text-emerald-600 transition-colors">
                                            <i class="fas fa-school text-emerald-600 mr-2"></i>
                                            <?= esc($edu['institution_name']) ?>
                                        </h3>
                                        
                                        <?php if ($edu['description']): ?>
                                            <div class="mt-4 bg-gray-50 p-4 rounded-2xl border border-gray-200">
                                                <p class="text-gray-700 leading-relaxed"><?= nl2br(esc($edu['description'])) ?></p>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="text-center py-24">
                <div class="inline-block bg-gray-100 p-8 rounded-full mb-6">
                    <i class="fas fa-book-open text-6xl text-gray-400"></i>
                </div>
                <p class="text-2xl text-gray-500 font-bold mb-4">No education records available</p>
                <p class="text-gray-400 mb-8">Add your education history to showcase your learning journey</p>
                <a href="/" class="inline-block bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 text-white px-8 py-4 rounded-2xl font-bold shadow-lg hover:shadow-2xl transition-all transform hover:scale-105">
                    <i class="fas fa-home mr-2"></i>Back to Home
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>

<?= $this->endSection() ?>
