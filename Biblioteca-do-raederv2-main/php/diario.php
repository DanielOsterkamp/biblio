<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../css/paleta.css">
    <link rel="stylesheet" href="../css/livros.css">


   
</head>
<body>
    <div class = "head"  style="display: block; text-align: center; background-color: #1E56A0; height: 40px;" >
      
        <ul>

        <li> <a href="../Home/Home.php">minha conta</a></li>
        <li> <a href="../Home/Descubra.html">trending</a></li>
        <li> <a href="../Inicio/Inicio.html">log-out</a></li>
        <li> <form action="../Livros/Pesquisa.php" method="post"> <input type="text" name="nome" id="nome" style="height: 17px;" placeholder="Pesquisar"></form></li>
        </ul>

        
        

    </div>

    <div class = "meio" style="display: block; text-align: center;">

        

        <table style="margin-top: 175px;">

               <tr>
                  <td rowspan="6">
                    <img src="https://m.media-amazon.com/images/I/71fWaI5myqL._UF1000,1000_QL80_.jpg" alt="" style="height: 500px; width: 333px;"> 
                    </td>
               </tr>
               <tr>
                <td colspan="2"><h1>Diário de um banana</h1></td>
               </tr>

               <tr>
                <td colspan="2">Jeff Kinney</td>   
               </tr>
               
               <tr>
                <td colspan="2" style="width: 50%;height: 100%;">O protagonista é Greg Heffley, um garoto no ensino fundamental que registra seu dia a dia cheio de situações engraçadas, dramas escolares, família atrapalhada e amizade complicada com seu melhor amigo, Rowley Jefferson.

O livro mostra de forma leve e humorada os desafios de crescer, lidar com colegas populares, professores, irmãos irritantes e a vontade de ser aceito.</td>
               </tr>
                
              <?php

              $quantidadeDeCopias = 5;
              $id = 6;

              echo "<tr> <td>Quantidade de Cópias: ".$quantidadeDeCopias ."</td>";

              

                include_once('../php/config.php');

                $stmt = $conexao->prepare("SELECT * FROM Emprestimo WHERE id_livro = ?");
                if (!$stmt) {
                    die("Erro no prepare: " . $conexao->error);
                }

                $stmt->bind_param("s", $id); // mudar o "sss" para quantidade de variaveis

                if (!$stmt->execute()) {
                    die("Erro no execute: " . $stmt->error);
                }

                $result = $stmt->get_result();

          

                if ($result->num_rows > 0){
                    echo  "<td>Quantidade de Cópias Disponiveis: ". $quantidadeDeCopias- (int)$result->num_rows. "</td> </tr>";
                }else{
                 echo "<td>Quantidade de Cópias Disponiveis: ". $quantidadeDeCopias. "</td> </tr>";
                } 

                ?>

               <tr>
                <td > <a href="devolverLivro.php"><button style="padding: 15px 40px; font-size: 15px;" > Devolver</button></a></td>
                <td > <a href="pegarLivro.php"><button style="padding: 15px 40px; font-size: 15px;" > Pegar </button></a></td>
               </tr>
                 


        </table>

         

       

        

    </div>
    
    
</body>
</html>