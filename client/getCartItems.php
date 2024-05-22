<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: *");
$pdo = new PDO("mysql:host=localhost;dbname=e-commerce" , "root" , "");
$stmt = $pdo->prepare("SELECT * FROM cart");
$stmt->execute();
$repsonse  = $stmt->fetchAll(PDO::FETCH_ASSOC);
$info = json_encode($repsonse);
echo $info;
header("Content-Type: application/json");
