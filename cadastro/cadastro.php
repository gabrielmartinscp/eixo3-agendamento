<?php

include '..\config.php';

$login = $_POST['login'];
$senha_nao_criptografada = $_POST['senha'];

$senha_criptografada = password_hash($senha_nao_criptografada, PASSWORD_DEFAULT);

try
{

    $conexao = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_nome, $db_usuario, $db_senha);

    $registro = $conexao->prepare("INSERT INTO" . $db_tabela_dados_login_senha . "(login, senha) VALUES (:nome_usuario, :senha_criptografada)");

    $registro->bindParam(':nome_usuario', $login);
    $registro->bindParam(':senha', $senha_criptografada);

    $registro->execute();

}catch(PDOException $e) {
    print('Erro: ' . $e->getMessage() . '<br>');
    exit();
}
?>