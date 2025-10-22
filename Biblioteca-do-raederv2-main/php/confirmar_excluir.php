<?php
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Confirmar Exclusão</title>
    <link rel="stylesheet" href="../css/paleta.css">
</head>
<body>
<div class="container" style="text-align:center; margin-top:50px;">

    <h2>Tem certeza que deseja excluir este produto?</h2>

<form action="../php/exec_excluir.php" method="post" style="display:inline-block; margin-right:10px;">
<input type="hidden" name="id" value="<?php echo $id; ?>">
<button type="submit" name="confirmar" value="sim" class="btn">Sim, excluir</button>
<button type="button" name="cancelar" 
    onclick="window.location.href='../php/listar.php?retorno=Exclusão%20cancelada!'">
    Cancelar
</button>

</form>
</div>
</body>
</html>