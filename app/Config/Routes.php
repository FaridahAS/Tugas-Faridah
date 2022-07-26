<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Auth::index');
$routes->get('/register', 'Auth::register');
$routes->post('/auth/prosesregister', 'Auth::prosesregister');
$routes->post('/auth/proseslogin', 'Auth::proseslogin');

$routes->get('/Umum/index', 'Umum::index');


$routes->get('/home', 'pages::index');
$routes->get('/pages', 'Pages::index');
$routes->add('/pages/about', 'Pages::about');
$routes->add('/pages/contact', 'Pages::contact');

$routes->add('/karyawan', 'Karyawan::index');
$routes->get('/karyawan/create', 'Karyawan::create');
$routes->post('/karyawan/save', 'Karyawan::save');
$routes->add('/karyawan/update/(:segment)', 'Karyawan::update/$1');
$routes->get('/karyawan/profil', 'Karyawan::profil');
$routes->get('/profil/edit/(:segment)', 'Karyawan::edit/$1');
$routes->delete('/karyawan/(:num)', 'Karyawan::delete/$1');
$routes->get('/Karyawan/(:any)', 'Karyawan::detail/$1');

$routes->get('/absensi', 'Absensi::index');
$routes->get('/absenku', 'Absensi::absenku');
$routes->add('/absensi/send', 'Absensi::send');

$routes->add('/login', 'Auth:index');
$routes->add('/login', 'Auth:register');

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
