<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="mb-6">
    <h2 class="text-3xl font-bold text-sky-700">
        <i class="fas fa-plus-circle mr-2"></i>Add New Activity
    </h2>
</div>

<form action="/admin/activity/store" method="POST" enctype="multipart/form-data">
    <?= csrf_field() ?>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
                <i class="fas fa-calendar mr-1"></i>Date *
            </label>
            <input type="date" name="date" required 
                   value="<?= old('date') ?>"
                   class="w-full px-4 py-2 border border-sky-300 rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
                <i class="fas fa-clock mr-1"></i>Time *
            </label>
            <input type="time" name="time" required 
                   value="<?= old('time') ?>"
                   class="w-full px-4 py-2 border border-sky-300 rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent">
        </div>
    </div>

    <div class="mt-6">
        <label class="block text-sm font-medium text-gray-700 mb-2">
            <i class="fas fa-tag mr-1"></i>Activity Name *
        </label>
        <input type="text" name="activity_name" required 
               value="<?= old('activity_name') ?>"
               placeholder="Enter activity name..."
               class="w-full px-4 py-2 border border-sky-300 rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent">
    </div>

    <div class="mt-6">
        <label class="block text-sm font-medium text-gray-700 mb-2">
            <i class="fas fa-image mr-1"></i>Media (Photo/Video) *
        </label>
        <input type="file" name="media" required accept="image/*,video/*"
               class="w-full px-4 py-2 border border-sky-300 rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent">
        <p class="text-sm text-gray-500 mt-1">Max 2MB. Supported formats: JPG, PNG, GIF, MP4, AVI, MOV</p>
    </div>

    <div class="mt-8 flex gap-4">
        <button type="submit" class="bg-sky-600 hover:bg-sky-700 text-white px-8 py-3 rounded-lg shadow-lg hover:shadow-xl transition duration-300 hover-scale">
            <i class="fas fa-save mr-2"></i>Save Activity
        </button>
        <a href="/admin/activity" class="bg-gray-500 hover:bg-gray-600 text-white px-8 py-3 rounded-lg shadow-lg hover:shadow-xl transition duration-300 hover-scale">
            <i class="fas fa-times mr-2"></i>Cancel
        </a>
    </div>
</form>

<?= $this->endSection() ?>
