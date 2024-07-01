<?php
    session_start();
    header("Access-Control-Allow-Origin: http://localhost:5173");
    header("Access-Control-Allow-Headers: *");
    

    $postData = file_get_contents("php://input");
    $request = json_decode($postData);
    $username = $request->username;
    $password = $request->password;
    $email = $request->email;
    $joined = $request->joined;
    $country = $request->country;

    $image = 'photo/defaultProfile.webp';
    if($username!==null || $password!==null){
        $db = new PDO("mysql:host=localhost;dbname=e-commerce" , 'root' , '');
        $stmt = $db->prepare("INSERT INTO client (username , pswd , email , joined , photo, country) VALUES (? ,?, ? , ?, ? , ?);");
        $stmt->execute([$username , $password , $email , $joined , $image, $country]);
    }
    
   

?>