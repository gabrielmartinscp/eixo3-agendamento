<?php
use Easybook\classes\Avaliacao;

include '..\config.php';

$id_atendimento = $_GET['idatendimento'];
$estrelas = $_GET['estrelas'];
$texto = $_GET['texto'];

$avaliacao = new Avaliacao($estrelas, $texto, $id_atendimento);

try
{

    $conexao = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_nome, $db_usuario, $db_senha);

    $consulta = $conexao->prepare("INSERT INTO avaliacoes (id_atendimento, estrelas, texto) VALUES (:id_atendimento, :estrelas, :texto)");

    $consulta->bindParam(':id_atendimento', $avaliacao->getIdAtendimento());
    $consulta->bindParam(':estrelas', $avaliacao->getEstrelas());
    $consulta->bindParam(':texto', $avaliacao->getTexto());

    $consulta->execute();


}catch(PDOException $e) {
    print('Erro: ' . $e->getMessage() . '<br>');
    exit();
}

?>