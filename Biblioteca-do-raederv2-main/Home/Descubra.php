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

            <li> <a href="Home.php">Minha conta</a></li>
            <li> <a href="Descubra.html">Trending</a></li>
            <li> <a href="../Inicio/Inicio.html">Log-out</a></li>
            <li>
                <form action="../Livros/pesquisa.php" method="post"> <input type="text" name="nome" id="nome" placeholder="Pesquisar"></form>
            </li>
        </ul>
    </div>

   <?php

   include_once('../php/config.php');

   //função para auxiliar a exibir as categorias
   function exibirCategoria($categoria,$titulo) {
     global $conexao;
     $stmt = $conexao->prepare("SELECT l.id_livro, l.titulo, a.nome_autor 
        FROM livro l 
        JOIN autor a 
        ON l.id_autor = a.id_autor 
        WHERE l.categoria = ? 
        LIMIT 7");

     $stmt->bind_param("s",$categoria);
     $stmt->execute();
     $result = $stmt->get_result();

     echo "<h2> $titulo </h2> <div class="meio"> <table> <tr>";

     while($livro = $result->fetch_assoc()) {
        echo "<td>
         <a href='../php/criar_paginas.php?id={$livro['id_livro']}'><img src='../fotos/{$livro['id_livro']}.png' alt='{$livro['titulo']}'></a>
         <h3>{$livro['titulo']}</h3>
         </td>";
     }

     echo "</tr></table></div>";
     $stmt->close();
   }

   exibirCategoria('Clássicos', 'Clássicos');
   exibirCategoria('Infanto-juvenil', 'Infanto-juvenil');

   // livro + procurados 

   $stmt = $conexao->prepare("SELECT * FROM livros_mais_procurados LIMIT 7");
   $stmt->execute();
   $result = $stmt->get_result();
   echo "<h2> Livros mais procurados </h2>
    <div class="meio"> <table> <tr>";

   while($livro = $result->fetch_assoc()) {
        echo "<td>
         <a href='../php/criar_paginas.php?id={$livro['id_livro']}'><img src='../fotos/{$livro['id_livro']}.png' alt='{$livro['titulo']}'></a>
         <h3>{$livro['titulo']}</h3>
         </td>";
    }

     echo "</tr></table></div>";
     $stmt->close();
     $conexao->close();
   ?>

    <div class="rodape1">
        <p >WiseLibrary</p>
    </div>


</body>

</html>