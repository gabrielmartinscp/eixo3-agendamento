<?php

include 'config.php';

session_start();
if(isset($_SESSION['id_usuário'])) {
    $id = $_SESSION['id_usuário'];
}
else
{
    header('Location: ' . $diretorio_padrao_acesso_negado);
    exit();
}
?>