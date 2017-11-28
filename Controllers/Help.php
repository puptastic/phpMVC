<?php
    class Help extends Controller{

        public function __construct() {
            parent::__construct();
            echo "<br/>***Help Constructor***<br/>";
        }
        
        public function Aid() {
            print_r("<br/>***Aid Function***<br/>");
        }
        
        public function HelpInfo($article=1) {
            echo "<br/>***HelpInfo Function***<br/>";
            
            $helpinfo = helpinfo::GetAll();
            
            var_dump($helpinfo); // DEBUGGING ONLY
            
//            foreach($helpinfo as $hinfo) {
//                //var_dump($cust);
//                echo "<br/><br/>";
//            }
        }
    }