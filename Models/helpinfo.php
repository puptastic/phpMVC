<?php

    class helpinfo {
        //put your code here
        var $id;
        var $info;
        
        // Returns array of all help information (articles) in database
        public static function GetAll() {
            $connection = Database::Connect();
            
            return $connection->query("SELECT * FROM HELPINFO")->fetchAll();
        }
    }
    
?>
