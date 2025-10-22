<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Cadastrar Livro</title>
  <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>

<?php
// Exibir erros apenas em ambiente de desenvolvimento
ini_set('display_errors', 0);
error_reporting(E_ALL);

require_once("../php/config.php");
require_once("../php/verificar_sessao.php");
?>
<div class="container">

  <!-- Cabeçalho -->
  <header class="header">
    <a href="#" class="brand">
      <img src="" alt="">
      <span>Área Administrativa</span>
    </a>
    <nav class="nav">
      <a href="../php/form_cadastrar_livro.php" class="btn small">Cadastrar Livro</a>
      <a href="../php/listar.php">Atualizar/Excluir</a>
      <a href="../php/sair.php" class="btn small ghost">Sair</a>
    </nav>
  </header>

  <!-- Conteúdo -->
  <main class="card" style="max-width: 500px; margin: 50px auto; padding: 30px;">
    <h1 class="h1 text-center">Cadastro de Livros</h1>
    <p class="lead text-center">Preencha os dados abaixo para incluir um novo livro.</p>

    <form action="../php/exec-cadastrar.php" method="post" enctype="multipart/form-data" class="form mt-6">

      <div class="form-group">
        <label for="titulo">Título do Livro:</label>
        <input type="text" name="titulo" id="titulo" placeholder="Digite o título do produto" required>
      </div>

      <div class="form-group">
        <label for="capa">Capa do Livro:</label>
        <input type="file" name="capa" id="capa" accept="image/*">
      </div>

      <div class="form-group">
        <label for="autor">Autor:</label>
        <input type="file" name="autor" id="autor" placeholder="Digite o nome do autor" required>
      </div>

      <div class="form-group">
        <label for="ano_publi">Ano de Publicação:</label>
        <input type="number" name="ano_publi" id="ano_publi" placeholder="Digite o ano de publicação" required>
      </div>

      <div class="form-group">
        <label for="editora">Editora:</label>
        <input type="text" name="editora" id="editora" placeholder="Digite o nome de editora" required>
      </div>

      <!-- transformar em tipo select, pegando categorias já cadastradas no banco  -->
      <div class="form-group">
        <label for="categoria">Categoria:</label>
        <input type="" name="categoria" id="categoria" placeholder="" required>
      </div>

      <div class="text-center mt-6">
        <button type="submit" class="btn">Cadastrar</button>
      </div>
    </form>
    <?php
      //Exibir alerta de sucesso se houver retorno na URL
      if (isset($_GET['retorno']) && $_GET['retorno'] === 'ok') {
        echo '<div class="mensagem-sucesso text-center mt-6">Livro cadastrado com sucesso!</div>';
      }
    ?>
  </main>
  <!-- Rodapé -->
  <footer class="footer text-center">
    <p>Wise Library 2025 &copy; </p>
  </footer>
</div>
</body>
</html>
