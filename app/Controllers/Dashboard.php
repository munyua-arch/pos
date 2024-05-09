<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\SuppliersModel;

class Dashboard extends BaseController
{
    public function __construct()
    {
        helper('form');
        
        $this->suppliersModel = new SuppliersModel();
    }
    public function index()
    {
        return view('dashboard_view');
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

        $rules = [
            'product_name' => 'required',
            'category' => 'required',
            'price' => 'required',
            'in_stock' => 'required'
        ];

        if ($this->request->is('post')) 
        {
            echo 'products form working';
        }
        return view('products_view');
    }

    public function categories()
    {
        return view('categories_view');
    }
}
