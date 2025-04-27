<?php
include("./connect.php");

if (!isset($_SESSION['admin_id'])){
    echo json_encode(["message" => "admin not loggedIn!!"]);
}

$data = json_decode(file_get_contents('php//input'), true);

$quiz_id = $data['quiz_id'];
$title = $data['title'];
$description = $data['description'];

$editQuiz = $connect->prepare(("SELECT * FROM quizzes WHERE id = ?"));
$editQuiz->execute([$quiz_id]);
$quizRow = $deleteQuiz->fetch(PDO::FETCH_ASSOC);

if(!$quiz){
    echo json_encode(["message" => "quiz not found!!"]);
    exit;
}

$editQuiz = $connect->prepare("UPDATE quizzes SET title = ?, description = ? WHERE id =?");
if($editQuiz->execute([$title, $description, $quiz_id])){
    echo json_encode(["message" => "quiz updated"]);
}else{
    echo json_encode(["message" => "faild to update the quiz!"]);
}
