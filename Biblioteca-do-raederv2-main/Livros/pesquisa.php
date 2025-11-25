<?php
include_once('../php/config.php');

if (!isset($_POST['nome']) || trim($_POST['nome']) === "") {
    echo "Por favor, insira o nome de um livro.";
    exit;
}

$nome = trim($_POST['nome']);

// Consulta com LIKE (busca parcial) e sem distinguir maiúsculas/minúsculas
$stmt = $conexao->prepare("
    SELECT id_livro, titulo 
    FROM livro 
    WHERE LOWER(titulo) LIKE LOWER(?)
    LIMIT 1
");

if (!$stmt) {
    die("Erro na preparação da consulta: " . $conexao->error);
}

$busca = "%$nome%";  // permite buscar partes do nome
$stmt->bind_param("s", $busca);
$stmt->execute();
$result = $stmt->get_result();

if ($livro = $result->fetch_assoc()) {
    header("Location: livroPadrao.php?id=" . $livro['id_livro'] . "&mensagem=");
    exit;
}

echo "Esse livro não existe ainda. Peça para os devs colocarem esse livro <3";
exit;
?>
