<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: *");
$db = new PDO("mysql:host=localhost;dbname=e-commerce");
$stmt = $db->prepare("SELECT * FROM  reviews ");
$stmt->execute();
$request   =  $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($request);
header('Content-Type: application/json');
