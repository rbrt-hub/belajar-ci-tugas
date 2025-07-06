<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Route untuk Home yang membutuhkan autentikasi
$routes->get('/', 'Home::index', ['filter' => 'auth']); // Menambahkan filter auth

// Route untuk Login
$routes->get('login', 'AuthController::login'); // Menampilkan form login (GET)
$routes->post('login', 'AuthController::login', ['filter' => 'RedirectFilter']); // Aktifkan filter redirect setelah login
// Route untuk Logout
$routes->get('logout', 'AuthController::logout');

// Route untuk Produk, Keranjang, dan contact dengan filter auth
$routes->group('produk', ['filter' => 'auth'], function ($routes) { 
    $routes->get('', 'ProdukController::index');
    $routes->post('', 'ProdukController::create');
    $routes->post('edit/(:any)', 'ProdukController::edit/$1');
    $routes->get('delete/(:any)', 'ProdukController::delete/$1');
    $routes->get('download', 'ProdukController::download');
});

$routes->group('produkkategori', ['filter' => 'auth'], function ($routes) {
    $routes->get('', 'produkkategori::index');
    $routes->post('', 'produkkategori::store');
    $routes->get('edit/(:num)', 'produkkategori::edit/$1');
    $routes->post('edit/(:num)', 'produkkategori::update/$1');
    $routes->get('delete/(:num)', 'produkkategori::delete/$1');
});

$routes->group('keranjang', ['filter' => 'auth'], function ($routes) {
    $routes->get('', 'TransaksiController::index');
    $routes->post('', 'TransaksiController::cart_add');
    $routes->post('edit', 'TransaksiController::cart_edit');
    $routes->get('delete/(:any)', 'TransaksiController::cart_delete/$1');
    $routes->get('clear', 'TransaksiController::cart_clear');
});

$routes->get('checkout', 'TransaksiController::checkout', ['filter' => 'auth']);
$routes->post('buy', 'TransaksiController::buy', ['filter' => 'auth']);

$routes->get('get-location', 'TransaksiController::getLocation', ['filter' => 'auth']);
$routes->get('get-cost', 'TransaksiController::getCost', ['filter' => 'auth']);

$routes->get('profile', 'Home::profile', ['filter' => 'auth']);
$routes->get('contact', 'Home::contact');  //tidak membutuhkan filter auth jika tidak diperlukan

$routes->resource('api', ['controller' => 'apiController']);