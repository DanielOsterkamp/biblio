<?php

$nome = $_POST['nome'];

            include_once('../php/config.php');

            $stmt = mysqli_query($conexao,"SELECT * FROM livro");
           
            while ($livro = mysqli_fetch_assoc($stmt)){

            if(strcasecmp($nome, $livro['titulo']) == 0){
                 header("Location: livroPadrao.php?id=".$livro['id_livro']."&mensagem=");
            }

            }


echo "esse livro n existe, peça para os devs colocarem esse livro <3"
    
?>