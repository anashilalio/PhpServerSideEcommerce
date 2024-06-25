<?php
    header("Access-Control-Allow-Origin: http://localhost:5173");
    header("Access-Control-Allow-Headers: *");
    $db = new PDO("mysql:host=localhost;dbname=e-commerce" , "root" , "");
    $stmt = $db->prepare("SELECT count(client.clientid) as clients 
    , DATE_FORMAT(joined, '%m') AS date
    FROM client 
    GROUP by date ");
    $stmt->execute();
    $response = json_encode( $stmt->fetchAll(PDO::FETCH_ASSOC));

    echo $response;
?>