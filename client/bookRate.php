<?php
    header("Access-Control-Allow-Origin: http://localhost:5173");
    header("Access-Control-Allow-Headers: *");
    $db = new PDO("mysql:host=localhost;dbname=e-commerce" , 'root' , '');
    $stmt = $db->prepare("SELECT ROUND(AVG(rate),1) as rate ,productid FROM reviews GROUP BY productid ");
    $stmt->execute();
    $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($response);