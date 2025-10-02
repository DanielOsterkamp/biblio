<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="css/paleta.css">


    <style>
        
        ul {
    list-style-type: none;
    margin: 0;
    padding: 10px;
    background-color: #1E56A0;
}
body{background-color: #f6f6f6;}

body {
  margin: 0;
  padding: 0;
}

li{
    display: inline;  padding: 10px;  margin: 5px; color: #ffffff; background-color: #1E56A0; size: 10px; font-size: 20px; border-radius: 8px; margin-top: 50%;
}

li a {
  text-decoration: none;
  color: #ffffff;
}

    h1{
        font-size: 45px;
        color: #000000;
        
    }

h2{
    
    font-size: 45px;
}

h3{
     color: #000000;
    font-size: 100%;
    padding-left: 20px;
    padding-right: 20px;
   font-family: "Trebuchet MS", sans-serif;
}

img{
    padding-left: 23px;
    padding-right: 23px;
    height: 300px;
    width: 200px;
}


input[type="text"]{
     text-align: center; 
     border-radius: 8px; 
     border: 0px; 
     padding-left: 1px; 
     padding-right: 1px; 
     width: 80px; 
     height: 20px;  
     transition: 0.3s ease;
}

input[type="text"]:focus {
    width: 160px;
    text-align: left;
}

img:hover{
    transform: scale(1.1);
    transition: 0.3s ease;
}

 th td{
    text-align: center;
  }

  table {
      margin: 20px auto; 
      border-collapse: collapse;
      width: 60%;
    }

    li a:hover{
    color: rgb(197, 185, 185);
}

  

    </style>
</head>
<body>
    <div class = "head"  style="display: block; text-align: center; background-color: #1E56A0; height: 40px;" >
      
        <ul>

        <li> <a href="Home.php">minha conta</a></li>
        <li> <a href="Descubra.html">trending</a></li>
        <li> <a href="Inicio.html">log-out</a></li>
        <li><input type="text" name="" id="" style="height: 17px;" placeholder="Pesquisar"></li>
        </ul>

        
        

    </div>

    <div class = "meio" style="display: block; text-align: center;">

        <?php
            session_start();
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo  "<h1 >bem vindo ".$_SESSION['nome'];
            echo "</h1>" ; 
        ?>
       

        <table>

               <tr>
                  <th colspan="3">
                    <h2>Seus Livros</h2>    
                    </th>
               </tr>
                 
            </tr>
            <tr>
                <th>Nome do livro</th>
                <th>Autor</th>
                <th>Data de devolução</th>
            </tr>
            <tr>
                <td>diario de um banana</td><td>jeff kinney</td><td>24/09</td>
            </tr>
            <tr>
                <td>A Hora da Estrela</td><td>Clarice Lispector</td><td>15/07</td>
            </tr>
            <tr>
                <td>Memórias do subsolo</td><td>Dostoiévski</td><td>12/08</td>
             <tr> 
                
                <td style="padding-top: 275px;">
                          <button style="padding: 15px 40px; font-size: 15px;" > Mudar senha </button>
                </td>

                <td style="padding-top: 275px;"> <button style="padding: 15px 40px; font-size: 15px;" > Mudar apelido </button></td>
                <td style=" padding-top: 275px; "> <button style="padding: 15px 40px; font-size: 15px;" > Excluir Conta </button></td>

            </tr>


        </table>

         

       

        

    </div>
    
    
</body>
</html>