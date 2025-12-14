<?php

namespace App\Models;

use CodeIgniter\Model;

class EducationModel extends Model
{
    protected $table = 'education';
    protected $primaryKey = 'id';
    protected $allowedFields = ['level', 'institution_name', 'start_year', 'end_year', 'description'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getEducationPaginated($perPage = 10, $search = '', $sortBy = 'start_year', $sortOrder = 'DESC')
    {
        if ($search) {
            $this->groupStart()
                 ->like('level', $search)
                 ->orLike('institution_name', $search)
                 ->groupEnd();
        }

        return $this->orderBy($sortBy, $sortOrder)->paginate($perPage);
    }
}
