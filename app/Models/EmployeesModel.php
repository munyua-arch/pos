<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeesModel extends Model
{
    protected $table            = 'employees';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $allowedFields    = ['id', 'employee_name', 'employee_email', 'employee_phone', 'password'];

   public function getTotalEmployees()
   {
        return $this->countAll();
   }
}
