<?php
include("./connect.php");

if (!isset($_SESSION['admin_id'])){
    echo json_encode(["message" => "admin not loggedIn!!"]);
}

$data = json_decode(file_get_contents('php//input'), true);

if(!isset($data['quiz_ic']) || !isset($data['quiestion_text']) || !isset($data['correct_answer'])){
    echo json_encode(["message" => "admin not loggedIn!!"]);
}

$quiz_id = $data['quiz_id'];
$question_text = $data['question_text'];
$correct_answer = $data['correct_answer'];

$createQuestion = $connect->prepare("INSERT INT questions(quiz_id, question_text,correct_answer) VALUES(?,?,?)");

if($createQuestion->execute([$quiz_id, $question_text, $correct_answer])){
    echo json_encode(["message" => "question created!"]);
}else{
    echo json_encode(["message" => "faild to create the question!!"]);
}
