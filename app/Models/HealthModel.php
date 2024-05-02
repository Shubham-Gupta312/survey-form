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
}