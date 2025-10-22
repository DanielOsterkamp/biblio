<?php
require_once "../php/config.php";
//pegar nome do produto - ESTE IF É IMPORTANTÍSSIMO: EVITAR INJEÇÃO DE SQL, GRAVAR REGISTRO VAZIO
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['titulo']))
 { 
   $titulo = $_POST['titulo'];
   $autor = $_POST['autor'];
   $ano_publi = $_POST['ano_publi'];
   $editora = $_POST['editora'];
   $categoria = $_POST['categoria'];
 } 
 else 
 { 
 $msg = urlencode('Acesso negado!'); 
 header("location: ../php/entrar.php?retorno=$msg"); 
 exit; 
}
//pegar o nome do arquivo da capa do livro
$capa = $_FILES['capa']['tmp_name'];

$sql = "INSERT INTO livro (titulo, editora, ano_publi, autor, categoria) VALUES ('$titulo', '$editora', '$ano_publi')";
mysqli_query($conexao, $sql);
//rotina php para UPLOAD da capa do produto
//pegar o ultimo código gerado pelo mySQL
$ultimocod=mysqli_insert_id($conexao);
//modificar o nome do arquivo para codigo+extenção .png
$arquivo='../fotos/'.$ultimocod.'.png';
//fazer o upLoad da imagem do produto
move_uploaded_file($imagem,$arquivo);
mysqli_close($conexao); //fechar a conexão com BD
//voltar para form-cadastrar e passsar parâmetro por GET com mensagem de: OK
       $msg= urlencode('ok');
       header("location: ../php/form_cadastrar_livro.php?retorno=$msg");
?>