<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: *");
$db = new PDO("mysql:host=localhost;dbname=e-commerce");
$stmt = $db->prepare("SELECT reviews.reviewid , reviews.comments,reviews.userId,client.username,reviews.productid , client.photo , reviews.rate , reviews.dat
  FROM  reviews
  Join client ON reviews.userId = client.clientid
  
   ");
$stmt->execute();
$request   =  $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($request);
header('Content-Type: application/json');
