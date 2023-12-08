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
$routes->get('/', 'Home::index');

$routes->get('/kategori', 'Kategori::index');
$routes->post('/kategori/tambah', 'Kategori::create');
$routes->post('/kategori/ubah/(:num)', 'Kategori::update/$1');
$routes->delete('/kategori/(:num)', 'Kategori::delete/$1');