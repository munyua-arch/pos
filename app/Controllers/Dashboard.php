<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Dashboard extends BaseController
{
    public function __construct()
    {
        helper('form');
    }
    public function index()
    {
        return view('dashboard_view');
    }

    public function suppliers()
    {
        return view('suppliers_view');
    }

    public function products()
    {
        return view('products_view');
    }

    public function categories()
    {
        return view('categories_view');
    }
}
