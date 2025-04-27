





$checkQuiestion = $connect->("SELECT * FROM quissez WHERE id = ?");
$checkQuiestion->execute([$quiz_id]);
$quiz =  $checkQuiestion->fetch(PDO::FETCH_ASSOC);

if(!$quiz){
    echo json_encode(["message" => "quiz not found!"]);
}