<?php
session_start();
if($_SESSION['login']=='logado'){

    include_once '../conexao.php';

    $cod = $_GET['s'];
    $conn = new Database();  
    $conn = $conn->db_mysql();
    
    //query para listagem do select dos cachorros
    $sqli = $conn->prepare(
        "UPDATE tbanimais SET SITUACAO = 'adotado' WHERE COD = $cod
        "
        );
    $sqli->execute();  

    header('Location: cachorros.php');
}else{
    header('Location: ../../index.php');
}
?>