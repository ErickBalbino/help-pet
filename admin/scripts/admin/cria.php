 <?php
 
    session_start();
    if($_SESSION['login']=='logado'){
    
        include_once '../conexao.php';
        
        $conn = new Database();  
        $conn = $conn->db_mysql();
        
        $usuario = $_POST['novoUsuario'];
        $senha = $_POST['senha'];
        $ConfirmSenha = $_POST['confirmSenha'];
       
        if($usuario != '' && $senha != '' && $ConfirmSenha != ''){
               
                $test = $conn->prepare(
                "SELECT * FROM login
                WHERE USUARIO = '$_POST[novoUsuario]'"
                );
                $test->execute();  
                    

                if($test->fetchAll(\PDO::FETCH_ASSOC) == true){
                    header('Location: criarUsuario.php?usu=existente');
                }else if($senha == $ConfirmSenha){  
                        $sql = $conn->prepare(
                            "INSERT INTO login(USUARIO, SENHA)
                            VALUES('$usuario','$senha')"
                            );
                        $sql->execute();  
                        // $a=$sql->fetchAll(\PDO::FETCH_ASSOC);
                        header('Location: criarUsuario.php?usu=true');
                }else{
                        header('Location: criarUsuario.php?usu=false');
                }
        }else{
            header('Location: criarUsuario.php?usu=vazio');
        }

        
    }else{
        header('Location: ../../index.php');
    }
?>       

