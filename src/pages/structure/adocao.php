<?php
    include_once '../../../admin/scripts/conexao.php';

        $conn = new Database();  
        $conn = $conn->db_mysql();
        
        //query para listagem do select dos cachorros
        $sqli = $conn->prepare(
            "SELECT DISTINCT NOME_ANIMAL FROM tbanimais
            ORDER BY NOME_ANIMAL"
            );
        $sqli->execute();  
        $b=$sqli->fetchAll(\PDO::FETCH_ASSOC);
        
        if($_GET){
            $test = $_GET['s'];
            if($test == 'true'){
?>

                <script>alert('Sua solicitação foi realizada com sucesso!')</script>

<?php
            }else{
?>

                <script>alert('Não foi possivel realizar sua solicitação! Por favor tente mais tarde!')</script>

<?php
            }
        }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/adocao.css">
    <link rel="shortcut icon" href="../../media/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Marlove | Adoção</title>
</head>
<body>
    <header class="d-flex align-items-center"> 
        <div class="logo">
            <a href="../../../index.php">
                <img src="../../media/logo.png" alt="logo marlove" class="logo_image"/>
            </a>
        </div>

        <div class="navbar">
            <nav>
                <ul>
                    <li><a href="sobre.html">Sobre</a></li>
                    <li><a href="adocao.php">Adoção</a></li>
                    <li><a href="doacao.html">Doação</a></li>
                    <li><a href="parceiros.html" id="btn_parceiros">Parceiros</a></li>
                    <li><a href="contato.html" id="btn_contato">Contato</a></li>
                </ul>
            </nav>
        </div>

        <div class="cabecalho_sidebar">
            <input type="checkbox" name="check" id="check" class="checkbox"/>
            <label for="check">
                <i class="fa fa-bars" id="btn"></i>
                <i class="fa fa-close" id="close"></i>
            </label>

            <div class="sidebar">
                <ul class="list">
                    <li class="list_item">
                        <a href="../../../index.html" class="list_item_link"><i class="fa fa-columns"></i>Home</a>
                    </li>
                    <li class="list_item">
                        <a href="sobre.html" class="list_item_link"><i class="fa fa-question-circle"></i>Sobre</a>
                    </li>
                    <li class="list_item">
                        <a href="adocao.php" class="list_item_link"><i class="fa fa-heart"></i>Adoção</a>
                    </li>
                    <li class="list_item">
                        <a href="doacao.html" class="list_item_link"><i class="fa fa-shopping-basket"></i>Doação</a>
                    </li>
                    <li class="list_item">
                        <a href="parceiros.html" class="list_item_link"><i class="fa fa-handshake-o"></i>Parceiros</a>
                    </li>
                    <li class="list_item">
                        <a href="contato.html" class="list_item_link"><i class="fa fa-comments"></i>Contato</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <main>
        <div class="container_text">
            <h1>Formulário de Adoção</h1>
            <p>Obrigado por chegar até aqui. Seu formulário será avaliado por nossa equipe o mais rápido possível.</p>
            <p>Fique atento a página do animal que gostaria de adotar para saber das novidades do processo de escolha do adotante. A nossa intenção e desafio é manter a taxa de devolução de animais em 0%. Pois é enormemente traumático para um animal voltar para o abrigo depois de ter experimentado um novo lar. Espero que entenda o nosso cuidado, contamos com você para tornar essa decisão de adotar um passo responsável e de muito amor.</p> <p>Todas as informações abaixo são confidenciais e de uso exclusivo para o processo de adoção.</p>
        </div>

        <form action="../../../admin/scripts/php/adotar_sendemail.php?" method="POST" class="card" enctype="multipart/form-data">
            <div class="container_label"> 
                <label for="txtNome">Nome</label>
                <input type="text" name="txtNome" placeholder="Digite seu nome" required/> 
            </div>
            <div class="container_label"> 
                <label for="txtDataNascimento">Data de nascimento</label> 
                <input type="date" name="txtDataNascimento" placeholder="dd/mm/aaaa" required/> 
            </div>
            <div class="container_label"> 
                <label for="numberCEP">CEP</label> 
                <input type="text" name="numberCEP" placeholder="00000-000" required/> 
            </div>
            <div class="container_label"> 
                <label for="txtEndereco">Endereço</label> 
                <input type="text" name="txtEndereco" placeholder="Informe seu endereço (RUA, NÚMERO DA CASA)" required/> 
            </div>
            <div class="container_label"> 
                <label for="txtBairro">Bairro</label> 
                <input type="text" name="txtBairro" placeholder="Informe seu bairro" required/> 
            </div>
            <div class="container_label"> 
                <label for="txtCidade">Cidade</label> 
                <input type="text" name="txtCidade" placeholder="Informe seu cidade" required/> 
            </div>
            <div class="container_label"> 
                <label for="txtContato">Celular</label> 
                <input type="text" name="txtContato" placeholder="(XX) 9XXXX-XXXX" required/> 
            </div>
            <div class="container_label"> 
                <label for="txtEmail">Email</label> 
                <input type="email" name="txtEmail" placeholder="example@gmail.com" required/> 
            </div>
            <div class="container_label"> 
                <label for="txtProfissao">Profissão</label> 
                <input type="text" name="txtProfissao" placeholder="Informe sua profissão" required/> 
            </div>
            <div class="container_label"> 
                <label for="txtEmpresa">Empresa</label> 
                <input type="text" name="txtEmpresa" placeholder="Nome da empresa/local de trabalho" required/> 
            </div>
            <div class="container_label"> 
                <label for="txtFilhos">Caso possua filhos, indicar quantos e suas idade</label> 
                <input type="text" name="txtFilhos" placeholder="Número de filhos e suas idades" required/> 
            </div>
            <div class="container_label"> 
                <label for="txtPessoasResidencia">Quantas pessoas moram na sua residência?</label> 
                <input type="number" name="txtPessoasResidencia" placeholder="Informe a quantidade de pessoas" required/> 
            </div>
            <div class="container_label"> 
                <label for="txtContatoProximo">Nome e telefone de duas pessoas para contato</label> 
                <input type="text" name="txtContatoProximo" placeholder="Informe os nomes e telefones" required/> 
            </div>

            <div class="container_label"> 
                <label for="txtNomeAnimal">Nome do animal de interesse para adoção</label> 
                <select type="text" name="txtNomeAnimal" placeholder="Informe o nome do animal" required>
                    <option value="" disabled selected hidden>escolha</option>
                    <?php
                        foreach($b as $value){
                    ?>

                        <option value="<?=$value['NOME_ANIMAL']?>"><?=$value['NOME_ANIMAL']?></option>

                    <?php
                        }
                    ?>
                </select> 
            </div>

            <div class="container_label"> 
                <label for="txtLinkFacebook">Facebook</label> 
                <input type="text" name="txtLinkFacebook" placeholder="Link do facebook" required/> 
            </div>
            <div class="container_label"> 
                <label for="txtLinkInstagram">Instagram</label> 
                <input type="text" name="txtLinkInstagram" placeholder="Link do instagram" required/> 
            </div>
            
            <div class="container_label"> 
                <label for="cars">Está ciente de que será feitas visitas e averiguações?</label>
                <select name="txtRespVerificacao" required>
                    <option value="Sim">Sim</option>
                    <option value="Não">Não</option>
                </select> <br> 
            </div>

            <div class="container_button">
                <div for="">
                    <button id="btn_enviar">Enviar mensagem</button>
                </div>
                
                <div>
                    <button type="reset" id="btn_resetar">Apagar campos</button>
                </div>
            </div>
        </form>
    </main> 

    <footer>
        <section class="first_container">
            <div class="first_container_logo">
                <img src="../../media/logo-footer.png" alt="imagem logo do footer" />
                <p>Somos uma organização que te ajuda a conseguir um filho de 4 patas!</p>
            </div>

            <div class="first_container_links">
                <h3>MARLOVE</h3>
                <ul>
                    <a href="adocao.html">Adotar um pet</a>
                    <a href="doacao.html">Doar alimento</a>
                    <a href="contato.html">Entre em contato</a>
                    <a href="parceiros.html">Nossos parceiros</a>
                </ul> 
            </div>

            <div class="first_container_social">
                <ul class="list">
                    <a href="#"><i class="fa fa-whatsapp"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                </ul>
            </div>
        </section>
    </footer>
</body>
</html>
