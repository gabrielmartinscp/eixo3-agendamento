<?php

use Easybook\classes\Avaliacao;

include '..\config.php';

$id_avaliacoes = $_GET['idavaliacoes'];
$id_atendimento = $_GET['idatendimento'];
$estrelas = $_GET['estrelas'];
$texto = $_GET['texto'];


$avaliacao = new Avaliacao($estrelas, $texto, $id_atendimento, $id);

try
{

    $conexao = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_nome, $db_usuario, $db_senha);

    
    $idlogado = $_SESSION['id_usuário'];
    $consulta_id_usuario = $conexao->query('SELECT idcliente FROM avaliacoes INNER JOIN atendimentos WHERE idatendimento = idatendimentos')->fetch();
    if($idlogado != $consulta_id_usuario) Throw new Exception("usuário não autorizado");


    $consulta = $conexao->prepare("UPDATE avaliacoes SET id_atendimento = ?, estrelas = ?, texto = ? WHERE idavaliacoes = ?");

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