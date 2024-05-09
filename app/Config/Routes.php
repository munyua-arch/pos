<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('dashboard/', 'Dashboard::index');

$routes->get('dashboard/suppliers', 'Dashboard::suppliers');

$routes->get('dashboard/products', 'Dashboard::products');

$routes->get('dashboard/categories', 'Dashboard::categories');
