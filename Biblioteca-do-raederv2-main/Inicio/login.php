

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="../css/paleta.css">
    <link rel="stylesheet" href="../css/inicio.css">
</head>
<body>

     <div>
        

        <h1> Log In </h1>

        <form action="login.php" method="post">
            <table>
                <tr>
                    <td>
                        <p>Nome</p>
                    </td>
                    <td> <input type="text" name="nome" id=""></td>
                </tr>
                <tr>
                    <td>
                        <p>Senha</p>
                    </td>
                    <td> <input type="password" name="senha" id=""></td>
                </tr>
                <tr>
                    <td colspan="2"> <input type="submit" style="margin: 80px;" name="submit"></td>
                </tr>
                 <?php

                session_start();

                $nome = $_POST['nome'];
                $senha = $_POST['senha'];

                require_once('../php/config.php');

                 $sql = "SELECT * FROM usuario WHERE nome_usuario = ?"; 
                 $stmt = mysqli_prepare($conexao, $sql);

                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, "s", $nome);
                    mysqli_stmt_execute($stmt);
                    $resultado = mysqli_stmt_get_result($stmt);

                    if ($linha = mysqli_fetch_assoc($resultado)) {

                        //Verificar se a senha informada bate com o hash no banco
                        if (password_verify($senha, $linha['senha'])) {  
                            session_start();
                            $_SESSION['nome'] = $nome; 
                            $_SESSION['id'] =  $linha['id_usuario'];
                            $_SESSION['login'] = 'ok';
                             header("Location: ../Home/Home.php");
                         
                        }else{
                            echo "  <tr><td colspan='2'><p style='text-align: center;'> Nome ou Senha incorretos</p></td></tr>";
                        }
                
                    }else{
                         echo "  <tr><td colspan='2'><p style='text-align: center;'>Nome ou Senha incorretos</p></td></tr>";
                     }
    }

                ?>
            </table>
        </form>
   
    </div>


</body>
</html>


