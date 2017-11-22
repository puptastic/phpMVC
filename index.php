<?php
    require_once('Controllers/Indexy.php');
    require_once('Controllers/Help.php');

    echo "<br/><hr><br/>";

    $url = explode("/", filter_input(INPUT_GET, "url"));
    
    print_r($url);
    
    echo "<br/><br/>";
    
    //require 'Controllers/' . $url . '.php';
    $controller = new $url[0];
    
    //$controller2 = new Help();
        
    if (isset($url[1])) {
        $controller->{$url[1]}();
    }
    
    //$controller2->Aid();
?>

