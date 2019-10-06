<?php

/**
 * Get all the airport from the AirportManager then format the result
 */
function getAllAirport() {
    global $airportManager;

    $result = [];

    // Get All the Airport in the database
    $airports = $airportManager->getAllAirport();

    // if not empty, need to transform all object to associative Array
    if ( count( $airports ) ) {
        foreach ( $airports as $airport ) {
            $result[] = [
                "id" => $airport->getId(),
                "code" => $airport->getCode(),
                "cityCode" => $airport->getCityCode(),
                "name" => $airport->getName(),
                "city" => $airport->getCity(),
                "countryCode" => $airport->getCountryCode(),
                "regionCode" => $airport->getRegionCode(),
                "latitude" => $airport->getlatitude(),
                "longitude" => $airport->getLongittude(),
                "timezone" => $airport->getTimezone(),
            ];
        }
    } else {
        $result = $airports;
    }

    echo json_encode( $result );
}

/**
 * Return a specific Airport by its id
 *
 * @param Array
 */
function getOneAirport( $params ) {
    global $airportManager;

    $result = 0;

    if ( !empty( $params[ "id" ] ) ) {
        try {
            // Convert to an int
            $id = intval( $params[ "id" ], 10 );

            $airport = $airportManager->getAirportById( $id );

            $result = [
                "id" => $airport->getId(),
                "code" => $airport->getCode(),
                "cityCode" => $airport->getCityCode(),
                "name" => $airport->getName(),
                "city" => $airport->getCity(),
                "countryCode" => $airport->getCountryCode(),
                "regionCode" => $airport->getRegionCode(),
                "latitude" => $airport->getlatitude(),
                "longitude" => $airport->getLongittude(),
                "timezone" => $airport->getTimezone(),
            ];
        } catch (\Throwable $th) {
            $result = [ "error" => true, "message" => "Something happen on our side.. please try again later" ];
        }
    }

    echo json_encode( $result );
}

/**
 * Create an Airport
 */
function addAirport() {
    global $airportManager;

    $result = [];

    if ( !empty( $_POST ) && !empty( $_POST[ 'code' ] ) && !empty( $_POST[ 'cityCode' ] ) && !empty( $_POST[ 'name' ] ) && !empty( $_POST[ 'city' ] ) && !empty( $_POST[ 'countryCode' ] ) && !empty( $_POST[ 'regionCode' ] ) && !empty( $_POST[ 'latitude' ] ) && !empty( $_POST[ 'longitude' ] ) && !empty( $_POST[ 'timezone' ] ) ) {
        $airport = new Airport( $_POST[ 'code' ], $_POST[ 'cityCode' ], $_POST[ 'name' ], $_POST[ 'city' ], $_POST[ 'countryCode' ], $_POST[ 'regionCode' ], $_POST[ 'latitude' ], $_POST[ 'longitude' ], $_POST[ 'timezone' ] );

        try {
            $airport = $airportManager->addAirport( $airport );

            $result = [
                "id" => $airport->getId(),
                "code" => $airport->getCode(),
                "cityCode" => $airport->getCityCode(),
                "name" => $airport->getName(),
                "city" => $airport->getCity(),
                "countryCode" => $airport->getCountryCode(),
                "regionCode" => $airport->getRegionCode(),
                "latitude" => $airport->getlatitude(),
                "longitude" => $airport->getLongittude(),
                "timezone" => $airport->getTimezone()
            ];

        } catch (\Throwable $th) {
            $result = [
                "error" => true,
                "message" => "Something happened on our side... sorry please try again"
            ];
        }

        echo json_encode( $result );
    } else {
        echo json_encode( [ "error" => true, "message" => "Missing parameter, please check you send us 'code', 'cityCode', 'name', 'city', 'countryCode', 'regionCode', 'latitude', 'longitude', 'timezone' for the new Airport" ] );
    }
}

/**
 * Delete an Airport by its id
 *
 * @param Array
 */
function deleteAirport( $params ) {
    global $airportManager;

    $result = [
        'success' => 'false'
    ];

    if ( !empty( $params[ "id" ] ) ) {
        try {
            // Convert string to int
            $id = intval( $params[ "id" ], 10 );

            $airportManager->deleteAirport( $id );

            $result = [
                'success' => 'true'
            ];
        } catch (\Throwable $th) {
            $result = [ "error" => true, "message" => "Something happen on our side.. please try again later" ];
        }
    }

    echo json_encode( $result );
}

/**
 * Update an Airport by its id
 *
 * @param Array
 */
function updateAirport( $params ) {
    global $airportManager;

    $result = [];
    $data = [];

    // get PUT data from the request
    parse_str( file_get_contents("php://input"), $data );

    if ( !empty( $params[ "id" ] ) ) {

        if ( !empty( $data ) ) {
            try {
                // Convert string to int
                $id = intval( $params[ "id" ], 10 );

                // get the database object first
                $airport = $airportManager->getAirportById( $id );

                if ( $data[ 'code' ] ) {
                    $airport->setCode( $data[ 'code' ] );
                }

                if ( $data[ 'cityCode' ] ) {
                    $airport->setCityCode( $data[ 'cityCode' ] );
                }

                if ( $data[ 'name' ] ) {
                    $airport->setName( $data[ 'name' ] );
                }

                if ( $data[ 'city' ] ) {
                    $airport->setCity( $data[ 'city' ] );
                }

                if ( $data[ 'countryCode' ] ) {
                    $airport->setCountryCode( $data[ 'countryCode' ] );
                }

                if ( $data[ 'regionCode' ] ) {
                    $airport->setRegionCode( $data[ 'regionCode' ] );
                }

                if ( $data[ 'latitude' ] ) {
                    $airport->setlatitude( $data[ 'latitude' ] );
                }

                if ( $data[ 'longitude' ] ) {
                    $airport->setLongitude( $data[ 'longitude' ] );
                }

                if ( $data[ 'timezone' ] ) {
                    $airport->setTimezone( $data[ 'timezone' ] );
                }

                // Save our change
                $airport = $airportManager->updateAirport( $airport );

                $result = [
                    "id" => $airport->getId(),
                    "code" => $airport->getCode(),
                    "cityCode" => $airport->getCityCode(),
                    "name" => $airport->getName(),
                    "city" => $airport->getCity(),
                    "countryCode" => $airport->getCountryCode(),
                    "regionCode" => $airport->getRegionCode(),
                    "latitude" => $airport->getlatitude(),
                    "longitude" => $airport->getLongittude(),
                    "timezone" => $airport->getTimezone()
                ];

            } catch (\Throwable $th) {
                $result = [ "error" => true, "message" => "Something happen on our side.. please try again later" ];
            }
        } else {
            $result = [ "error" => true, "message" => "No data provide to update the Airport, please provide one element from this list: 'code', 'cityCode', 'name', 'city', 'regionCode', 'countryCode', 'latitude', 'longitude', or 'timezone'" ];
        }
    }

    echo json_encode( $result );
}