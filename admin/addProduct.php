<?php
// Enable CORS
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: *");

// Get the posted data
$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata)) {
  // Extract the product details
  $request = json_decode($postdata);
  $name = $request->name;
  $description = $request->description;
  $price = $request->price;

  // Connect to the database and add the new product
  // This is just a placeholder - replace with your actual database code
  $db = new PDO('mysql:host=localhost;dbname=e-commerce', 'root', '');
  $stmt = $db->prepare("INSERT INTO products (name, description, price) VALUES (?, ?, ?)");
  $stmt->execute([$name, $description, $price]);

  // Send a response back to the React application
  $response = ['status' => 'success'];
  header('Content-Type: application/json');
  echo json_encode($response);
}
?>