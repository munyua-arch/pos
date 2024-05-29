<?php

namespace App\Controllers;
use App\Models\AdminModel;

class Home extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->adminModel = new AdminModel();
    }
    public function index(): string
    {
        /*Get login data from user
        *verify if email exists in db
        *verify password from input
        *assign the logged user a session with unique id
        */

        $data = [];

        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required|min_length[5]|max_length[20]'
        ];

        if ($this->request->is('post'))
        {
            if ($this->validate($rules)) 
            {
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');

                $userdata = $this->createEmployee->verifyEmail($email);

              
                if ($userdata) 
                {
                    // verify password
                    if (password_verify($password, $userdata['password'])) 
                    {
                        // check of employee status is active
                        if ($userdata['status'] == 'active') 
                        {
                            //create a login session
                            session()->set('logged_user', $userdata['uniid']);
                            return redirect()->to(base_url().'dashboard/');
                        }
                        else
                        {
                            session()->setTempdata('login_error', "Please Activate your account!");
                        }
                    }
                    else{
                        session()->setTempdata('login_error', "Wrong password entered for the email.");
                    }
                }else {
                    session()->setTempdata('login_error', "Employee does not exist!");
                    
                }
            }
            else{
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
