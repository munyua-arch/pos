<?php

namespace App\Controllers;
use App\Models\AdminModel;
use App\Models\EmployeesModel;

class Home extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->adminModel = new AdminModel();
        $this->employeeModel = new EmployeesModel();
    }
    public function index()
    {
        // /*Get login data from user
        // *verify if email exists in db
        // *verify password from input
        // *assign the logged user a session with unique id
        // */

        // $data = [];

        // $rules = [
        //     'email' => 'required|valid_email',
        //     'password' => 'required|min_length[5]|max_length[20]'
        // ];

        // if ($this->request->is('post'))
        // {
        //     echo "form is posting";
        // }
        return view('welcome_view');
    }

    public function login()
    {
        $data = [];

        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required|max_length[20]'
        ];

        if ($this->request->is('post')) 
        {
            if ($this->validate($rules)) 
            {
                //save data to db
                $loginuserData = [
                    'email' => $this->request->getPost('email'),
                    'password' => $this->request->getPost('password'),
                ];

                // verify if admin email exists
                $userData = $this->employeeModel->verifyEmail($loginuserData['email']);

                if ($userData) 
                {
                    // verify admin password
                    if (password_verify($loginuserData['password'], $userData['password'])) 
                    {
                    //    check if admin account is active
                        if ($userData['status'] === 'active') 
                        {
                            // create a login session for admin using uniid then redirect admin to dashboard
                            session()->set('user_logged', $userData['uniid']);
                            return redirect()->to(base_url().'dashboard/');
                        }
                        else
                        {
                            session()->setTempdata('login_error', "Please Activate your account!");
                        }
                    }
                    else
                    {
                        session()->setTempdata('login_error', "Wrong password or email");
                    }
                }
                else
                {
                    session()->setTempdata('login_error', "User does not exists!");
                }
            }
            else
            {
                $data['validation'] = $this->validator;
            }
        }
        return view('login_view', $data);
    }

    public function adminLogin()
    {
        $data = [];

        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required|max_length[20]'
        ];

        if ($this->request->is('post')) 
        {
            if ($this->validate($rules)) 
            {
                //save data to db
                $loginData = [
                    'email' => $this->request->getPost('email'),
                    'password' => $this->request->getPost('password'),
                ];

                // verify if admin email exists
                $adminData = $this->adminModel->verifyEmail($loginData['email']);

                if ($adminData) 
                {
                    // verify admin password
                    if (password_verify($loginData['password'], $adminData['password'])) 
                    {
                    //    check if admin account is active
                        if ($adminData['status'] === 'active') 
                        {
                            // create a login session for admin using uniid then redirect admin to dashboard
                            session()->set('admin_logged', $adminData['uniid']);
                            return redirect()->to(base_url().'admindashboard/');
                        }
                        else
                        {
                            session()->setTempdata('admin_login_error', "Please Activate your account!");
                        }
                    }
                    else
                    {
                        session()->setTempdata('admin_login_error', "Wrong Password for the email");
                    }
                }
                else
                {
                    session()->setTempdata('admin_login_error', "User does not exists!");
                }
            }
            else
            {
                $data['validation'] = $this->validator;
            }
        }
        return view('admin_login_view', $data);
    }


}
