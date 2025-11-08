<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/paleta.css">
    <link rel="stylesheet" href="../css/tabela_livros.css">
    
</head>

<body>
    <div class = "head"  >
      
        <ul>

        <li> <a href="Home.php">Minha conta</a></li>
        <li> <a href="../Home/Descubra.php">trending</a></li>
        <li> <a href="../Inicio/Inicio.html">Log-out</a></li>
        <li>
            <form action="../Livros/pesquisa.php" method="post"> <input type="text" name="nome" id="nome" placeholder="Pesquisar"></form>
        </li>
        </ul>

        
        

    </div>

    <div class = "meio" style="display: block; text-align: center;">

        <?php
            session_start();
       
            echo  "<h1 >Bem-vindo(a) ".$_SESSION['nome'];
            echo "</h1>" ; 
        ?>
       

        <table>

               <tr>
                  <th colspan="3">
                    <h2>Seus Livros</h2>    
                    </th>
               </tr>
                 
            
            <tr>
                <th>Nome do livro</th>
                <th>Autor</th>
                <th>Data de devolução</th>
            </tr>

            <?php

             include_once('../php/config.php');

                $stmt_emprestimo = mysqli_query($conexao,"SELECT * FROM emprestimo WHERE id_usuario = ". $_SESSION['id']);
           
                while ($emprestimo = mysqli_fetch_assoc($stmt_emprestimo)){

                    $stmt_livro = mysqli_query($conexao,"SELECT * FROM livro WHERE id_livro = ". $emprestimo['id_livro']);
                    
                    while ($livro = mysqli_fetch_assoc($stmt_livro)){

                          $stmt_autor = mysqli_query($conexao,"SELECT * FROM autor WHERE id_autor = ". $livro['id_autor']);
                             while ($autor = mysqli_fetch_assoc($stmt_autor)){
                                 echo "<tr><td>".$livro['titulo']."</td><td>".$autor['nome_autor']."</td><td>".$emprestimo['data_devolucao']."</td></tr>";
                             }
                    }

                }
            ?>
           
             <tr> 
                
                <td style="padding-top: 175px;"><button> Mudar Senha </button></td>
                <td style="padding-top: 175px;"> <button> Mudar Apelido </button></td>
                <td style=" padding-top: 175px; "> <button> Excluir Conta </button></td>

            </tr>


        </table>

         

       

        

    </div>
    
    
</body>
</html>