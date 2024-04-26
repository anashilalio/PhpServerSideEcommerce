<?php
    header("Access-Control-Allow-Origin: http://localhost:5173");
    header("Access-Control-Allow-Headers: *");
    $db = new PDO('mysql:host=localhost;dbname=e-commerce' , "root" , '');
    $stmt = $db->prepare('SELECT * FROM products');
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    
    header('Content-Type: application/json');
    echo json_encode($products);
?>