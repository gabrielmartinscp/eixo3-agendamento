<?php

include 'config.php';

//consultar dados de acesso fornecidos pelo usuário

$login = $_POST['login'];

$senha = $_POST['senha'];

$login_verificado = false;

try {

    $conn = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_nome, $db_usuario, $db_senha);

    $consulta = $conn->query("SELECT senha, idusuarios FROM " . $db_tabela_dados_login_senha . " WHERE login = .'" . $login . "'")->fetchAll();

    if(!is_array($consulta))
    {
        echo('Usuário não encontrado, tente novamente.');
        exit();
    }

    $hash = $consulta[0]['senha'];

    $id = $consulta[0]['idusuarios'];

    $login_verificado = password_verify($senha, $hash);

}catch(PDOException $e) {
    print('Erro: ' . $e->getMessage() . '<br>');
    exit();
}

echo($login_verificado ? 'Login efetuado com sucesso!' : 'Senha inválida, tente novamente.');

session_start();

$_SESSION['id_usuário'] = $id;

header($pagina_inicial_login_bem_sucedido);

?>