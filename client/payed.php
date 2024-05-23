<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: *");
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$listItems = $request->listItems;
$clientid = $request->clientid;
$db = new PDO("mysql:host=localhost;dbname=e-commerce");
foreach($listItems as $item){
    $stmt = $db->prepare("INSERT INTO shopeditems(clientid , productid ) VALUES  (? ,?)");
    $stmtt = $db->prepare("DELETE FROM cart where clientid = ? AND  productid = ? " );
    $stmttt = $db->prepare("DELETE FROM wishlist where clientid = ? AND  productid = ? " );
        $stmt->execute([$clientid, $item ]);
        $stmtt->execute([$clientid, $item ]);
        $stmttt->execute([$clientid, $item ]);

}
