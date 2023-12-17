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

$routes->get('/kategori', 'Kategori::index');
$routes->post('/kategori/tambah', 'Kategori::create');
$routes->post('/kategori/ubah/(:num)', 'Kategori::update/$1');
$routes->delete('/kategori/(:num)', 'Kategori::delete/$1');

$routes->get('/user', 'User::index');
$routes->post('/user/tambah', 'User::create');
$routes->post('/user/ubah/(:num)', 'User::update/$1');
$routes->delete('/user/(:num)', 'User::delete/$1');

$routes->get('/produk', 'Produk::index');
$routes->post('/produk/tambah', 'Produk::create');
$routes->post('/produk/ubah/(:num)', 'Produk::update/$1');
$routes->delete('/produk/(:num)', 'Produk::delete/$1');