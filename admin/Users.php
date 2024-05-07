<?php
    header("Access-Control-Allow-Origin: http://localhost:5173");
    header("Access-Control-Allow-Headers: *");
    $db = new PDO("mysql:host=localhost;dbname=e-commerce" , "root" , "");
    $stmt = $db->prepare("SELECT * FROM client ORDER BY joined DESC");
    $stmt->execute();
    $response = json_encode( $stmt->fetchAll(PDO::FETCH_ASSOC));

    echo $response;
?>