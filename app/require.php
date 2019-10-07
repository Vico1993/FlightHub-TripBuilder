<?php

// include the Composer autoloader
require './vendor/autoload.php';

/**
 * Models
 */
require_once './model/airline.php';
require_once './model/flight.php';
require_once './model/airport.php';
require_once './model/trip.php';

/**
 * Managers
 */
require_once './manager/manager.php';
require_once './manager/airlinesManager.php';
require_once './manager/flightManager.php';
require_once './manager/airportManager.php';

// Initiate the Managers
$airlinesManager = new AirlinesManager();
$flightManager = new flightManager();
$airportManager = new airportManager();

/**
 * Handlers
 */
require_once './handler/airlineHandler.php';
require_once './handler/flightHandler.php';
require_once './handler/airportHandler.php';
require_once './handler/tripHandler.php';