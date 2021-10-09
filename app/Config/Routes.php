<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Utama::index');
// $routes->get('/Utama/index', 'Utama::index');
$routes->get('/', 'Utama::index', ['filter' => 'auth']);
// $routes->get('/', 'Users::index');

$routes->get('/daftar', 'Users::daftar');
$routes->get('/masuk', 'Users::index');
$routes->get('/tambah', 'Utama::tambah');
// $routes->get('/simpanDaftar', 'Users::simpanDaftar');

// $routes->get('/cari', 'Utama::cari');

// $routes->get('/tambah', 'Utama::tambah'); Ga perlu atur routes untuk form modal
// $routes->get('dompet/Dompet/masuk', 'Dompet::masuk');
// $routes->get('dompet/baru', 'Dompet::baru');
$routes->get('dompet/edit/masuk/(:num)', 'Dompet::editMasuk/$1');
$routes->get('dompet/edit/keluar/(:num)', 'Dompet::editKeluar/$1');
// $routes->get('dompet/cari/(:any)', 'Dompet:coba/$1');
// $routes->get('dompet/index/(:any)', 'Dompet::index/$1');
// $routes->get('/dompet/(:any)/(:num)', 'Dompet::index/$1/$2');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
