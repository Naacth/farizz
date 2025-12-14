<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ActivityModel;

class Activity extends BaseController
{
    protected $activityModel;

    public function __construct()
    {
        $this->activityModel = new ActivityModel();
        helper(['form', 'url']);
    }

    public function index()
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

        return view('admin/activity/index', $data);
    }

    public function create()
    {
        return view('admin/activity/create');
    }

    public function store()
    {
        $validation = \Config\Services::validation();
        
        $validation->setRules([
            'date' => 'required|valid_date',
            'time' => 'required',
            'activity_name' => 'required|min_length[3]|max_length[255]',
            'media' => 'uploaded[media]|max_size[media,2048]|ext_in[media,jpg,jpeg,png,gif,mp4,avi,mov]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $file = $this->request->getFile('media');
        $mediaPath = null;

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/activities', $newName);
            $mediaPath = 'activities/' . $newName;
        }

        $this->activityModel->save([
            'date' => $this->request->getPost('date'),
            'time' => $this->request->getPost('time'),
            'activity_name' => $this->request->getPost('activity_name'),
            'media' => $mediaPath,
        ]);

        return redirect()->to('/admin/activity')->with('success', 'Activity created successfully');
    }

    public function edit($id)
    {
        $data['activity'] = $this->activityModel->find($id);
        
        if (!$data['activity']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Activity not found');
        }

        return view('admin/activity/edit', $data);
    }

    public function update($id)
    {
        $validation = \Config\Services::validation();
        
        $validation->setRules([
            'date' => 'required|valid_date',
            'time' => 'required',
            'activity_name' => 'required|min_length[3]|max_length[255]',
            'media' => 'permit_empty|max_size[media,2048]|ext_in[media,jpg,jpeg,png,gif,mp4,avi,mov]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $activity = $this->activityModel->find($id);
        $mediaPath = $activity['media'];

        $file = $this->request->getFile('media');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Delete old file
            if ($mediaPath && file_exists(FCPATH . 'uploads/' . $mediaPath)) {
                unlink(FCPATH . 'uploads/' . $mediaPath);
            }
            
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/activities', $newName);
            $mediaPath = 'activities/' . $newName;
        }

        $this->activityModel->update($id, [
            'date' => $this->request->getPost('date'),
            'time' => $this->request->getPost('time'),
            'activity_name' => $this->request->getPost('activity_name'),
            'media' => $mediaPath,
        ]);

        return redirect()->to('/admin/activity')->with('success', 'Activity updated successfully');
    }

    public function delete($id)
    {
        $activity = $this->activityModel->find($id);
        
        if ($activity && $activity['media']) {
            $filePath = FCPATH . 'uploads/' . $activity['media'];
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        $this->activityModel->delete($id);

        return redirect()->to('/admin/activity')->with('success', 'Activity deleted successfully');
    }
}
