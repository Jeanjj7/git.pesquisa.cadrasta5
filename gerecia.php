<?php
    include "conexao.php";

    $sql = "SELECT * FROM tb_protocolos";
    $consultar = $pdo->prepare($sql);

    try {
        $consultar->execute();
        $resultados = $consultar->fetchAll(PDO::FETCH_ASSOC);
        foreach ($resultados as $item) {
            $num_protocolo = $item['num_protocolo'];
            $nome_completo = $item['nome_completo'];
            $cpf = $item['cpf'];
            $email = $item['email'];
            $telefone = $item['telefone'];
            $setor_resp = $item['setor_resp'];
            $detalhes = $item['detalhes'];
            $data_hora = $item['data_hora'];

            $somente_data = date("d/m/Y", strtotime($data_hora));
            $somente_hora = date("H:i:s", strtotime($data_hora));

            echo "
                  <div class='cartoes'>
                        <h3>Protocolo Nº <span class='num_protocolo'>$num_protocolo</span></h3>
                        <p>Nome: <span class='nome_completo'>$nome_completo</span></p>
                        <p>CPF: <span class='cpf'>$cpf</span></p>
                        <p>Email: <span class='email'>$email</span></p>
                        <p>Telefone: <span class='telefone'>$telefone</span></p>
                        <p>Setor Responsável: <span class='setor_resp'>$setor_resp</span></p>
                        <p>Detalhes: <span class='detalhes'>$detalhes</span></p>
                        <p>Data e Hora: <span class='data_hora'> $somente_data às $somente_hora</span></p>
                  </div>                         
            ";
        }
    } catch(PDOException $erro) {
        echo "Falha ao consultar resultados! " . $erro->getMessage();
    }
?>