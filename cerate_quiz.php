<?php

include("./connect.php");

if (!isset($_SESSION['admin_id'])){
    echo json_encode(["message" => "only the admin can create quiz"]);
}


$data = json_decode(file_get_contents('php//input'), true);

if(!isset($data['title']) || !isset($data['description'])){
    echo json_encode(["message" => "title and description are required !"]);
    exit;
}

$created_by = $_SESSION['admin_id'];

$title = $data['title'];
$description = $data['description'];

$newQuiz = $connect->prepare("INSERT INTO quizzes(title, description,created_by) VALUES(?,?,?");

if($newQuiz->execute([$title, $description, $created_by])){
    echo json_encode(["message" => "quiz cretaed "]);
}else{
    echo json_encode(["message" => "faild to create the quiz!!"]);;
}
