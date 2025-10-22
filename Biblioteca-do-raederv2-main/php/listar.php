<?php
require_once("../php/config.php");
require_once("../php/verificar_sessao.php");

// Consulta os livros
$resultado = mysqli_query($conexao, "SELECT * FROM livro");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Lista de Livros</title>
  <link rel="stylesheet" href="../css/paleta.css">
</head>
<body>

<div class="container">

  <!-- Cabeçalho -->
  <header class="header">
    <a href="#" class="brand">
      <img src="" alt="">
      <span>Área Administrativa</span>
    </a>
    <nav class="nav">
      <a href="../php/form_cadastrar_livro.php" class="btn small">Cadastrar Livro</a>
      <a href="../php/listar.php" class="btn small">Listar</a>
      <a href="../php/sair.php" class="btn small ghost">Sair</a>
    </nav>
  </header>

  <!-- Conteúdo principal -->
  <main class="card" style="padding: 30px;">
    <h1 class="h1 text-center">Lista de Livros</h1>
    <p class="lead text-center">Gerencie os livros cadastrados no sistema.</p>

    <!-- Mensagem de retorno -->
    <?php
      if (isset($_GET['retorno'])) {
          $retorno = $_GET['retorno'];
          if ($retorno === 'Livro excluído com sucesso!') {
              echo '<div class="mensagem-sucesso text-center mt-6">' . htmlspecialchars($retorno) . '</div>';
          } elseif ($retorno === 'Exclusão cancelada!') {
              echo '<div class="mensagem-sucesso text-center mt-6">' . htmlspecialchars($retorno) . '</div>';
          } elseif ($retorno === 'Livro atualizado com sucesso!') {
              echo '<div class="mensagem-sucesso text-center mt-6">' . htmlspecialchars($retorno) . '</div>';
          }
      }
    ?>

    <div class="mt-6">
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome do Livro</th>
            <th style="width:150px;">Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($linha = mysqli_fetch_assoc($resultado)) { ?>
            <tr>
              <td><?php echo htmlspecialchars($linha['id']); ?></td>
              <td><?php echo htmlspecialchars($linha['nome']); ?></td>
              <td class="actions">
                <a href="form_editar.php?id=<?php echo $linha['id']; ?>" class="btn small">Atualizar</a>
                <a href="confirmar_excluir.php?id=<?php echo $linha['id']; ?>" class="btn small danger">Excluir</a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>

    <?php
      mysqli_close($conexao);
    ?>

  </main>

  <!-- Rodapé -->
  <footer class="footer text-center">
    <p>Wise Library 2025&copy;</p>
  </footer>

</div>
</body>
</html>
