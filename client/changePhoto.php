<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: *");
$clientid = $_POST["clientid"];

if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
    die("File upload error: " . $_FILES['image']['error']);
}

$file_name = $_FILES['image']['name'];
$file_tmp = $_FILES['image']['tmp_name'];

$directory = "photo/";

if (!is_dir($directory)) {
    if (!mkdir($directory, 0777, true)) {
        die('Failed to create directory');
    }
}

if (!move_uploaded_file($file_tmp, $directory . $file_name)) {
    die("Failed to move uploaded file");
}

$image = $directory . $file_name;

$db = new PDO('mysql:host=localhost;dbname=e-commerce', 'root', '');
$stmt = $db->prepare("UPDATE client SET photo =? WHERE clientid = ?");
$stmt->execute([$image , $clientid]);