<?php

    /**
     * Class to set up a new Airports
     */
    class Airport
    {
        /**
         * Id of the Airport
         */
        private $_id;

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
         * The Airport latitude
         */
        private $_latitude;

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
         * @param string $code        code of the new airport
         * @param string $cityCode    city code of the new airport
         * @param string $name        name of the new airport
         * @param string $city        name of the city of the new airport
         * @param string $countryCode code of the country of the new airport
         * @param string $regionCode  code of the region of the new airport
         * @param float $latitude    latitude of the new airport
         * @param float $longitude    longitude of the new airport
         * @param string $timezone    timezone of the new airport
         */
        public function __construct( string $code, string $cityCode, string $name, string $city, string $countryCode, string $regionCode, float $latitude, float $longitude, string $timezone, int $id = 0 ) {
            $this->_code = $code;
            $this->_cityCode = $cityCode;
            $this->_name = $name;
            $this->_city = $city;
            $this->_countryCode = $countryCode;
            $this->_regionCode = $regionCode;
            $this->_latitude = $latitude;
            $this->_longitude = $longitude;
            $this->_timezone = $timezone;

            $this->_id = $id;
        }

        /**
         * Return the id of the Airport
         *
         * @return int
         */
        public function getId( ): int {
            return $this->_id;
        }

        /**
         * Set the Id of the Airport
         *
         * @param int $id
         */
        public function setId( int $id ) {
            $this->_id = $id;
        }

        /**
         * Return the code of the Airline
         *
         * @return string
         */
        public function getCode( ): string {
            return $this->_code;
        }

        /**
         * Set the Code of the Airline
         *
         * @param string $code
         */
        public function setCode( string $code ) {
            $this->_code = $code;
        }

        /**
         * Return the city code of the Airport
         *
         * @return string
         */
        public function getCityCode( ): string {
            return $this->_cityCode;
        }

        /**
         * Set the City Code for the Airport
         *
         * @param string $code
         */
        public function setCityCode( string $cityCode ) {
            $this->_cityCode = $cityCode;
        }

        /**
         * Return the name of the Airport
         *
         * @return string
         */
        public function getName( ): string {
            return $this->_name;
        }

        /**
         * Set the name of the Airport
         *
         * @param string $name
         */
        public function setName( string $name ) {
            $this->_name = $name;
        }

        /**
         * Return the city of the Airport
         *
         * @return string
         */
        public function getCity( ): string {
            return $this->_city;
        }

        /**
         * Set the city of the Airport
         *
         * @param string $city
         */
        public function setCity( string $city ) {
            $this->_city = $city;
        }

        /**
         * Return the Country code of the Airport
         *
         * @return string
         */
        public function getCountryCode( ): string {
            return $this->_countryCode;
        }

        /**
         * Set the country code of the Airport
         *
         * @param string $countryCode
         */
        public function setCountryCode( string $countryCode ) {
            $this->_countryCode = $countryCode;
        }

        /**
         * Return the region code of the Airport
         *
         * @return string
         */
        public function getRegionCode( ): string {
            return $this->_regionCode;
        }

        /**
         * Set the region code of the Airport
         *
         * @param string $regionCode
         */
        public function setRegionCode( string $regionCode ) {
            $this->_regionCode = $regionCode;
        }

        /**
         * Return the latitude of the Airport
         *
         * @return float
         */
        public function getlatitude( ): float {
            return $this->_latitude;
        }

        /**
         * Set the latitude of the Airport
         *
         * @param float $latitude
         */
        public function setlatitude( float $latitude ) {
            $this->_latitude = $latitude;
        }

        /**
         * Return the longitude of the Airport
         *
         * @return float
         */
        public function getLongittude( ): float {
            return $this->_longitude;
        }

        /**
         * Set the longitude of the Airport
         *
         * @param float $longitude
         */
        public function setLongitude( float $longitude ) {
            $this->_longitude = $longitude;
        }

        /**
         * Return the Timezone of the Airport
         *
         * @return string
         */
        public function getTimezone( ): string {
            return $this->_timezone;
        }

        /**
         * Set the Timezone of the Airport
         *
         * @param string $timezone
         */
        public function setTimezone( string $timezone ) {
            $this->_timezone = $timezone;
        }
    }
