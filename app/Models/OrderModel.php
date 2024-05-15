<?php

namespace App\Models;

use CodeIgniter\Model;


class OrderModel extends Model
{
    protected $table            = 'orders';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $allowedFields    = ['id', 'product_name', 'price', 'quantity', 'total_price'];

    public function getPrice($productName, $quantity)
    {
        $productModel = new ProductModel();
        $price = $productModel->getProductPrice($productName);

        $totalPrice = $price * $quantity;

        $this->insert(
            [
                'product_name' => $productName,
                'price' => $price,
                'quantity' => $quantity,
                'total_price' => $totalPrice
            ]);
    }

    public function getTotal()
    {
        return $this->countAll();
    } 
}
