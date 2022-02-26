<?php
   session_start();
   if($_SESSION['login']=='logado'){
        include_once '../conexao.php';
        include_once 'upload.php';

        $nome = $_POST['nomeAnimal'];
        $sexo = $_POST['sexoAnimal'];
        $idade = $_POST['idade'];
        $foto = $_FILES['arquivo']["name"];
        $hist = $_POST['historia'];

    
        $conn = new Database();  
        $conn = $conn->db_mysql();

        $cad = $conn->prepare(
            "INSERT INTO tbanimais (NOME_ANIMAL, SEXO_ANIMAL, IDADE, FOTO, HISTORIA, SITUACAO) 
            VALUES('$nome', '$sexo', '$idade', '$foto', '$hist', 'aguardando')"
        );
        $cad->execute(); 
        $a = $cad->setFetchMode(\PDO::FETCH_ASSOC);

        

        if($a == true){
            header("location:cadastrarAnimal.php?s=true");
        }else{
            header("location:cadastrarAnimal.php?s=false");
        }
        

    }else{
        header('Location: ../../index.php');
    }
?>