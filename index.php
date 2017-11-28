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
            <a href="http://localhost:8000/?url=Indexy/DisplayCustomers">Indexy</a> 
            OR 
            <a href="http://localhost:8000?url=Help/HelpInfo">Help</a>
        </form>
        <?php
            require_once('Libs/Controller.php');
            require_once('Controllers/Indexy.php');
            require_once('Controllers/Help.php');
            require_once('Libs/Bootstrap.php');
            require_once('Libs/Database.php');
            require_once('Models/customer.php');
            require_once('Models/helpinfo.php');
            //use PDO;

            try {
                $app = new Bootstrap(); // LIVE!!!
            }
            catch (Exception $ex) {
                echo "Exception: " . $ex->getMessage();
            }
            
        ?>  
    </body>
</html>