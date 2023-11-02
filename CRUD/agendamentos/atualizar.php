<?php

use Easybook\classes\Agendamento;

include '..\config.php';

/*
$estado
$id_atendimentos
$id_horario
$id_cliente
*/

$id_atendimentos = $_GET['idatendimentos'];
$id_horario = $_GET['idhorario'];
$id_cliente = $_GET['idcliente'];
$estado = $_GET['estado'];

$atendimentos = new Atendimentos($id_atendimentos, $id_horario, $id_cliente, $estado);

try
{

    $conexao = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_nome, $db_usuario, $db_senha);

    
    $idlogado = $_SESSION['id_usuário'];
    
//     $consulta_id_usuario = $conexao->query('SELECT idcliente FROM avaliacoes INNER JOIN atendimentos WHERE idatendimento = idatendimentos')->fetch();

    if($idlogado != $consulta_id_usuario) Throw new Exception("usuário não autorizado");


    $consulta = $conexao->prepare("UPDATE atendimentos SET id_horario = ?, id_cliente = ?, estado = ? WHERE idatendimentos = ?");

    $consulta->execute([
                        $avaliacao->getIdAtendimento(),
                        $avaliacao->getEstrelas(),
                        $avaliacao->getTexto(),
                        $id_avaliacoes]);


}catch(Exception $e) {
    print('Erro: ' . $e->getMessage() . '<br>');
    exit();
}

?>