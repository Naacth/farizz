<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="flex justify-between items-center mb-6">
    <h2 class="text-3xl font-bold text-sky-700">
        <i class="fas fa-graduation-cap mr-2"></i>Education History
    </h2>
    <a href="/admin/education/create" class="bg-sky-600 hover:bg-sky-700 text-white px-6 py-3 rounded-lg shadow-lg hover:shadow-xl transition duration-300 hover-scale">
        <i class="fas fa-plus mr-2"></i>Add Education
    </a>
</div>

<div class="mb-6 bg-sky-50 p-4 rounded-lg border border-sky-200">
    <form method="GET" action="/admin/education" class="flex gap-4 items-end">
        <div class="flex-1">
            <label class="block text-sm font-medium text-gray-700 mb-2">
                <i class="fas fa-search mr-1"></i>Search
            </label>
            <input type="text" name="search" value="<?= esc($search) ?>" 
                   placeholder="Search by level or institution..." 
                   class="w-full px-4 py-2 border border-sky-300 rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent">
        </div>
        <div class="w-48">
            <label class="block text-sm font-medium text-gray-700 mb-2">
                <i class="fas fa-sort mr-1"></i>Sort By
            </label>
            <select name="sort_by" class="w-full px-4 py-2 border border-sky-300 rounded-lg focus:ring-2 focus:ring-sky-500">
                <option value="start_year" <?= $sortBy === 'start_year' ? 'selected' : '' ?>>Start Year</option>
                <option value="level" <?= $sortBy === 'level' ? 'selected' : '' ?>>Level</option>
                <option value="institution_name" <?= $sortBy === 'institution_name' ? 'selected' : '' ?>>Institution</option>
            </select>
        </div>
        <div class="w-32">
            <label class="block text-sm font-medium text-gray-700 mb-2">
                <i class="fas fa-arrows-alt-v mr-1"></i>Order
            </label>
            <select name="sort_order" class="w-full px-4 py-2 border border-sky-300 rounded-lg focus:ring-2 focus:ring-sky-500">
                <option value="ASC" <?= $sortOrder === 'ASC' ? 'selected' : '' ?>>ASC</option>
                <option value="DESC" <?= $sortOrder === 'DESC' ? 'selected' : '' ?>>DESC</option>
            </select>
        </div>
        <button type="submit" class="bg-sky-600 hover:bg-sky-700 text-white px-6 py-2 rounded-lg shadow transition duration-300">
            <i class="fas fa-filter mr-2"></i>Filter
        </button>
    </form>
</div>

<div class="overflow-x-auto">
    <table class="w-full">
        <thead>
            <tr class="bg-sky-600 text-white">
                <th class="px-6 py-3 text-left">Level</th>
                <th class="px-6 py-3 text-left">Institution</th>
                <th class="px-6 py-3 text-left">Period</th>
                <th class="px-6 py-3 text-left">Description</th>
                <th class="px-6 py-3 text-center">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-sky-100">
            <?php if (empty($education)): ?>
                <tr>
                    <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                        <i class="fas fa-inbox text-4xl mb-2 block"></i>
                        No education records found
                    </td>
                </tr>
            <?php else: ?>
                <?php foreach ($education as $edu): ?>
                    <tr class="hover:bg-sky-50 transition duration-200">
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-full text-sm font-medium 
                                <?php
                                switch($edu['level']) {
                                    case 'SD': echo 'bg-green-100 text-green-700'; break;
                                    case 'SMP': echo 'bg-blue-100 text-blue-700'; break;
                                    case 'SMA': echo 'bg-purple-100 text-purple-700'; break;
                                    case 'Kuliah': echo 'bg-sky-100 text-sky-700'; break;
                                    default: echo 'bg-gray-100 text-gray-700';
                                }
                                ?>">
                                <?= esc($edu['level']) ?>
                            </span>
                        </td>
                        <td class="px-6 py-4 font-medium"><?= esc($edu['institution_name']) ?></td>
                        <td class="px-6 py-4">
                            <?= esc($edu['start_year']) ?> - <?= $edu['end_year'] ? esc($edu['end_year']) : 'Present' ?>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-sm text-gray-600">
                                <?= $edu['description'] ? (strlen($edu['description']) > 50 ? substr(esc($edu['description']), 0, 50) . '...' : esc($edu['description'])) : '-' ?>
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex justify-center gap-2">
                                <a href="/admin/education/edit/<?= $edu['id'] ?>" 
                                   class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg transition duration-300 hover-scale">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="/admin/education/delete/<?= $edu['id'] ?>" 
                                   onclick="return confirm('Are you sure you want to delete this education record?')"
                                   class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition duration-300 hover-scale">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php if ($pager): ?>
    <div class="mt-6 flex justify-center">
        <?= $pager->links() ?>
    </div>
<?php endif; ?>

<?= $this->endSection() ?>
