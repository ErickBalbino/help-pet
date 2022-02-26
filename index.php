<?php
    include_once 'admin/scripts/conexao.php';

    $conn = new Database();  
    $conn = $conn->db_mysql();
        //query para listagem
    $b = $conn->prepare(
        "SELECT * FROM tbanimais
        ORDER BY NOME_ANIMAL"
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
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="src/media/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="js.js"></script>
    <title>Marlove</title>
</head>
<body>
    <header class="header"> 
        <div class="logo">
            <a href="index.php">
                <img src="src/media/logo.png" alt="logo marlove" class="logo_image"/>
            </a>
        </div>

        <div class="navbar">
            <nav>
                <ul>
                    <li><a href="src/pages/structure/sobre.html">Sobre</a></li>
                    <li><a href="src/pages/structure/adocao.php">Adoção</a></li>
                    <li><a href="src/pages/structure/doacao.html">Doação</a></li>
                    <li><a href="src/pages/structure/parceiros.html" id="btn_parceiros">Parceiros</a></li>
                    <li><a href="src/pages/structure/contato.html" id="btn_contato">Contato</a></li>
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
                        <a href="index.html" class="list_item_link"><i class="fa fa-columns"></i>Home</a>
                    </li>
                    <li class="list_item">
                        <a href="src/pages/structure/sobre.html" class="list_item_link"><i class="fa fa-question-circle"></i>Sobre</a>
                    </li>
                    <li class="list_item">
                        <a href="src/pages/structure/adocao.html" class="list_item_link"><i class="fa fa-heart"></i>Adoção</a>
                    </li>
                    <li class="list_item">
                        <a href="src/pages/structure/doacao.html" class="list_item_link"><i class="fa fa-shopping-basket"></i>Doação</a>
                    </li>
                    <li class="list_item">
                        <a href="src/pages/structure/parceiros.html" class="list_item_link"><i class="fa fa-handshake-o"></i>Parceiros</a>
                    </li>
                    <li class="list_item">
                        <a href="src/pages/structure/contato.html" class="list_item_link"><i class="fa fa-comments"></i>Contato</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <main>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="src/media/banner-adocao.png" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="src/media/banner-doacao.png" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="src/media/banner-contato.png" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
        </div>

        <section>
            <h1>Adote um amigo</h1>
            <div class="container_cachorros">
                <?php
                    
                    foreach ($a as $value) {
                ?>
                    
                        <div class="container_cachorros_cachorro">
                            <div class="image">
                                <img src="admin/scripts/admin/uploads/<?=$value['FOTO']?>" alt="dog 1" />
                            </div>

                            <div class="text">
                                <h3><?=$value['NOME_ANIMAL']?></h3>
                                <p><?=$value['SEXO_ANIMAL']?>, <?=$value['IDADE']?></p>
                                
                            </div>

                            <div class="button">
                              
                                    <input class="btn_verperfil" type="button" value="VER PERFIL" id="btn" onclick="chamarDog(<?=$value['COD']?>)"/>
                               
                               
                            </div>
                        </div>
                    
                <?php
                    }
                ?>
        </div>


    <footer>
        <div class="first_container">
            <div class="first_container_logo">
                <img src="src/media/logo-footer.png" alt="imagem logo do footer" />
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
        </div>
    </footer>
</body>
</html>
