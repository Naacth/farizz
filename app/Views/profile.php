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
        <?php if (!empty($profiles)): ?>
            <div class="flex justify-center">
                <div class="w-full max-w-2xl">
                    <?php foreach ($profiles as $profile): ?>
                        <div class="group relative">
                            <!-- Glow Effect -->
                            <div class="absolute inset-0 bg-gradient-to-r from-purple-400 to-pink-500 rounded-3xl blur-2xl opacity-30 group-hover:opacity-60 transition-opacity duration-500"></div>
                            
                            <div class="relative bg-white p-12 rounded-3xl shadow-2xl border border-gray-100">
                                <!-- Centered Vertical Layout -->
                                <div class="flex flex-col items-center text-center">
                                    <!-- Photo Section - Large & Centered -->
                                    <div class="mb-8">
                                        <?php if ($profile['photo']): ?>
                                            <div class="relative">
                                                <div class="absolute inset-0 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full blur-2xl opacity-50"></div>
                                                <img src="<?= base_url('uploads/' . $profile['photo']) ?>" 
                                                     alt="<?= esc($profile['name']) ?>" 
                                                     class="relative w-64 h-64 rounded-full object-cover border-8 border-white shadow-2xl group-hover:scale-105 transition-transform duration-300">
                                            </div>
                                        <?php else: ?>
                                            <div class="w-64 h-64 rounded-full bg-gradient-to-br from-purple-400 to-pink-500 flex items-center justify-center shadow-2xl border-8 border-white">
                                                <i class="fas fa-user text-9xl text-white"></i>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <!-- Name - Below Photo -->
                                    <h3 class="text-5xl font-black text-gray-800 mb-8 group-hover:text-purple-600 transition-colors">
                                        <?= esc($profile['name']) ?>
                                    </h3>
                                    
                                    <!-- Contact Info Cards -->
                                    <div class="w-full space-y-4 mb-8">
                                        <div class="flex items-center bg-purple-50 p-5 rounded-2xl border border-purple-100">
                                            <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-r from-purple-500 to-pink-500 rounded-xl flex items-center justify-center">
                                                <i class="fas fa-envelope text-white text-2xl"></i>
                                            </div>
                                            <div class="ml-5 text-left">
                                                <p class="text-xs text-gray-500 font-medium">Email</p>
                                                <p class="text-gray-800 font-bold text-lg"><?= esc($profile['email']) ?></p>
                                            </div>
                                        </div>
                                        
                                        <div class="flex items-center bg-pink-50 p-5 rounded-2xl border border-pink-100">
                                            <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-r from-pink-500 to-purple-500 rounded-xl flex items-center justify-center">
                                                <i class="fas fa-phone text-white text-2xl"></i>
                                            </div>
                                            <div class="ml-5 text-left">
                                                <p class="text-xs text-gray-500 font-medium">Phone</p>
                                                <p class="text-gray-800 font-bold text-lg"><?= esc($profile['phone']) ?></p>
                                            </div>
                                        </div>
                                        
                                        <div class="flex items-start bg-purple-50 p-5 rounded-2xl border border-purple-100">
                                            <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-r from-purple-500 to-pink-500 rounded-xl flex items-center justify-center">
                                                <i class="fas fa-map-marker-alt text-white text-2xl"></i>
                                            </div>
                                            <div class="ml-5 text-left">
                                                <p class="text-xs text-gray-500 font-medium">Address</p>
                                                <p class="text-gray-800 font-bold text-lg"><?= esc($profile['address']) ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Summary Card -->
                                    <div class="w-full bg-gradient-to-br from-purple-50 to-pink-50 p-8 rounded-2xl border-l-4 border-purple-500 shadow-lg">
                                        <h4 class="flex items-center justify-center font-black text-purple-700 mb-4 text-xl">
                                            <i class="fas fa-quote-left mr-3"></i>Professional Summary
                                        </h4>
                                        <p class="text-gray-700 leading-relaxed text-lg"><?= nl2br(esc($profile['summary'])) ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
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
