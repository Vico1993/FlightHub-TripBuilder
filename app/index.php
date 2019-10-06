<?php

require_once './require.php';

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    // Flight's route
    $r->addGroup( '/flight', function (FastRoute\RouteCollector $r) {
        // Return all flight
        $r->addRoute('GET', '/', 'getAllFlight');

        // Return one flight from his id
        $r->addRoute('GET', '/{id:\d+}', 'getOneFlight');

        // Add a new flight to the database
        $r->addRoute('POST', '/', 'addFlight');

        // Update a flight
        $r->addRoute('PUT', '/{id:\d+}', 'updateFlight');

        // Delete a flight
        $r->addRoute('DELETE', '/{id:\d+}', 'deleteFlight');
    });

    // Airport's route
    $r->addGroup( '/airport', function (FastRoute\RouteCollector $r) {
        // Return all airport
        $r->addRoute('GET', '/', 'getAllAirport');

        // Return one airport from his id
        $r->addRoute('GET', '/{id:\d+}', 'getOneAirport');

        // Add a new airport to the database
        $r->addRoute('POST', '/', 'addAirport');

        // Update a airport
        $r->addRoute('PUT', '/{id:\d+}', 'updateAirport');

        // Delete a airport
        $r->addRoute('DELETE', '/{id:\d+}', 'deleteAirport');
    });

    // Airline's route
    $r->addGroup( '/airline', function (FastRoute\RouteCollector $r) {
        // Return all airlines
        $r->addRoute('GET', '/', 'getAllAirline');

        // Return one airlines from his id
        $r->addRoute('GET', '/{id:\d+}', 'getOneAirline');

        // Add a new airlines to the database
        $r->addRoute('POST', '/', 'addAirline');

        // Update a airlines
        $r->addRoute('PUT', '/{id:\d+}', 'updateAirline');

        // Delete a airlines
        $r->addRoute('DELETE', '/{id:\d+}', 'deleteAirline');
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