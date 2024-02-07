<?php 
/*
// Supondo que você já tenha uma conexão com o banco de dados

// Verificar se o usuário tem acesso a todos os sistemas
$sql = "SELECT * FROM login WHERE FIND_IN_SET('1', acessos)";
$resultado = mysqli_query($conexao, $sql);

if (mysqli_num_rows($resultado) > 0) {
    // O usuário tem acesso a todos os sistemas
    // Faça algo aqui
} else {
    // Verificar se o usuário tem acesso aos sistemas 2 e 5
    $sql = "SELECT * FROM login WHERE FIND_IN_SET('2', acessos) AND FIND_IN_SET('5', acessos)";
    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        // O usuário tem acesso aos sistemas 2 e 5
        // Faça algo aqui
    } else {
        // O usuário não tem acesso aos sistemas desejados
        // Faça algo aqui
    }
}

// E assim por diante, você pode adicionar mais estruturas condicionais para verificar outras combinações de acesso


*/
include ('./menu.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
         <!-- TITULO DA PAGINA---->
        <title>Inicio</title>
        <link rel="icon" href="./Home/Imagens/icone.png" /> <!-- ICONE DA PAGINA-->
         <!-- CSS DA PAGINA---->
        <link rel="stylesheet" type="text/css" href="./CSS/boody.css"> 
    </head>
        <body>
             <div  class="conteudos">
                     <h1>AVISOS</h1>

                    <div>
                    <h1>ijdsjdsd</h1>
                    </div>        
      
            </div>

            <!-- SCRIPT DA PAGINA---->
         <script src="./funcoes/funcoes-body-conteudos.js" ></script>
     </body>
</html>

