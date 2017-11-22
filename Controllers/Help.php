<?php
    class Help extends Controller{

        public function __construct() {
            parent::__construct();
            echo "<br/><br/>You are in help!";
        }
        
        public function Aid() {
            print_r("<br/>Aiding!!");
        }
    }