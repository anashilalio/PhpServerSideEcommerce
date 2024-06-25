<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: *");
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$comments =$request->review;
$productid  =$request->productid;
$rate  =$request->rate;
$dat  =$request->dat;

$userid =$request->clientid;
$db = new PDO("mysql:host=localhost;dbname=e-commerce");
$stmt = $db->prepare("INSERT INTO reviews(userid , productid , comments,rate ,dat) VALUES (? ,? ,?,?,?)");
$stmt->execute([$userid , $productid , $comments , $rate , $dat]);

