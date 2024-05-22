<?php 
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: *");

$postData = file_get_contents("php://input");
$request = json_decode($postData);
$productid = $request->deleteThatProduct;
$db = new PDO("mysql:host=localhost;dbname=e-commerce");
$stmt = $db->prepare("DELETE FROM cart WHERE  productid = ?");
$stmt->execute([$productid]);
