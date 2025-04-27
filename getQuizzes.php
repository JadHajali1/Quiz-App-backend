<?php

include("./connect.php");

$queryQuiz = $connect->prepare("SELECT * FROM quezzes");

$queryQuiz->execute();

$result = [];

while($quiozzes = $queryQuiz->fetch(PDO::FETCH_ASSOC)){
    $result[] = $queryQuiz;
}

echo json_encode($result);