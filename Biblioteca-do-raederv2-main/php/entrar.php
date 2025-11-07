<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <title>Login - Área Restrita</title>
  <link rel="stylesheet" href="../css/paleta.css">
  <link rel="stylesheet" href="../css/adm.css">
</head>
<body>

<div class="container">

  <div class="card" style="max-width: 400px; margin: 80px auto;">
    <h1 class="h1 text-center">Acesso à Área Restrita</h1>
    <p class="lead text-center">Informe seu usuário e senha para continuar.</p>
    <hr style="margin: 16px 0; border: none; border-top: 1px dashed rgba(0,0,0,0.1);">

    <form action="../php/validar_login.php" method="post" class="form">
      
      <div class="form-group">
        <label for="use">Usuário</label>
        <input type="text" id="use" name="use" placeholder="Digite seu usuário" required>
      </div>

      <div class="form-group">
        <label for="pas">Senha</label>
        <input type="password" id="pas" name="pas" placeholder="Digite sua senha" required>
      </div>

      <div class="form-group text-center mt-6">
        <input type="submit" name="sub" value="Entrar" class="btn">
      </div>
    </form>

    <?php
    // se falhar a validação do login na página validar_login.php, volta para esta
    // página entrar.php e mostra uma mensagem de erro ("nome ou senha inválidos")
    if (isset($_GET['retorno']) && !empty($_GET['retorno'])) {
        echo '<div class="mensagem-erro">' . htmlspecialchars($_GET['retorno']) . '</div>';
        
    }
    ?>

  </div>

  <div class="footer text-center">
    <center><p>WiseLibrary 2025©</p><center>
  </div>

</div>

</body>
</html>
