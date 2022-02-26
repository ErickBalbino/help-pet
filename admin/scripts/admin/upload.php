<?php
     session_start();
     if($_SESSION["login"]=="logado"){

        $dir = "uploads/"; 
        // recebendo o arquivo multipart 
        $file = $_FILES["arquivo"]; 
        // Move o arquivo da pasta temporaria de upload para a pasta de destino 
        if (move_uploaded_file($file["tmp_name"], "$dir/".$file["name"])) { 
            echo "Arquivo enviado com sucesso!"; 
        } 
        else { 
            echo "Erro, o arquivo n&atilde;o pode ser enviado."; 
        }
     }else{
         header('Location: ../../index.php');
     }              
?>