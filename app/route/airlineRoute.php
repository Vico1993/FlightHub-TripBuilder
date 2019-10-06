<?php

/**
 * Airline's route
 */

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