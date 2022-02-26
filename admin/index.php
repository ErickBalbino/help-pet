<?php
    if($_GET){
        $s=$_GET['s'];
        if($s == 'false'){
?>

            <script>alert('Senha e/ou usuário incorretos!')</script>

<?php
        }
    }
?>
<html>
    <head>
        <link rel="stylesheet" href="scripts/admin/css/tela-login.css">
        <script src="js/js.js"></script>        
        
    </head>
    <body>
        <div class="container">
            <form method='POST' action="validaSessao.php">
                <h2>LOGIN</h2>                           
                <input type="text" name="usuario" id="usuario" placeholder="Informe seu Usuário">
                <input type="password" name="senha" id="senha" placeholder="Informe sua Senha">                 
                <input type="submit"  value="ENTRAR" id="botao">
            </form>
        </div>
    </body>
</html>