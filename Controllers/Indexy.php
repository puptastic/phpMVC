<?php
    class Indexy {
        var $callNumber;
        
        public function __construct() {
            $this->callNumber = 12;
            
            echo "<br/><br/>You are in indexy!";
            echo "<br/>" . $this->callNumber;
        }
        
        public function Dance() {
            print_r("<br/>Dancing!!");
        }
    }