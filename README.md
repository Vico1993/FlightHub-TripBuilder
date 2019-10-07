# FlightHub-TripBuilder
Create Web Services to ​build and navigate trips​ for a single passenger using criteria such as departure locations, departure dates and arrival locations

## How to setup?

0. Be sure you have [composer](https://getcomposer.org/download/) and [docker with docker-compose](https://docs.docker.com/compose/install/) install.
1. `git clone git@github.com:Vico1993/FlightHub-TripBuilder.git`
2. `cd FlightHub-TripBuilder`
3. `docker-compose up -d`
    - Will launch the database and the PHP server on `localhost:8080`.
    - Mysql will load the simple data for the example.
4. `cd app/ && composer install`
    - Will install all dependancies needed.
5. Enjoy the app on `localhost:8080`

## Wiki

If you need any informations about the path, please check this [page](https://github.com/Vico1993/FlightHub-TripBuilder/wiki)