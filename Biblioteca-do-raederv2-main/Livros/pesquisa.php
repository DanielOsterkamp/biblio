<?php

$nome = $_POST['nome'];

if (strcasecmp($nome, "diario de um banana 1") == 0) { // da pra usar == caso seja key sensitive 
    header("Location: diario.html");
}
if (strcasecmp($nome, "A Hora da Estrela") == 0) { //strcasecmp retorna 0 caso a string seja igual (ignorando maiuscula e minuscula)
    header("Location:  ahora.html"); // header leva para o arquivo
}
if (strcasecmp($nome, "memorias do subsolo") == 0) {
    header("Location: memorias.html");
}
if (strcasecmp($nome, "1984") == 0) { 
    header("Location: 1984.html");
}
if (strcasecmp($nome, "Alice no pais das maravilhas") == 0) { 
    header("Location:  alice.html"); 
}
if (strcasecmp($nome, "Coraline") == 0) {
    header("Location: coraline.html");
}
if (strcasecmp($nome, "Dom casmurro") == 0) { 
    header("Location: domcasmurro.html");
}
if (strcasecmp($nome, "Emma") == 0) { 
    header("Location:  emma.html"); 
}
if (strcasecmp($nome, "Harry potter e a pedra filosofal") == 0) {
    header("Location: hp1.html");
}
if (strcasecmp($nome, "Noites brancas") == 0) {
    header("Location: noitesbrancas.html");
}
if (strcasecmp($nome, "Pequeno principe") == 0) {
    header("Location: pequenoprincipe.html");
}
if (strcasecmp($nome, "Percy Jackson 1") == 0) {
    header("Location: pjo1.html");
}
if (strcasecmp($nome, "Percy Jackson 2") == 0) {
    header("Location: pjo2.html");
}
if(strcasecmp($nome, "Diário de um banana 2")== 0){
    header("Location: diario2.html")
}
if(strcasecmp($nome, "Aristoteles e dante descobrem os segredos do universo")== 0){
    header("Location: aridante.html")
}
if(strcasecmp($nome, "Mentirosos")== 0){
    header("Location: mentirosos.html")
}
if(strcasecmp($nome, "Morro dos ventos uivantes")== 0){
    header("Location: mvu.html")
}
if(strcasecmp($nome, "Orgulho e preconceito")== 0){
    header("Location: orgulhoepreconceito.html")
}
if(strcasecmp($nome, "Vermelho, branco e sangue azul")== 0){
    header("Location: diario2.html")
}
echo "esse livro n existe, peça para os devs colocarem esse livro <3"
    
?>