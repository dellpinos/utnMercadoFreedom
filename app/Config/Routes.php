<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'HomeController::index');

$routes->get('/producto/(:num)', 'ProductoController::find/$1');

$routes->post('/producto/update', 'ProductoController::update');

$routes->post('/producto/sumar_stock', 'ProductoController::sumar_stock');

$routes->post('/producto/vender_todo', 'ProductoController::vender_todo');

$routes->get('/contact', 'HomeController::contact');

$routes->get('/login', 'AuthController::login');
$routes->post('/login/auth', 'AuthController::login_auth');

$routes->post('/logout', 'AuthController::logout');

$routes->get('/register', 'AuthController::register');
$routes->post('/register/create', 'AuthController::create');

