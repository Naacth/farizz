<?php

namespace App\Models;

use CodeIgniter\Model;

class ActivityModel extends Model
{
    protected $table = 'activities';
    protected $primaryKey = 'id';
    protected $allowedFields = ['date', 'time', 'activity_name', 'media'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getActivitiesPaginated($perPage = 10, $search = '', $sortBy = 'date', $sortOrder = 'DESC')
    {
        if ($search) {
            $this->groupStart()
                 ->like('activity_name', $search)
                 ->orLike('date', $search)
                 ->groupEnd();
        }

        return $this->orderBy($sortBy, $sortOrder)->paginate($perPage);
    }
}
