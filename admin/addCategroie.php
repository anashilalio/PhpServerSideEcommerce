<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: *");

$postData = file_get_contents("php://input");
$request = json_decode($postData);

$categorie = $request->categorie;

$pod = new PDO("mysql:host=localhost;dbname=e-commerce" ,"root" , "");
$stmt = $pod->prepare("INSERT INTO categorie (categorie) VALUES (?);");
$stmt->execute([$categorie]);

header('Content-Type: application/json');
    echo json_encode($products);
