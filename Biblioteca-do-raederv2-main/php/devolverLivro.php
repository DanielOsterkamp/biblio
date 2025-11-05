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


      header('location: ../livros/livroPadrao.php?id='.$id."&mensagem=".$mensagem );
                

?>
