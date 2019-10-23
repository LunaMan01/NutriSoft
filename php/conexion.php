<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    try {
        date_default_timezone_set('America/Mexico_City');
        $conn = new PDO("mysql:host=$servername;dbname=sdn", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
        ini_set('max_execution_time', '0');
    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
?> 