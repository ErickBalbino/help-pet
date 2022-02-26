<?php
    session_start();
    if($_SESSION['login']=='logado'){
    
        include_once '../conexao.php';
       
        $conn = new Database();  
        $conn = $conn->db_mysql();

        $sql = $conn->prepare(
            "SELECT DISTINCT SITUACAO FROM tbanimais"
            );
        $sql->execute();  
        $a=$sql->fetchAll(\PDO::FETCH_ASSOC);
        
        //query para listagem do select dos cachorros
        

        if($_GET){
            if($_GET['s']){
                $pes = $_GET['s'];
                if($pes == 1){
                    $conn = new Database();  
                    $conn = $conn->db_mysql();

                    $sqli = $conn->prepare(
                        "SELECT * FROM tbanimais
                        ORDER BY NOME_ANIMAL"
                        );
                    $sqli->execute();  
                    $b=$sqli->fetchAll(\PDO::FETCH_ASSOC);
                }else{
                    $conn = new Database();  
                    $conn = $conn->db_mysql();

                    $sqli = $conn->prepare(
                        "SELECT * FROM tbanimais
                        WHERE SITUACAO = '$pes'
                        ORDER BY NOME_ANIMAL"
                        );
                    $sqli->execute();  
                    $b=$sqli->fetchAll(\PDO::FETCH_ASSOC);
                }
            }
        }else{
            $conn = new Database();  
            $conn = $conn->db_mysql();


            $sqli = $conn->prepare(
                "SELECT * FROM tbanimais
                ORDER BY NOME_ANIMAL"
                );
            $sqli->execute();  
            $b=$sqli->fetchAll(\PDO::FETCH_ASSOC);
        
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
                    <h1>Lista de animais</h1>
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
                    <select name="situacao" id="situacao" onchange="situacao(document.getElementById('situacao').value)">
                        <option value="" disable selected hidden>Pesquisa por situação</option>
                        <option value="1">Todos</option>
                        
                        <?php
                            foreach($a as $value){
                        ?>

                                <option value="<?=$value['SITUACAO']?>"><?=$value['SITUACAO']?></option>

                        <?php
                            }
                        ?>
                    </select>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">NOME DO CACHORRO</th>
                                <th scope="col">SEXO DO ANIMAL</th>
                                <th scope="col">IDADE</th>
                                <th scope="col">SITUAÇÃO</th>
                                <th scope="col">FOI ADOTADO?</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php
                                //lista todas as solicitações
                                foreach ($b as $value) {
                            ?>        
                                    <tr>
                                        <td><?=$value['NOME_ANIMAL']?></td>
                                        <td><?=$value['SEXO_ANIMAL']?></td>
                                        <td><?=$value['IDADE']?></td>
                                        <td><?=$value['SITUACAO']?></td>
                                        <td><input type="button" class="btn btn-success" value="Foi adotado" onclick="mudarSit(<?=$value['COD']?>)"></td>
                                                    
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