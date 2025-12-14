<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\EducationModel;

class Education extends BaseController
{
    protected $educationModel;

    public function __construct()
    {
        $this->educationModel = new EducationModel();
        helper(['form', 'url']);
    }

    public function index()
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

        return view('admin/education/index', $data);
    }

    public function create()
    {
        return view('admin/education/create');
    }

    public function store()
    {
        $validation = \Config\Services::validation();
        
        $validation->setRules([
            'level' => 'required|in_list[SD,SMP,SMA,Kuliah]',
            'institution_name' => 'required|min_length[3]|max_length[255]',
            'start_year' => 'required|integer|min_length[4]|max_length[4]',
            'end_year' => 'permit_empty|integer|min_length[4]|max_length[4]',
            'description' => 'permit_empty',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $this->educationModel->save([
            'level' => $this->request->getPost('level'),
            'institution_name' => $this->request->getPost('institution_name'),
            'start_year' => $this->request->getPost('start_year'),
            'end_year' => $this->request->getPost('end_year') ?: null,
            'description' => $this->request->getPost('description'),
        ]);

        return redirect()->to('/admin/education')->with('success', 'Education created successfully');
    }

    public function edit($id)
    {
        $data['education'] = $this->educationModel->find($id);
        
        if (!$data['education']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Education not found');
        }

        return view('admin/education/edit', $data);
    }

    public function update($id)
    {
        $validation = \Config\Services::validation();
        
        $validation->setRules([
            'level' => 'required|in_list[SD,SMP,SMA,Kuliah]',
            'institution_name' => 'required|min_length[3]|max_length[255]',
            'start_year' => 'required|integer|min_length[4]|max_length[4]',
            'end_year' => 'permit_empty|integer|min_length[4]|max_length[4]',
            'description' => 'permit_empty',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $this->educationModel->update($id, [
            'level' => $this->request->getPost('level'),
            'institution_name' => $this->request->getPost('institution_name'),
            'start_year' => $this->request->getPost('start_year'),
            'end_year' => $this->request->getPost('end_year') ?: null,
            'description' => $this->request->getPost('description'),
        ]);

        return redirect()->to('/admin/education')->with('success', 'Education updated successfully');
    }

    public function delete($id)
    {
        $this->educationModel->delete($id);

        return redirect()->to('/admin/education')->with('success', 'Education deleted successfully');
    }
}
