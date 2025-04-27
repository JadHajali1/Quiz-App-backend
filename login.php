
<?php

include("./connect.php");

$username = $_POST['username'];
$password = $_POST['password'];

$userRow->prepare("SELECT * FROM users WHERE username =?");

$userRow->execute($userRow);

$user = $userRow->fetch(PDO::FETCH_ASSOC);

if($user){
    if(password_verify($password, $username['password'])){
        echo json_encode($user);
    }else{
        echo json_encode(["message" => "invalid password"]);
    }
}else{
    echo json_encode(["message" => "user not found!"]);
}
