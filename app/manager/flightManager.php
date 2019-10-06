<?php

    /**
     * Manager to interact with the Database to get list of Flight Object.
     */
    class FlightManager extends Manager {

        /**
         * Construct our FlightManager
         */
        public function __construct()
        {
            parent::__construct();
        }

        /**
         * Return an array of Flights object saved in the database
         *
         * @return Flight[]
         */
        public function getAllFlights(): Array {
            $result = [];
            $flights = $this->_db->get( 'Flights' );

            if ( $this->_db->count > 0 ) {
                foreach ( $flights as $flight ) {
                    $result[] = new Flight( $flight[ 'airline' ], $flight[ 'number' ], $flight[ 'departure_airport' ], $flight[ 'departure_time' ], $flight[ 'arrival_airport' ], $flight[ 'arrival_time' ], $flight[ 'price' ], $flight[ 'id' ] );
                }
            }

            return $result;
        }

        /**
         * Return an Flight
         *
         * @return Flight|False
         */
        public function getFlightById( int $id ) {
            if ( $id ) {
                $flight = $this->_db->where( 'id', $id )->getOne( 'Flights' );

                if ( $flight ) {
                    return new Flight( $flight[ 'airline' ], $flight[ 'number' ], $flight[ 'departure_airport' ], $flight[ 'departure_time' ], $flight[ 'arrival_airport' ], $flight[ 'arrival_time' ], $flight[ 'price' ], $flight[ 'id' ] );
                }
            }

            return false;
        }

        /**
         * Add an Flight to the database
         *
         * @param Flight $flight
         * @return Flight
         */
        public function addFlight( Flight $flight ) {
            // Set up an associative array from the Flight object
            $params = [
                "airline" => $flight->getAirline(),
                "number" => $flight->getNumber(),
                "departure_airport" => $flight->getDepartureAirport(),
                "departure_time" => $flight->getDepartureTime(),
                "arrival_airport" => $flight->getArrivalAirport(),
                "arrival_time" => $flight->getArrivalTime(),
                "price" => $flight->getPrice()
            ];

            // Insert in the database
            $id = $this->_db->insert( 'Flights', $params );

            // If id is not null everythign worked like planned
            if ( $id ) {
                // Set the database Id
                $flight->setId( $id );

                return $flight;
            } else {
                throw new Exception("Error while inserting a new Flight : " . $this->_db->getLastError(), 1);
            }
        }

        /**
         * Update a Flight in the database, based on its id
         *
         * @param Flight $flight
         * @return Flight
         */
        public function updateFlight( Flight $flight ) {
            // If no id found
            if ( !$flight->getId() ) {
                throw new Exception("Id not found", 1);
            }

            // Set up an associative array from the Flight object
            $params = [
                "airline" => $flight->getAirline(),
                "number" => $flight->getNumber(),
                "departure_airport" => $flight->getDepartureAirport(),
                "departure_time" => $flight->getDepartureTime(),
                "arrival_airport" => $flight->getArrivalAirport(),
                "arrival_time" => $flight->getArrivalTime(),
                "price" => $flight->getPrice()
            ];

            // Get the Element first
            $this->_db->where( 'id', $flight->getId() );

            $result = $this->_db->update( 'Flights', $params );

            if ( !$result ) {
                throw new Exception("Something happens when tried to update a Flight: ".$this->_db->getLastError(), 1);
            }

            return $flight;
        }

        /**
         * Delete a Flight in the database
         *
         * @param int $id
         * @return Boolean
         */
        public function deleteFlight( int $id ) {

            $this->_db->where( "id", $id );
            $result = $this->_db->delete( "Flights" );

            if ( !$result ) {
                throw new Exception("Something happens when tried to delete a Flight: ".$this->_db->getLastError(), 1);
            }

            return true;
        }

        /**
         * Return all Flight from a specific parameters ( Airport filter / Time filter )
         *
         * @param Array $params
         * @return Flight[]
         */
        public function getFlightFromSpecific( Array $params ) {
            $result = [];

            if ( !empty( $params ) ) {

                // Set up all the conditions sent
                foreach ( $params as $param ) {
                    // Execption from the Mysqli library.
                    // https://packagist.org/packages/joshcam/mysqli-database-class
                    if ( $param[ 'operator' ] == 'STRING' ) {
                        $this->_db->where( $param[ 'columns' ] .' = "' . $param[ 'value' ] . '"' );
                    } else {
                        $this->_db->where( $param[ 'columns' ], $param[ 'value' ], $param[ 'operator' ] );
                    }
                }

                $flights = $this->_db->get( 'Flights' );

                if ( $flights ) {
                    foreach ( $flights as $flight ) {
                        $result[] = new Flight( $flight[ 'airline' ], $flight[ 'number' ], $flight[ 'departure_airport' ], $flight[ 'departure_time' ], $flight[ 'arrival_airport' ], $flight[ 'arrival_time' ], $flight[ 'price' ], $flight[ 'id' ] );
                    }
                }
            }

            return $result;
        }
    }