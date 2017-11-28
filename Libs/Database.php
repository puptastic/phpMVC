<?php

    use PDO;

    class Database {
//        public function __construct() {
//            // instantiate Database class
//        }
        
        // Return PDO object for use with ActiveRecord Model
        public static function Connect(){
            $connection = new PDO("mysql:dbname=dbstore;host=127.0.0.1", "dummyUser", "Tom&Jerry1234");
            
            return $connection;
        }
    }