<?php

use Symfony\Component\Routing\{
    RouteCollection,
    Route
};
use Album\Controller\PhotoController;

$routes = new RouteCollection();

$routes->add('index', new Route('/_{name}', [
    'name'        => 'World',
    '_controller' => PhotoController::class . '::indexAction',
]));

return $routes;
