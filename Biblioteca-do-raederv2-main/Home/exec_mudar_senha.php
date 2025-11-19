<?php

session_start();

require_once ("../php/config.php");
require_once("../php/verificar_sessao.php");



if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: Home.php");
    exit;
}

$id_usuario = $_SESSION['id'];
$senha_antiga = trim($_POST['senha_antiga']);
$senha_nova = trim($_POST['senha_nova']);


$sql = "SELECT senha FROM usuario WHERE id_usuario = ?";
$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($stmt, "i", $id_usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    $msg = urlencode("Usuário não encontrado.");
    header("Location: Home.php?retorno=$msg");
    exit;
}

$dados = $result->fetch_assoc();
$senha_atual_banco = $dados['senha'];


if (!password_verify($senha_antiga, $senha_atual_banco)) {
    $msg = urlencode("Senha antiga incorreta!");
    header("Location: Home.php?retorno=$msg");
    exit;
}

$senha_hash = password_hash($senha_nova, PASSWORD_DEFAULT);

$sql = "UPDATE usuario SET senha = ? WHERE id_usuario = ?";
$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($stmt, "si", $senha_hash, $id_usuario);

if ($stmt->execute()) {
    $msg = urlencode("Senha atualizada com sucesso!");
    header("Location: Home.php?retorno=$msg");
    exit;
} else {
    echo "Erro ao atualizar senha: " . mysqli_error($conexao);
}

mysqli_close($conexao);
?>