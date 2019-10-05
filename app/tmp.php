<?php

    /**
     * Class to set up a new airline
     */
    class Airline
    {
        /**
         * The Airline Code
         */
        private $_code;

        /**
         * The Airline Name
         */
        private $_name;

        /**
         * Create a new Airline Object
         *
         * @param {string} $code code of the new airline
         * @param {string} $name name of the new airline
         */
        public function __construct( $code, $name ) {
            $this->_code = $code;
            $this->_name = $name;
        }

        /**
         * Return the code of the Airline
         *
         * @return {string}
         */
        public function getCode( ) {
            return $this->_code;
        }

        /**
         * Set the Code of the Airline
         *
         * @param {string} $code
         */
        public function setCode( $code ) {
            $this->_code = $code;
        }

        /**
         * Return the name of the Airline
         *
         * @return {string}
         */
        public function getName( ) {
            return $this->_name;
        }

        /**
         * Set the Name of the Airline
         *
         * @param {string} $name
         */
        public function setName( $name ) {
            $this->_name = $name;
        }
    }

    /**
     * Class to set up a new Airports
     */
    class Airport
    {
        /**
         * The Airport Code
         */
        private $_code;

        /**
         * The Airport City Code
         */
        private $_cityCode;

        /**
         * The Airport name
         */
        private $_name;

        /**
         * The Airport city
         */
        private $_city;

        /**
         * The Airport country code
         */
        private $_countryCode;

        /**
         * The Airport region code
         */
        private $_regionCode;

        /**
         * The Airport lattitude
         */
        private $_lattitude;

        /**
         * The Airport longitude
         */
        private $_longitude;

        /**
         * The Airport timezone
         */
        private $_timezone;

        /**
         * Create a new Airport Object
         *
         * @param {string} $code        code of the new airport
         * @param {string} $cityCode    city code of the new airport
         * @param {string} $name        name of the new airport
         * @param {string} $city        name of the city of the new airport
         * @param {string} $countryCode code of the country of the new airport
         * @param {string} $regionCode  code of the region of the new airport
         * @param {float} $lattitude   lattitude of the new airport
         * @param {float} $longitude   longitude of the new airport
         * @param {string} $timezone    timezone of the new airport
         */
        public function __construct( $code, $cityCode, $name, $city, $countryCode, $regionCode, $lattitude, $longitude, $timezone ) {
            $this->_code = $code;
            $this->_cityCode = $cityCode;
            $this->_name = $name;
            $this->_city = $city;
            $this->_countryCode = $countryCode;
            $this->_regionCode = $regionCode;
            $this->_lattitude = $lattitude;
            $this->_longitude = $longitude;
            $this->_timezone = $timezone;
        }

        /**
         * Return the code of the Airline
         *
         * @return {string}
         */
        public function getCode( ) {
            return $this->_code;
        }

        /**
         * Set the Code of the Airline
         *
         * @param {string} $code
         */
        public function setCode( $name ) {
            $this->_code = $code;
        }

        /**
         * Return the city code of the Airport
         *
         * @return {string}
         */
        public function getCityCode( ) {
            return $this->_cityCode;
        }

        /**
         * Set the City Code for the Airport
         *
         * @param {string} $code
         */
        public function setCityCode( $cityCode ) {
            $this->_cityCode = $cityCode;
        }

        /**
         * Return the name of the Airport
         *
         * @return {string}
         */
        public function getName( ) {
            return $this->_name;
        }

        /**
         * Set the name of the Airport
         *
         * @param {string} $name
         */
        public function setName( $name ) {
            $this->_name = $name;
        }

        /**
         * Return the city of the Airport
         *
         * @return {string}
         */
        public function getCity( ) {
            return $this->_city;
        }

        /**
         * Set the city of the Airport
         *
         * @param {string} $city
         */
        public function setCity( $city ) {
            $this->_city = $city;
        }

        /**
         * Return the Country code of the Airport
         *
         * @return {string}
         */
        public function getCountryCode( ) {
            return $this->_countryCode;
        }

        /**
         * Set the country code of the Airport
         *
         * @param {string} $countryCode
         */
        public function setCountryCode( $countryCode ) {
            $this->_countryCode = $countryCode;
        }

        /**
         * Return the region code of the Airport
         *
         * @return {string}
         */
        public function getRegionCode( ) {
            return $this->_regionCode;
        }

        /**
         * Set the region code of the Airport
         *
         * @param {string} $regionCode
         */
        public function setRegionCode( $regionCode ) {
            $this->_regionCode = $regionCode;
        }

        /**
         * Return the lattitude of the Airport
         *
         * @return {float}
         */
        public function getLattitude( ) {
            return $this->_lattitude;
        }

        /**
         * Set the lattitude of the Airport
         *
         * @param {float} $lattitude
         */
        public function setLattitude( $lattitude ) {
            $this->_lattitude = $lattitude;
        }

        /**
         * Return the longitude of the Airport
         *
         * @return {string}
         */
        public function getLongittude( ) {
            return $this->_longitude;
        }

        /**
         * Set the longitude of the Airport
         *
         * @param {string} $longitude
         */
        public function setLongitude( $longitude ) {
            $this->_longitude = $longitude;
        }

        /**
         * Return the Timezone of the Airport
         *
         * @return {string}
         */
        public function getTimezone( ) {
            return $this->_timezone;
        }

        /**
         * Set the Timezone of the Airport
         *
         * @param {string} $timezone
         */
        public function setTimezone( $timezone ) {
            $this->_timezone = $timezone;
        }
    }

    /**
     * Class to set up a new Flight
     */
    class Flight
    {

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
         * Price of the Flight
         */
        private $_price;

        /**
         * Create a new Flight
         *
         * @param {string} $airline             airline of the Flight
         * @param {string} $number              number of the Flight
         * @param {string} $departureAirport    airport code of the departure of the flight
         * @param {string} $departureTime       time of the departure of the Flight
         * @param {string} $arrivalAirport      airport code of the arrival of the flight
         * @param {string} $price               price of the flight
         */
        public function __construct( $airline, $number, $departureAirport, $departureTime, $arrivalAirport, $price ) {
            $this->_airline = $airline;
            $this->_number = $number;
            $this->_departureAirport = $departureAirport;
            $this->_departureTime = $departureTime;
            $this->_arrivalAirport = $arrivalAirport;
            $this->_price = $price;
        }

        /**
         * Return the Airline company
         */
        public function getAirline( ) {
            return $this->_airline;
        }

        /**
         * Set the Airline property of the Flight
         *
         * @param {string} $airline airline code
         */
        public function setAirline( $airline ) {
            $this->_airline = $airline;
        }

        /**
         * Return the number of the flight
         */
        public function getNumber( ) {
            return $this->_number;
        }

        /**
         * Set the Number property of the Flight
         *
         * @param {string} $number number
         */
        public function setNumber( $number ) {
            $this->_number = $number;
        }

        /**
         * Return the departure Airport
         */
        public function getDepartureAirport( ) {
            return $this->_departureAirport;
        }

        /**
         * Set the departure Airport property of the Flight
         *
         * @param {string} $departureAirport Airport Code
         */
        public function setDepartureAirport( $departureAirport ) {
            $this->_departureAirport = $departureAirport;
        }

        /**
         * Return the departure Time
         */
        public function getDepartureTime( ) {
            return $this->_departureTime;
        }

        /**
         * Set the departure Time property of the Flight
         *
         * @param {string} $departureTime Time of departure
         */
        public function setDepartureTime( $departureTime ) {
            $this->_departureTime = $departureTime;
        }

        /**
         * Return the Arrival Airport
         */
        public function getArrivalAirport( ) {
            return $this->_arrivalAirport;
        }

        /**
         * Set the arrival Airport property of the Flight
         *
         * @param {string} $arrivalAirport Airport Code
         */
        public function setArrivalAirport( $arrivalAirport ) {
            $this->_arrivalAirport = $arrivalAirport;
        }

        /**
         * Return the Price
         */
        public function getPrice( ) {
            return $this->_price;
        }

        /**
         * Set the Price property of the Flight
         *
         * @param {string} $price price
         */
        public function setPrice( $price ) {
            $this->_price = $price;
        }
    }
