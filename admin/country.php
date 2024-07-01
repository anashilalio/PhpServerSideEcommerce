<?php
    header("Access-Control-Allow-Origin: http://localhost:5173");
    header("Access-Control-Allow-Headers: *");
    $db = new PDO("mysql:host=localhost;dbname=e-commerce" , "root" , "");
    $stmt = $db->prepare("SELECT count(clientid) as value ,  country as id from client  GROUP BY country");
    $stmt->execute();
    $response = json_encode( $stmt->fetchAll(PDO::FETCH_ASSOC));

    echo $response;
?>