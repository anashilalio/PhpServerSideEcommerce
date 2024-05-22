<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: *");

$postData = file_get_contents("php://input");
$request = json_decode($postData);
$clientid = $request->clientid;

$db = new PDO("mysql:host=localhost;dbname=e-commerce");
$stmt = $db->prepare("SELECT * FROM wishlist WHERE clientid = ?;");
$stmt->execute([$clientid]);
$repsonse = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($repsonse);