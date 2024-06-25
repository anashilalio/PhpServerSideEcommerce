<?php
    header("Access-Control-Allow-Origin: http://localhost:5173");
    header("Access-Control-Allow-Headers: *");
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $name = $request->name;
    $db = new PDO("mysql:host=localhost;dbname=e-commerce");
    $stmt = $db->prepare("DELETE FROM categorie where categorie=?");
    $stmt->execute([$name]);
    ?>