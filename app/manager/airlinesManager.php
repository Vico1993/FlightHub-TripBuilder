<?php

    /**
     * Manager to interact with the Database to get list of Airlines Object.
     */
    class AirlinesManager extends Manager {

        /**
         * Construct our AirlinesManager
         */
        public function __construct()
        {
            parent::__construct();
        }

        /**
         * Return an array of Airlines object saved in the database
         *
         * @return Airline[]
         */
        public function getAllAirlines(): Array {
            $result = [];
            $airlines = $this->_db->get('Airlines');

            if ( $this->_db->count > 0 ) {
                foreach ( $airlines as $airline ) {
                    $result[] = new Airline( $airline['code'], $airline['name'], $airline['id'] );
                }
            }

            return $result;
        }

        /**
         * Return an Airline
         *
         * @return Airline|False
         */
        public function getAirlineById( int $id ) {
            if ( $id ) {
                $airline = $this->_db->where( 'id', $id )->getOne( 'Airlines' );

                if ( $airline ) {
                    return new Airline( $airline[ 'code' ], $airline[ 'name' ], $airline[ 'id' ] );
                }
            }

            return false;
        }

        /**
         * Add an Airline to the database
         *
         * @param Airline $airline
         * @return Airline
         */
        public function addAirline( Airline $airline ) {
            // Set up an associative array from the Airline object
            $params = [
                "code" => $airline->getCode(),
                "name" => $airline->getName(),
            ];

            // Insert in the database
            $id = $this->_db->insert( 'Airlines', $params );

            // If id is not null everythign worked like planned
            if ( $id ) {
                // Set the database Id
                $airline->setId( $id );

                return $airline;
            } else {
                throw new Exception("Error while inserting a new Airlines : " . $this->_db->getLastError(), 1);
            }
        }

        /**
         * Update an Airline in the database, based on its id
         *
         * @param Airline $airline
         * @return Airline
         */
        public function updateAirline( Airline $airline ) {
            // If no id found
            if ( !$airline->getId() ) {
                throw new Exception("Id not found", 1);
            }

            // Set up an associative array from the Airline object
            $params = [
                "code" => $airline->getCode(),
                "name" => $airline->getName(),
            ];

            // Get the Element first
            $this->_db->where( 'id', $airline->getId() );

            $result = $this->_db->update( 'Airlines', $params );

            if ( !$result ) {
                throw new Exception("Something happens when tried to update an Airline: ".$this->_db->getLastError(), 1);
            }

            return $airline;
        }

        /**
         * Delete an Airline in the database
         *
         * @param int $id
         * @return Boolean
         */
        public function deleteAirline( int $id ) {

            $this->_db->where( "id", $id );
            $result = $this->_db->delete( "Airlines" );

            if ( !$result ) {
                throw new Exception("Something happens when tried to delete an Airline: ".$this->_db->getLastError(), 1);
            }

            return true;
        }
    }