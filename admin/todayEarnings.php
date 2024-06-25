<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: *");
$db = new PDO("mysql:host=localhost;dbname=e-commerce");
$stmt = $db->prepare("SELECT 
        DATE_FORMAT(shopeditems.dat, '%y-%m-%d') AS date, 
        SUM(products.price) AS earnings,

    FROM 
        shopeditems 
    JOIN 
        products ON products.productid = shopeditems.productid 
    GROUP BY date
");
$stmt->execute();
$request = $stmt->fetchAll(PDO::FETCH_ASSOC);


