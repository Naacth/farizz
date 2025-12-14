<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    protected $table = 'profile';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'address', 'email', 'phone', 'summary', 'photo'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getProfilesPaginated($perPage = 10, $search = '', $sortBy = 'name', $sortOrder = 'ASC')
    {
        if ($search) {
            $this->groupStart()
                 ->like('name', $search)
                 ->orLike('email', $search)
                 ->orLike('address', $search)
                 ->groupEnd();
        }

        return $this->orderBy($sortBy, $sortOrder)->paginate($perPage);
    }
}
