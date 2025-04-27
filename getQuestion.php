<?php

include("./connect.php");

$queryQuestion = $connect->prepare("SELECT * FROM questions");

$queryQuestion->execute();

$result = [];

while($quiozzes = $queryQuestion->fetch(PDO::FETCH_ASSOC)){
    $result[] = $queryQuestion;
}

echo json_encode($result);