<?php 
// DEV - GABRIEL E. J. DOS SANTOS
include ('./menu.php');
if (isset($_POST["deletar-aviso"])){


$ID_avisoDeleta = $_POST ["deletar-aviso"];




$sql = "DELETE FROM avisos where ID_avisos = '$ID_avisoDeleta'";
$verifica = mysqli_query($con_intra,$sql) or die (mysqli_error($con_intra)) ;

$linhas = mysqli_affected_rows($con_intra);
if ($linhas){
  echo 
  "
  <div style='width: 500px; margin-left: 50% ; color:#fff;height: 100px;' > 
  <h1>Deletado com sucesso</h1>
  </div> 
  ";

}else{
  echo 
  "
  <div style='width: 700px; font-size:5px; margin-left: 35% ; color:red;height: 100px;' > 
  <h1>Erro, contate um administrador</h1>
  </div> 
  ";
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
      
        <br>
        <table class="table" id="myTable" style="witdh: 200px">
          <thead>
            <tr>
              <th>Botão:</th>
              <th>Titulo:</th>
              <th>Aviso:</th>
              <th>Anexo:</th>
              <th>Deletar:</th>
            </tr>
          </thead>
          <tbody>
            <tr> <?php 
                        $pesquisa_login = "select * FROM avisos where ativo = '1' ";
                        $result_login = mysqli_query($con_intra, $pesquisa_login);
                        while($con_3 = mysqli_fetch_array($result_login)){
                        $ID_aviso = $con_3['ID_avisos'];
                        $nome_aviso = $con_3['nome'];
                        $Titulo_aviso = $con_3['titulo'];
                        $Descri_aviso = $con_3['descricao'];
                        $anexo = $con_3['anexo'];
                        ?> <td> <?php echo $nome_aviso ?> </td>
              <td> <?php echo $Titulo_aviso ?> </td>
              <td> <?php echo $Descri_aviso ?> </td>

           <?php if (empty($anexo)){?>
            <td> Sem Anexo </td>

           <?php
           }else{?>
            <td> <a href="./avisos-upload/<?php echo $anexo ?>"> Anexo</a> </td>
           <?php
          }?>


              <td> 
                <form id="" class="" action="" method="POST">
                <button type="submit" class= "btn-deletar" id="deletar-aviso" name="deletar-aviso" value="<?php echo $ID_aviso ?>">Deletar</button>  
                  </form>
                    </td>
            </tr> <?php
                    }?>
          </tbody>
        </table>
      </div>
      <script>
        $(document).ready(function() {
          $('#myTable').DataTable();
        });
      </script>
    </div>
    <!-- SCRIPT DA PAGINA---->
    <script src="./funcoes/funcoes-body-conteudos.js"></script>
    <script src="./funcoes/table.js"></script>
  </body>
</html>