<?php

$nome = $_POST['nome'];

if (strcasecmp($nome, "diario de um banana") == 0) { // da pra usar == caso seja key sensitive 
    header("Location: diario.html");
}
if (strcasecmp($nome, "A hora da Estrela") == 0) { //strcasecmp retorna 0 caso a string seja igual (ignorando maiuscula e minuscula)
    header("Location: ahora.html"); // header leva para o arquivo
}
if (strcasecmp($nome, "memorias do subsolo") == 0) {
    header("Location: memorias.html");
}

echo "esse livro n existe pnc"
    
?>