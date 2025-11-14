
<?php
       $id = $_GET['id'];
        //$id = 6;
        
        include_once('../php/config.php');

        

        $stmt = $conexao->prepare("SELECT Livro.sinopse, Livro.quant_copias, Livro.titulo, autor.nome_autor AS nome_autor
        FROM Livro
        JOIN autor ON Livro.id_autor = autor.id_autor
        WHERE Livro.id_livro = ?;");
        
         $stmt->bind_param("s", $id); 
         $stmt->execute();
         $result = $stmt->get_result();
         
         $nome;
         $autor;
         $descricao;
         $quantidadeDeCopias;

         if ($row = $result->fetch_assoc()){
            $nome = $row["titulo"];
            $autor = $row["nome_autor"];
            $descricao = $row["sinopse"];
            $quantidadeDeCopias = $row["quant_copias"];
         } 
      

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $nome;?></title>

    <link rel="stylesheet" href="../css/paleta.css">
    <link rel="stylesheet" href="../css/livros.css">


   
</head>
<body>
    <div class = "head">
      
        <ul>

        <li> <a href="../Home/Home.php">minha conta</a></li>
        <li> <a href="../Home/Descubra.php">trending</a></li>
        <li> <a href="../Inicio/index.html">log-out</a></li>
        <li> <form action="../Livros/Pesquisa.php" method="post"> <input type="text" name="nome" id="nome" style="height: 17px;" placeholder="Pesquisar"></form></li>
        </ul>

    </div>

    <div class = "meio" >

        

        <table>

               <tr>
                  <td rowspan="7">
                    <img src="<?php 
                    if (file_exists("../fotos/$id.jpg")){
                        echo "../fotos/".$id.".jpg";
                    }elseif (file_exists("../fotos/$id.png")){
                        echo "../fotos/".$id.".png";
                    }
                    
                    ?>

                    "  alt="" >

                    </td>
               </tr>
               <tr>
                <td colspan="2"><h1><?php echo $nome;?></h1></td>
               </tr>

               <tr>
                <td colspan="2"><?php echo $autor;?></td>   
               </tr>
               
               <tr>
                <td colspan="2" ><?php echo $descricao;?></td>
               </tr>
                
              <?php


                echo "<tr> <td>Quantidade de Cópias: ".$quantidadeDeCopias ."</td>";


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

                    echo  "<tr>";
                    echo "<td > <a href=../php/devolverLivro.php?id=".$id.'><button style="padding: 15px 40px; font-size: 15px;" > Devolver</button></a></td>';
                    echo "<td > <a href=../php/pegarLivro.php?id=".$id.'&quantidadeDeCopias='.$quantidadeDeCopias.'><button style="padding: 15px 40px; font-size: 15px;" > Pegar </button></a></td>';
                    echo "</tr>";

                ?>
        </table>
                      <p> <!-- essa mensagem vai ser mostrada pelos phps que derem include nessa pagina -->
                        <?php 
                            $mensagem = $_GET['mensagem']; 
                            if ($mensagem){ 
                                echo $mensagem;
                                }  
                        ?>
                    </p> 
    </div>
                  
</body>
</html>