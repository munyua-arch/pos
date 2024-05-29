<?php

namespace App\Models;

use CodeIgniter\Model;

class SuppliersModel extends Model
{
    protected $table            = 'suppliers';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'supplier_name', 'company', 'location', 'email', 'phone'];

    public function getTotalSuppliers()
    {
         return $this->countAll();
    }

  
}
