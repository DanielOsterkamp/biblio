<?php
$nome = $_POST['nome'];
$senha = $_POST['senha'];
$data_nascimento = $_POST['data'];

include_once('../php/config.php');

echo "Nome recebido: " . $nome . "<br>";

$stmt = $conexao->prepare("INSERT INTO Usuario (nome_usuario, data_nascimento_usuario, senha) VALUES (?, ?, ?)");
if (!$stmt) {
    die("Erro no prepare: " . $conexao->error);
}

$stmt->bind_param("sss", $nome, $data_nascimento, $senha); // mudar o "sss" para quantidade de variaveis

if (!$stmt->execute()) {
    die("Erro no execute: " . $stmt->error);
}

echo "Inserido com sucesso!";
echo "Linhas afetadas: " . $stmt->affected_rows . "<br>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../css/paleta.css">
    <link rel="stylesheet" href="../css/inicio.css">
</head>
<body>

     <div style="display: block; text-align: center; padding-top: 100px;" >
        
        <h1 style="margin: 150px;" > Cadastro Concluido </h1>

        <a href="index.html">
        <p>Clique aqui para voltar à página inicial</p>
        </a>
       
    
    </div>

    
</body>
</html>