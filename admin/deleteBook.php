<?php
     header("Access-Control-Allow-Origin: http://localhost:5173");
     header("Access-Control-Allow-Headers: *");
     $postdata = file_get_contents("php://input");
     $request = json_decode($postdata);
     $name = $request->deletebook;
     $db = new PDO("mysql:host=localhost;dbname=e-commerce" , "root" , "");
     $stmt = $db->prepare("DELETE FROM reviews WHERE productid = (SELECT productid FROM products WHERE name = ?)");
     $stmt->execute([$name]);
     $stmt = $db->prepare("DELETE FROM wishlist WHERE productid = (SELECT productid FROM products WHERE name = ?)");
     $stmt->execute([$name]);
     $stmt = $db->prepare("DELETE FROM cart WHERE productid = (SELECT productid FROM products WHERE name = ?)");
     $stmt->execute([$name]);
     $stmt = $db->prepare("DELETE FROM shopeditems WHERE productid = (SELECT productid FROM products WHERE name = ?)");
     $stmt->execute([$name]);
     $stmt = $db->prepare("DELETE FROM products WHERE name = ?");
     $stmt->execute([$name]);