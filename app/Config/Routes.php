<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


/**
 * Define las rutas para las solicitudes GET.
 * El método get() se utiliza para definir una ruta para las solicitudes GET en CodeIgniter.
 * Recibe dos parámetros: la URL de la ruta y el controlador y método que se deben llamar cuando se accede a la ruta.
 *@param string $route: La URL de la ruta, puede tener variables de ruta, como se aprecia en las rutas de las vista.
 *@param string $controller: El controlador y método que se deben llamar cuando se accede a la ruta.
 */
$routes->get('/', 'Home::index');
$routes->get('acerca_de', 'AcercaDeController::index');
$routes->get('cb', 'ColeccionBiologicaController::index');
$routes->get('cb/especies', 'ColeccionBiologicaController::getEspecies');
$routes->get('cb/especies/v1/(:num)', 'ColeccionBiologicaController::getEspecieVista1/$1');
$routes->get('cb/especies/v2/(:num)', 'ColeccionBiologicaController::getEspecieVista2/$1');
$routes->get('cb/especies/v3/(:num)', 'ColeccionBiologicaController::getEspecieVista3/$1');
$routes->get('cb/especies/v4/(:num)', 'ColeccionBiologicaController::getEspecieVista4/$1');
