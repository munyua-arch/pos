<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/', 'Home::index');

$routes->get('admin-login', 'Home::adminLogin');
$routes->post('admin-login', 'Home::adminLogin');

$routes->get('dashboard/', 'Dashboard::index');

$routes->get('dashboard/create-order', 'Dashboard::createOrder');
$routes->post('dashboard/create-order', 'Dashboard::createOrder');

$routes->get('dashboard/suppliers', 'Dashboard::suppliers');
$routes->post('dashboard/suppliers', 'Dashboard::suppliers');

$routes->get('dashboard/order-summary', 'Dashboard::orderSummary');
$routes->get('dashboard/update-quantity', 'Dashboard::updateQuantity');
$routes->get('dashboard/cancel-order/(:num)', 'Dashboard::cancelOrder/$1');



$routes->get('dashboard/products', 'Dashboard::products');
$routes->post('dashboard/products', 'Dashboard::products');

$routes->get('dashboard/categories', 'Dashboard::categories');
$routes->post('dashboard/categories', 'Dashboard::categories');


// admin routes
$routes->group('', ['filter' => 'isAdminLogged'], function($routes){
    $routes->get('admindashboard', 'AdminController::index');

    $routes->get('admindashboard/employees', 'AdminController::employees');
    $routes->post('admindashboard/employees', 'AdminController::employees');

    $routes->get('admindashboard/admin-suppliers', 'AdminController::suppliers');
    $routes->post('admindashboard/admin-suppliers', 'AdminController::suppliers');

    $routes->get('admindashboard/admin-edit-supplier/:(num)', 'AdminController::editSupplier/$1');
    $routes->get('admindashboard/admin-delete-supplier/:(num)', 'AdminController::deleteSupplier/$1');

    $routes->get('admindashboard/admin-products', 'AdminController::products');
    $routes->post('admindashboard/admin-products', 'AdminController::products');

    $routes->get('admindashboard/admin-categories', 'AdminController::categories');
    $routes->post('admindashboard/admin-categories', 'AdminController::categories');

    $routes->get('admindashboard/admin', 'AdminController::admin');
    $routes->post('admindashboard/admin', 'AdminController::admin');

    $routes->get('admindashboard/logout', 'AdminController::logout');
});

