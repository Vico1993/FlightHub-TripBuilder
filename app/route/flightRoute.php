<?php

/**
 * Flight's route
 */

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
