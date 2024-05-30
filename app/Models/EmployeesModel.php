<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeesModel extends Model
{
    protected $table            = 'employees';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $allowedFields    = ['id', 'employee_name', 'employee_email', 'employee_phone', 'password', 'uniid'];

   public function getTotalEmployees()
   {
        return $this->countAll();
   }

   public function verifyEmail($email){

     $builder = $this->db->table('employees');
     $builder->select(['employee_name', 'employee_email', 'employee_phone', 'password', 'uniid', 'status']);
     $builder->where('employee_email', $email);
    
      $result = $builder->get();


     if (count($result->getResultArray()) == 1)

     {
         return $result->getRowArray();
     }
     else
     {
         return false;
     }


  }
}
