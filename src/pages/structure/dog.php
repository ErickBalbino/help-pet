<?php
    include_once '../../../admin/scripts/conexao.php';
    if($_GET){
        $cod = $_GET['cod'];

        $conn = new Database();  
        $conn = $conn->db_mysql();
            //query para listagem
        $b = $conn->prepare(
            "SELECT * FROM tbanimais
            WHERE COD = $cod"
            );
        $b->execute();
        $a=$b->fetchAll(\PDO::FETCH_ASSOC);

    
        
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/dog.css">
    <link rel="shortcut icon" href="../../media/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Marlove | Contato</title>
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
                        <a href="adocao.html" class="list_item_link"><i class="fa fa-heart"></i>Adoção</a>
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
        <section class="container">
            <?php
                foreach ($a as $value) {
            ?>
                    <div class="container_apresentacao">
                        <div class="image">
                            <img src="../../../admin/scripts/admin//uploads/<?=$value['FOTO']?>" />
                        </div>
                        <div class="text">
                            <h3><?=$value['NOME_ANIMAL']?></h3>
                            <p><?=$value['SEXO_ANIMAL']?>, <?=$value['IDADE']?></p>
                        </div>
                    </div> 

                    <div class="descricao">
                        <p><?=$value['HISTORIA']?></p>
                    </div>
        <?php
                }
        ?>
        </section>
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
<?php
    }
?>