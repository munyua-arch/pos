<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('dashboard/', 'Dashboard::index');

$routes->get('dashboard/create-order', 'Dashboard::createOrder');
$routes->post('dashboard/create-order', 'Dashboard::createOrder');

$routes->get('dashboard/suppliers', 'Dashboard::suppliers');
$routes->post('dashboard/suppliers', 'Dashboard::suppliers');

$routes->get('dashboard/order-summary', 'Dashboard::orderSummary');

$routes->get('dashboard/edit-supplier/:(num)', 'Dashboard::editSupplier/$1');

$routes->get('dashboard/delete-supplier/:(num)', 'Dashboard::deleteSupplier/$1');

$routes->get('dashboard/products', 'Dashboard::products');
$routes->post('dashboard/products', 'Dashboard::products');

$routes->get('dashboard/categories', 'Dashboard::categories');
$routes->post('dashboard/categories', 'Dashboard::categories');