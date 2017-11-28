<?php

    class Indexy extends Controller {
        var $callNumber;
        
        public function __construct() {
            parent::__construct();
            $this->callNumber = 12;
            
            echo "<br/>***Indexy Constructor***<br/>";
            //echo "<br/>" . $this->callNumber . "<br/>";
        }
        
        public function DisplayCustomers() {
            echo "<br/>***DiplayCustomers Function***<br/>";
            
            $customers = customer::GetAll();
            
            var_dump($customers); // DEBUGGING ONLY
            
//            foreach($customers as $cust) {
//                var_dump($cust);
//                echo "<br/><br/>";
//                echo $cust->firstName . ' ' . $cust->lastName;
//            }
        }
    }