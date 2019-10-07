<?php

/**
 * Constant, list of available filters
 */
$availablesFilter = [
    'departureAirport' => [
        'columns' => 'departure_airport',
        'operator' => 'STRING', // Exeption coming from joshcam/mysqli-database-class
    ],
    'departureTimeAfter' => [
        'columns' => 'departure_time',
        'operator' => '>='
    ],
    'departureTimeBefore' => [
        'columns' => 'departure_time',
        'operator' => '<='
    ],
    'arrivalAirport' => [
        'columns' => 'arrival_airport',
        'operator' => 'STRING' // Exeption coming from joshcam/mysqli-database-class
    ],
    'airline' => [
        'columns' => 'airline',
        'operator' => 'STRING' // Exeption coming from joshcam/mysqli-database-class
    ]
];

/**
 * Return a list of flight based on filters
 *
 * @param Array $params Array based on the constant `$availablesFilter`
 */
function _getFlightBasedOnFilter( $params ) {
    global $flightManager, $availablesFilter;

    $flights = [];

    $filters = array_intersect_key( $availablesFilter, $get );

    if ( !empty( $filters ) ) {
        foreach ( $filters as $filterKey => $filter ) {
            $filters[$filterKey][ 'value' ] = $get[ $filterKey ];
        }

        $flights = $flightManager->getFlightFromSpecific( $filters );
    } else {
        echo json_encode( [ 'message' => "Please provide one of this filter : '". join( "', '", array_keys( $availablesFilter ) ). "'" ] );
        die();
    }

    return $flights;
}

/**
 * Get a Trip based on criteria
 */
function getATrip() {
    $result = [];
    $trips = [];

    $flights = _getFlightBasedOnFilter( $_GET );

    // Need to find another flight
    if ( !empty( $_GET[ '​round-trip' ] ) ) {
        foreach ( $flights as $flight ) {
            // Get the list of flight back available
            $fs = _getFlightBasedOnFilter([
                "departureAirport" => $flight->getArrivalAirport(),
                "departureTimeAfter" => $flight->getArrivalTime(),
                "arrivalAirport" => $flight->getDepartureAirport(),
            ]);

            // For each flight back found, it's a new trip available
            foreach ( $fs as $f ) {
                $trips[] = new Trip( [ $flight, $f ] );
            }
        }
    } else {
        foreach ( $flights as $flight ) {
            $trips[] = new Trip( [ $flight ] );
        }
    }

    foreach ( $trips as $trip ) {
        $tmp = [
            "price" => $trip->getPrice(),
            "departureAirport" => $trip->getDepartureAirport(),
            "departureTime" => $trip->getDepartureTime(),
            "arrivalAirport" => $trip->getArrivalAirport(),
            "arrivalTime" => $trip->getArrivalTime(),
        ];

        foreach ( $trip->getFlights() as $flight ) {
            $tmp[ "flights" ][] = [
                "id" => $flight->getId(),
                "airline" => $flight->getAirline(),
                "number" => $flight->getNumber(),
                "departureAirport" => $flight->getDepartureAirport(),
                "departureTime" => $flight->getDepartureTime(),
                "arrivalAirport" => $flight->getArrivalAirport(),
                "arrivalTime" => $flight->getArrivalTime(),
                "price" => $flight->getPrice()
            ];
        }

        $result[] = $tmp;
    }

    echo json_encode( $result );
}