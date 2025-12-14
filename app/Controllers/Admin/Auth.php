<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function login()
    {
        // If already logged in, redirect to admin
        if (session()->get('admin_logged_in')) {
            return redirect()->to('/admin/dashboard');
        }

        return view('admin/login');
    }

    public function loginAttempt()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Check credentials
        if ($username === 'fariz123' && $password === 'fariz321') {
            // Set session
            session()->set([
                'admin_logged_in' => true,
                'admin_username' => $username
            ]);

            return redirect()->to('/admin/dashboard')->with('success', 'Welcome back, ' . $username . '!');
        }

        return redirect()->back()->with('error', 'Invalid username or password');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/admin')->with('success', 'You have been logged out successfully');
    }
}
