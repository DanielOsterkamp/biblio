<?php
require_once ("../php/config.php");
require_once("../php/verificar_sessao.php");

// Verifica se a requisição é POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'], $_POST['titulo'])) {

    $id = intval($_POST['id']); // Protege contra injeção
    $titulo = mysqli_real_escape_string($conexao, $_POST['titulo']);

    $sql = "UPDATE livro SET titulo='$titulo' WHERE id=$id";

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
