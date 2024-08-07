<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: *");

$pdo = new PDO("mysql:host=localhost;dbname=e-commerce" , "root" , "");
$stmt = $pdo->prepare("SELECT  categorie.dat , categorie.categorie , count(products.categorie) as NProducts , categorie.description
FROM categorie
JOIN products ON products.categorie = categorie.categorie
group by products.categorie
");
$stmt->execute();
$response = json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
echo $response;
