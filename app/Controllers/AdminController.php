<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\SuppliersModel;
use App\Models\ProductModel;
use App\Models\IncomingModel;
use App\Models\OrderModel;
use App\Models\EmployeesModel;
use App\Models\AdminModel;
use App\Models\RoleModel;
use App\Models\PermissionModel;

class AdminController extends BaseController
{
    public function __construct()
    {
        helper('form');
        
        $this->suppliersModel = new SuppliersModel();
        $this->productModel = new ProductModel();
        $this->incomingModel = new IncomingModel();
        $this->orderModel = new OrderModel();
        $this->employeesModel = new EmployeesModel();
        $this->adminModel = new AdminModel();
        $this->roleModel = new RoleModel();
        $this->permissionModel = new PermissionModel();
        
    }

    public function index()
    {
        $data = [];
        $data['totalEmployees'] = $this->employeesModel->getTotalEmployees();
        $data['totalSuppliers'] = $this->suppliersModel->getTotalSuppliers();


        return view('admindashboard_view', $data);
    }

    public function employees()
    {
        $data = [];
        $data['employees'] = $this->employeesModel->paginate(10);
        $data['pager'] = $this->employeesModel->pager;
        

        $rules = [
            'employee_name' => 'required',
            'employee_email' => 'required|valid_email',
            'employee_phone' => 'required|max_length[10]',
            'password' => 'required|max_length[10]',
            'confirm_password' => 'matches[password]'
        ];

        if ($this->request->is('post')) 
        {
            if ($this->validate($rules)) 
            {
                // create a unique id for each employee

                $uniid = md5(str_shuffle('abcdefghijklmnopqrstuvwxyz'.time()));

               $employeeData = [
                'employee_name' => $this->request->getPost('employee_name'),
                'employee_email' => $this->request->getPost('employee_email'),
                'employee_phone' => $this->request->getPost('employee_phone'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
                'uniid' => $uniid
               ];

               if ($this->employeesModel->save($employeeData)) 
               {
                    session()->setFlashData('employee_success', 'New employee has been added successfully!');
               }
               else
               {
                session()->setFlashData('employee_error', 'Failed to add employee, please try again!');
               }
            }
            else
            {
                $data['validation'] = $this->validator;
               
            }
        }
        return view('employees_view', $data);
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

        return view('admin_suppliers_view', $data);
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
        return view('admin_products_view', $data);
    }

    public function incomingGoods()
    {
        $data = [];
        $data['suppliers'] = $this->suppliersModel->findAll();
        $data['goods'] = $this->productModel->findAll();

        $rules = [
            'entry_date' => 'required',
            'supplier' => 'required',
            'goods' => 'required',
            'quantity' => 'required',
        ];
        
        if ($this->request->is('post')) 
        {
            if($this->validate($rules))
            {
                // sace the form
                $incomingData = [
                    'entry_date' => $this->request->getPost('entry_date'),
                    'supplier' => $this->request->getPost('supplier'),
                    'goods' => $this->request->getPost('goods'),
                    'quantity' => $this->request->getPost('quantity')
                ];

                // find the selected  good and update its qnt
                $selectedGood = $this->productModel->where('product_name', $incomingData['goods'])->first();

                

                // save the data only after qnt has been updated in the products table
                if ($selectedGood) 
                {
                    // add new qnt to old qnt
                    $newQnt = $selectedGood['in_stock'] + $incomingData['quantity'];

                    $updated = $this->productModel->updateStock($incomingData['goods'], $newQnt);


                    if ($updated) 
                    {
                        if ($this->incomingModel->save($incomingData)) 
                        {
                                session()->setFlashData('income_success', 'New arrival saved successfully!');
                        }
                        else {
                            session()->setFlashData('income_error', 'Failed to save new arrival, please try again!');
                        }
                    }
                    else
                    {
                        session()->setFlashData('income_error', 'Failed to update new quantity, please try again!');
                    }
                }
                else
                {
                    session()->setFlashData('income_error', 'Failed to find the product, please try again!');
                }


               
            }
            else {
                $data['validation'] = $this->validator;
            }
        }
        return view('incoming_goods_view', $data);
    }

    public function admin()
    {
        $data = [];
        $data['admins'] = $this->adminModel->findAll();
        

        $rules = [
            'admin_name' => 'required',
            'admin_email' => 'required|valid_email',
            'admin_phone' => 'required|max_length[10]',
            'password' => 'required|max_length[20]',
            'confirm_password' => 'matches[password]'
        ];

        if ($this->request->is('post')) 
        {
            if ($this->validate($rules)) 
            {
                // generate a unique id
                $uniid = md5(str_shuffle('abcdefghijklmnopqrstuvwxyz'.time()));

               $adminData = [
                'admin_name' => $this->request->getPost('admin_name'),
                'admin_email' => $this->request->getPost('admin_email'),
                'admin_phone' => $this->request->getPost('admin_phone'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
                'uniid' => $uniid
               ];

               if ($this->adminModel->save($adminData)) 
               {
                    session()->setFlashData('admin_success', 'New admin has been added successfully!');
               }
               else
               {
                session()->setFlashData('admin_error', 'Failed to add admin, please try again!');
               }
            }
            else
            {
                $data['validation'] = $this->validator;
               
            }
        }
        return view('admin_view', $data);
    }

    public function roles()
    {
        $data = [];

        $formType = $this->request->getPost('form_type');

        if ($formType === 'role_form') 
        {
            $rules = [
                'role_type' => 'required',
                'permissions' => 'required' 
            ];
    
            if ($this->request->is('post')) 
            {
                if ($this->validate($rules)) 
                {
                    $roleData =[
                        'role_type' => $this->request->getPost('role_type', FILTER_SANITIZE_STRING),
                        'permissions' => $this->request->getPost('permissions', FILTER_SANITIZE_STRING)
                    ];
                         
                    
    
                    // check if permissions is an array
                    if (is_array($roleData['permissions'])) 
                    {
                        // loop through each permission and save to db
                        foreach($roleData['permissions'] as $roleData['permission'])
                        {
                            if ($this->roleModel->save($roleData)) 
                            {
                                session()->setTempdata('role_success', 'New role added successfully');
                            }
                            else
                            {
                                session()->setTempdata('role_error', 'Failed to add new role');
                            }
                        }
    
                    }
                }
                else {
                    $data['validation'] = $this->validator;
                }
            }
        }


        // logic to handle permission form
        if ($formType === 'permission_form') 
        {
            $rules = [
                'permission_name' => 'required'
            ];

            if ($this->request->is('post'))
            {
                if ($this->validate($rules)) 
                {
                    $formData = [
                    'permission' => $this->request->getPost('permission_name', FILTER_SANITIZE_STRING)
                    ];

                    
                    if ($this->permissionModel->save($formData)) 
                    {
                        session()->setTempdata('permission_success', "Permission added successfully");
                    }
                    else {
                        session()->setTempdata('permission_error', "Failed to create permission type");
                    }
                }
                else {
                    $data['permission_validation'] = $this->validator;
                }
            }
        }

        return view('roles_view', $data);
    }

    public function logout()
    {
        session()->remove('admin_logged');
        session()->destroy;

        return redirect()->to(base_url().'admin-login/');
    }
}
