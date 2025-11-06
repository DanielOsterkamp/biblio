<?php
require_once "../php/config.php";
// Verificar se é POST e campos obrigatórios estão presentes
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['titulo'])) {
    $titulo = $_POST['titulo'];
    $id_autor = $_POST['autor']; 
    $ano_publi = $_POST['ano_publi'];
    $editora = $_POST['editora'];
    $categoria = $_POST['categoria'];
    $num_paginas = $_POST['paginas'];
    $sinopse = $_POST['sinopse'];
    $id_categoria = $_POST['categoria'];
    $quant_copias = $_POST['copias'];
    $capa = $_FILES['capa']['tmp_name'];  // Arquivo da capa
} else {
    $msg = urlencode('Acesso negado!');
    header("location: ../php/entrar.php?retorno=$msg");
    exit;
}

// Inserir no banco (ajuste query para incluir todos os campos; assumindo FK para autor se necessário)
$sql = "INSERT INTO livro (titulo, editora, ano_publicacao, num_paginas,sinopse,id_autor, id_categoria,quant_copias) VALUES (?, ?, ?, ?, ?, ?, ?,?)";
$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($stmt, "ssssssss", $titulo, $editora,$ano_publi, $num_paginas,$sinopse,$id_autor, $categoria,$quant_copias);
mysqli_stmt_execute($stmt);

// Pegar ID do novo livro
$novo_id = mysqli_insert_id($conexao);

// Upload da capa (renomear para ID.png)
if ($capa) {
    $arquivo = '../fotos/' . $novo_id . '.png';
    move_uploaded_file($capa, $arquivo);
}

mysqli_stmt_close($stmt);
mysqli_close($conexao);

// Redirecionar para criar a página HTML dinâmica
header("Location: ../php/criar_paginas.php?id=$novo_id");
exit;
?>