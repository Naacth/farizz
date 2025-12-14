<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SettingModel;

class Settings extends BaseController
{
    protected $settingModel;

    public function __construct()
    {
        $this->settingModel = new SettingModel();
        helper(['form', 'url']);
    }

    public function index()
    {
        $data = [
            'settings' => $this->settingModel->getAllSettings(),
        ];

        return view('admin/settings/index', $data);
    }

    public function update()
    {
        $fields = [
            'site_name',
            'site_description',
            'github_url',
            'linkedin_url',
            'instagram_url',
            'twitter_url',
            'contact_email',
            'contact_phone',
            'contact_location',
        ];

        foreach ($fields as $field) {
            $value = $this->request->getPost($field) ?? '';
            $this->settingModel->setSetting($field, $value);
        }

        return redirect()->to('/admin/settings')->with('success', 'Settings updated successfully!');
    }
}
