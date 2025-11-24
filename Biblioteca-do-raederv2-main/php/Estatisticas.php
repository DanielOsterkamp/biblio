<?php
// Habilita a exibição de erros na página (0 = desativado)



require_once '../php/verificar_sessao.php'; 
require_once("../php/config.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Administração - Biblioteca</title>
  <link rel="stylesheet" href="../css/paleta.css">
  <link rel="stylesheet" href="../css/adm.css">

 
  </style>
</head>
<body>

<div class="container">

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

  <!-- Cabeçalho -->
  <header class="header">
      <h1>Estatísticas</h1>
  </header>

  <!-- Conteúdo principal -->
  
    <h2>Usuários com empréstimos atrasados</h2>
      <table class="table">
     
          <tr>
            <th><p>Nome do Livro</p></th>
            <th><p>Data</p></th>
          </tr>
   
          <?php   $resultado = mysqli_query($conexao, "SELECT * FROM usuarios_com_emprestimos_atrasados"); 
          while ($linha = mysqli_fetch_assoc($resultado)) { ?>
            <tr>
              <td><?php echo htmlspecialchars($linha['nome_usuario']); ?></td>
              <td><?php echo htmlspecialchars($linha['data_devolucao']); ?></td>
            </tr>
          <?php } ?>
    
      </table>
    <h2>Usuários que fizeram mais de 1 empréstimo</h2>
     <table class="table">
     
          <tr>
            <th><p>Nome</p></th>
            <th><p>Quantidade</p></th>
          </tr>
   
          <?php   $resultado = mysqli_query($conexao, "SELECT * FROM mais_de_1_emprestimo"); 
          while ($linha = mysqli_fetch_assoc($resultado)) { ?>
            <tr>
              <td><?php echo htmlspecialchars($linha['nome_usuario']); ?></td>
              <td><?php echo htmlspecialchars($linha['total_emprestimos']); ?></td>
            </tr>
          <?php } ?>
    
      </table>
    <h2>Volume físico por estante/localizacao</h2>
    <h2>Média de paginas dos livros</h2>
            
    <h1 style = "font-size: 60px">
      <?php   $resultado = mysqli_query($conexao, "SELECT * FROM media"); 
      while ($linha = mysqli_fetch_assoc($resultado)) {
        echo (int)$linha['media_paginas_emprestados'];
      }
      ?>
    </h1>

 
  

 
  <!-- Rodapé -->
  <footer class="footer text-center">
    <p> Wise Library 2025&copy;</p>
  </footer>

</div>

</body>
</html>
