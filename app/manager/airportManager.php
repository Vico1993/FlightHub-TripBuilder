<?php

    /**
     * Manager to interact with the Database to get list of Airport Object.
     */
    class AirportManager extends Manager {

        /**
         * Construct our AirportManager
         */
        public function __construct()
        {
            parent::__construct();
        }

        /**
         * Return an array of Airport object saved in the database
         *
         * @return Airport[]
         */
        public function getAllAirport(): Array {
            $result = [];
            $airports = $this->_db->get('Airports');

            if ( $this->_db->count > 0 ) {
                foreach ( $airports as $airport ) {
                    $result[] = new Airport( $airport[ 'code' ], $airport[ 'city_code' ], $airport[ 'name' ], $airport[ 'city' ], $airport[ 'country_code' ], $airport[ 'region_code' ], $airport[ 'latitude' ], $airport[ 'longitude' ], $airport[ 'timezone' ], $airport[ 'id' ] );
                }
            }

            return $result;
        }

        /**
         * Return an Airport
         *
         * @return Airport|False
         */
        public function getAirportById( int $id ) {
            if ( $id ) {
                $airport = $this->_db->where( 'id', $id )->getOne( 'Airports' );

                if ( $airport ) {
                    return new Airport( $airport[ 'code' ], $airport[ 'city_code' ], $airport[ 'name' ], $airport[ 'city' ], $airport[ 'country_code' ], $airport[ 'region_code' ], $airport[ 'latitude' ], $airport[ 'longitude' ], $airport[ 'timezone' ], $airport[ 'id' ] );
                }
            }

            return false;
        }

        /**
         * Add an Airport to the database
         *
         * @param Airport $airport
         * @return Airport
         */
        public function addAirport( Airport $airport ) {
            // Set up an associative array from the Airport object
            $params = [
                "code" => $airport->getCode(),
                "city_code" => $airport->getCityCode(),
                "name" => $airport->getName(),
                "city" => $airport->getCity(),
                "country_code" => $airport->getCountryCode(),
                "region_code" => $airport->getRegionCode(),
                "latitude" => $airport->getlatitude(),
                "longitude" => $airport->getLongittude(),
                "timezone" => $airport->getTimezone(),
            ];

            // Insert in the database
            $id = $this->_db->insert( 'Airports', $params );

            // If id is not null everythign worked like planned
            if ( $id ) {
                // Set the database Id
                $airport->setId( $id );

                return $airport;
            } else {
                throw new Exception("Error while inserting a new Airports : " . $this->_db->getLastError(), 1);
            }
        }

        /**
         * Update an Airport in the database, based on its id
         *
         * @param Airport $airport
         * @return Airport
         */
        public function updateAirport( Airport $airport ) {
            // If no id found
            if ( !$airport->getId() ) {
                throw new Exception("Id not found", 1);
            }

            // Set up an associative array from the Airport object
            $params = [
                "code" => $airport->getCode(),
                "city_code" => $airport->getCityCode(),
                "name" => $airport->getName(),
                "city" => $airport->getCity(),
                "country_code" => $airport->getCountryCode(),
                "region_code" => $airport->getRegionCode(),
                "latitude" => $airport->getlatitude(),
                "longitude" => $airport->getLongittude(),
                "timezone" => $airport->getTimezone(),
            ];

            // Get the Element first
            $this->_db->where( 'id', $airport->getId() );

            $result = $this->_db->update( 'Airports', $params );

            if ( !$result ) {
                throw new Exception("Something happens when tried to update an Airport: ".$this->_db->getLastError(), 1);
            }

            return $airport;
        }

        /**
         * Delete an Airport in the database
         *
         * @param int $id
         * @return Boolean
         */
        public function deleteAirport( int $id ) {

            $this->_db->where( "id", $id );
            $result = $this->_db->delete( "Airports" );

            if ( !$result ) {
                throw new Exception("Something happens when tried to delete an Airport: ".$this->_db->getLastError(), 1);
            }

            return true;
        }
    }