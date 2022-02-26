<?php
        session_start();
        if($_SESSION['login']=='logado'){
            if($_GET){
                $test = $_GET['s'];
                if($test == 'true'){
?>
    
                    <script>alert('Animal cadastrado com sucesso!')</script>
    
<?php
                }else{
?>
    
                    <script>alert('Não foi possivel realizar cadastro do cachorro!')</script>
    
<?php

                }
            }
?>
<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.css">
        <script src="js/js.js"></script>
        <script src="js/js/jquery.js"></script>
        <link rel="stylesheet" href="css/cadastrar-animal.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>


    <body>
        <header>
            <div>
                <h1>Cadastrar animais</h1>
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
            </div>
        </header>
        
        <div class="container_form">
            <form method="POST" action="cadastro.php" enctype="multipart/form-data">
                <label>
                    <span>Nome do Animal:</span>
                    <input type="text" id="nomeAnimal" name="nomeAnimal" required>
                </label>
                

                <label>
                    <span>Sexo:</span>
                    <select name="sexoAnimal" id="sexoAnimal" required>
                        <option value="" disabled selected hidden>Escolha uma opção</option>
                        <option value="Femea">Femea</option>
                        <option value="Macho">Macho</option>
                    </select>
                </label>
                

                <label>
                    <span>Idade do Animal:</span>
                    <input type="text" id="idade" name="idade" required>
                </label>
                
                
                <label>
                    <span>Foto do animal:</span>
                    <input type="file"  id="arquivo" name="arquivo">
                </label>
                
                

                <label>
                    <span>Um pouco da história do animal:</span>
                    <textarea name="historia" id="historia" required></textarea>
                </label>
                
                <div class="button">
                    <input type="submit" value="CADASTRAR">
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
