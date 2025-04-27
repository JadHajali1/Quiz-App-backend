<?php
include("./connect.php");

if (!isset($_SESSION['admin_id'])){
    echo json_encode(["message" => "admin not loggedIn!!"]);
}

$data = json_decode(file_get_contents('php//input'), true);
$quiz_id = $data['quiz_id'];

$deleteQuiz = $connect->prepare("SELECT * FROM quizzes WHERE id =?");
$deleteQuiz->execute([$quiz_id]);
$quizRow = $deleteQuiz->fetch(PDO::FETCH_ASSOC);

if(!$quiz){
    echo json_encode(["message" => "quiz not found!!"]);
    exit;
}

if($deleteQuiz->execute([$quiz_id])){
    echo json_encode(["message" => "quiz deleted"]);
}else{
    echo json_encode(["message" => "faild to delete the quiz!"]);
}
