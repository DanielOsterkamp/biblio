<?php
ini_set('display_errors', 0);
error_reporting(E_ALL);

require_once('../php/config.php');

if (isset($_POST['sub']) && !empty($_POST['sub'])) 
{
    $use = $_POST['use'];
    $pas = $_POST['pas'];

    // Buscar apenas pelo nome de usuário
    $sql = "SELECT * FROM usuario WHERE nome_usuario = ? AND is_admin = 1"; 
    $stmt = mysqli_prepare($conexao, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $use);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);

        if ($linha = mysqli_fetch_assoc($resultado)) {

            //Verificar se a senha informada bate com o hash no banco
            if (password_verify($pas, $linha['senha'])) {  
                session_start();
                $_SESSION['login'] = 'ok';
                header("Location: ../php/principal.php");
                exit;
            }
       
        }

        //Se chegou aqui, usuário ou senha inválido
        $msg = urlencode('Dados inválidos!');
        header("Location: ../php/entrar.php?retorno=$msg");
        exit;

    } else {
        //Falha na preparação do statement
        die("Erro no SQL: " . mysqli_error($conexao));
    }
} 
else 
{
    //Acesso direto à página sem passar pelo formulário
    $msg = 'Acesso negado - Efetue o login';
    header("Location: ../php/entrar.php?retorno=$msg");
    exit;
}
?>