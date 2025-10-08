    <?php

    session_start(); // basicamente pega os dados do usuario logado

    $id = $_GET['id'];

    include_once('config.php');

    $stmt = $conexao->prepare("DELETE FROM emprestimo WHERE id_usuario = ? AND id_livro = ?  LIMIT 1;");
    if (!$stmt) {
        die("Erro no prepare: " . $conexao->error);
     }

    $stmt->bind_param("ss", $_SESSION['id'],$id); // mudar o "sss" para quantidade de variaveis

     if (!$stmt->execute()) {
        die("Erro no execute: " . $stmt->error);
     }

     if ($stmt->affected_rows > 0){ 
           $mensagem = "Devolvido com sucesso";  // essa é a mensagem que vai aparecer no php do include
        }else{
            $mensagem = "Você não pegou esse livro emprestado";
     } 

         if ($id == 1) {
            include '../livros/orgulhoepreconceito.php'; // esse include simula o outro php
         } elseif ($id == 2) {
            include '../livros/emma.php';
         } elseif ($id == 3) {
            include '../livros/mvu.php';
         } elseif ($id == 4) {
            include '../livros/noitesbrancas.php';
         } elseif ($id == 5) {
            include '../livros/memorias.php';
         } elseif ($id == 6) {
            include '../livros/diario.php';
         } elseif ($id == 7) {
            include '../livros/diario2.php';
         } elseif ($id == 8) {
            include '../livros/vbsa.php';
         } elseif ($id == 9) {
            include '../livros/ahora.php';
         } else {
            echo "Livro não encontrado.";
         }
                

?>
