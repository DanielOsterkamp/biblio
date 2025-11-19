<?php

require_once("../php/verificar_sessao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Excluir Conta</title>

    <style>
        body {
            background: rgba(0,0,0,0.4);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .box {
            background: white;
            padding: 25px;
            border-radius: 10px;
            width: 350px;
            text-align: center;
        }
        button {
            padding: 10px 25px;
            margin: 10px;
        }
    </style>
</head>

<body>

<div class="box">
    <h2>Tem certeza que deseja excluir sua conta?</h2>

    <form action="exec_excluir_conta.php" method="POST">
        <button type="submit" style="background: red; color: white;">SIM</button>
    </form>

    <a href="Home.php">
        <button type="button">NÃO</button>
    </a>
</div>

</body>
</html>