<?php 

try{
    $host="localhost";
    $port = "3306";
    $dbname ="quizapp";
    $user = "root";
    $password = "1234558739"; //random password
    
    $connect = new PDO("mysql:host=$host;port=$port,dbname=$dbname,$user,$password");

}catch(\Throwable $e){
    echo $e;
}