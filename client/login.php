<?php
    header("Access-Control-Allow-Origin: http://localhost:5173");
    header("Access-Control-Allow-Headers: *");

    $postData = file_get_contents("php://input");
    $request = json_decode($postData);
    $username= $request->username;
    $password = $request->password;
    $db = new PDO('mysql:host=localhost;dbname=e-commerce','root' ,'');
    $stmt = $db->prepare("SELECT * FROM client WHERE username = ? AND pswd = ? ");
    $stmt->execute([$username , $password]);
    if($stmt->rowCount()>0){
        $response = $stmt->fetch(PDO::FETCH_ASSOC);
        
        header('Content-Type: application/json');
        echo json_encode($response);
    }else{
        echo "user doesn't exist";
        header('Content-Type: application/json');
    }
    

?>