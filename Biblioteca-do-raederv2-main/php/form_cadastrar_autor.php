<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Cadastrar Autor</title>
  <link rel="stylesheet" href="../css/paleta.css">
  <link rel="stylesheet" href="../css/adm.css">
</head>
<body>

<?php
// Exibir erros apenas em ambiente de desenvolvimento
ini_set('display_errors', 0);
error_reporting(E_ALL);

require_once("../php/config.php");
require_once("../php/verificar_sessao.php");

    $autor = $_GET['autor'];
    $titulo = $_GET['titulo'];
    $capa = $_GET['capa'];
    $ano = $_GET['ano'];
    $editora = $_GET['editora'];
    $numero = $_GET['numero'];
    $sinopse = $_GET['sinopse'];
    $categoria = $_GET['categoria'];
    $copias = $_GET['copias'];
    $mensagem = $_GET['mensagem'];
    $nome = $_POST['nome'];

?>
<div class="container">

  <!-- Cabeçalho -->
  <header class="header">
      <img src="" alt="">
      <h2>Área Administrativa</h2>
      <nav class="nav">
      <a href="../php/form_cadastrar_livro.php"><button>Cadastrar Livros</button></a>
      <a href="../php/listar.php"><button>Atualizar/Excluir</button></a>
      <a href="../php/Estatisticas.php"><button>Estatísticas</button></a>
      <a href="../php/sair.php" class="btn small ghost"><button>Sair</button></a>
      </nav>
  </header>


  <!-- Conteúdo -->
  <main class="card" >


  <!-- caso o usuario tenha vindo pelo erro de autor não encontrado do exec_cadastrar_livro, mostra essa mensagem-->
 

    <h1 class="h1 text-center">Cadastro de Autor</h1>

     <?php
  if ($autor){ 
    echo '<h2 >Autor '.$autor .' não encontrado, cadastre ele</h2>';
  }
  ?>

    <br>

    <p class="lead text-center">Preencha os dados abaixo para incluir um novo Autor</p>

   <form action="<?php echo '../php/exec_criar_autor.php?autor=' . $autor .'&titulo=' . $titulo .'&capa=' . $quant_copias .'&ano=' . $ano .'&editora=' . $editora .'&numero=' . $numero .'&sinopse=' . $sinopse . '&categoria=' . $categoria . '&copias=' . $copias; ?>"  method="post" enctype="multipart/form-data"  class="form mt-6">
      <div class="form-group">
        <label for="nome">Nome do Autor:</label>

        <!-- caso o usuario tenha vindo pelo erro de autor não encontrado do exec_cadastrar_livro, ele preenche essa parte automaticamente -->
        <input type="text" name="nome" id="nome"
         <?php 
          if ($autor){
            echo 'value="'.$autor.'"';
          } else{
            echo 'placeholder="Nome Autor"'; 
          }
         ?> required>


      </div>

      <div class="form-group">
        <label for="data">Data de Nascimento:</label>
        <input type="date" name="data" id="data" required>
      </div>

      <div class="form-group">
        <label for="nacionalidade">Nacionalidade:</label>
        <input type="text" name="nacionalidade" id="nacionalidade" placeholder="" required>
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
