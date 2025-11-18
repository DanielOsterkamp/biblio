<?php
require_once("../php/config.php");
require_once("../php/verificar_sessao.php");

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $novo = trim($_POST['novo_apelido']);
    $id = $_SESSION['id'];

    if ($novo == "") {
        die("Apelido inválido.");
    }

    $sql = "UPDATE usuario SET nome = ? WHERE id_usuario = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "si", $novo, $id);

    if ($stmt->execute()) {
        $_SESSION['nome'] = $novo;
        header("Location: Home.php");
        exit;
    } else {
        echo "Erro ao atualizar apelido.";
    }
} else {
    echo "Acesso inválido!";
}