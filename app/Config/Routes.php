<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/login', 'Home::login');
$routes->get('/logout', 'Home::logout');


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

$routes->get('/dashboard', 'Admin::index');
$routes->get('/setting', 'Admin::setting');
$routes->post('/setting/ubah/(:num)', 'Admin::settingUpdate/$1');

$routes->get('/penjualan', 'Penjualan::index');
$routes->post('/penjualan/cek', 'Penjualan::cekKode');
$routes->post('/penjualan/addcart', 'Penjualan::addCart');
$routes->get('/penjualan/delete', 'Penjualan::deleteCart');
$routes->post('/penjualan/simpanTransaksi', 'Penjualan::simpanTransaksi');
$routes->get('/penjualan/remove/(:any)', 'Penjualan::removeItem/$1');

$routes->get('/laporan/produk', 'Laporan::index');
$routes->get('/laporan/harian', 'Laporan::lapHarian');
$routes->post('/laporan/harian/data', 'Laporan::getLapHarian');
$routes->get('/laporan/harian/(:segment)', 'Laporan::printLapHarian/$1');
$routes->get('/laporan/bulanan', 'Laporan::lapBulanan');
$routes->post('/laporan/bulanan/data', 'Laporan::getLapBulanan');
$routes->get('/laporan/bulanan/(:segment)', 'Laporan::printLapBulanan/$1');
$routes->get('/laporan/tahunan', 'Laporan::lapTahunan');
$routes->post('/laporan/tahunan/data', 'Laporan::getLapTahunan');
$routes->get('/laporan/tahunan/(:segment)', 'Laporan::printLapTahunan/$1');
