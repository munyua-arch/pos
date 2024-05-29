<?php

namespace App\Models;

use CodeIgniter\Model;


class OrderModel extends Model
{
    protected $table            = 'orders';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $allowedFields    = ['id', 'product_name', 'price', 'quantity', 'total_price'];

    public function getPrice($productName, $quantity, $id)
    {
        $productModel = new ProductModel();
        // $price = $productModel->getProductPrice($productName);
        $product = $productModel->where('product_name', $productName)->first();

        if ($product) 
        {
            // get the price of the product from the products table
            $price = $product['price'];
            $totalPrice = $price * $quantity;

            // deduct stock and update the table 
            if ($productModel->deductStock($productName, $quantity, $id))
            {
                return $this->insert(
                [
                    'product_name' => $productName,
                    'price' => $price,
                    'quantity' => $quantity,
                    'total_price' => $totalPrice
                ]);
            }
            // else
            // {
            //     return false;
            // }
        }
        // else
        // {
        //     return 'Insufficient Product.';
        // }
        
    }

    public function getTotal()
    {
        return $this->countAll();
    } 
}
