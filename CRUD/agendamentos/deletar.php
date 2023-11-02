<?php

include '..\config.php';

$id_atendimentos = $_GET['idatendimentos'];

try
{
    
    $conexao = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_nome, $db_usuario, $db_senha);
    
    $idlogado = $_SESSION['id_usuário'];
    
/*
    $consulta_id_usuario = $conexao->query('SELECT idcliente FROM avaliacoes INNER JOIN atendimentos WHERE idatendimento = idatendimentos')->fetch();
*/

    if($idlogado != $consulta_id_usuario) Throw new Exception("usuário não autorizado");
    

    $consulta = $conexao->prepare("UPDATE atendimentos SET deletado = 1 WHERE idatendimentos = ?");

    $consulta->execute([$id_atendimentos]);


}catch(PDOException $e) {
    print('Erro: ' . $e->getMessage() . '<br>');
    exit();
}

?>