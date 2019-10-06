<?php

/**
 * Trip Class
 */
class Trip {

    /**
     * Total Price of the trip
     */
    private $_price;

    /**
     * Departure Time
     */
    private $_departureTime;

    /**
     * Departure City
     */
    private $_departureAirport;

    /**
     * Arrival Airport
     */
    private $_arrivalAirport;

    /**
     * Arrival Time
     */
    private $_ArrivalTime;

    /**
     * Flights for this trip
     */
    private $_flights;

    /**
     * Build a Trip
     *
     * @param Array $flights Array of flights linked to this trip
     */
    public function __construct( Array $flights ) {
        $this->_flights = $flights;

        // If it's a roundtrip
        if ( count( $flights ) > 1 ) {
            // $flights[0] first flight
            // $flights[1] way back

            $this->_price = floatval( $flights[0]->getPrice() ) + floatval( $flights[1]->getPrice() );
            $this->_departureAirport = $flights[0]->getDepartureAirport();
            $this->_departureTime = $flights[0]->getDepartureTime();

            $this->_arrivalAirport = $flights[1]->getArrivalAirport();
            $this->_arrivalTime = $flights[1]->getArrivalTime();
        } else {
            $this->_price = $flights[0]->getPrice();
            $this->_departureAirport = $flights[0]->getDepartureAirport();
            $this->_departureTime = $flights[0]->getDepartureTime();
            $this->_arrivalAirport = $flights[0]->getArrivalAirport();
            $this->_arrivalTime = $flights[0]->getArrivalTime();
        }
    }

    /**
     * Return the Price of this trip
     */
    public function getPrice( ): float {
        return $this->_price;
    }

    /**
     * Set the Price of this trip
     */
    public function setPrice( float $price ) {
        $this->_price = $price;
    }

    /**
     * Return the departure airport of this trip
     */
    public function getDepartureAirport( ): string {
        return $this->_departureAirport;
    }

    /**
     * Set the departure airport of this trip
     */
    public function setDepartureAirport( string $departureAirport ) {
        $this->_departureAirport = $departureAirport;
    }

    /**
     * Return the departure time of this trip
     */
    public function getDepartureTime( ): string {
        return $this->_departureTime;
    }

    /**
     * Set the departure time of this trip
     */
    public function setDepartureTime( string $departureTime ) {
        $this->_departureTime = $departureTime;
    }

    /**
     * Return the Arrival Airport of this trip
     */
    public function getArrivalAirport( ): string {
        return $this->_arrivalAirport;
    }

    /**
     * Set the Arrival Airport of this trip
     */
    public function setArrivalAirport( string $arrivalAirport ) {
        $this->_arrivalAirport = $arrivalAirport;
    }

    /**
     * Return the Arrival Time of this trip
     */
    public function getArrivalTime( ): string {
        return $this->_arrivalTime;
    }

    /**
     * Set the Arrival Time of this trip
     */
    public function setArrivalTime( string $arrivalTime ) {
        $this->_arrivalTime = $arrivalTime;
    }

    /**
     * Return the Flights linked to this trips
     */
    public function getFlights( ): Array {
        return $this->_flights;
    }

    /**
     * Set the Flights linked to this trips
     */
    public function setFlights( string $flights ) {
        $this->_flights = $flights;
    }
}

/**
 * Return a list of flight based on filters
 */
function filterAFlight( $get ) {
    global $flightManager;

    $flights = [];

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
    // arrivalTime
    // city

    $result = [];
    $trips = [];

    $flights = filterAFlight( $_GET );

    // Need to find another flight
    if ( !empty( $_GET[ '​round-trip' ] ) ) {
        foreach ( $flights as $flight ) {
            // Get the list of flight back available
            $fs = filterAFlight([
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