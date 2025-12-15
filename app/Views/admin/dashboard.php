<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<!-- Dashboard Header -->
<div class="mb-8">
    <h2 class="text-4xl font-bold text-sky-700 mb-2">
        <i class="fas fa-tachometer-alt mr-3"></i>Dashboard
    </h2>
    <p class="text-gray-600">Welcome back, <span class="font-semibold text-sky-700"><?= session()->get('admin_username') ?></span>! Here's your portfolio overview.</p>
</div>

<!-- Statistics Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <!-- Activities Card -->
    <div class="bg-gradient-to-br from-sky-500 to-blue-600 rounded-xl shadow-lg p-6 text-white hover-scale transform hover:-translate-y-2 transition-all duration-300">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sky-100 text-sm font-medium mb-1">Total Activities</p>
                <h3 class="text-4xl font-bold"><?= $totalActivities ?></h3>
            </div>
            <div class="bg-white/20 p-4 rounded-full backdrop-blur-sm">
                <i class="fas fa-calendar-check text-4xl"></i>
            </div>
        </div>
        <div class="mt-4 pt-4 border-t border-white/20">
            <a href="/admin/activity" class="text-sm text-white hover:text-sky-100 transition">
                View All <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>
    </div>

    <!-- Profiles Card -->
    <div class="bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl shadow-lg p-6 text-white hover-scale transform hover:-translate-y-2 transition-all duration-300">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-purple-100 text-sm font-medium mb-1">Total Profiles</p>
                <h3 class="text-4xl font-bold"><?= $totalProfiles ?></h3>
            </div>
            <div class="bg-white/20 p-4 rounded-full backdrop-blur-sm">
                <i class="fas fa-user-circle text-4xl"></i>
            </div>
        </div>
        <div class="mt-4 pt-4 border-t border-white/20">
            <a href="/admin/profile" class="text-sm text-white hover:text-purple-100 transition">
                View All <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>
    </div>

    <!-- Education Card -->
    <div class="bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl shadow-lg p-6 text-white hover-scale transform hover:-translate-y-2 transition-all duration-300">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-emerald-100 text-sm font-medium mb-1">Education Records</p>
                <h3 class="text-4xl font-bold"><?= $totalEducation ?></h3>
            </div>
            <div class="bg-white/20 p-4 rounded-full backdrop-blur-sm">
                <i class="fas fa-graduation-cap text-4xl"></i>
            </div>
        </div>
        <div class="mt-4 pt-4 border-t border-white/20">
            <a href="/admin/education" class="text-sm text-white hover:text-emerald-100 transition">
                View All <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="bg-white rounded-xl shadow-lg p-6 mb-8 border-t-4 border-sky-500">
    <h3 class="text-xl font-bold text-gray-800 mb-4">
        <i class="fas fa-bolt text-yellow-500 mr-2"></i>Quick Actions
    </h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <a href="/admin/activity/create" class="flex items-center p-4 bg-sky-50 hover:bg-sky-100 rounded-lg transition duration-300 border-2 border-transparent hover:border-sky-500">
            <div class="bg-sky-500 p-3 rounded-lg mr-4">
                <i class="fas fa-plus text-white text-xl"></i>
            </div>
            <div>
                <p class="font-semibold text-gray-800">Add Activity</p>
                <p class="text-sm text-gray-600">Create new daily activity</p>
            </div>
        </a>

        <a href="/admin/profile/create" class="flex items-center p-4 bg-purple-50 hover:bg-purple-100 rounded-lg transition duration-300 border-2 border-transparent hover:border-purple-500">
            <div class="bg-purple-500 p-3 rounded-lg mr-4">
                <i class="fas fa-user-plus text-white text-xl"></i>
            </div>
            <div>
                <p class="font-semibold text-gray-800">Add Profile</p>
                <p class="text-sm text-gray-600">Create new profile/CV</p>
            </div>
        </a>

        <a href="/admin/education/create" class="flex items-center p-4 bg-emerald-50 hover:bg-emerald-100 rounded-lg transition duration-300 border-2 border-transparent hover:border-emerald-500">
            <div class="bg-emerald-500 p-3 rounded-lg mr-4">
                <i class="fas fa-school text-white text-xl"></i>
            </div>
            <div>
                <p class="font-semibold text-gray-800">Add Education</p>
                <p class="text-sm text-gray-600">Create education record</p>
            </div>
        </a>
    </div>
</div>

<!-- Recent Items -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Recent Activities -->
    <div class="bg-white rounded-xl shadow-lg p-6 border-t-4 border-sky-500">
        <h3 class="text-xl font-bold text-gray-800 mb-4">
            <i class="fas fa-clock text-sky-600 mr-2"></i>Recent Activities
        </h3>
        <?php if (!empty($recentActivities)): ?>
            <div class="space-y-3">
                <?php foreach ($recentActivities as $activity): ?>
                    <div class="flex items-center p-3 bg-sky-50 rounded-lg hover:bg-sky-100 transition duration-200">
                        <div class="flex-shrink-0 mr-4">
                            <div class="w-12 h-12 bg-sky-500 rounded-full flex items-center justify-center">
                                <i class="fas fa-calendar text-white"></i>
                            </div>
                        </div>
                        <div class="flex-1">
                            <p class="font-medium text-gray-800"><?= esc($activity['activity_name']) ?></p>
                            <p class="text-sm text-gray-600">
                                <i class="fas fa-calendar-alt mr-1"></i><?= date('d M Y', strtotime($activity['date'])) ?>
                                <span class="mx-2">•</span>
                                <i class="fas fa-clock mr-1"></i><?= date('H:i', strtotime($activity['time'])) ?>
                            </p>
                        </div>
                        <a href="/admin/activity/edit/<?= $activity['id'] ?>" class="text-sky-600 hover:text-sky-800">
                            <i class="fas fa-edit"></i>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="mt-4 text-center">
                <a href="/admin/activity" class="text-sky-600 hover:text-sky-800 font-medium">
                    View All Activities <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
        <?php else: ?>
            <div class="text-center py-8 text-gray-500">
                <i class="fas fa-inbox text-4xl mb-2 block"></i>
                <p>No activities yet</p>
            </div>
        <?php endif; ?>
    </div>

    <!-- Recent Profiles -->
    <div class="bg-white rounded-xl shadow-lg p-6 border-t-4 border-purple-500">
        <h3 class="text-xl font-bold text-gray-800 mb-4">
            <i class="fas fa-users text-purple-600 mr-2"></i>Recent Profiles
        </h3>
        <?php if (!empty($recentProfiles)): ?>
            <div class="space-y-3">
                <?php foreach ($recentProfiles as $profile): ?>
                    <div class="flex items-center p-3 bg-purple-50 rounded-lg hover:bg-purple-100 transition duration-200">
                        <div class="flex-shrink-0 mr-4">
                            <?php if ($profile['photo']): ?>
                                <img src="<?= base_url('uploads/' . $profile['photo']) ?>" 
                                     alt="<?= esc($profile['name']) ?>" 
                                     class="w-12 h-12 rounded-full object-cover border-2 border-purple-300">
                            <?php else: ?>
                                <div class="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center">
                                    <i class="fas fa-user text-white"></i>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="flex-1">
                            <p class="font-medium text-gray-800"><?= esc($profile['name']) ?></p>
                            <p class="text-sm text-gray-600">
                                <i class="fas fa-envelope mr-1"></i><?= esc($profile['email']) ?>
                            </p>
                        </div>
                        <a href="/admin/profile/edit/<?= $profile['id'] ?>" class="text-purple-600 hover:text-purple-800">
                            <i class="fas fa-edit"></i>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="mt-4 text-center">
                <a href="/admin/profile" class="text-purple-600 hover:text-purple-800 font-medium">
                    View All Profiles <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
        <?php else: ?>
            <div class="text-center py-8 text-gray-500">
                <i class="fas fa-inbox text-4xl mb-2 block"></i>
                <p>No profiles yet</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>
