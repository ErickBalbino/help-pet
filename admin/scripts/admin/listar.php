<?php
    session_start();
    if($_SESSION['login']=='logado'){
    
        include_once '../conexao.php';
        header("Refresh:30");
        $conn = new Database();  
        $conn = $conn->db_mysql();
        
        //query para listagem do select dos cachorros
        $sqli = $conn->prepare(
            "SELECT DISTINCT * FROM tbanimais
            ORDER BY NOME_ANIMAL"
            );
        $sqli->execute();  
        $b=$sqli->fetchAll(\PDO::FETCH_ASSOC);


            if($_GET){
                if($_GET['pes']){
                    $pes = $_GET['pes'];
                    if($pes == 1){

                        //query para listagem de acordo com a solicitação do select no html
                        $sql = $conn->prepare(
                            "SELECT * FROM cadastroadocao"
                            );
                        $sql->execute();
                        $a=$sql->fetchAll(\PDO::FETCH_ASSOC); 
                    }else{
                        $sql = $conn->prepare(
                            "SELECT * FROM cadastroadocao
                                WHERE COD_CACHORRO = $pes"
                            );
                        $sql->execute();
                        $a=$sql->fetchAll(\PDO::FETCH_ASSOC);
                    }
                }else if($_GET['cod']){
                    $cod = $_GET['cod'];
                    //DELETA SOLICITAÇÃO DE ACORDO COM O COMANDO DO USUARIO
                    if($cod!=1){
                        $del = $conn->prepare(
                        "DELETE FROM cadastroadocao WHERE COD_INC = $cod"
                        );
                        $del->execute(); 
                        header('Location: listar.php');
            
    ?>
    <script>alert("Solicitação deletada com sucesso");</script>
    <?php
                    }    

                    if($cod == 1){
                        unset($_SESSION['login']);
                        header("Location: ../../index.php");
                    }
                }
            }else{
                $sql = $conn->prepare(
                    "SELECT * FROM cadastroadocao"
                    );
                $sql->execute();
                $a=$sql->fetchAll(\PDO::FETCH_ASSOC); 
            }
    ?>
    <html>
        <head>
            <link rel="stylesheet" href="css/bootstrap.css">
            <script src="js/js.js"></script>
            <script src="js/js/jquery.js"></script>
            <link rel="stylesheet" href="css/listar.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        </head>

        <body>
            <header>
                <div>
                    <h1>Solicitações de doação</h1>
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

                <div>
                    <select name="pesquisa" id="pesquisa" onchange="pesquisa(document.getElementById('pesquisa').value)">
                        <option value="" disable selectd hidden>Visualizar por cachorro</option>
                        <option value="1">Todos</option>


                        <?php
                            //lista todos os cachorros no select para poder fazer a pesquisa por um unico cachorro
                            foreach($b as $value){

                        ?>

                            <option value="<?=$value['COD']?>"><?=$value['NOME_ANIMAL']?></option>
                        
                        <?php
                            }
                        ?>
                    </select>
                    <br><br>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">NOME</th>
                                <th scope="col">DATA DE NASCIMENTO</th>
                                <th scope="col">ENDEREÇO</th>
                                <th scope="col">BAIRRO</th>
                                <th scope="col">CIDADE</th>
                                <th scope="col">NOME ANIMAL</th>
                                <th scope="col">FACEBOOK</th>
                                <th scope="col">INSTAGRAM</th>
                                <th scope="col">VIZUALIZAR</th>
                                <th scope="col">EXCLUIR</th>


                                
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php
                                //lista todas as solicitações
                                foreach ($a as $value) {
                            ?>        
                                    <tr>
                                        <td><?=$value['NOME']?></td>
                                        <td><?=$value['DT_NASCIMENTO']?></td>
                                        <td><?=$value['ENDERECO']?></td>
                                        <td><?=$value['BAIRRO']?></td>
                                        <td><?=$value['CIDADE']?></td>
                                        <td><?=$value['NOME_ANIMAL']?></td>
                                        <td><?=$value['FACEBOOK']?></td>
                                        <td><?=$value['INSTAGRAM']?></td>
                                        <td><button class="btn btn-success" onclick="listarSolic(<?=$value['COD_INC']?>)">Vizualizar</button></td>
                                        <td><button class="btn btn-danger" onclick="excluirSolic(<?=$value['COD_INC']?>)">Excluir</button></td>
                                    
                                    </tr>
                                    
                            <?php
                                }
                            ?>
                        
                    </table>
                </div>
            
        </body>
    </html>
<?php
    }else{
        header('Location: ../../index.php');
    }
?>