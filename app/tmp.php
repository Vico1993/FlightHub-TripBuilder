<?php


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
