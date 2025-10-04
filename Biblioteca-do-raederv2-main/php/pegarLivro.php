    <?php

                $hoje = new DateTime();
                $devolução = new DateTime();
                $devolução = $devolução->add(new DateInterval('P14D'));  //adiciona um periodo de 14 dias na data de hoje 

                $hoje = $hoje->format("Y-m-d");
                $devolução = $devolução->format("Y-m-d");

             session_start(); // basicamente pega os dados do usuario logado


    

              $quantidadeDeCopias = 5;
              $id = 6;

          

              

                include_once('config.php');

                $stmt = $conexao->prepare("INSERT INTO Emprestimo (data_emprestimo, data_devolucao, id_livro, id_usuario) VALUES
                                         (?, ?, ?, ?)");
                if (!$stmt) {
                    die("Erro no prepare: " . $conexao->error);
                }

                $stmt->bind_param("ssss", $hoje,$devolução,$id,$_SESSION['id']); // mudar o "sss" para quantidade de variaveis

                if (!$stmt->execute()) {
                    die("Erro no execute: " . $stmt->error);
                }
                
                header("Location: diario.php");

          

                

                ?>
