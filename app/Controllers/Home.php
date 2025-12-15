<?php

namespace App\Controllers;

use App\Models\ActivityModel;
use App\Models\ProfileModel;
use App\Models\EducationModel;

class Home extends BaseController
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
        return view('home');
    }

    public function profile()
    {
        $search = $this->request->getGet('search') ?? '';
        $sortBy = $this->request->getGet('sort_by') ?? 'name';
        $sortOrder = $this->request->getGet('sort_order') ?? 'ASC';
        $perPage = 10;

        $data = [
            'profiles' => $this->profileModel->getProfilesPaginated($perPage, $search, $sortBy, $sortOrder),
            'pager' => $this->profileModel->pager,
            'search' => $search,
            'sortBy' => $sortBy,
            'sortOrder' => $sortOrder,
        ];

        return view('profile', $data);
    }

    public function activity()
    {
        $search = $this->request->getGet('search') ?? '';
        $sortBy = $this->request->getGet('sort_by') ?? 'date';
        $sortOrder = $this->request->getGet('sort_order') ?? 'DESC';
        $perPage = 10;

        $data = [
            'activities' => $this->activityModel->getActivitiesPaginated($perPage, $search, $sortBy, $sortOrder),
            'pager' => $this->activityModel->pager,
            'search' => $search,
            'sortBy' => $sortBy,
            'sortOrder' => $sortOrder,
        ];

        return view('activity', $data);
    }

    public function education()
    {
        $search = $this->request->getGet('search') ?? '';
        $sortBy = $this->request->getGet('sort_by') ?? 'start_year';
        $sortOrder = $this->request->getGet('sort_order') ?? 'DESC';
        $perPage = 10;

        $data = [
            'education' => $this->educationModel->getEducationPaginated($perPage, $search, $sortBy, $sortOrder),
            'pager' => $this->educationModel->pager,
            'search' => $search,
            'sortBy' => $sortBy,
            'sortOrder' => $sortOrder,
        ];

        return view('education', $data);
    }
}
