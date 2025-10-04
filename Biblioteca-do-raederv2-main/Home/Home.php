<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="../css/paleta.css">
    <link rel="stylesheet" href="../css/home.css">
</head>

<body>
    <div class = "head"  >
      
        <ul>

        <li> <a href="Home.php">Minha conta</a></li>
        <li> <a href="Descubra.html">Trending</a></li>
        <li> <a href="../Inicio/Inicio.html">Log-out</a></li>
        <li>
            <form action="../Livros/pesquisa.php" method="post"> <input type="text" name="nome" id="nome" placeholder="Pesquisar"></form>
        </li>
        </ul>

        
        

    </div>

    <div class = "meio" style="display: block; text-align: center;">

        <?php
            session_start();
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo  "<h1 >Bem-vindo(a) ".$_SESSION['nome'];
            echo "<h1> id: ".$_SESSION['id'];
            echo "</h1>" ; 
        ?>
       

        <table>

               <tr>
                  <th colspan="3">
                    <h2>Seus Livros</h2>    
                    </th>
               </tr>
                 
            </tr>
            <tr>
                <th>Nome do livro</th>
                <th>Autor</th>
                <th>Data de devolução</th>
            </tr>
            <tr>
                <td>Diário de um Banana</td><td>Jeff Kinney</td><td>24/09</td>
            </tr>
            <tr>
                <td>A Hora da Estrela</td><td>Clarice Lispector</td><td>15/07</td>
            </tr>
            <tr>
                <td>Memórias do Subsolo</td><td>Dostoiévski</td><td>12/08</td>
             <tr> 
                
                <td style="padding-top: 275px;">
                          <button> Mudar Senha </button>
                </td>

                <td style="padding-top: 275px;"> <button> Mudar Apelido </button></td>
                <td style=" padding-top: 275px; "> <button> Excluir Conta </button></td>

            </tr>


        </table>

         

       

        

    </div>
    
    
</body>
</html>