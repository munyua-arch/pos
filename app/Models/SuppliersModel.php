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

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

  
}
