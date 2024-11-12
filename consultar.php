<?php
include "conexao.php";  

$cod = $_POST['cod'];  


$sql = "SELECT * FROM tb_protocolos WHERE num_protocolo LIKE '%$cod%'";


$consultar = $pdo->prepare($sql);

try {
    $consultar->execute();


    if ($consultar->rowCount() >= 1) {
        $resultado = $consultar->fetchAll(PDO::FETCH_ASSOC);


        foreach ($resultado as $item) {
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
                <div class='atualizacao'>
                <br>
                    <span class='num_protocolo'><b>Protocolo:</b> $num_protocolo</span><br><br>
                    <span class='data_hora'><b>Data e Hora:</b> $somente_data às $somente_hora</span><br><br>
                    <span class='nome_completo'><b>Nome:</b> $nome_completo</span><br><br>
                    <span class='cpf'><b>CPF:</b> $cpf</span><br><br>
                    <span class='email'><b>Email:</b> $email</span><br><br>
                    <span class='telefone'><b>Telefone:</b> $telefone</span><br><br>
                    <span class='setor_resp'><b>Setor Responsável:</b> $setor_resp</span><br><br>
                    <span class='detalhes'><b>Detalhes:</b><br> $detalhes</span><br><br>                        
               


                </div>
            ";
        }

    } else {
        echo "Não achei nada!";
    }

} catch (PDOException $erro) {
    echo "Falha ao consultar: " . $erro->getMessage();
}
?>
