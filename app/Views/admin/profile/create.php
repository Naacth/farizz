<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="mb-6">
    <h2 class="text-3xl font-bold text-sky-700">
        <i class="fas fa-plus-circle mr-2"></i>Add New Profile
    </h2>
</div>

<form action="/admin/profile/store" method="POST" enctype="multipart/form-data">
    <?= csrf_field() ?>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
                <i class="fas fa-user mr-1"></i>Full Name *
            </label>
            <input type="text" name="name" required 
                   value="<?= old('name') ?>"
                   placeholder="Enter full name..."
                   class="w-full px-4 py-2 border border-sky-300 rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
                <i class="fas fa-envelope mr-1"></i>Email *
            </label>
            <input type="email" name="email" required 
                   value="<?= old('email') ?>"
                   placeholder="email@example.com"
                   class="w-full px-4 py-2 border border-sky-300 rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
                <i class="fas fa-phone mr-1"></i>Phone *
            </label>
            <input type="tel" name="phone" required 
                   value="<?= old('phone') ?>"
                   placeholder="+62..."
                   class="w-full px-4 py-2 border border-sky-300 rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
                <i class="fas fa-image mr-1"></i>Photo *
            </label>
            <input type="file" name="photo" required accept="image/*"
                   class="w-full px-4 py-2 border border-sky-300 rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent">
        </div>
    </div>

    <div class="mt-6">
        <label class="block text-sm font-medium text-gray-700 mb-2">
            <i class="fas fa-map-marker-alt mr-1"></i>Address *
        </label>
        <textarea name="address" required rows="3" 
                  placeholder="Enter complete address..."
                  class="w-full px-4 py-2 border border-sky-300 rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent"><?= old('address') ?></textarea>
    </div>

    <div class="mt-6">
        <label class="block text-sm font-medium text-gray-700 mb-2">
            <i class="fas fa-file-alt mr-1"></i>Summary / Bio *
        </label>
        <textarea name="summary" required rows="5" 
                  placeholder="Write a brief summary about yourself..."
                  class="w-full px-4 py-2 border border-sky-300 rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent"><?= old('summary') ?></textarea>
    </div>

    <div class="mt-8 flex gap-4">
        <button type="submit" class="bg-sky-600 hover:bg-sky-700 text-white px-8 py-3 rounded-lg shadow-lg hover:shadow-xl transition duration-300 hover-scale">
            <i class="fas fa-save mr-2"></i>Save Profile
        </button>
        <a href="/admin/profile" class="bg-gray-500 hover:bg-gray-600 text-white px-8 py-3 rounded-lg shadow-lg hover:shadow-xl transition duration-300 hover-scale">
            <i class="fas fa-times mr-2"></i>Cancel
        </a>
    </div>
</form>

<?= $this->endSection() ?>
