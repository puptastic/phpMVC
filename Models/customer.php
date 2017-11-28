<?php

    class customer {
        //put your code here
        var $id;
        var $firstName;
        var $lastName;
        var $birthday;
        
        // Returns array of all customers in database
        public static function GetAll() {
            $connection = Database::Connect();
            
            return $connection->query("SELECT * FROM CUSTOMERS")->fetchAll();
        }
    }