<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('acerca_de', 'AcercaDeController::index');
$routes->get('cb', 'ColeccionBiologicaController::index');
$routes->get('cb/especies', 'ColeccionBiologicaController::getEspecies');
$routes->get('cb/especies/v1/(:num)', 'ColeccionBiologicaController::getEspecieVista1/$1');
$routes->get('cb/especies/v2/(:num)', 'ColeccionBiologicaController::getEspecieVista2/$1');
$routes->get('cb/especies/v3/(:num)', 'ColeccionBiologicaController::getEspecieVista3/$1');
$routes->get('cb/especies/v4/(:num)', 'ColeccionBiologicaController::getEspecieVista4/$1');
/*
$routes->group('cb', static function ($routes) {
  $routes->get('/', 'ColeccionBiologicaController::index');
  $routes->group('especies', static function ($routes){
    $routes->get('/', 'ColeccionBiologicaController::getEspecies');
    $routes->get('v1', 'ColeccionBiologicaController::getEspecie');
  });
});*/
/*
$routes->get('cb', 'ColeccionBiologicaController::index');
$routes->get('cb/especies', 'ColeccionBiologicaController::getEspecies');*/