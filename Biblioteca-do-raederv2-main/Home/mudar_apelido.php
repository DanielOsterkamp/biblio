<?php

require_once("../php/verificar_sessao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Mudar Apelido</title>
    <style>
        body {
            background: rgba(0,0,0,0.4);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .box {
            background: white;
            padding: 25px;
            border-radius: 10px;
            width: 350px;
            text-align: center;
        }
        input {
            margin: 10px 0;
            width: 90%;
            padding: 10px;
        }
        button {
            padding: 10px 20px;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>Mudar Apelido</h2>
    <form action="exec_mudar_apelido.php" method="POST">
        <input type="text" name="novo_apelido" placeholder="Novo apelido" required>
        <br><br>
        <button type="submit">Atualizar</button>
    </form>

    <br>
    <a href="Home.php">Voltar</a>
</div>

</body>
</html>