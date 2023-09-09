<?php

include '..\config.php';

$id_avaliacoes = $_GET['idavaliacoes'];

try
{

    $conexao = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_nome, $db_usuario, $db_senha);

    $consulta = $conexao->prepare("UPDATE avaliacoes SET deletado = 1 WHERE idavaliacoes = ?");

    $consulta->execute([$id_avaliacoes]);


}catch(PDOException $e) {
    print('Erro: ' . $e->getMessage() . '<br>');
    exit();
}

?>