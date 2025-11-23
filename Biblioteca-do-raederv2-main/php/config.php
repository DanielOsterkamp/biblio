<?php

 $dbHost = 'Localhost';
 $dbPassword = '24012004Lu!';
 $dbUsername = 'root';
$dbName = 'biblioteca';

$conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

if($conexao->connect_errno){
    echo "erro";
}else

?>