<?php 
// DEV - GABRIEL E. J. DOS SANTOS
include ('./menu.php');

if (isset($_POST["salvar"])){

$titulo = $_POST ["titulo"];
$nome = $_POST ["nome"];
$importancia = $_POST ["importancia"];
$aviso = $_POST ["descricao"];


if(is_dir("./avisos-upload/"))
{
echo "";
}
else
{
echo "A Pasta não Existe";
} 

// CASO SEJA ENVIADO UMA IMAGEM E PEGO O NOME DELA E FEITO UM NOVO ALEATORIO E REPASSADO O NOVO NOME PARA O BANCO

if (empty($_FILES['arquivo']['name'])) {
  echo 'Você não selecionou nenhum arquivo';//Aqui você pode trocar por um alert ou customizar como desejar, é um aviso que o usuário provavelmente não selecionou nada
  $novo_nome = "";

  }
  else{

    $extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
    $novo_nome = md5(time()). $extensao;
    $diretorio = "./avisos-upload/"; 
    //C:\xampp\htdcs\helpson\home\upload
    move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);
    $novo_nome;
  }



$sql = "INSERT INTO avisos (titulo, ativo, descricao, importancia, nome, anexo) VALUES ('$titulo','1', '$aviso', '$importancia', '$nome', '$novo_nome')";



$verifica = mysqli_query($con_intra,$sql) or die (mysqli_error($con_intra)) ;
$linhas = mysqli_affected_rows($con_intra);
if ($linhas){
    
}else{
    echo "Erro, contate um administrador do sistema!";
}


}


?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <!-- TITULO DA PAGINA---->
    <title>Inicio</title>
    <link rel="icon" href="./Home/Imagens/icone.png" />
    <!-- ICONE DA PAGINA-->
    <!-- CSS DA PAGINA---->
    <link rel="stylesheet" type="text/css" href="./CSS/boody.css">
    <link rel="stylesheet" type="text/css" href="./CSS/avisos-form.css">
  </head>
  <body>
    <div class="conteudos">
      <h1>AVISOS</h1>
      <div>
        <div class="div-formulario-avisos">
          <form action="" class="" enctype="multipart/form-data" method="POST">
            <label class="label-formulario-avisos">Titulo:</label><br>
            <input class="input-formulario-avisos" id="titulo" name="titulo"></input>
            <br>
            <label class="label-formulario-avisos">Nome:</label><br>
            <input class="input-formulario-avisos" id="nome" name="nome"></input>
            <br>
            <label class="label-formulario-avisos">Importancia:</label><br>
            <select class="input-formulario-avisos" name="importancia" id="importancia">
              <option value="1">Urgente</option>
              <option value="2">Media</option>
              <option value="3">Baixa</option>
            </select>
            <br>
            <label class="label-aviso-formulario-avisos">Aviso</label><br>
            <textarea class="" id="descricao" name="descricao"></textarea>
            <br>
            <br>
            <input type="file" id="arquivo" name="arquivo" class="arquivo">
            <button type="submit" class="btn-salvar" name="salvar" id="salvar">Salvar</button>
          </form>
        </div>
        <br><br>
        
    </div>
    <!-- SCRIPT DA PAGINA---->
    <script src="./funcoes/funcoes-body-conteudos.js"></script>
    <script src="./funcoes/table.js"></script>
  </body>
</html>