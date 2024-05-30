<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\SuppliersModel;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\OrderModel;


class Dashboard extends BaseController
{
    public function __construct()
    {
        helper('form');
        
        $this->suppliersModel = new SuppliersModel();
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
        $this->orderModel = new OrderModel();
        
    }
    public function index()
    {
        return view('dashboard_view');
    }

    public function createOrder()
    {
        $data = [];
        $data['cartTotal'] = $this->orderModel->getTotal();
     

        // pull data from db to display
        $data['orders'] = $this->orderModel->findAll();
        $data['products'] = $this->productModel->findAll();
 
        // rules to ensure the form is valid before storing in database
        $rules = [
            'product_name' => 'required',
            'quantity' => 'required'
        ];


        if ($this->request->is('post')) 
        {
            if ($this->validate($rules)) 
            {
                $orderData = [
                    'product_name' => $this->request->getPost('product_name', FILTER_SANITIZE_STRING),
                    'quantity' => $this->request->getPost('quantity', FILTER_SANITIZE_STRING)
                ];

                $product = $this->productModel->where('product_name', $orderData['product_name'])->first();

                $saveData = $this->orderModel->getPrice($orderData['product_name'], $orderData['quantity'], $product['id']);

               
                if ($saveData) 
                {
                 
                    session()->setTempdata('order_success', 'New item(s) added to cart successfully!');    
                }
                else
                {
                    session()->setTempdata('order_error', 'Failed to add item(s) to cart!');
                }
                
            }
            else
            {
                $data['validation'] = $this->validator;
            }
        }

        return view('create_order_view', $data);
    }

    public function updateQuantity()
    {
        // Check if it's an AJAX request
        if ($this->request->isAJAX()) {
            $productName = $this->request->getPost('product_name');
            $quantity = $this->request->getPost('quantity');

            // Call the model function to update the quantity
            $saveData = $this->orderModel->getPrice($productName, $quantity);

            if ($saveData) {
                return $this->response->setJSON(['status' => 'success']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to update quantity']);
            }
        }

        return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid request']);
    }

    public function cancelOrder( $id = null)
    {
        if ($this->orderModel->where('id', $id)->delete()) 
        {
            session()->setTempdata('cancel_success', 'Item(s) removed successfully');
            return redirect()->to(base_url().'dashboard/create-order');
        }

        // return the original number of stock to its original value
        
    }

    public function orderSummary()
    {
        
        

        return view('order_summary_view');
    }

    public function suppliers()
    {
        helper('form');

        $data = [];
        $data['suppliers'] = $this->suppliersModel->paginate(10);
        $data['pager'] = $this->suppliersModel->pager;

        return view('suppliers_view', $data);
    }

    

    

    public function products()
    {
        $data = [];
        $data['products'] = $this->productModel->paginate(10);
        $data['pager'] = $this->productModel->pager;

        return view('products_view', $data);
    }

    public function categories()
    {
        $data = [];

        $rules = [
            'category_name' => 'required'
        ];

        if ($this->request->is('post')) 
        {
            if ($this->validate($rules)) 
            {
                $category = $this->request->getPost('category_name', FILTER_SANITIZE_STRING);

                if ($this->categoryModel->save($category)) 
                {
                    session()->getTempdata('category_success', 'New Category has added successfully');
                }
                else
                {
                    session()->getTempdata('category_error', 'Failed to add category, please try again');
                }
            }
            else
            {
                echo "invalid form";
            }
        }
        return view('categories_view');
    }

    public function logout()
    {
        session()->remove('user_logged');
        session()->destroy;

        return redirect()->to(base_url().'login/');
    }
}
