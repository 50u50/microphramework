<?php

use Symfony\Component\Routing\{
    RouteCollection,
    Route
};
use App\Controller\IndexController;

$routes = new RouteCollection();

$routes->add('index', new Route('/_{name}', [
    'name'        => 'World',
    '_controller' => IndexController::class . '::indexAction',
]));

return $routes;
