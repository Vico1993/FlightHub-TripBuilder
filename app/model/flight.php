<?php

    /**
     * Class to set up a new Flight
     */
    class Flight
    {
        /**
         * The id of the Flight
         */
        private $_id;

        /**
         * The Airline of the Flight
         */
        private $_airline;

        /**
         * Number of the flight
         */
        private $_number;

        /**
         * Airport code of departure
         */
        private $_departureAirport;

        /**
         * DateTime of departure
         */
        private $_departureTime;

        /**
         * Airport code of arrival
         */
        private $_arrivalAirport;

        /**
         * DateTime of arrival
         */
        private $_arrivalTime;

        /**
         * Price of the Flight
         */
        private $_price;

        /**
         * Create a new Flight
         *
         * @param string $airline             airline of the Flight
         * @param string $number              number of the Flight
         * @param string $departureAirport    airport code of the departure of the flight
         * @param string $departureTime       time of the departure of the Flight
         * @param string $arrivalAirport      airport code of the arrival of the flight
         * @param string $price               price of the flight
         */
        public function __construct( string $airline, string $number, string $departureAirport, string $departureTime, string $arrivalAirport, string $arrivalTime, string $price, int $id = 0 ) {
            $this->_airline = $airline;
            $this->_number = $number;
            $this->_departureAirport = $departureAirport;
            $this->_departureTime = $departureTime;
            $this->_arrivalAirport = $arrivalAirport;
            $this->_arrivalTime = $arrivalTime;
            $this->_price = $price;

            $this->_id = $id;
        }

        /**
         * Return the id of the Flight
         *
         * @return int
         */
        public function getId( ): int {
            return $this->_id;
        }

        /**
         * Set the Id of the Flight
         *
         * @param int $id
         */
        public function setId( int $id ) {
            $this->_id = $id;
        }

        /**
         * Return the Airline company
         *
         * @return string
         */
        public function getAirline( ): string {
            return $this->_airline;
        }

        /**
         * Set the Airline property of the Flight
         *
         * @param string $airline airline code
         */
        public function setAirline( string $airline ) {
            $this->_airline = $airline;
        }

        /**
         * Return the number of the flight
         *
         * @return string
         */
        public function getNumber( ): string {
            return $this->_number;
        }

        /**
         * Set the Number property of the Flight
         *
         * @param string $number number
         */
        public function setNumber( string $number ) {
            $this->_number = $number;
        }

        /**
         * Return the departure Airport
         *
         * @return string
         */
        public function getDepartureAirport( ): string {
            return $this->_departureAirport;
        }

        /**
         * Set the departure Airport property of the Flight
         *
         * @param string $departureAirport Airport Code
         */
        public function setDepartureAirport( string $departureAirport ) {
            $this->_departureAirport = $departureAirport;
        }

        /**
         * Return the departure Time
         *
         * @return string
         */
        public function getDepartureTime( ): string {
            return $this->_departureTime;
        }

        /**
         * Set the departure Time property of the Flight
         *
         * @param string $departureTime Time of departure
         */
        public function setDepartureTime( string $departureTime ) {
            $this->_departureTime = $departureTime;
        }

        /**
         * Return the Arrival Airport
         *
         * @return string
         */
        public function getArrivalAirport( ): string {
            return $this->_arrivalAirport;
        }

        /**
         * Set the arrival Airport property of the Flight
         *
         * @param string $arrivalAirport Airport Code
         */
        public function setArrivalAirport( string $arrivalAirport ) {
            $this->_arrivalAirport = $arrivalAirport;
        }

        /**
         * Return the Arrival Time
         *
         * @return string
         */
        public function getArrivalTime( ): string {
            return $this->_arrivalTime;
        }

        /**
         * Set the arrival Time property of the Flight
         *
         * @param string $arrivalTime Datetime of the arrival
         */
        public function setArrivalTime( string $arrivalTime ) {
            $this->_arrivalTime = $arrivalTime;
        }

        /**
         * Return the Price
         *
         * @return string
         */
        public function getPrice( ): string {
            return $this->_price;
        }

        /**
         * Set the Price property of the Flight
         *
         * @param string $price price
         */
        public function setPrice( string $price ) {
            $this->_price = $price;
        }
    }