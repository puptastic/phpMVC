<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Hello MVC for PHP</title>
        <script src="js/index.js" type="text/javascript" />
        <!--*****Code below references the jquery library, including ajax calls*****-->
        <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
        <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <!--*****************************************************************-->
        <link rel="stylesheet" type="text/css" href="css/default.css"/>
    </head>
    <body>
        <form id="frmMain" name="frmMain">
            <h1>Heading Size 1</h1>
            <p>Basic paragraph... Everything below the horizontal rule is dynamically generated based on the url.</p>
            <a href="http://localhost:8000/?url=Indexy/Dance">Indexy</a> 
            OR 
            <a href="http://localhost:8000?url=Help/Aid">Help</a>
        </form>
        <?php
            require_once('Libs/Controller.php');
            require_once('Controllers/Indexy.php');
            require_once('Controllers/Help.php');
            require_once('Libs/Bootstrap.php');

            $app = new Bootstrap();
        ?>  
    </body>
</html>