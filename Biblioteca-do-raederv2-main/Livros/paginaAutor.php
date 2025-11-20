<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../css/paleta.css">
    <link rel="stylesheet" href="../css/home.css">
</head>

<body>
    <div class="head">
        <ul>

            <li> <a href="../Home/Home.php">Minha conta</a></li>
            <li> <a href="../Home/Descubra.php">Trending</a></li>
            <li> <a href="../php/sair.php">Log-out</a></li>
            <li>
                <form action="../Livros/pesquisa.php" method="post"> <input type="text" name="nome" id="nome" placeholder="Pesquisar"></form>
            </li>
        </ul>
    </div>

        <h1 style="text-align: center"><?php echo $_GET['autor']?></h1>

   <?php

   include_once('../php/config.php');

   //função para auxiliar a exibir as categorias
   function exibirCategoria($titulo) {

    
     global $conexao;
     $stmt = $conexao->prepare("SELECT l.id_livro, l.titulo, a.nome_autor 
        FROM livro l 
        JOIN autor a 
        ON l.id_autor = a.id_autor 
        WHERE a.nome_autor = ? 
        LIMIT 7");

     $stmt->bind_param("s",$titulo);
     $stmt->execute();
     $result = $stmt->get_result();

     echo " <div class='meio'> <table> <tr>";

     while($livro = $result->fetch_assoc()) {
         $endereco_livro;
            $id = $livro['id_livro'];

            if (file_exists("../fotos/$id.jpg")){
                $endereco_livro = "../fotos/".$id.".jpg";
            }elseif (file_exists("../fotos/$id.png")){
                $endereco_livro = "../fotos/".$id.".png";
            }
        echo "<td>
         <a href='../Livros/livroPadrao.php?id={$livro['id_livro']}&mensagem='><img src='$endereco_livro' alt='{$livro['titulo']}'></a>
         <h3>{$livro['titulo']}</h3>
         </td>";
     }

     echo "</tr></table></div>";
     $stmt->close();
   }

   exibirCategoria( $_GET['autor']);
  

     echo "</tr></table></div>";
    
     $conexao->close();
   ?>

   

</body>

</html>