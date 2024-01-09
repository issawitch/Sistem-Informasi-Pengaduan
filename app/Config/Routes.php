<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home::index');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.


$routes->get('/', 'Home::index');
$routes->get('/login', 'Home::login');
$routes->get('/register', 'Home::register');
$routes->get('/dashboard', 'Home::dashboard');


//ROUTES USER

$routes->get('/form_aduan', 'Home::form_aduan', ['filter' => 'role:user']);
$routes->get('/histori', 'Pengaduan::show');
$routes->get('/profil', 'Home::profil');
$routes->get('/deteksi', 'Home::deteksi', ['filter' => 'role:user']);
$routes->get('pengaduan/detail/(:num)', 'Pengaduan::detail/$1');


//ROUTES ADMIN
$routes->get('/admin', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/data_pengaduan', 'Home::data_pengaduan', ['filter' => 'role:admin']);



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
