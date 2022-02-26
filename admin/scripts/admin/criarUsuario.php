<?php
    session_start();
    if($_SESSION['login']=='logado'){
    
        include_once '../conexao.php';

        if($_GET){
            $usu = $_GET['usu'];
            if($usu == "true"){
?>
                <script>alert('usuario criado com sucesso')</script>
            <?php
            }else if($usu == "false"){
            ?>
                <script>alert('As senhas estão diferentes')</script>
            <?php
            }else if($usu =="existente"){
            ?>
                <script>alert('Este usuário já existe')</script>
            <?php
                }else if($usu =="vazio"){
            ?>
                <script>alert('Campos vazios')</script>
            <?php
                }
        }
            ?>
            
        

        <html>
            <head>
                <link rel="stylesheet" href="css/bootstrap.css">
                <script src="js/js.js"></script>
                <link rel="stylesheet" href="css/criar-usuario.css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            </head>

            <body>
                <header>
                    <h1>Criar usuários</h1>
                    <div class="menu">
                        <nav>
                            <input type="button" id='listar' onclick="listar()" value="Solicitações de adoção">
                            <input type="button" id='criar' onclick="usuarios()" value="Criar usuário">
                            <input type="button" id='criar' onclick="cadastrarAnimal()" value="Cadastrar Animal">
                            <input type="button" id='criar' onclick="cachorros()" value="Lista de Animais">

                        </nav>

                        <div class="logout">
                            <i class="fa fa-power-off" onclick="sair()" id="teste"></i>
                        </div>
                    </div>
                 </header>       

                <div class="container_form">    
                    <form method='POST' action="cria.php">
                        <label>
                            <span>Usuario:</span>
                            <input type="text" id="novoUsuario" name="novoUsuario">
                        </label>                       
                        <label>
                            <span>Senha:</span>
                            <input type="password" id="senha" name="senha">
                        </label>                     
                        <label>
                            <span>Confirme sua senha:</span>
                            <input type="password" id="confirmSenha" name="confirmSenha">
                        </label>              
                        <div class="button">
                            <input type="submit" value="Criar" name="criar" id="criar">
                        </div>                       
                    </form>
                </div>
            </body>
        </html>
<?php
    }else{
        header('Location: ../../index.php');
    }
?>
