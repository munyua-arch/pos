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
            return false;
        }
    }

    // function to deduct stock
    // public function deductStock($productName, $quantity)
    // {
    //     $product = $this->where('product_name', $productName)->first();

    //     if ($product) {
    //         // deduct stock
    //         $newStock = $product['in_stock'] - $quantity;
    //         // update the new number to db
    //      return $this->update($product['product_name'], ['in_stock' => $newStock]);
    //     }
    //     else
    //     {
    //         return false;
    //     }
    // }

    public function deductStock($productName, $quantity, $id)
    {
        // Start transaction
        $this->db->transBegin();

        // Fetch the product by its name
        $product = $this->where('product_name', $productName)->first();

        if ($product) {
            // Check if there's enough stock
            if ($product['in_stock'] >= $quantity) {
                // Deduct stock
                $newStock = $product['in_stock'] - $quantity;

                // Update the new number in the database
                $updateResult = $this->update($product['id'], ['in_stock' => $newStock]);

                if ($updateResult) {
                    // Commit transaction
                    $this->db->transCommit();
                    return true;
                } else {
                    // Rollback transaction
                    $this->db->transRollback();
                    return false;
                }
            } else {
                // Rollback transaction
                $this->db->transRollback();
                return false; // Not enough stock
            }
        } else {
            // Rollback transaction
            $this->db->transRollback();
            return false; // Product not found
        }
    }

    
}
