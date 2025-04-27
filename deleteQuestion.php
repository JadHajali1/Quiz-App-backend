
<?php
include("./connect.php");

if (!isset($_SESSION['admin_id'])){
    echo json_encode(["message" => "admin not loggedIn!!"]);
}

$data = json_decode(file_get_contents('php//input'), true);
$question_id = $data['question_id'];

$checkQuiestion = $connect->prepare("SELECT quizzes.id FROM quissez INNER JOIN quizzes ON questions.quiz_id = quizzes.id Where questions.id =?");
$checkQuiestion->execute([$quiz_id]);
$questionRow =  $checkQuiestion->fetch(PDO::FETCH_ASSOC);

if(!$questionRow){
    echo json_encode(["message" => "question not found!"]);
}

$deleteQuestion = $connect->prepare("DELETE FROM questions WHERE id  =?");

if($deleteQuestion->execute([$question_id])){
    echo json_encode(["message" => "question deleted"]);
}else{
    echo json_encode(["message" => "faild to delete the question!"]);
}