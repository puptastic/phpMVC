<?php
    /**
     * Description of Bootstrap
     *
     * @author Flores
     */
    class Bootstrap {
        public function __construct() {
            echo "<br/><hr><br/>";

            $url = explode("/", filter_input(INPUT_GET, "url"));

//            print_r($url); // for debugging
//            echo "<br/><br/>";

            //require 'Controllers/' . $url . '.php';
            $controller = new $url[0];

            if (isset($url[1])) {
                $controller->{$url[1]}();
            }
        }
    }
