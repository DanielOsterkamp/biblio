<?php

 $dbHost = 'Localhost';
 $dbPassword = '';
 $dbUsername = 'root';
$dbName = 'biblioteca';

$conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

if($conexao->connect_errno){
    echo "erro";
}else{
echo "conectado com sucesso";

}

?>