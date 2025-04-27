<?php

include("./connect.php");

$username = $_POST['username'];
$password = $_POST['password'];

$hashedPass = password_hash($password, PASSWORD_DEFAULT);

$newUser = $connect->prepare("INSERT INTO users (username, password) VALUES(?, ?)");
if($newUser->execute([$username, $hashedPass])){
    echo json_encode(["message" => "User registerd"]);
}else{
    echo json_encode(["message" => "registration faild"]);
}