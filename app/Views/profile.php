<?= $this->extend('layouts/public') ?>

<?= $this->section('content') ?>

<!-- Page Header with Gradient -->
<section class="relative bg-gradient-to-r from-purple-600 via-pink-600 to-purple-700 text-white py-24 overflow-hidden">
    <div class="absolute inset-0">
        <div class="absolute top-10 left-10 w-64 h-64 bg-white/10 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-10 right-10 w-80 h-80 bg-pink-300/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 1.5s;"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center fade-in-up">
            <span class="inline-block bg-white/20 backdrop-blur-sm px-6 py-2 rounded-full mb-4">
                <i class="fas fa-id-card mr-2"></i>My CV
            </span>
            <h1 class="text-6xl font-black mb-4">
                Professional <span class="bg-gradient-to-r from-yellow-300 to-orange-300 bg-clip-text text-transparent">Profile</span>
            </h1>
            <p class="text-xl text-purple-100 max-w-2xl mx-auto">Complete biodata and career information</p>
        </div>
    </div>
</section>

<!-- Profile Section -->
<section class="py-16 bg-gradient-to-br from-gray-50 to-white">
    <div class="container mx-auto px-4">
        <!-- Enhanced Search and Filter -->
        <div class="max-w-5xl mx-auto mb-12">
            <div class="bg-white p-8 rounded-3xl shadow-2xl border border-gray-100">
                <form method="GET" action="/profile" class="flex flex-wrap gap-6">
                    <div class="flex-1 min-w-[300px]">
                        <label class="block text-sm font-bold text-gray-700 mb-3">
                            <i class="fas fa-search mr-2 text-purple-600"></i>Search Profile
                        </label>
                        <input type="text" name="search" value="<?= esc($search) ?>" 
                               placeholder="Search by name, email, or address..." 
                               class="w-full px-6 py-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-purple-200 focus:border-purple-500 focus:outline-none transition-all text-lg">
                    </div>
                    <div class="w-48">
                        <label class="block text-sm font-bold text-gray-700 mb-3">
                            <i class="fas fa-sort mr-2 text-purple-600"></i>Sort By
                        </label>
                        <select name="sort_by" class="w-full px-6 py-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-purple-200 focus:border-purple-500 appearance-none bg-white text-lg font-medium">
                            <option value="name" <?= $sortBy === 'name' ? 'selected' : '' ?>>Name</option>
                            <option value="email" <?= $sortBy === 'email' ? 'selected' : '' ?>>Email</option>
                            <option value="created_at" <?= $sortBy === 'created_at' ? 'selected' : '' ?>>Created</option>
                        </select>
                    </div>
                    <div class="w-32">
                        <label class="block text-sm font-bold text-gray-700 mb-3">Order</label>
                        <select name="sort_order" class="w-full px-6 py-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-purple-200 focus:border-purple-500 appearance-none bg-white text-lg font-medium">
                            <option value="ASC" <?= $sortOrder === 'ASC' ? 'selected' : '' ?>>↑ ASC</option>
                            <option value="DESC" <?= $sortOrder === 'DESC' ? 'selected' : '' ?>>↓ DESC</option>
                        </select>
                    </div>
                    <div class="flex items-end">
                        <button type="submit" class="bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white px-8 py-4 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105 font-bold text-lg">
                            <i class="fas fa-filter mr-2"></i>Apply
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <?php if (!empty($profiles)): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
                <?php foreach ($profiles as $profile): ?>
                    <div class="group relative">
                        <!-- Glow Effect -->
                        <div class="absolute inset-0 bg-gradient-to-r from-purple-400 to-pink-500 rounded-3xl blur-2xl opacity-30 group-hover:opacity-60 transition-opacity duration-500"></div>
                        
                        <div class="relative bg-white p-8 rounded-3xl shadow-2xl border border-gray-100 transform transition-all duration-300 hover:-translate-y-3 hover:shadow-2xl">
                            <!-- Centered Vertical Layout -->
                            <div class="flex flex-col items-center text-center">
                                <!-- Photo Section -->
                                <div class="mb-6">
                                    <?php if ($profile['photo']): ?>
                                        <div class="relative">
                                            <div class="absolute inset-0 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full blur-xl opacity-50"></div>
                                            <img src="<?= base_url('uploads/' . $profile['photo']) ?>" 
                                                 alt="<?= esc($profile['name']) ?>" 
                                                 class="relative w-32 h-32 rounded-full object-cover border-4 border-white shadow-xl group-hover:scale-105 transition-transform duration-300">
                                        </div>
                                    <?php else: ?>
                                        <div class="w-32 h-32 rounded-full bg-gradient-to-br from-purple-400 to-pink-500 flex items-center justify-center shadow-xl border-4 border-white">
                                            <i class="fas fa-user text-4xl text-white"></i>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                
                                <!-- Name -->
                                <h3 class="text-2xl font-black text-gray-800 mb-4 group-hover:text-purple-600 transition-colors">
                                    <?= esc($profile['name']) ?>
                                </h3>
                                    
                                <!-- Contact Info -->
                                <div class="w-full space-y-3 mb-4 text-sm">
                                    <div class="flex items-center justify-center bg-purple-50 p-3 rounded-xl">
                                        <i class="fas fa-envelope text-purple-600 mr-2"></i>
                                        <span class="text-gray-700 font-medium"><?= esc($profile['email']) ?></span>
                                    </div>
                                    
                                    <div class="flex items-center justify-center bg-pink-50 p-3 rounded-xl">
                                        <i class="fas fa-phone text-pink-600 mr-2"></i>
                                        <span class="text-gray-700 font-medium"><?= esc($profile['phone']) ?></span>
                                    </div>
                                    
                                    <div class="flex items-center justify-center bg-purple-50 p-3 rounded-xl">
                                        <i class="fas fa-map-marker-alt text-purple-600 mr-2"></i>
                                        <span class="text-gray-700 font-medium text-center"><?= esc($profile['address']) ?></span>
                                    </div>
                                </div>
                                
                                <!-- Summary -->
                                <?php if ($profile['summary']): ?>
                                    <div class="w-full bg-gradient-to-br from-purple-50 to-pink-50 p-4 rounded-xl border-l-4 border-purple-500">
                                        <p class="text-gray-700 text-sm leading-relaxed"><?= nl2br(esc($profile['summary'])) ?></p>
                                    </div>
                                <?php endif; ?>
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
                    <i class="fas fa-user-slash text-6xl text-gray-400"></i>
                </div>
                <p class="text-2xl text-gray-500 font-bold mb-4">No profile data available</p>
                <p class="text-gray-400 mb-8">Add your profile information to get started</p>
                <a href="/" class="inline-block bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white px-8 py-4 rounded-2xl font-bold shadow-lg hover:shadow-2xl transition-all transform hover:scale-105">
                    <i class="fas fa-home mr-2"></i>Back to Home
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>

<?= $this->endSection() ?>
