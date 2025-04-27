<?php
include("./connect.php");

if (!isset($_SESSION['admin_id'])){
    echo json_encode(["message" => "admin not loggedIn!!"]);
}


$data = json_decode(file_get_contents('php//input'), true);


$quiz_id = $data['quiz_id'];
$question_text = $data['question_text'];
$correct_answer = $data['correct_answer'];


$checkQuiestion = $connect->prepare("SELECT quizzes.id FROM quissez INNER JOIN quizzes ON questions.quiz_id = quizzes.id Where questions.id =?");
$checkQuiestion->execute([$quiz_id]);
$questionRow =  $checkQuiestion->fetch(PDO::FETCH_ASSOC);


$editQuestion = $connect->prepare("UPDATE questons SET question_text = ?, corrcet_answer = ? WHERE id =?");
if($editQuestion->execute([$title, $description, $quiz_id])){
    echo json_encode(["message" => "question updated"]);
}else{
    echo json_encode(["message" => "faild to update the question!"]);
}