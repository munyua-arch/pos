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

                $saveData = $this->orderModel->getPrice($orderData['product_name'], $orderData['quantity']);

                if ($saveData) {
                    session()->setFlashdata('order_success', 'Items added successfully');
                    return redirect()->to(current_url());
                }
                else
                {
                    session()->setFlashdata('order_error', 'Failed to add item, please try again!');
                    return redirect()->to(current_url());
                }
            }
            else
            {
                $data['validation'] = $this->validator;
            }
        }

        return view('create_order_view', $data);
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

        $rules = [
            'supplier_name' => 'required',
            'company' => 'required',
            'location' => 'required',
            'email' => 'required|valid_email',
            'phone' => 'required|max_length[10]'
        ];

        if ($this->request->is('post')) 
        {
            if ($this->validate($rules)) 
            {
                // save data to db
                $supplierData = [
                    'supplier_name' => $this->request->getPost('supplier_name', FILTER_SANITIZE_STRING),
                    'company' => $this->request->getPost('company', FILTER_SANITIZE_STRING),
                    'location' => $this->request->getPost('location', FILTER_SANITIZE_STRING),
                    'email' => $this->request->getPost('email', FILTER_SANITIZE_STRING),
                    'phone' => $this->request->getPost('phone', FILTER_SANITIZE_STRING)
                ];

                if ($this->suppliersModel->save($supplierData)) 
                {
                    session()->setTempdata('supplier_success', 'New supplier added successfully!');
                }
                else
                {
                    session()->setTempdata('supplier_error', 'Failed to add supplier, please try again');
                }
            }
            else
            {
                echo "Not valid";   
                // $data['validation'] = $this->validator;
            }
        }

        return view('suppliers_view', $data);
    }

    public function editSupplier($id = null)
    {
        //find data based on the id
        $data['editSupplier'] = $this->suppliersModel->where('id', $id)->find();

        return view('edit_supplier_view', $data);
    }

    public function deleteSupplier($id = null)
    {
        if ($this->suppliersModel->where('id', $id)->delete()) {
            session()->setTempdata('supplier_delete', 'Supplier deleted successfully!');
        }

        return redirect()->to(base_url().'dashboard/suppliers');
    }

    public function products()
    {
        $data = [];
        $data['products'] = $this->productModel->paginate(10);
        $data['pager'] = $this->productModel->pager;

        $rules = [
            'product_name' => 'required',
            'category' => 'required',
            'price' => 'required',
            'in_stock' => 'required'
        ];

        if ($this->request->is('post')) 
        {
            if ($this->validate($rules)) 
            {
                //grab the form data and save to db
                $productData = [
                    'product_name' => $this->request->getPost('product_name', FILTER_SANITIZE_STRING),
                    'category' => $this->request->getPost('category', FILTER_SANITIZE_STRING),
                    'price' => $this->request->getPost('price', FILTER_SANITIZE_STRING),
                    'in_stock' => $this->request->getPost('in_stock', FILTER_SANITIZE_STRING)
                ];

                if ($this->productModel->save($productData)) 
                {
                    session()->setTempdata('product_success', 'New Product added successfully');
                }
                else
                {
                    session()->setTempdata('product_error', 'Failed to add product, please try again');
                }
            }
        }
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
}
