<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: *");
$db = new PDO("mysql:host=localhost;dbname=e-commerce");
// Prepare and execute the query to get the earnings for each month
$stmt1 = $db->prepare("SELECT 
        shopeditems.dat, 
        shopedItems.clientid ,
        products.name,
        client.photo
        
    FROM 
        shopeditems 
    JOIN 
        products ON products.productid = shopeditems.productid 
    JOIN client ON client.clientid = shopedItems.clientid
    Order by  shopeditems.dat DESC
");
$stmt1->execute();

// Fetch the results
$monthlyEarnings = $stmt1->fetchAll(PDO::FETCH_ASSOC);

// Prepare and execute the query to get today's earnings


// Fetch the results


// Combine the results

// Encode the results as a JSON string
$json = json_encode($monthlyEarnings);

// Send the JSON string to the client
echo $json;
