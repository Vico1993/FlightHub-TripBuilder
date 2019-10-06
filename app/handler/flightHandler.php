<?php

/**
 * Get all the flight from the FlightManager then format the result
 */
function getAllFlight() {
    global $flightManager;

    $result = [];

    // Get All the Flight in the database
    $flights = $flightManager->getAllFlights();

    // if not empty, need to transform all object to associative Array
    if ( count( $flights ) ) {
        foreach ( $flights as $flight ) {
            $result[] = [
                "id" => $flight->getId(),
                "airline" => $flight->getAirline(),
                "number" => $flight->getNumber(),
                "departureAirport" => $flight->getDepartureAirport(),
                "departureTime" => $flight->getDepartureTime(),
                "arrivalAirport" => $flight->getArrivalAirport(),
                "arrivalTime" => $flight->getArrivalTime(),
                "price" => $flight->getPrice(),
            ];
        }
    } else {
        $result = $flights;
    }

    echo json_encode( $result );
}

/**
 * Return a specific Flight by its id
 *
 * @param Array
 */
function getOneFlight( $params ) {
    global $flightManager;

    $result = 0;

    if ( !empty( $params[ "id" ] ) ) {
        try {
            // Convert to an int
            $id = intval( $params[ "id" ], 10 );

            $flight = $flightManager->getFlightById( $id );

            $result = [
                "id" => $flight->getId(),
                "airline" => $flight->getAirline(),
                "number" => $flight->getNumber(),
                "departureAirport" => $flight->getDepartureAirport(),
                "departureTime" => $flight->getDepartureTime(),
                "arrivalAirport" => $flight->getArrivalAirport(),
                "arrivalTime" => $flight->getArrivalTime(),
                "price" => $flight->getPrice()
            ];
        } catch (\Throwable $th) {
            $result = [ "error" => true, "message" => "Something happen on our side.. please try again later" ];
        }
    }

    echo json_encode( $result );
}

/**
 * Create a Flight
 */
function addFlight() {
    global $flightManager;

    $result = [];

    if ( !empty( $_POST ) && !empty( $_POST[ 'airline' ] ) && !empty( $_POST[ 'number' ] ) && !empty( $_POST[ 'departureAirport' ] ) && !empty( $_POST[ 'departureTime' ] ) && !empty( $_POST[ 'arrivalAirport' ] ) && !empty( $_POST[ 'arrivalTime' ] ) && !empty( $_POST[ 'price' ] ) ) {
        $flight = new Flight( $_POST[ 'airline' ], $_POST[ 'number' ], $_POST[ 'departureAirport' ], $_POST[ 'departureTime' ], $_POST[ 'arrivalAirport' ],  $_POST[ 'arrivalTime' ], $_POST[ 'price' ] );

        try {
            $flight = $flightManager->addFlight( $flight );

            $result = [
                "id" => $flight->getId(),
                "airline" => $flight->getAirline(),
                "number" => $flight->getNumber(),
                "departureAirport" => $flight->getDepartureAirport(),
                "departureTime" => $flight->getDepartureTime(),
                "arrivalAirport" => $flight->getArrivalAirport(),
                "arrivalTime" => $flight->getArrivalTime(),
                "price" => $flight->getPrice()
            ];

        } catch (\Throwable $th) {
            $result = [
                "error" => true,
                "message" => "Something happened on our side... sorry please try again"
            ];
        }

        echo json_encode( $result );
    } else {
        echo json_encode( [ "error" => true, "message" => "Missing parameter, please check you send us 'airline', 'number', 'departureAirport', 'departureTime', 'arrivalAirport', 'price' for the new Flight" ] );
    }
}

/**
 * Delete a Flight by its id
 *
 * @param Array
 */
function deleteFlight( $params ) {
    global $flightManager;

    $result = [
        'success' => 'false'
    ];

    if ( !empty( $params[ "id" ] ) ) {
        try {
            // Convert string to int
            $id = intval( $params[ "id" ], 10 );

            $flightManager->deleteFlight( $id );

            $result = [
                'success' => 'true'
            ];
        } catch (\Throwable $th) {
            $result = [ "error" => true, "message" => "Something happen on our side.. please try again later" ];
        }
    }

    echo json_encode( $result );
}

/**
 * Update a Flight by its id
 *
 * @param Array
 */
function updateFlight( $params ) {
    global $flightManager;

    $result = [];
    $data = [];

    // get PUT data from the request
    parse_str( file_get_contents("php://input"), $data );

    if ( !empty( $params[ "id" ] ) ) {

        if ( !empty( $data ) ) {
            try {
                // Convert string to int
                $id = intval( $params[ "id" ], 10 );

                // get the database object first
                $flight = $flightManager->getFlightById( $id );

                if ( $data[ 'airline' ] ) {
                    $flight->setAirline( $data[ 'airline' ] );
                }

                if ( $data[ 'number' ] ) {
                    $flight->setNumber( $data[ 'number' ] );
                }

                if ( $data[ 'departureAirport' ] ) {
                    $flight->setDepartureAirport( $data[ 'departureAirport' ] );
                }

                if ( $data[ 'departureTime' ] ) {
                    $flight->setDepartureTime( $data[ 'departureTime' ] );
                }

                if ( $data[ 'arrivalAirport' ] ) {
                    $flight->setArrivalAirport( $data[ 'arrivalAirport' ] );
                }

                if ( $data[ 'arrivalTime' ] ) {
                    $flight->setArrivalTime( $data[ 'arrivalTime' ] );
                }

                if ( $data[ 'price' ] ) {
                    $flight->setPrice( $data[ 'price' ] );
                }

                // Save our change
                $flight = $flightManager->updateFlight( $flight );

                $result = [
                    "id" => $flight->getId(),
                    "airline" => $flight->getAirline(),
                    "number" => $flight->getNumber(),
                    "departureAirport" => $flight->getDepartureAirport(),
                    "departureTime" => $flight->getDepartureTime(),
                    "arrivalAirport" => $flight->getArrivalAirport(),
                    "arrivalTime" => $flight->getArrivalTime(),
                    "price" => $flight->getPrice(),
                ];

            } catch (\Throwable $th) {
                $result = [ "error" => true, "message" => "Something happen on our side.. please try again later" ];
            }
        } else {
            $result = [ "error" => true, "message" => "No data provide to update the Flight, please provide one element from the list : 'airline', 'number', 'departureAirport', 'departureTime', 'arrivalAirport', 'price'" ];
        }
    }

    echo json_encode( $result );
}