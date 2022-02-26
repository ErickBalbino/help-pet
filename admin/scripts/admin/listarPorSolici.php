<?php
    session_start();
    if($_SESSION["login"]=="logado"){
        include_once "../conexao.php";

        $cod_inc = $_GET["cod"];
    
        $conn = new Database();  
        $conn = $conn->db_mysql();

            $sql = $conn->prepare(
            "SELECT * FROM cadastroadocao
            WHERE COD_INC = $cod_inc"
            );
            $sql->execute();  
            $a=$sql->fetchAll(\PDO::FETCH_ASSOC);
?>
        <html>
            <head>
            <link rel="stylesheet" href="css/bootstrap.css">
            <script src="js/js.js"></script>
            </head>
            <body>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 bg-info"><h1>SOLICITAÇÃO</h1></div>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 border border-info">
                        <table class="table table-striped">
                            <tr>
                                <th class="text-center" scope="col">NOME</th>                      
                                <th class="text-center" scope="col">  DATA DE <br> NASCIMENTO</th>                    
                                <th class="text-center" scope="col">CEP</th>
                            </tr>
                            <tr>
                                <td class="text-center"><?=$a[0]["NOME"]?></td>
                                <td class="text-center"><?=$a[0]["DT_NASCIMENTO"]?></td>
                                <td class="text-center"><?=$a[0]["CEP"]?></td>                       
                            </tr>
                            <tr>
                                <th class="text-center" scope="col">ENDEREÇO</th>
                                <th class="text-center" scope="col">BAIRRO</th>
                                <th class="text-center" scope="col">CIDADE</th>
                            </tr>
                            <tr>
                                <td class="text-center"><?=$a[0]["ENDERECO"]?></td>
                                <td class="text-center"><?=$a[0]["BAIRRO"]?></td>
                                <td class="text-center"><?=$a[0]["CIDADE"]?></td>
                            </tr>
                            <tr>
                                <th class="text-center" scope="col">CELULAR</th>
                                <th class="text-center" scope="col">EMAIL</th>
                                <th class="text-center" scope="col">PROFISSÃO</th>
                            </tr>
                            <tr>
                                <td class="text-center"><?=$a[0]["CELULAR"]?></td>
                                <td class="text-center"><?=$a[0]["EMAIL"]?></td>
                                <td class="text-center"><?=$a[0]["PROFISSAO"]?></td>
                            </tr>
                            <tr>
                                <th class="text-center" scope="col">EMPRESA</th>
                                <th class="text-center" scope="col">FILHOS</th>
                                <th class="text-center" scope="col">PESOAS QUE <br> MORAM NA CASA</th>
                            </tr>
                            <tr>
                                <td class="text-center"><?=$a[0]["EMPRESA"]?></td>
                                <td class="text-center"><?=$a[0]["FILHOS"]?></td>
                                <td class="text-center"><?=$a[0]["QTD_PESSOAS"]?></td>
                            </tr>
                            <tr>
                                <th class="text-center" scope="col">CONTATOS PROXIMOS</th>
                                <th class="text-center" scope="col">NOME DO ANIMAL</th>
                                <th class="text-center" scope="col">INSTAGRAM</th>  
                                
                            </tr>
                            <tr>
                                <td class="text-center"><?=$a[0]["CTT_PROXIMO"]?></td>
                                <td class="text-center"><?=$a[0]["NOME_ANIMAL"]?></td>
                                <td class="text-center"><?=$a[0]["INSTAGRAM"]?></td>
                            </tr>
                            <tr>
                                     
                                <th class="text-center" scope="col">FACEBOOK</th>
                                <th></th>
                                <th></th>
                            </tr>
                            <tr>
                                <td class="text-center"><?=$a[0]["FACEBOOK"]?></td>
                                <td class="text-center"><input type="button" class="btn btn-success" id="Aprovar" value="Aprovar" onclick='cadastro()'></td>
                                <td class="text-center"><class="text-center"><input type="button" class="btn btn-warning" id="voltar" onclick="listar()" value="Voltar"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            
            </body>

        </html>
<?php
    }else{   
        header("Location: ../../index.php");
    }
?>