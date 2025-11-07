<?php
//Exibir erros apenas em ambiente de desenvolvimento
//ini_set('display_errors', 0);
//error_reporting(E_ALL);

require_once("../php/config.php");
require_once("../php/verificar_sessao.php");

// Valida o ID recebido
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id <= 0) {
  die("ID inválido.");
}

// Busca o livro pelo ID
$resultado = mysqli_query($conexao, "SELECT * FROM livro WHERE id_livro = $id");
$linha = mysqli_fetch_assoc($resultado);

if (!$linha) {
  die("Produto não encontrado.");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Editar Livro</title>
  <link rel="stylesheet" href="../css/paleta.css">
  <link rel="stylesheet" href="../css/adm.css">
</head>
<body>

<div class="container">

 <!-- Cabeçalho -->
  <header class="header">
      <img src="" alt="">
      <h2>Área Administrativa</h2>
      <nav class="nav">
        <a href="../php/form_cadastrar_livro.php"><button>Cadastrar Livro</button></a>
        <a href="../php/listar.php"><button>Atualizar/Excluir</button></a>
        <a href="../php/sair.php"><button>Sair</button></a>
      </nav>
  </header>
  <!-- Conteúdo principal -->
  <main class="card" style="max-width: 500px; margin: 50px auto; padding: 30px;">
    <h1 class="h1 text-center">Editar Livros</h1>
    <p class="lead text-center">Atualize as informações do livro selecionado.</p>

    <form action="../php/exec_atualizar_livro.php" method="post" class="form mt-6">
      <input type="hidden" name="id" value="<?php echo htmlspecialchars($linha['id_livro']); ?>">

      <!-- titulo -->
      <div class="form-group">
        <label for="nome">Título do Livro:</label>
        <input 
          type="text" 
          id="titulo" 
          name="titulo" 
          value="<?php echo htmlspecialchars($linha['titulo']); ?>" 
          placeholder="Digite o novo título" 
          required
        >
      </div>
      
      <!-- editora -->
      <div class="form-group">
        <label for="nome">Editora do Livro:</label>
        <input 
          type="text" 
          id="editora" 
          name="editora" 
          value="<?php echo htmlspecialchars($linha['editora']); ?>" 
          placeholder="Digite a nova editora" 
          required
        >
      </div>

      <!-- ano -->
      <div class="form-group">
        <label for="nome">Ano de publicação:</label>
        <input 
          type="number" 
          id="ano" 
          name="ano" 
          value="<?php echo htmlspecialchars($linha['ano_publicacao']); ?>" 
          placeholder="Digite o novo ano de publicação" 
          required
        >
      </div>
      <!-- paginas -->
      <div class="form-group">
        <label for="nome">Numero de Páginas:</label>
        <input 
          type="number" 
          id="paginas" 
          name="paginas" 
          value="<?php echo htmlspecialchars($linha['num_paginas']); ?>" 
          placeholder="Digite o novo numero de paginas" 
          required
        >
      </div>
       <!-- sinopse -->
      <div class="form-group">
        <label for="nome">Sinopse:</label>
        <input 
          type="text" 
          id="sinopse" 
          name="sinopse" 
          value="<?php echo htmlspecialchars($linha['sinopse']); ?>" 
          placeholder="Digite a nova sinopse" 
          required
        >
      </div>
       <!-- autor -->
      <div class="form-group">
        <label for="nome">Autor:</label>
        <input 
          type="text" 
          id="autor" 
          name="autor" 
          value="
          <?php 
          $resultado_autor = mysqli_query($conexao, "SELECT * FROM autor WHERE id_autor =".$linha['id_autor']);
           $linha_autor = mysqli_fetch_assoc($resultado_autor);
          echo htmlspecialchars($linha_autor['nome_autor']); 
          ?>" 
          placeholder="Digite o novo autor" 
          required
        >
      </div>

       <!-- categoria -->
      <div class="form-group">
        <label for="nome">Categoria:</label>
        <input 
          type="text" 
          id="categoria" 
          name="categoria" 
          value="
          <?php 
          $resultado_categoria = mysqli_query($conexao, "SELECT * FROM categoria WHERE id_categoria =".$linha['id_categoria']);
           $linha_categoria = mysqli_fetch_assoc($resultado_categoria);
          echo htmlspecialchars($linha_categoria['nome']); 
          ?>" 
          placeholder="Digite a nova categoria" 
          required
        >
      </div>

      <div class="text-center mt-6">
        <button type="submit" class="btn">Atualizar</button>
        <a href="../php/listar.php" class="btn ghost"><button  class="btn">Voltar</button> </a>
      </div>
    </form>

  </main>

  <!-- Rodapé -->
  <footer class="footer text-center">
    <p>Wise Library 2025&copy;</p>
  </footer>

</div>

</body>
</html>