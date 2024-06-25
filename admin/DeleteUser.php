<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: *");
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$email= $request->email;
$db = new PDO("mysql:host=localhost;dbname=e-commerce");
$stmt = $db->prepare("DELETE FROM wishlist WHERE clientid = (SELECT clientid FROM client WHERE email = ?)");
$stmt->execute([$email]);

$stmt = $db->prepare("DELETE FROM reviews WHERE userId = (SELECT clientid FROM client WHERE email = ?)");
$stmt->execute([$email]);

$stmt = $db->prepare("DELETE FROM shopeditems WHERE clientid = (SELECT clientid FROM client WHERE email = ?)");
$stmt->execute([$email]);

$stmt = $db->prepare("DELETE FROM cart WHERE clientid = (SELECT clientid FROM client WHERE email = ?)");
$stmt->execute([$email]);

$stmt = $db->prepare("DELETE FROM client WHERE email = ?");
$stmt->execute([$email]);
?>
