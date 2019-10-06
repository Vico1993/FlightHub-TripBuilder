<?php

/**
 * Get all the ailines from the AirlineManager then format the result
 */
function getAllAirline() {
    global $airlinesManager;

    $result = [];

    // Get All the Airlines in the database
    $airlines = $airlinesManager->getAllAirlines();

    // if not empty, need to transform all object to associative Array
    if ( count( $airlines ) ) {
        foreach ( $airlines as $airline ) {
            $result[] = [
                "id" => $airline->getId(),
                "code" => $airline->getCode(),
                "name" => $airline->getName()
            ];
        }
    } else {
        $result = $airlines;
    }

    echo json_encode( $result );
}

/**
 * Return a specific Airline by its id
 *
 * @param Array
 */
function getOneAirline( $params ) {
    global $airlinesManager;

    $result = 0;

    if ( !empty( $params[ "id" ] ) ) {
        try {
            // Convert to an int
            $id = intval( $params[ "id" ], 10 );

            $airline = $airlinesManager->getAirlineById( $id );

            $result = [
                "id" => $airline->getId(),
                "code" => $airline->getCode(),
                "name" => $airline->getName()
            ];
        } catch (\Throwable $th) {
            $result = [ "error" => true, "message" => "Something happen on our side.. please try again later" ];
        }
    }

    header('Content-Type: application/json');
    echo json_encode( $result );
}

/**
 * Create an Airline
 */
function addAirline() {
    global $airlinesManager;

    $result = [];

    if ( !empty( $_POST ) && !empty( $_POST[ 'code' ] ) && !empty( $_POST[ 'name' ] ) ) {
        $airline = new Airline( $_POST[ 'code' ], $_POST[ 'name' ] );

        try {
            $airline = $airlinesManager->addAirline( $airline );

            $result = [
                'id' => $airline->getId(),
                'code' => $airline->getCode(),
                'name' => $airline->getName()
            ];

        } catch (\Throwable $th) {
            $result = [
                "error" => true,
                "message" => "Something happened on our side... sorry please try again"
            ];
        }

        echo json_encode( $result );
    } else {
        echo json_encode( [ "error" => true, "message" => "Missing parameter, please check you send us 'code', and 'name' for the new Airline" ] );
    }
}

/**
 * Delete an Airline by its id
 *
 * @param Array
 */
function deleteAirline( $params ) {
    global $airlinesManager;

    $result = [
        'success' => 'false'
    ];

    if ( !empty( $params[ "id" ] ) ) {
        try {
            // Convert string to int
            $id = intval( $params[ "id" ], 10 );

            $airlinesManager->deleteAirline( $id );

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
 * Update an Airline by its id
 *
 * @param Array
 */
function updateAirline( $params ) {
    global $airlinesManager;

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
                $airline = $airlinesManager->getAirlineById( $id );

                if ( $data[ 'name' ] ) {
                    $airline->setName( $data[ 'name' ] );
                }

                if ( $data[ 'code' ] ) {
                    $airline->setCode( $data[ 'code' ] );
                }

                // Save our change
                $airline = $airlinesManager->updateAirline( $airline );

                $result = [
                    'id' => $airline->getId(),
                    'name' => $airline->getName(),
                    'code' => $airline->getCode()
                ];

            } catch (\Throwable $th) {
                $result = [ "error" => true, "message" => "Something happen on our side.. please try again later" ];
            }
        } else {
            $result = [ "error" => true, "message" => "No data provide to update the Airline, please add a 'code' or a 'name' to update this airlines" ];
        }
    }

    echo json_encode( $result );
}