<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emma</title>
    <link rel="stylesheet" href="../css/paleta.css">
    <link rel="stylesheet" href="../css/livros.css">
</head>
<body>
    <div class="head">
        <ul>
            <li><a href="../Home/Home.php">Minha Conta</a></li>
            <li><a href="../Home/Descubra.html">Trending</a></li>
            <li><a href="../Inicio/index.html">Log-out</a></li>
            <li>
                <form action="pesquisa.php" method="post">
                    <input type="text" name="nome" id="nome" placeholder="Pesquisar">
                </form>
            </li>
        </ul>
    </div>

    <div class="meio">
        <table>
            <tr>
                <td rowspan="7">
                    <img src="https://m.media-amazon.com/images/I/71COwZu-WbL._SY466_.jpg" alt="">
                </td>
            </tr>
            <tr><td colspan="2"><h1>Emma</h1></td></tr>
            <tr><td colspan="2">Jane Austen</td></tr>
            <tr>
                <td colspan="2">
                     Publicado pela primeira vezem 1815, antes de iniciar a obra, Jane Austen escreveu: 
                     Vou escolher uma heroína que, exceto eu, ninguém vai gostar muito. 
                     Neste romance, temos a mais independente das protagonistas da autora, 
                     além das qualidades magistrais que transformariam seus livros em grandes clássicos da literatura universal:
                     a leveza perspicaz da comédia de costumes, a voz narrativa única, a engrenagem primorosa do enredo, 
                     a comicidade dos diálogos e a observação arguta sobre o espaço da mulher em um mundo masculino.
                </td>
            </tr>

            <?php

                $quantidadeDeCopias = 3;
                $id = 2;

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

                    echo  "<tr>";
                    echo "<td > <a href=../php/devolverLivro.php?id=".$id.'><button style="padding: 15px 40px; font-size: 15px;" > Devolver</button></a></td>';
                    echo "<td > <a href=../php/pegarLivro.php?id=".$id.'&quantidadeDeCopias='.$quantidadeDeCopias.'><button style="padding: 15px 40px; font-size: 15px;" > Pegar </button></a></td>';
                    echo "</tr>";

                ?>

        </table>

         <p> <?php if (isset($mensagem)) echo $mensagem; ?></p>   <!-- essa mensagem vai ser mostrada pelos phps que derem include nessa pagina -->

    </div>
</body>
</html>

