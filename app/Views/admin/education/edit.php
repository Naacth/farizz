<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="mb-6">
    <h2 class="text-3xl font-bold text-sky-700">
        <i class="fas fa-edit mr-2"></i>Edit Education
    </h2>
</div>

<form action="/admin/education/update/<?= $education['id'] ?>" method="POST">
    <?= csrf_field() ?>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
                <i class="fas fa-layer-group mr-1"></i>Education Level *
            </label>
            <select name="level" required 
                    class="w-full px-4 py-2 border border-sky-300 rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent">
                <option value="">-- Select Level --</option>
                <option value="SD" <?= old('level', $education['level']) === 'SD' ? 'selected' : '' ?>>SD (Elementary)</option>
                <option value="SMP" <?= old('level', $education['level']) === 'SMP' ? 'selected' : '' ?>>SMP (Junior High)</option>
                <option value="SMA" <?= old('level', $education['level']) === 'SMA' ? 'selected' : '' ?>>SMA (Senior High)</option>
                <option value="Kuliah" <?= old('level', $education['level']) === 'Kuliah' ? 'selected' : '' ?>>Kuliah (University)</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
                <i class="fas fa-school mr-1"></i>Institution Name *
            </label>
            <input type="text" name="institution_name" required 
                   value="<?= old('institution_name', $education['institution_name']) ?>"
                   placeholder="e.g., Universitas Yasri Muda"
                   class="w-full px-4 py-2 border border-sky-300 rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
                <i class="fas fa-calendar-alt mr-1"></i>Start Year *
            </label>
            <input type="number" name="start_year" required 
                   value="<?= old('start_year', $education['start_year']) ?>"
                   placeholder="e.g., 2020"
                   min="1950" max="<?= date('Y') ?>"
                   class="w-full px-4 py-2 border border-sky-300 rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
                <i class="fas fa-calendar-check mr-1"></i>End Year
            </label>
            <input type="number" name="end_year" 
                   value="<?= old('end_year', $education['end_year']) ?>"
                   placeholder="Leave empty if currently studying"
                   min="1950" max="<?= date('Y') + 10 ?>"
                   class="w-full px-4 py-2 border border-sky-300 rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent">
        </div>
    </div>

    <div class="mt-6">
        <label class="block text-sm font-medium text-gray-700 mb-2">
            <i class="fas fa-file-alt mr-1"></i>Description
        </label>
        <textarea name="description" rows="4" 
                  placeholder="Optional: Add details about achievements, major, etc..."
                  class="w-full px-4 py-2 border border-sky-300 rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent"><?= old('description', $education['description']) ?></textarea>
    </div>

    <div class="mt-8 flex gap-4">
        <button type="submit" class="bg-sky-600 hover:bg-sky-700 text-white px-8 py-3 rounded-lg shadow-lg hover:shadow-xl transition duration-300 hover-scale">
            <i class="fas fa-save mr-2"></i>Update Education
        </button>
        <a href="/admin/education" class="bg-gray-500 hover:bg-gray-600 text-white px-8 py-3 rounded-lg shadow-lg hover:shadow-xl transition duration-300 hover-scale">
            <i class="fas fa-times mr-2"></i>Cancel
        </a>
    </div>
</form>

<?= $this->endSection() ?>
