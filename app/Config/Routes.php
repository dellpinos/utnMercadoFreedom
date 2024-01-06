<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'HomeController::index');

$routes->get('/producto/(:num)', 'ProductoController::find/$1');

$routes->post('/producto/update', 'ProductoController::update');

