function listar(){
    window.location.href = 'listar.php'
}

function cachorros(){
    window.location.href = 'cachorros.php'
}

function cadastro(s){
    var resultado = confirm("Realmente deseja excluir a solicitação de");
    if(resultado == true){
            window.location.href='cadastro.php?s='+s;
        }
    
}

function usuarios(){
    window.location.href = 'criarUsuario.php'
}

function listarSolic(COD){
     window.location.href = 'listarPorSolici.php?cod='+ COD;
}

function excluirSolic(COD){
    var resultado = confirm("Realmente deseja excluir a solicitação de");
    if(resultado == true && COD != 1){
        window.location.href = 'listar.php?cod='+ COD;
    }else{
        window.location.href = 'listar.php?';
    }
    
}

function cadastrarAnimal(){
    window.location.href = 'cadastrarAnimal.php';
 }
 
function sair(){
   window.location.href = 'listar.php?cod=1';
}

function pesquisa(pes){
    window.location.href = 'listar.php?pes='+pes;

} 

function mudarSit(s){
    var resultado = confirm("Realmente deseja alterar situação");
    if(resultado == true){
        window.location.href = 'mudarSit.php?s='+s;
    }else{
        window.location.href = 'mudarSit.php';
    }
   
}

function situacao(s){
    window.location.href = 'cachorros.php?s='+s;
}



