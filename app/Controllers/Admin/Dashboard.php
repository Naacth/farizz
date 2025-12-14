<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ActivityModel;
use App\Models\ProfileModel;
use App\Models\EducationModel;

class Dashboard extends BaseController
{
    protected $activityModel;
    protected $profileModel;
    protected $educationModel;

    public function __construct()
    {
        $this->activityModel = new ActivityModel();
        $this->profileModel = new ProfileModel();
        $this->educationModel = new EducationModel();
    }

    public function index()
    {
        // Get statistics
        $data = [
            'totalActivities' => $this->activityModel->countAll(),
            'totalProfiles' => $this->profileModel->countAll(),
            'totalEducation' => $this->educationModel->countAll(),
            'recentActivities' => $this->activityModel->orderBy('created_at', 'DESC')->findAll(5),
            'recentProfiles' => $this->profileModel->orderBy('created_at', 'DESC')->findAll(3),
        ];

        return view('admin/dashboard', $data);
    }
}
