<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: *");

$pdo = new PDO("mysql:host=localhost;dbname=e-commerce" , "root" , "");
$stmt = $pdo->prepare("SELECT  * FROM categorie");
$stmt->execute();
$response = json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
echo $response;
