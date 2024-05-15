<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table            = 'products';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'product_name', 'category', 'price', 'in_stock'];


    // get product price by name
    public function getProductPrice($productName)
    {
        $result = $this->where('product_name', $productName)->get()->getRow()->price;

        if ($result !== null) {
           return $result;
        }
        else {
            echo 'Price not found';
        }
    }
    
}
