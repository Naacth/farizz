<?= $this->extend('layouts/public') ?>

<?= $this->section('content') ?>

<!-- Centered Profile Header -->
<section class="relative py-32 overflow-hidden bg-slate-900">
    <!-- Sophisticated Background Elements -->
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,#1e293b,0%,#0f172a_100%)]"></div>
        <div class="absolute top-0 left-0 w-full h-full opacity-10" style="background-image: radial-gradient(#38bdf8 1px, transparent 1px); background-size: 40px 40px;"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-4xl mx-auto text-center fade-in-up">
            <div class="inline-flex items-center gap-3 px-5 py-2 rounded-full bg-primary-500/10 border border-primary-500/20 text-primary-400 text-sm font-bold uppercase tracking-[0.2em] mb-8 animate-float">
                <span class="relative flex h-3 w-3">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-3 w-3 bg-primary-500"></span>
                </span>
                Identity Authentication
            </div>
            <h1 class="text-6xl md:text-8xl font-black text-white mb-8 tracking-tighter leading-none">
                Person of <span class="gradient-text">Interest.</span>
            </h1>
            <p class="text-xl text-slate-400 font-light leading-relaxed max-w-2xl mx-auto">
                Comprehensive professional record and identity metrics for our community contributors.
            </p>
        </div>
    </div>
</section>

<!-- Centered Main Content -->
<section class="py-20 -mt-20 relative z-20">
    <div class="container mx-auto px-4">
        <!-- Minimal Centered Search -->
        <div class="max-w-3xl mx-auto mb-24">
            <div class="glass p-2 rounded-[2.5rem] shadow-2xl border border-white/20 dark:border-slate-800">
                <form method="GET" action="/profile" class="flex flex-col md:flex-row items-center gap-2 p-2 bg-white/40 dark:bg-slate-900/40 rounded-[2rem]">
                    <div class="flex-grow w-full relative group">
                        <i class="fas fa-fingerprint absolute left-6 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-primary-500 transition-all duration-300"></i>
                        <input type="text" name="search" value="<?= esc($search) ?>" 
                               placeholder="Scan by identity attributes..." 
                               class="w-full pl-16 pr-6 py-5 bg-white/80 dark:bg-slate-800/80 backdrop-blur-md rounded-2xl border-2 border-transparent focus:border-primary-500/30 outline-none transition-all dark:text-white shadow-inner font-medium text-lg">
                    </div>
                    
                    <button type="submit" class="w-full md:w-auto px-10 py-5 bg-primary-600 hover:bg-primary-500 shadow-xl shadow-primary-600/30 text-white font-black rounded-2xl transition-all hover:scale-105 active:scale-95 flex items-center justify-center gap-3">
                        <i class="fas fa-radar animate-pulse"></i>
                        <span>SEARCH</span>
                    </button>
                </form>
                
                <!-- Quick Filter Pills -->
                <div class="flex flex-wrap justify-center gap-3 mt-6 pb-2">
                    <a href="/profile?sort_by=name&sort_order=<?= ($sortOrder ?? 'ASC') === 'ASC' ? 'DESC' : 'ASC' ?>" class="px-5 py-2 bg-white/50 dark:bg-slate-800/50 rounded-full text-sm font-bold text-slate-600 dark:text-slate-400 border border-slate-200 dark:border-slate-700 hover:bg-primary-500 hover:text-white transition-all">
                        <i class="fas fa-user-tag mr-2"></i>Name <?= ($sortBy ?? '') === 'name' ? (($sortOrder ?? 'ASC') === 'ASC' ? '↑' : '↓') : '' ?>
                    </a>
                    <a href="/profile?sort_by=created_at&sort_order=DESC" class="px-5 py-2 bg-white/50 dark:bg-slate-800/50 rounded-full text-sm font-bold text-slate-600 dark:text-slate-400 border border-slate-200 dark:border-slate-700 hover:bg-primary-500 hover:text-white transition-all">
                        <i class="fas fa-clock mr-2"></i>Newest
                    </a>
                </div>
            </div>
        </div>

        <?php if (!empty($profiles)): ?>
            <div class="max-w-4xl mx-auto space-y-24">
                <?php foreach ($profiles as $profile): ?>
                    <div class="group relative py-10">
                        <!-- Connecting Line for Visual Flow -->
                        <div class="absolute left-1/2 top-0 bottom-0 w-px bg-slate-200 dark:bg-slate-800 -z-10 hidden md:block"></div>
                        
                        <!-- High-End centered Card -->
                        <div class="relative bg-white dark:bg-slate-900 rounded-[3rem] p-12 md:p-16 border border-slate-200 dark:border-slate-800 shadow-[0_40px_100px_-20px_rgba(0,0,0,0.1)] transition-all duration-700 hover:shadow-[0_60px_120px_-20px_rgba(0,0,0,0.2)]">
                            
                            <!-- Large Centered Photo -->
                            <div class="flex flex-col items-center mb-12">
                                <div class="relative group/photo mb-8">
                                    <div class="absolute inset-0 bg-gradient-to-tr from-primary-500 to-purple-600 rounded-[3rem] blur-2xl opacity-20 group-hover:opacity-40 transition-opacity duration-500"></div>
                                    <div class="relative w-48 h-48 md:w-64 md:h-64 rounded-[2.5rem] overflow-hidden border-8 border-white dark:border-slate-800 shadow-2xl">
                                        <?php if ($profile['photo']): ?>
                                            <img src="<?= base_url('uploads/' . $profile['photo']) ?>" 
                                                 alt="<?= esc($profile['name']) ?>" 
                                                 class="w-full h-full object-cover grayscale-[30%] group-hover:grayscale-0 transform group-hover:scale-105 transition-all duration-700">
                                        <?php else: ?>
                                            <div class="w-full h-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center">
                                                <i class="fas fa-user-secret text-7xl text-slate-300 dark:text-slate-700"></i>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="absolute -bottom-4 -left-4 bg-primary-600 text-white px-6 py-2 rounded-2xl font-black text-sm shadow-xl rotate-[-5deg]">
                                        VERIFIED IDENTITY
                                    </div>
                                </div>
                                
                                <h3 class="text-4xl md:text-6xl font-black text-slate-900 dark:text-white text-center leading-none tracking-tighter">
                                    <?= esc($profile['name']) ?>
                                </h3>
                                <p class="text-primary-500 dark:text-primary-400 font-bold tracking-[0.3em] uppercase mt-4 text-sm">Level: Community Contributor</p>
                            </div>

                            <!-- Centered Info Grid -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
                                <div class="bg-slate-50 dark:bg-slate-800/50 p-6 rounded-3xl border border-slate-100 dark:border-slate-700 group/item hover:bg-white dark:hover:bg-slate-800 transition-all">
                                    <div class="flex items-center gap-4 mb-2">
                                        <div class="w-10 h-10 rounded-xl bg-primary-100 dark:bg-primary-900/30 flex items-center justify-center text-primary-600">
                                            <i class="fas fa-envelope-open"></i>
                                        </div>
                                        <span class="text-xs font-black uppercase text-slate-400">Communication Terminal</span>
                                    </div>
                                    <p class="text-lg font-bold text-slate-800 dark:text-slate-200"><?= esc($profile['email']) ?></p>
                                </div>
                                
                                <div class="bg-slate-50 dark:bg-slate-800/50 p-6 rounded-3xl border border-slate-100 dark:border-slate-700 group/item hover:bg-white dark:hover:bg-slate-800 transition-all">
                                    <div class="flex items-center gap-4 mb-2">
                                        <div class="w-10 h-10 rounded-xl bg-purple-100 dark:bg-purple-900/30 flex items-center justify-center text-purple-600">
                                            <i class="fas fa-mobile-android"></i>
                                        </div>
                                        <span class="text-xs font-black uppercase text-slate-400">Secure Line</span>
                                    </div>
                                    <p class="text-lg font-bold text-slate-800 dark:text-slate-200"><?= esc($profile['phone']) ?></p>
                                </div>
                            </div>
                            
                            <!-- Address Block -->
                            <div class="bg-slate-50 dark:bg-slate-800/50 p-8 rounded-3xl border border-slate-100 dark:border-slate-700 mb-12">
                                <div class="flex items-center gap-4 mb-4">
                                    <div class="w-10 h-10 rounded-xl bg-orange-100 dark:bg-orange-900/30 flex items-center justify-center text-orange-600">
                                        <i class="fas fa-map-marked-alt"></i>
                                    </div>
                                    <span class="text-xs font-black uppercase text-slate-400">Geographic Base</span>
                                </div>
                                <p class="text-xl font-medium text-slate-800 dark:text-slate-200 leading-relaxed"><?= esc($profile['address']) ?></p>
                            </div>

                            <!-- Personal Manifest Card -->
                            <?php if ($profile['summary']): ?>
                                <div class="relative">
                                    <div class="absolute -top-6 -left-2 text-6xl text-primary-500/20 font-serif">"</div>
                                    <div class="bg-white dark:bg-slate-900 p-10 rounded-[2.5rem] border-2 border-primary-500/10 shadow-inner">
                                        <h4 class="text-xs font-black uppercase tracking-[0.2em] text-primary-600 mb-6">Personal Manifest</h4>
                                        <p class="text-2xl font-light text-slate-600 dark:text-slate-300 leading-loose">
                                            <?= nl2br(esc($profile['summary'])) ?>
                                        </p>
                                    </div>
                                </div>
                            <?php endif; ?>
                            
                            <!-- Action Bar -->
                            <div class="mt-16 pt-8 border-t border-slate-100 dark:border-slate-700 flex flex-col md:flex-row justify-between items-center gap-6">
                                <div class="text-xs font-bold text-slate-400">REFERENCE ID: #<?= str_pad($profile['id'], 6, '0', STR_PAD_LEFT) ?></div>
                                <div class="flex gap-4">
                                    <button class="px-8 py-3 bg-slate-900 dark:bg-white dark:text-slate-900 text-white rounded-xl font-black text-sm transition-all hover:bg-primary-600 hover:text-white">DOWNLOAD DOSSIER</button>
                                    <button class="w-12 h-12 flex items-center justify-center rounded-xl bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 hover:bg-primary-500 hover:text-white transition-all">
                                        <i class="fas fa-share-alt"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Redesigned Centered Pagination -->
            <?php if (isset($pager)): ?>
                <div class="mt-32 flex justify-center pb-20">
                    <div class="inline-flex items-center gap-4 p-3 glass rounded-3xl border border-white/20 shadow-2xl">
                        <?= $pager->links() ?>
                    </div>
                </div>
            <?php endif; ?>

        <?php else: ?>
            <div class="max-w-2xl mx-auto py-32 text-center">
                <div class="w-32 h-32 bg-slate-100 dark:bg-slate-800 rounded-full flex items-center justify-center mx-auto mb-10 animate-bounce">
                    <i class="fas fa-search text-5xl text-slate-300 dark:text-slate-700"></i>
                </div>
                <h3 class="text-4xl font-black text-slate-900 dark:text-white mb-4 tracking-tighter">Zero Metrics Found</h3>
                <p class="text-slate-500 dark:text-slate-400 text-xl font-light mb-12">The identity attributes provided did not match any records in our database.</p>
                <a href="/profile" class="inline-flex items-center gap-3 px-10 py-5 bg-primary-600 text-white font-black rounded-2xl shadow-2xl shadow-primary-600/30 hover:bg-primary-500 transition-all">
                    <span>CLEAR SEARCH PROTOCOL</span>
                    <i class="fas fa-undo"></i>
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>

<?= $this->endSection() ?>
