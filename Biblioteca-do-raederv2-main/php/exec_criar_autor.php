<?php
require_once "../php/config.php";
// Verificar se é POST e campos obrigatórios estão presentes
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['nome'])) {
    $nome = $_POST['nome'];
    $data = $_POST['data']; 
    $nacionalidade = $_POST['nacionalidade'];
  
} else {
    $msg = urlencode('Acesso negado!');
    header("location: ../php/entrar.php?retorno=$msg");
    exit;
}

// Inserir no banco (ajuste query para incluir todos os campos; assumindo FK para autor se necessário)
$sql = "INSERT INTO autor (nome_autor, data_nascimento_autor, nacionalidade) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($stmt, "sss", $nome,$data,$nacionalidade);
mysqli_stmt_execute($stmt);

// Pegar ID do novo autor
$novo_id = mysqli_insert_id($conexao);



mysqli_stmt_close($stmt);
mysqli_close($conexao);

// Redirecionar para criar a página HTML dinâmica
header("Location: ../php/form_cadastrar_livro.php?autor=$nome");
exit;
?>