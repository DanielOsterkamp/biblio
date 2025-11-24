<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Cadastrar Livro</title>
  <link rel="stylesheet" href="../css/paleta.css">
  <link rel="stylesheet" href="../css/adm.css">
  
</head>
<body>

<?php
ini_set('display_errors', 0);
error_reporting(E_ALL);

require_once("../php/config.php");
require_once("../php/verificar_sessao.php");

$titulo = $_GET['titulo'];
$capa = $_GET['capa'];
$ano = $_GET['ano'];
$editora = $_GET['editora'];
$numero = $_GET['numero'];
$sinopse = $_GET['sinopse'];
$categoria = $_GET['categoria'];
$copias = $_GET['copias'];
$autor = $_GET['autor'];
$mensagem = $_GET['mensagem'];
?>
<div class="container">

  <!-- Cabeçalho -->
  <header class="header">
      <img src="" alt="">
      <h2>Área Administrativa</h2>
      <nav class="nav">
        <a href="../php/form_cadastrar_livro.php"><button>Cadastrar Livro</button></a>
        <a href="../php/listar.php"><button>Atualizar/Excluir</button></a>
        <a href="../php/sair.php"><button>Sair</button></a>
        <a href="../php/form_cadastrar_autor.php"><button>Cadastrar Autor(a)</button></a>
      </nav>
  </header>

  <!-- Conteúdo -->
  <main class="card">

    <?php
      if ($mensagem){
        echo '<h1 class="h1 text-center">'.$mensagem.'</h1>';
      }
    ?>

    <h1 class="h1 text-center">Cadastro de Livros</h1>
    <p class="lead text-center">Preencha os dados abaixo para incluir um novo livro.</p>

    <form action="../php/exec_cadastrar_livro.php" method="post" enctype="multipart/form-data">

      <table class="form-table">

        <tr>
          <td><label for="titulo">Título do Livro:</label></td>
          <td><input type="text" name="titulo" id="titulo" 
          <?php 
              if ($titulo){
                echo 'value="'.$titulo.'"';
              } else{
                echo 'placeholder="Título"'; 
              }
            ?>
             required></td>
        </tr>

        <tr>
          <td><label for="capa">Capa do Livro:</label></td>
          <td><input type="file" name="capa" id="capa" accept="image/*" 
          <?php 
              if ($capa){
                echo 'value="'.$capa.'"';
              } else{
                echo 'placeholder="Capa do Livro"'; 
              }
            ?>
            ></td>
        </tr>

        <tr>
          <td><label for="autor">Autor:</label></td>
          <td>
            <input type="text" name="autor" id="autor"
            <?php 
              if ($autor){
                echo 'value="'.$autor.'"';
              } else{
                echo 'placeholder="Nome Autor"'; 
              }
            ?> required>
          </td>
        </tr>

        <tr>
          <td><label for="ano_publi">Ano de Publicação:</label></td>
          <td><input type="number" name="ano_publi" id="ano_publi"
          <?php 
              if ($ano){
                echo 'value="'.(int)$ano.'"';
              } else{
                echo 'placeholder="Ano de Publicação"'; 
              }
            ?>
             required></td>
        </tr>

        <tr>
          <td><label for="editora">Editora:</label></td>
          <td><input type="text" name="editora" id="editora" 
          <?php 
              if ($editora){
                echo 'value="'.$editora.'"';
              } else{
                echo 'placeholder="editora"'; 
              }
            ?>
             required></td>
        </tr>

        <tr>
          <td><label for="paginas">Número de Páginas:</label></td>
          <td><input type="number" name="paginas" id="paginas"
          <?php 
              if ($numero){
                echo 'value="'.(int)$numero.'"';
              } else{
                echo 'placeholder="Número de páginas"'; 
              }
            ?>
            required></td>
        </tr>

        <tr>
          <td><label for="sinopse">Sinopse:</label></td>
          <td><input type="text" name="sinopse" id="sinopse" 
          <?php 
              if ($sinopse){
                echo 'value="'.$sinopse.'"';
              } else{
                echo 'placeholder="Sinopse"'; 
              }
            ?>
             required></td>
        </tr>

        <tr>
          <td><label for="categoria">Categoria:</label></td>
          <td><input type="text" name="categoria" id="categoria" 
          <?php 
              if ($categoria){
                echo 'value="'.$categoria.'"';
              } else{
                echo 'placeholder="Categoria"'; 
              }
            ?>
             required></td>
        </tr>

        <tr>
          <td><label for="copias">Número de Cópias:</label></td>
          <td><input type="number" name="copias" id="copias" 
          <?php 
              if ($copias){
                echo 'value="'.(int)$copias.'"';
              } else{
                echo 'placeholder="Copias"'; 
              }
            ?>required></td>
        </tr>

      </table>

      <div class="text-center mt-6">
        <button type="submit" class="btn">Cadastrar</button>
      </div>
    </form>

    <?php
      if (isset($_GET['retorno']) && $_GET['retorno'] === 'ok') {
        echo '<div class="mensagem-sucesso text-center mt-6">Livro cadastrado com sucesso!</div>';
      }
    ?>
  </main>

  <footer class="footer text-center">
    <p>Wise Library 2025 &copy;</p>
  </footer>
</div>
</body>
</html>