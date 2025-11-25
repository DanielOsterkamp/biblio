<?php
session_start();
include_once('../php/config.php');

$mensagem = isset($_GET['retorno']) ? $_GET['retorno'] : null;

$idUsuario = $_SESSION['id'];

$sql = "SELECT 
            livro.titulo,
            autor.nome_autor,
            emprestimo.data_devolucao
        FROM emprestimo
        JOIN livro ON emprestimo.id_livro = livro.id_livro
        JOIN autor ON livro.id_autor = autor.id_autor
        WHERE emprestimo.id_usuario = ?";

$stmt = $conexao->prepare($sql);
$stmt->bind_param("i", $idUsuario);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/paleta.css">
    <link rel="stylesheet" href="../css/tabela_livros.css">

    <style>
        /* Rodapé no estilo do Descubra */
        footer {
            width: 100%;
            background-color: var(--cor4); /* mesma cor do header */
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: 50px;
            font-size: 15px;
            letter-spacing: 0.5px;
        }
    </style>
</head>

<body>

    <div class="head">
        <ul>
            <li><a href="Home.php">Minha conta</a></li>
            <li><a href="../Home/Descubra.php">Trending</a></li>
            <li><a href="../php/sair.php">Log-out</a></li>
            <li>
                <form action="../Livros/pesquisa.php" method="post">
                    <input type="text" name="nome" id="nome" placeholder="Pesquisar">
                </form>
            </li>
        </ul>
    </div>

    <div class="meio" style="text-align:center; display:block;">

        <?php
            if ($mensagem) {
                echo "<h3 style='margin-top:20px;'>$mensagem</h3>";
            }

            echo "<h1>Bem-vindo(a) " . $_SESSION['nome'] . "</h1>";
        ?>

        <table>
            <tr>
                <th colspan="3"><h2>Seus Livros</h2></th>
            </tr>

            <tr>
                <th>Nome do Livro</th>
                <th>Autor</th>
                <th>Data de Devolução</th>
            </tr>

            <?php
        
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                        echo "<td>{$row['titulo']}</td>";
                        echo "<td>{$row['nome_autor']}</td>";
                        echo "<td>{$row['data_devolucao']}</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>Você não possui nenhum livro emprestado.</td></tr>";
            }
            ?>
            
            <tr>
                <td style="padding-top: 150px;">
                    <button onclick="window.location.href='mudar_senha.php'">Mudar senha</button>
                </td>

                <td style="padding-top: 150px;">
                    <button onclick="window.location.href='mudar_apelido.php'">Mudar Apelido</button>
                </td>

                <td style="padding-top: 150px;">
                    <button onclick="window.location.href='excluir_conta.php'">Excluir Conta</button>
                </td>
            </tr>
        </table>
    </div>

    <footer class="footer-wiselibrary">
       <p>Wise Library</p>
    </footer>


</body>
</html>
