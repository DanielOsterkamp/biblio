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

        $stmt2 = $conexao->prepare("SELECT * FROM emprestimo WHERE id_livro = ?;");
        $stmt2->bind_param("s", $id);

        if (!$stmt2->execute()) {
            die("Erro no execute: " . $stmt2->error);
        }

        $result = $stmt2->get_result();

          


        if ($quantidadeDeCopias - $result->num_rows > 0){ // verifica se tem livro disponivel pra pegar

                $stmt = $conexao->prepare("INSERT INTO Emprestimo (data_emprestimo, data_devolucao, id_livro, id_usuario) VALUES
                                        (?, ?, ?, ?)");
                if (!$stmt) {
                    die("Erro no prepare: " . $conexao->error);
                }

                $stmt->bind_param("ssss", $hoje,$devolução,$id,$_SESSION['id']); // mudar o "sss" para quantidade de variaveis

                if (!$stmt->execute()) {
                    die("Erro no execute: " . $stmt->error);
                }
                            
                if ($stmt->affected_rows > 0){ 

                    $mensagem = "Livro pego com sucesso";  // essa é a mensagem que vai aparecer no php do include
                    include 'diario.php'; // esse include simula o outro php

                }

        }else{
            $mensagem = "Sem copias disponiveis desse livro";  // essa é a mensagem que vai aparecer no php do include
            include 'diario.php'; // esse include simula o outro php
        }

?>
