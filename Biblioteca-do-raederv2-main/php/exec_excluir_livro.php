<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once("../php/config.php");
require_once("../php/verificar_sessao.php");

$id = $_POST['id'] ?? null;
$confirmar = $_POST['confirmar'] ?? null;

if ($id) {
    if ($confirmar === 'sim') {
        // Usuário confirmou a exclusão
        $sql = "DELETE FROM livro WHERE id_livro=$id";

        if (mysqli_query($conexao, $sql)) {

            // Caminho da capa a ser excluída
            $caminhoCapa = "../fotos/" . $id . ".png";

            // Verifica se o arquivo existe e tenta excluir
            if (file_exists($caminhoCapa)) {
                unlink($caminhoCapa);
            }

            $msg = urlencode('Livro excluído com sucesso!');
        } else {
            $msg = urlencode('Erro ao excluir o Livro!');
        }
    } else {
        // Usuário cancelou a exclusão
        $msg = urlencode('Exclusão cancelada!');
    }

    mysqli_close($conexao);
    header("Location: ../php/listar.php?retorno=$msg");
    exit;
} else {
    // Acesso indevido ou ID não enviado
    $msg = urlencode('Acesso negado!');
    header("Location: ../php/listar.php?retorno=$msg");
    exit;
}
?>
