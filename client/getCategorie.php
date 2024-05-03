<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: *");

$pdo = new PDO("mysql:host=localhost;dbname=e-commerce;",'root' , '' );
$stmt = $pdo->prepare("SELECT categorie FROM categorie ");
$stmt->execute();
$response = $stmt->fetchAll(PDO::FETCH_ASSOC);
header('Content-Type: application/json');
 echo json_encode($response);