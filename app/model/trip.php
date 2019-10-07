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