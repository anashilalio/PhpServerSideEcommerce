<?php
  header("Access-Control-Allow-Origin: http://localhost:5173");
  header("Access-Control-Allow-Headers: *");
  $postData = file_get_contents("php://input");
  $request = json_decode($postData);
  $clientid = $request->clientid;
  $productid = $request->productid;
  $db = new PDO('mysql:host=localhost;dbname=e-commerce','root' ,'');
  $smt = $db->prepare("INSERT INTO cart(clientid , productid) VALUES (?  , ?);");
  $smt->execute([$clientid , $productid]); 
  $js = json_encode($response);
  
  header('Content-Type: application/json');
