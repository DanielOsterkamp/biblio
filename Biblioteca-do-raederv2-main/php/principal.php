<?php
// Habilita a exibição de erros na página (0 = desativado)
ini_set('display_errors', 0);
error_reporting(E_ALL);

require_once '../php/verificar_sessao.php'; 
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Administração - Biblioteca</title>
  <link rel="stylesheet" href="../css/paleta.css">
</head>
<body>

<div class="container">

  <!-- Cabeçalho -->
  <header class="header">
    <a href="#" class="brand">
      <span>Cadastro de Livros</span>
    </a>
    <nav class="nav">
      <a href="../php/form_cadastrar_livro.php">Cadastrar</a>
      <a href="../php/listar.php">Atualizar/Excluir</a>
      <a href="../php/sair.php" class="btn small ghost">Sair</a>
    </nav>
  </header>

  <!-- Conteúdo principal -->
  <main class="card text-center" style="padding: 40px;">
    <p class="lead">Bem-vindo à área administrativa.</p>

    <div class="mt-6">
      <img src="../img/restrito.png" alt="Área restrita" style="max-width:220px; opacity:0.9;">
    </div>
  </main>

  <!-- Rodapé -->
  <footer class="footer text-center">
    <p> Wise Library 2025&copy;</p>
  </footer>

</div>

</body>
</html>
