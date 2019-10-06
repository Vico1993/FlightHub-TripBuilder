<?php

    /**
     * Class to set up a new airline
     */
    class Airline
    {
        /**
         * Database's object of the Airline
         */
        private $_id;

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
         * @param string $code code of the new airline
         * @param string $name name of the new airline
         */
        public function __construct( string $code, string $name, int $id = 0 ) {
            $this->_code = $code;
            $this->_name = $name;

            $this->_id = $id;
        }

        /**
         * Return the id of the Airline
         *
         * @return int
         */
        public function getId( ): int {
            return $this->_id;
        }

        /**
         * Set the Id of the Airline
         *
         * @param int $id
         */
        public function setId( $id ) {
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
        public function setCode( $code ) {
            $this->_code = $code;
        }

        /**
         * Return the name of the Airline
         *
         * @return string
         */
        public function getName( ): string {
            return $this->_name;
        }

        /**
         * Set the Name of the Airline
         *
         * @param string $name
         */
        public function setName( $name ) {
            $this->_name = $name;
        }
    }