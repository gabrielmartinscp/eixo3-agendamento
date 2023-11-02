<?php

use Easybook\classes\Agendamento;

include '..\config.php';

$id_atendimentos = $_GET['id_atendimentos'];
$id_horario = $_GET['id_horario'];
$id_cliente = $_GET['id_cliente'];
$estado = $_GET['estado'];

$atendimentos = new Atendimentos($id_atendimentos, $id_horario, $id_cliente, $estado);


try
{
    
    $conexao = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_nome, $db_usuario, $db_senha);
    
    $idlogado = $_SESSION['id_usuário'];
    
/*
    $consulta_id_usuario = $conexao->query('SELECT idcliente FROM avaliacoes WHERE idatendimento = ' . $id_atendimento)->fetch();
*/

    if($idlogado != $consulta_id_usuario) Throw new Exception("usuário não autorizado");
    

    $consulta = $conexao->prepare("INSERT INTO atendimentos (id_horario, id_cliente, estado) VALUES (:id_horario, :id_cliente, :estado)");
    

    $consulta->bindParam(':id_atendimento', $avaliacao->getIdAtendimento());
    $consulta->bindParam(':estrelas', $avaliacao->getEstrelas());
    $consulta->bindParam(':texto', $avaliacao->getTexto());

    $consulta->execute();


}catch(PDOException $e) {
    print('Erro: ' . $e->getMessage() . '<br>');
    exit();
}

?>