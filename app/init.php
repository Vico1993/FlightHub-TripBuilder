<?php

    // Initialisation of the data from the exercice
    define( "DATA", '{
        "airlines": [{
            "code": "AC",
            "name": "Air Canada"
        }],
        "airports": [{
            "code": "YUL",
            "city_code": "YMQ",
            "name": "Pierre Elliott Trudeau International",
            "city": "Montreal",
            "country_code": "CA",
            "region_code": "QC",
            "latitude": 45.457714,
            "longitude": -73.749908,
            "timezone": "America/Montreal"
        }, {
            "code": "YVR",
            "city_code": "YVR",
            "name": "Vancouver International",
            "city": "Vancouver",
            "country_code": "CA",
            "region_code": "BC",
            "latitude": 49.194698,
            "longitude": -123.179192,
            "timezone": "America/Vancouver"
        }],
        "flights": [{
            "airline": "AC",
            "number": "301",
            "departure_airport": "YUL",
            "departure_time": "07:35",
            "arrival_airport": "YVR",
            "arrival_time": "10:05",
            "price": "273.23"
        }, {
            "airline": "AC",
            "number": "302",
            "departure_airport": "YVR",
            "departure_time": "11:30",
            "arrival_airport": "YUL",
            "arrival_time": "19:11",
            "price": "220.63"
        }]
    }' );

    var_dump( json_decode( DATA, true ) );
?>