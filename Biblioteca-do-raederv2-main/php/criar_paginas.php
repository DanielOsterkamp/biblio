<?php
include_once('../php/config');

if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
    die("ID do livro inválido"); 
}

$id = intval($_GET['id']);

$stmt = mysqli_prepare($conexao, "
   SELECT l.*, a.nome_autor
   FROM Livro l
   LEFT JOIN Autor a ON l.id_autor = a.id_autor
   WHERE l.id_livro = ?
");

mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_execute($stmt);
mysqli_stmt_get_result($stmt);
 $livro = mysqli_fetch_assoc($result);

if(!$livro){
    die("Livro não encontrado.");
}

// tem que fazer a parte para calcular as cópias disponíveis. 

mysqli_stmt_close($stmt);
mysqli_stmt_close($stmt_emprestimos);
mysqli_close($conexao);

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($livro['titulo']); ?></title>
    <!-- A função htmlspecialchars() converte caracteres especiais em entidades HTML -->
    <link rel="stylesheet" href="../css/paleta.css">
    <link rel="stylesheet" href="../css/livros.css">
</head>

<body>
     <div class="head">
        <ul>
            <li><a href="../Home/Home.php">Minha Conta</a></li>
            <li><a href="../Home/Descubra.html">Trending</a></li>
            <li><a href="../Inicio/Inicio.html">Log-out</a></li>
            <li>
                <form action="../Livros/pesquisa.php" method="post">
                    <input type="text" name="nome" id="nome" placeholder="Pesquisar">
                </form>
            </li>
        </ul>
    </div>

    <div class="meio">
        <table>
            <tr>
                <td rowpan= "7"> 
                    <img src="../fotos/<?php echo $id; ?>.png" alt="Capa do livro" style="max-width: 300px; height: 400px;">
                </td>
            </tr>
            <tr>
                <td colspan="2"> <h1> <?php echo htmlspecialchars($livro['titulo']); ?> </h1> </td>
            </tr>
             <tr>
                <td colspan="2"> <h1> <?php echo htmlspecialchars($livro['nome_autor'] ?? 'Autor desconhecido'); ?> </h1> </td>
                     <!-- Se der erro, é pq fiz com o nome e não id. Dá pra arrumar depois (eu acho) -->
            </tr>
            <tr>
                <td colspan="2"> <h1> <?php echo htmlspecialchars($livro['descricao'] ?? 'Descrição não disponível'); ?> </h1> </td>
            </tr>
            <tr>
                <td> Quantidade de cópias: <?php echo $quantidadeDeCopias ?> </td>
                <td>Quantidade de Cópias Disponíveis: <?php echo max(0, $disponiveis); ?></td>
            <tr>
             <tr>
                <td>
                    <a href="../php/devolverLivro.php?id=<?php echo $id; ?>">
                        <button style="padding: 15px 40px; font-size: 15px;">Devolver</button>
                    </a>
                </td>
                <td>
                    <a href="../php/pegarLivro.php?id=<?php echo $id; ?>&quantidadeDeCopias=<?php echo $quantidadeDeCopias; ?>">
                        <button style="padding: 15px 40px; font-size: 15px;">Pegar</button>
                    </a>
                </td>
            </tr>
        </table>  
    </div>
</body>
</html>