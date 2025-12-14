<?= $this->extend('layouts/public') ?>

<?= $this->section('content') ?>

<!-- Page Header with Gradient Animation -->
<section class="relative bg-gradient-to-r from-sky-600 via-blue-600 to-sky-700 text-white py-24 overflow-hidden">
    <div class="absolute inset-0">
        <div class="absolute top-10 left-10 w-64 h-64 bg-white/10 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-10 right-10 w-80 h-80 bg-blue-300/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 1.5s;"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center fade-in-up">
            <span class="inline-block bg-white/20 backdrop-blur-sm px-6 py-2 rounded-full mb-4">
                <i class="fas fa-calendar-alt mr-2"></i>Portfolio Activities
            </span>
            <h1 class="text-6xl font-black mb-4">
                Daily <span class="bg-gradient-to-r from-yellow-300 to-orange-300 bg-clip-text text-transparent">Activities</span>
            </h1>
            <p class="text-xl text-sky-100 max-w-2xl mx-auto">Track my professional journey with photos and videos</p>
        </div>
    </div>
</section>

<!-- Activities Section -->
<section class="py-16 bg-gradient-to-br from-gray-50 to-white">
    <div class="container mx-auto px-4">
        <!-- Enhanced Search and Filter -->
        <div class="max-w-5xl mx-auto mb-12">
            <div class="bg-white p-8 rounded-3xl shadow-2xl border border-gray-100">
                <form method="GET" action="/activity" class="flex flex-wrap gap-6">
                    <div class="flex-1 min-w-[300px]">
                        <label class="block text-sm font-bold text-gray-700 mb-3">
                            <i class="fas fa-search mr-2 text-sky-600"></i>Search Activities
                        </label>
                        <input type="text" name="search" value="<?= esc($search) ?>" 
                               placeholder="Search by name or date..." 
                               class="w-full px-6 py-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-sky-200 focus:border-sky-500 focus:outline-none transition-all text-lg">
                    </div>
                    <div class="w-48">
                        <label class="block text-sm font-bold text-gray-700 mb-3">
                            <i class="fas fa-sort mr-2 text-sky-600"></i>Sort By
                        </label>
                        <select name="sort_by" class="w-full px-6 py-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-sky-200 focus:border-sky-500 appearance-none bg-white text-lg font-medium">
                            <option value="date" <?= $sortBy === 'date' ? 'selected' : '' ?>>Date</option>
                            <option value="activity_name" <?= $sortBy === 'activity_name' ? 'selected' : '' ?>>Name</option>
                        </select>
                    </div>
                    <div class="w-32">
                        <label class="block text-sm font-bold text-gray-700 mb-3">Order</label>
                        <select name="sort_order" class="w-full px-6 py-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-sky-200 focus:border-sky-500 appearance-none bg-white text-lg font-medium">
                            <option value="ASC" <?= $sortOrder === 'ASC' ? 'selected' : '' ?>>↑ ASC</option>
                            <option value="DESC" <?= $sortOrder === 'DESC' ? 'selected' : '' ?>>↓ DESC</option>
                        </select>
                    </div>
                    <div class="flex items-end">
                        <button type="submit" class="bg-gradient-to-r from-sky-600 to-blue-600 hover:from-sky-700 hover:to-blue-700 text-white px-8 py-4 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105 font-bold text-lg">
                            <i class="fas fa-filter mr-2"></i>Apply
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Activities Grid with Enhanced Cards -->
        <?php if (!empty($activities)): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
                <?php foreach ($activities as $activity): ?>
                    <div class="group relative">
                        <!-- Glow Effect -->
                        <div class="absolute inset-0 bg-gradient-to-r from-sky-400 to-blue-500 rounded-3xl blur-xl opacity-0 group-hover:opacity-50 transition-opacity duration-500"></div>
                        
                        <div class="relative bg-white rounded-3xl shadow-xl overflow-hidden transform transition-all duration-300 hover:-translate-y-3 hover:shadow-2xl border border-gray-100">
                            <!-- Media Section -->
                            <div class="relative overflow-hidden h-56 bg-gradient-to-br from-sky-200 to-blue-300">
                                <?php if ($activity['media']): ?>
                                    <?php
                                    $ext = pathinfo($activity['media'], PATHINFO_EXTENSION);
                                    $isVideo = in_array($ext, ['mp4', 'avi', 'mov']);
                                    $mediaUrl = base_url('uploads/' . $activity['media']);
                                    ?>
                                    <?php if ($isVideo): ?>
                                        <video controls class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                            <source src="<?= $mediaUrl ?>" type="video/<?= $ext ?>">
                                        </video>
                                    <?php else: ?>
                                        <img src="<?= $mediaUrl ?>" alt="<?= esc($activity['activity_name']) ?>" 
                                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    <?php endif; ?>
                                <?php else: ?>
                                    <div class="w-full h-full flex items-center justify-center">
                                        <i class="fas fa-image text-white text-7xl opacity-50"></i>
                                    </div>
                                <?php endif; ?>
                                
                                <!-- Date Badge -->
                                <div class="absolute top-4 left-4 bg-white/95 backdrop-blur-sm px-4 py-2 rounded-full shadow-lg">
                                    <span class="text-sky-700 font-bold text-sm">
                                        <i class="fas fa-calendar mr-1"></i>
                                        <?= date('d M', strtotime($activity['date'])) ?>
                                    </span>
                                </div>
                            </div>
                            
                            <!-- Content Section -->
                            <div class="p-6">
                                <h3 class="text-2xl font-black text-gray-800 mb-3 group-hover:text-sky-600 transition-colors line-clamp-2">
                                    <?= esc($activity['activity_name']) ?>
                                </h3>
                                <div class="flex items-center gap-4 text-gray-600 text-sm">
                                    <span class="flex items-center bg-sky-50 px-3 py-1 rounded-full">
                                        <i class="fas fa-calendar text-sky-600 mr-2"></i>
                                        <?= date('d M Y', strtotime($activity['date'])) ?>
                                    </span>
                                    <span class="flex items-center bg-blue-50 px-3 py-1 rounded-full">
                                        <i class="fas fa-clock text-blue-600 mr-2"></i>
                                        <?= date('H:i', strtotime($activity['time'])) ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Enhanced Pagination -->
            <?php if ($pager): ?>
                <div class="mt-16 flex justify-center">
                    <div class="bg-white rounded-2xl shadow-xl px-8 py-5 border border-gray-100">
                        <?= $pager->links() ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php else: ?>
            <div class="text-center py-24">
                <div class="inline-block bg-gray-100 p-8 rounded-full mb-6">
                    <i class="fas fa-calendar-times text-6xl text-gray-400"></i>
                </div>
                <p class="text-2xl text-gray-500 font-bold mb-4">No activities found</p>
                <p class="text-gray-400 mb-8">Try adjusting your search or filter criteria</p>
                <a href="/" class="inline-block bg-gradient-to-r from-sky-600 to-blue-600 hover:from-sky-700 hover:to-blue-700 text-white px-8 py-4 rounded-2xl font-bold shadow-lg hover:shadow-2xl transition-all transform hover:scale-105">
                    <i class="fas fa-home mr-2"></i>Back to Home
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>

<?= $this->endSection() ?>
