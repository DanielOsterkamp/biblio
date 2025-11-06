<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once '../php/config.php'; 

// Dados do novo usuário
$nome = 'bibliotecario';
$senha_plana = '123';

// Gerar hash seguro da senha
$senha_hash = password_hash($senha_plana, PASSWORD_DEFAULT);

// Verificar se o usuário já existe
$sql_verifica = "SELECT * FROM usuario WHERE nome = ?";
$stmt_verifica = mysqli_prepare($conexao, $sql_verifica);
mysqli_stmt_bind_param($stmt_verifica, "s", $nome);
mysqli_stmt_execute($stmt_verifica);
mysqli_stmt_store_result($stmt_verifica);

if (mysqli_stmt_num_rows($stmt_verifica) > 0) {
    echo "O usuário já existe.";
} else {
    // Inserir novo usuário
    $sql = "INSERT INTO usuario (nome, senha) VALUES (?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $nome, $senha_hash);
        
        if (mysqli_stmt_execute($stmt)) {
            echo "Usuário criado com sucesso!";
        } else {
            echo "Erro ao criar usuário: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Erro na preparação da query: " . mysqli_error($conn);
    }
}

mysqli_stmt_close($stmt_verifica);
mysqli_close($conexao);
?>