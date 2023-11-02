<?php

include '..\config.php';

$id = $_GET['id'];

try
{
    
    $conexao = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_nome, $db_usuario, $db_senha);
    

    $consulta = $conexao->query("SELECT * FROM atendimentos WHERE idatendimentos = " . $id)->fetch(PDO::FETCH_ASSOC);


    echo json_encode($consulta, 0, 5);

    
}catch(PDOException $e) {
    print('Erro: ' . $e->getMessage() . '<br>');
    exit();
}

?>