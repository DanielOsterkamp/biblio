<?php

session_start();

$nome = $_POST['nome'];
$senha = $_POST['senha'];

include_once('config.php');




$stmt = $conexao->prepare("SELECT * FROM Usuario WHERE nome_usuario = ? and senha = ? ");
if (!$stmt) {
    die("Erro no prepare: " . $conexao->error);
}

$stmt->bind_param("ss", $nome,  $senha); // mudar o "sss" para quantidade de variaveis

if (!$stmt->execute()) {
    die("Erro no execute: " . $stmt->error);
}

$result = $stmt->get_result();

print_r ($result->num_rows);

if ($result->num_rows > 0){
    $_SESSION['nome'] = $nome;
     header("Location: Home.php");
}else{
    echo "idiota";
}




?>