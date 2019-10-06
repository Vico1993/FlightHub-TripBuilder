<?php

    /**
     * Parent of all Manager, will handle basic functions and database connection
     */
    class Manager
    {
        /**
         * Saving our database QueryBuilder.
         */
        protected $_db;

        /**
         * Construct the connection to the Manager
         */
        public function __construct()
        {
            $this->_db = new MysqliDb([
                'host' => 'mysql',
                'username' => 'root',
                'password' => 'flighthub',
                'db'=> 'flighthub',
                'port' => 3306,
                'charset' => 'utf8'
            ]);
        }
    }
