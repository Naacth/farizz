<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="mb-8">
    <div class="flex items-center gap-4 mb-2">
        <div class="w-14 h-14 bg-gradient-to-r from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center shadow-lg">
            <i class="fas fa-cog text-white text-2xl"></i>
        </div>
        <div>
            <h2 class="text-3xl font-black text-gray-800">Site Settings</h2>
            <p class="text-gray-600">Manage your portfolio settings and social media links</p>
        </div>
    </div>
</div>

<form action="/admin/settings/update" method="POST">
    <?= csrf_field() ?>
    
    <!-- Site Information -->
    <div class="bg-white rounded-2xl shadow-xl p-8 mb-8 border border-gray-100">
        <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
            <i class="fas fa-globe text-sky-500 mr-3"></i>
            Site Information
        </h3>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">
                    <i class="fas fa-heading mr-2 text-sky-500"></i>Site Name
                </label>
                <input type="text" name="site_name" 
                       value="<?= esc($settings['site_name'] ?? '') ?>"
                       placeholder="My Portfolio"
                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-sky-200 focus:border-sky-500 transition-all">
            </div>
            
            <div class="md:col-span-2">
                <label class="block text-sm font-bold text-gray-700 mb-2">
                    <i class="fas fa-align-left mr-2 text-sky-500"></i>Site Description
                </label>
                <textarea name="site_description" rows="3"
                          placeholder="A brief description about your portfolio..."
                          class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-sky-200 focus:border-sky-500 transition-all"><?= esc($settings['site_description'] ?? '') ?></textarea>
            </div>
        </div>
    </div>

    <!-- Social Media Links -->
    <div class="bg-white rounded-2xl shadow-xl p-8 mb-8 border border-gray-100">
        <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
            <i class="fas fa-share-alt text-purple-500 mr-3"></i>
            Social Media Links
        </h3>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">
                    <i class="fab fa-github mr-2 text-gray-800"></i>GitHub URL
                </label>
                <input type="url" name="github_url" 
                       value="<?= esc($settings['github_url'] ?? '') ?>"
                       placeholder="https://github.com/username"
                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-purple-200 focus:border-purple-500 transition-all">
            </div>
            
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">
                    <i class="fab fa-linkedin mr-2 text-blue-600"></i>LinkedIn URL
                </label>
                <input type="url" name="linkedin_url" 
                       value="<?= esc($settings['linkedin_url'] ?? '') ?>"
                       placeholder="https://linkedin.com/in/username"
                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition-all">
            </div>
            
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">
                    <i class="fab fa-instagram mr-2 text-pink-500"></i>Instagram URL
                </label>
                <input type="url" name="instagram_url" 
                       value="<?= esc($settings['instagram_url'] ?? '') ?>"
                       placeholder="https://instagram.com/username"
                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-pink-200 focus:border-pink-500 transition-all">
            </div>
            
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">
                    <i class="fab fa-twitter mr-2 text-sky-400"></i>Twitter URL
                </label>
                <input type="url" name="twitter_url" 
                       value="<?= esc($settings['twitter_url'] ?? '') ?>"
                       placeholder="https://twitter.com/username"
                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-sky-200 focus:border-sky-500 transition-all">
            </div>
        </div>
    </div>

    <!-- Contact Information -->
    <div class="bg-white rounded-2xl shadow-xl p-8 mb-8 border border-gray-100">
        <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
            <i class="fas fa-address-card text-emerald-500 mr-3"></i>
            Contact Information
        </h3>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">
                    <i class="fas fa-envelope mr-2 text-emerald-500"></i>Email
                </label>
                <input type="email" name="contact_email" 
                       value="<?= esc($settings['contact_email'] ?? '') ?>"
                       placeholder="contact@example.com"
                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-emerald-200 focus:border-emerald-500 transition-all">
            </div>
            
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">
                    <i class="fas fa-phone mr-2 text-emerald-500"></i>Phone
                </label>
                <input type="text" name="contact_phone" 
                       value="<?= esc($settings['contact_phone'] ?? '') ?>"
                       placeholder="+62 xxx xxx xxx"
                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-emerald-200 focus:border-emerald-500 transition-all">
            </div>
            
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">
                    <i class="fas fa-map-marker-alt mr-2 text-emerald-500"></i>Location
                </label>
                <input type="text" name="contact_location" 
                       value="<?= esc($settings['contact_location'] ?? '') ?>"
                       placeholder="Indonesia"
                       class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-emerald-200 focus:border-emerald-500 transition-all">
            </div>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="flex justify-between items-center">
        <button type="submit" class="bg-gradient-to-r from-sky-500 to-blue-600 hover:from-sky-600 hover:to-blue-700 text-white px-10 py-4 rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:scale-105 font-bold text-lg">
            <i class="fas fa-save mr-2"></i>Save Settings
        </button>
        
        <a href="/admin/dashboard" class="text-gray-600 hover:text-sky-600 transition font-medium">
            <i class="fas fa-arrow-left mr-2"></i>Back to Dashboard
        </a>
    </div>
</form>

<?= $this->endSection() ?>
