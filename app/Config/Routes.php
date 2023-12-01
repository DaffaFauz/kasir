<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/satuan', 'Satuan::index');
$routes->post('/satuan/tambah', 'Satuan::create');
$routes->post('/satuan/ubah/(:num)', 'Satuan::update/$1');
$routes->delete('/satuan/(:num)', 'Satuan::delete/$1');
