    <?php

    echo date('Y-m-d');
    

         $quantidadeDeCopias = 5;
              $id = 6;

              echo "<tr> <td>Quantidade de Cópias: ".$quantidadeDeCopias ."</td>";

              

                include_once('config.php');

                $stmt = $conexao->prepare("SELECT count(*) FROM Emprestimo WHERE id_livro = ?");
                if (!$stmt) {
                    die("Erro no prepare: " . $conexao->error);
                }

                $stmt->bind_param("s", $id); // mudar o "sss" para quantidade de variaveis

                if (!$stmt->execute()) {
                    die("Erro no execute: " . $stmt->error);
                }

                $result = $stmt->get_result();

          

                if ($result->num_rows > 0){
              
                 
                    echo  "<td>Quantidade de Cópias Disponiveis: ". $quantidadeDeCopias- (int)$result->fetch_assoc(). "</td> </tr>";
                }else{
                 echo "<td>Quantidade de Cópias Disponiveis: ". $quantidadeDeCopias. "</td> </tr>";
                } 

?>
