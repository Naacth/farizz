<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProfileModel;

class Profile extends BaseController
{
    protected $profileModel;

    public function __construct()
    {
        $this->profileModel = new ProfileModel();
        helper(['form', 'url']);
    }

    public function index()
    {
        // Check if profile already exists
        $profile = $this->profileModel->first();
        
        if ($profile) {
            // Redirect to edit if profile exists
            return redirect()->to('/admin/profile/edit/' . $profile['id']);
        } else {
            // Redirect to create if no profile exists
            return redirect()->to('/admin/profile/create');
        }
    }

    public function create()
    {
        // Check if profile already exists
        $profile = $this->profileModel->first();
        
        if ($profile) {
            // Redirect to edit if profile already exists
            return redirect()->to('/admin/profile/edit/' . $profile['id'])
                ->with('info', 'Profile already exists. You can edit it here.');
        }
        
        return view('admin/profile/create');
    }

    public function store()
    {
        // Check if profile already exists
        $existingProfile = $this->profileModel->first();
        if ($existingProfile) {
            return redirect()->to('/admin/profile/edit/' . $existingProfile['id'])
                ->with('error', 'Profile already exists. Only one profile is allowed.');
        }
        
        $validation = \Config\Services::validation();
        
        $validation->setRules([
            'name' => 'required|min_length[3]|max_length[100]',
            'address' => 'required',
            'email' => 'required|valid_email',
            'phone' => 'required|min_length[10]|max_length[20]',
            'summary' => 'required',
            'photo' => 'uploaded[photo]|max_size[photo,2048]|ext_in[photo,jpg,jpeg,png,gif]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $file = $this->request->getFile('photo');
        $photoPath = null;

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/profiles', $newName);
            $photoPath = 'profiles/' . $newName;
        }

        $this->profileModel->save([
            'name' => $this->request->getPost('name'),
            'address' => $this->request->getPost('address'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'summary' => $this->request->getPost('summary'),
            'photo' => $photoPath,
        ]);

        return redirect()->to('/admin/profile')->with('success', 'Profile created successfully');
    }

    public function edit($id)
    {
        $data['profile'] = $this->profileModel->find($id);
        
        if (!$data['profile']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Profile not found');
        }

        return view('admin/profile/edit', $data);
    }

    public function update($id)
    {
        $validation = \Config\Services::validation();
        
        $validation->setRules([
            'name' => 'required|min_length[3]|max_length[100]',
            'address' => 'required',
            'email' => 'required|valid_email',
            'phone' => 'required|min_length[10]|max_length[20]',
            'summary' => 'required',
            'photo' => 'permit_empty|max_size[photo,2048]|ext_in[photo,jpg,jpeg,png,gif]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $profile = $this->profileModel->find($id);
        $photoPath = $profile['photo'];

        $file = $this->request->getFile('photo');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Delete old file
            if ($photoPath && file_exists(FCPATH . 'uploads/' . $photoPath)) {
                unlink(FCPATH . 'uploads/' . $photoPath);
            }
            
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/profiles', $newName);
            $photoPath = 'profiles/' . $newName;
        }

        $this->profileModel->update($id, [
            'name' => $this->request->getPost('name'),
            'address' => $this->request->getPost('address'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'summary' => $this->request->getPost('summary'),
            'photo' => $photoPath,
        ]);

        return redirect()->to('/admin/profile')->with('success', 'Profile updated successfully');
    }

    public function delete($id)
    {
        // Prevent deletion - portfolio must have a profile
        return redirect()->to('/admin/profile')
            ->with('error', 'Cannot delete profile. Your portfolio must have a profile.');
    }
}
