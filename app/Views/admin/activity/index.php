<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<!-- Header with Search and Actions -->
<div class="flex justify-between items-center mb-6">
    <h2 class="text-3xl font-bold text-sky-700">
        <i class="fas fa-calendar-check mr-2"></i>Daily Activities
    </h2>
    <a href="/admin/activity/create" class="bg-sky-600 hover:bg-sky-700 text-white px-6 py-3 rounded-lg shadow-lg hover:shadow-xl transition duration-300 hover-scale">
        <i class="fas fa-plus mr-2"></i>Add New Activity
    </a>
</div>

<!-- Search and Filter Bar -->
<div class="mb-6 bg-sky-50 p-4 rounded-lg border border-sky-200">
    <form method="GET" action="/admin/activity" class="flex gap-4 items-end">
        <div class="flex-1">
            <label class="block text-sm font-medium text-gray-700 mb-2">
                <i class="fas fa-search mr-1"></i>Search
            </label>
            <input type="text" name="search" value="<?= esc($search) ?>" 
                   placeholder="Search by activity name or date..." 
                   class="w-full px-4 py-2 border border-sky-300 rounded-lg focus:ring-2 focus:ring-sky-500 focus:border-transparent">
        </div>
        <div class="w-48">
            <label class="block text-sm font-medium text-gray-700 mb-2">
                <i class="fas fa-sort mr-1"></i>Sort By
            </label>
            <select name="sort_by" class="w-full px-4 py-2 border border-sky-300 rounded-lg focus:ring-2 focus:ring-sky-500">
                <option value="date" <?= $sortBy === 'date' ? 'selected' : '' ?>>Date</option>
                <option value="activity_name" <?= $sortBy === 'activity_name' ? 'selected' : '' ?>>Activity Name</option>
                <option value="created_at" <?= $sortBy === 'created_at' ? 'selected' : '' ?>>Created</option>
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

<!-- Table -->
<div class="overflow-x-auto">
    <table class="w-full">
        <thead>
            <tr class="bg-sky-600 text-white">
                <th class="px-6 py-3 text-left">Date</th>
                <th class="px-6 py-3 text-left">Time</th>
                <th class="px-6 py-3 text-left">Activity Name</th>
                <th class="px-6 py-3 text-left">Media</th>
                <th class="px-6 py-3 text-center">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-sky-100">
            <?php if (empty($activities)): ?>
                <tr>
                    <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                        <i class="fas fa-inbox text-4xl mb-2 block"></i>
                        No activities found
                    </td>
                </tr>
            <?php else: ?>
                <?php foreach ($activities as $activity): ?>
                    <tr class="hover:bg-sky-50 transition duration-200">
                        <td class="px-6 py-4"><?= esc($activity['date']) ?></td>
                        <td class="px-6 py-4"><?= esc($activity['time']) ?></td>
                        <td class="px-6 py-4 font-medium"><?= esc($activity['activity_name']) ?></td>
                        <td class="px-6 py-4">
                            <?php if ($activity['media']): ?>
                                <?php
                                $ext = pathinfo($activity['media'], PATHINFO_EXTENSION);
                                $isVideo = in_array($ext, ['mp4', 'avi', 'mov']);
                                ?>
                                <?php if ($isVideo): ?>
                                    <i class="fas fa-video text-sky-600"></i> Video
                                <?php else: ?>
                                    <i class="fas fa-image text-sky-600"></i> Image
                                <?php endif; ?>
                            <?php else: ?>
                                <span class="text-gray-400">No media</span>
                            <?php endif; ?>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex justify-center gap-2">
                                <a href="/admin/activity/edit/<?= $activity['id'] ?>" 
                                   class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg transition duration-300 hover-scale">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="/admin/activity/delete/<?= $activity['id'] ?>" 
                                   onclick="return confirm('Are you sure you want to delete this activity?')"
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

<!-- Pagination -->
<?php if ($pager): ?>
    <div class="mt-6 flex justify-center">
        <?= $pager->links() ?>
    </div>
<?php endif; ?>

<?= $this->endSection() ?>
