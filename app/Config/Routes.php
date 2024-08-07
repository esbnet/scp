<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */


// $routes->get('admin/users', 'UserController::index', ['filter' => 'permission:manage-user']);
// $routes->get('cadastros/disciplinas', 'disciplinas::index', ['filter' => 'permission:manage-user']);

//Uidade Escolas
// $routes->get('escolas', 'escolas::index');
// $routes->post('escolas', 'escolas::formValidation');
// $routes->match(['get', 'post'], 'escolas/delete/(:num)', 'escolas::delete/$1');
// $routes->match(['get', 'post'], 'escolas/new', 'escolas::new');
// $routes->match(['get', 'post'], 'escolas/edit/(:num)', 'escolas::edit/$1');
// $routes->match(['get', 'post'], 'escolas/store', 'escolas::store');


// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

//Users
//$routes->match(['get', 'post'], 'users/edit/(:num)', 'users::edit/$1');
//$routes->match(['get', 'post'], 'users/update', 'users::store');


/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
