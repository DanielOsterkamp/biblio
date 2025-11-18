<?php
require_once("../php/config.php");
require_once("../php/verificar_sessao.php");

session_start();
$id = $_SESSION['id'];

$sql = "DELETE FROM usuario WHERE id_usuario = ?";
$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);

if ($stmt->execute()) {
    session_destroy();
    header("Location: ../Inicio/index.html");
    exit;
} else {
    echo "Erro ao excluir conta!";
}