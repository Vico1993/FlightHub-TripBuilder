<?php

require_once './require.php';

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    // Flight's route
    $r->addGroup( '/flight', function (FastRoute\RouteCollector $r) {
        include_once './route/flightRoute.php';
    });

    // Airport's route
    $r->addGroup( '/airport', function (FastRoute\RouteCollector $r) {
        include_once './route/airportRoute.php';
    });

    // Airline's route
    $r->addGroup( '/airline', function (FastRoute\RouteCollector $r) {
        include_once './route/airlineRoute.php';
    });
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        echo "404... Error is coming";
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        echo "405... Error is coming";
        break;
    case FastRoute\Dispatcher::FOUND:
        header('Content-Type: application/json');

        // Get the right handler
        $handler = $routeInfo[1];

        // Get the variable in the URI
        $vars = $routeInfo[2];

        // Call the Handler
        $handler( $vars );

        break;
}