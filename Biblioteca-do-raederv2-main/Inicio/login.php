

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="paleta.css">
</head>
<body>

     <div style="display: block; text-align: center; padding-top: 100px;" >
        
        <h1> Log In </h1>

          <form action="login.php" method="post">
        <table>
            <tr>
                <td><p>nome</p></td>  
                <td> <input type="text" name="nome" id=""></td>
            </tr>
             <tr>
                <td><p>senha</p></td>  
                <td> <input type="password" name="senha" id=""></td>
            </tr>
            <tr>
                <td colspan="2">  <input type="submit" style="padding: 15px 40px; font-size: 15px; margin: 80px;" name="submit"></td>
            </tr>
           
             <?php

                session_start();

                $nome = $_POST['nome'];
                $senha = $_POST['senha'];

             
                include_once('../php/config.php');




                $stmt = $conexao->prepare("SELECT * FROM Usuario WHERE nome_usuario = ? and senha = ? ");
                if (!$stmt) {
                    die("Erro no prepare: " . $conexao->error);
                }

                $stmt->bind_param("ss", $nome,  $senha); // mudar o "sss" para quantidade de variaveis

                if (!$stmt->execute()) {
                    die("Erro no execute: " . $stmt->error);
                }

                $result = $stmt->get_result();

          

                if ($result->num_rows > 0){
                    $_SESSION['nome'] = $nome;
                    header("Location: ../home/Home.php");
                }else{
                    echo "  <tr><td colspan='2'><p style='text-align: center;'> Nome ou Senha incorretos</p></td></tr>";
                }

                ?>



        </table>
        </form>

  
    
    </div>

    
</body>
</html>


