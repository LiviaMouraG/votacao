<?php
$host='localhost';
$dbname='login_votos';
$username='root';
$password='';

try{
   $pdo=new PDO("mysql:host=$host;dbname=$dbname;charsert=utf8",$username, $password);
   $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
   
}catch(PDOException $e){
    echo 'Erro ao conectar ao banco de dados:'
    .$e->getMessage();
    exit;
}