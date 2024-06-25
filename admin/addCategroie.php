<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: *");

$postData = file_get_contents("php://input");
$request = json_decode($postData);

$categorie = $request->categorie;
$description = $request->description;
$date = $request->fullDate;





$pod = new PDO("mysql:host=localhost;dbname=e-commerce" ,"root" , "");
$stmt = $pod->prepare("INSERT INTO categorie (categorie , description , dat) VALUES (? , ? , ?);");
$stmt->execute([$categorie , $description , $date]);

header('Content-Type: application/json');
