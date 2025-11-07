<?php
require_once ("../php/config.php");
require_once("../php/verificar_sessao.php");

// Verifica se a requisição é POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'], $_POST['titulo'])) {

    $id = intval($_POST['id']); // Protege contra injeção
    $titulo = trim($_POST['titulo']);
    $editora = trim($_POST['editora']);
    $ano= intval($_POST['ano']);
    $paginas= intval($_POST['paginas']);
    $sinopse = trim($_POST['sinopse']);
    $autor = trim($_POST['autor']);
    $categoria = trim($_POST['categoria']);


    // pega o id da categoria
    $sql = "SELECT * FROM categoria WHERE LOWER(nome) = LOWER(?)";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "s", $categoria);
    $stmt->execute();
    $result = $stmt->get_result();

    $id_categoria = $result->fetch_assoc()['id_categoria'];

     // pega o id do autor
    $sql = "SELECT * FROM autor WHERE LOWER(nome_autor) = LOWER(?)";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "s", $autor);
    $stmt->execute();
    $result = $stmt->get_result();

    $id_autor = $result->fetch_assoc()['id_autor'];


    $titulo = mysqli_real_escape_string($conexao, $_POST['titulo']);

    $sql = "UPDATE livro SET titulo='$titulo', editora = '$editora', ano_publicacao = '$ano',num_paginas = '$paginas',sinopse = '$sinopse',id_autor ='$id_autor',id_categoria = '$id_categoria' WHERE id_livro=$id";

    if (mysqli_query($conexao, $sql)) {
        // Redireciona para listar.php com mensagem de sucesso
        $msg = urlencode('Livro atualizado com sucesso!');
        header("Location: ../php/listar.php?retorno=$msg");
        exit;
    } else {
        // Em caso de erro, exibe mensagem
        echo "Erro ao atualizar livro: " . mysqli_error($conexao);
    }

} else {
    // Acesso direto ou dados inválidos
    $msg = urlencode('Acesso negado!');
    header("Location: ../php/listar.php?retorno=$msg");
    exit;
}

mysqli_close($conexao);
?>
