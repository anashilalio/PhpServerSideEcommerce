<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: *");
$db = new PDO("mysql:host=localhost;dbname=e-commerce");
// Prepare and execute the query to get the earnings for each month
$stmt1 = $db->prepare("SELECT 
        DATE_FORMAT(shopeditems.dat, '%m') AS month, 
        SUM(products.price) AS earnings
    FROM 
        shopeditems 
    JOIN 
        products ON products.productid = shopeditems.productid 
    GROUP BY 
        month
");
$stmt1->execute();

// Fetch the results
$monthlyEarnings = $stmt1->fetchAll(PDO::FETCH_ASSOC);

// Prepare and execute the query to get today's earnings
$stmt2 = $db->prepare("SELECT 
        DATE_FORMAT(shopeditems.dat, '%Y-%m-%d') AS date, 
        SUM(products.price) AS earnings
    FROM 
        shopeditems 
    JOIN 
        products ON products.productid = shopeditems.productid 
    WHERE 
        DATE(shopeditems.dat) = CURDATE()
");
$stmt2->execute();

// Fetch the results
$todaysEarnings = $stmt2->fetchAll(PDO::FETCH_ASSOC);

// Combine the results
$results = [
    'monthlyEarnings' => $monthlyEarnings,
    'todaysEarnings' => $todaysEarnings,
];

// Encode the results as a JSON string
$json = json_encode($results);

// Send the JSON string to the client
echo $json;
