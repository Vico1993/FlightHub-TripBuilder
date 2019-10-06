<?php

/**
 * Airport's route
 */

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