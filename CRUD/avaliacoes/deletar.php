<?php

include '..\config.php';

$id_avaliacoes = $_GET['idavaliacoes'];

try
{

    $conexao = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_nome, $db_usuario, $db_senha);

    $idlogado = $_SESSION['id_usuário'];

    $consulta_id_usuario = $conexao->query('SELECT idcliente FROM avaliacoes INNER JOIN atendimentos WHERE idatendimento = idatendimentos')->fetch();
    if($idlogado != $consulta_id_usuario) Throw new Exception("usuário não autorizado");

    $consulta = $conexao->prepare("UPDATE avaliacoes SET deletado = 1 WHERE idavaliacoes = ?");

    $consulta->execute([$id_avaliacoes]);


}catch(PDOException $e) {
    print('Erro: ' . $e->getMessage() . '<br>');
    exit();
}

?>