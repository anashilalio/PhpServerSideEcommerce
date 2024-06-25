<?php
// Enable CORS
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: *");

// Get the posted data
if(isset($_POST) && !empty($_POST)) {
  // Extract the product details
  $name = $_POST['name'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $categorie = $_POST['categorie'];
  $date = $_POST['date'];
  $autheur= $_POST['autheur'];
  $created= $_POST['createdDate'];
  

    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_type = $_FILES['file']['type'];

    // Check if the file is a PDF
    if ($file_type !== 'application/pdf') {
        die("File is not a PDF");
    }
    move_uploaded_file($file_tmp, "uploads/" . $file_name);
    


    $fileName = $_FILES['file']['name'];


  // Handle the uploaded image
  if(isset($_FILES['image'])){
    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $file_ext = strtolower(end(explode('.',$_FILES['image']['name'])));
    
    $extensions= array("jpeg","jpg","png", "webp");
    
    if(in_array($file_ext,$extensions)=== false){
       $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }
    
    if(empty($errors)==true){
       move_uploaded_file($file_tmp,"images/".$file_name);
       $image = "images/".$file_name;
    }else{
       print_r($errors);
    }
  }

  // Connect to the database and add the new product
  // This is just a placeholder - replace with your actual database code
  $db = new PDO('mysql:host=localhost;dbname=e-commerce', 'root', '');
  $stmt = $db->prepare("INSERT INTO products (name, description, price , categorie , images , autheur , dat ,createdDate , link) VALUES (? ,?,?, ?, ? , ? , ? , ?,?)");
  $stmt->execute([$name, $description, $price , $categorie , $image, $autheur , $date , $created , $fileName]);

  // Send a response back to the React application
  $response = ['status' => 'success'];
  header('Content-Type: application/json');
  echo json_encode($response);
}
?>