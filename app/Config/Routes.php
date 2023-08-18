<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Login');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
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
$routes->get('/', 'Home::index', ['as' => 'home']);

$routes->get('login', 'Login::index');
$routes->get('login/add', 'Login::addUser');
$routes->post('login', 'Login::store', ['as' => 'login.store']);
$routes->get('login/logout', 'Login::logout', ['as' => 'login.logout']);


$routes->get('escritorios', 'Escritorio::index', ['as' => 'escritorios']);
$routes->get('escritorios/getall', 'Escritorio::getAll');
$routes->get('escritorios/editar/(:any)', 'Escritorio::editar/$1');
$routes->get('escritorios/excluir/(:any)', 'Escritorio::editar/$1');


$routes->get('clientes', 'Cliente::index', ['as' => 'clientes']);
$routes->get('clientes/getall', 'Cliente::getAll');
$routes->get('clientes/consulta_cidade', 'Cliente::listarCidades');
$routes->post('clientes/cadastrar', 'Cliente::cadastrar');

$routes->get('clientes/criar', 'Cliente::criar');
$routes->get('clientes/editar/(:alphanum)', 'Cliente::editar/$1');
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
