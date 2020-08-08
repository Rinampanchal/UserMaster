<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        $dbhost='localhost';
        $dbuser='root';
        $dbpass="";
        $database='self';
        
        $conn= mysqli_connect($dbhost, $dbuser, $dbpass, $database);
        if(! $conn)
        {
            echo "Not connected";
        }
        else
        {
            echo "Connected";
        }
        ?>
    </body>
</html>
