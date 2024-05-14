<?php

namespace App\Models;

use CodeIgniter\Model;

class HealthModel extends Model
{
    protected $table = 'rmh';
    protected $primaryKey = 'id';
    protected $protectFields = [];

    public function updateData($id, $data)
    {
        return $this->update($id, $data);
    }

    public function countData()
    {
        return $this->where('is_admin', 0)->countAllResults();
    }
    public function countFilteredData($searchValue)
    {
        $builder = $this->where('is_admin', 0);
        if (!empty($searchValue)) {
            $builder->groupStart();
            $builder->orLike('emp_id', $searchValue);
            $builder->orLike('uhid', $searchValue);
            $builder->groupEnd();
        }
        return $builder->countAllResults();
    }
}