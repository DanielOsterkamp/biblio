<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Mudar Senha</title>

    <style>
        body {
            background: rgba(0,0,0,0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .popup {
            background: white;
            padding: 30px;
            border-radius: 12px;
            width: 350px;
            text-align: center;
            box-shadow: 0 0 10px #0005;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
        }

        button {
            padding: 10px 20px;
        }
    </style>
</head>

<body>

    <div class="popup">
        <h2>Mudar Senha</h2>

        <form action="../Home/exec_mudar_senha.php" method="POST">
            <input type="password" name="senha_antiga" placeholder="Senha antiga" required>
            <input type="password" name="senha_nova" placeholder="Nova senha" required>

            <button type="submit">Atualizar</button>
        </form>
    </div>
</body>

</html>