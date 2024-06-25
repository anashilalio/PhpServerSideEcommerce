<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: *");
$db = new PDO("mysql:host=localhost;dbname=e-commerce");
$stmt = $db->prepare("SELECT reviews.comments ,reviews.rate , client.photo , products.name , reviews.dat , client.username
  FROM reviews
  JOIN client ON client.clientid = reviews.userId 
  JOIN products ON products.productid = reviews.productid
    Order by reviews.dat DESC
  ");
$stmt->execute();
$response = $stmt->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($response);

// Send the JSON string to the client
echo $json;