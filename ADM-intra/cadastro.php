<?php
//DEV GABRIEL SANTOS
include('./conexao-intra/conexao-intra.php');
include('../Chamados/conexao-chamados/conexao-chamados.php');

if (isset($_POST["cadastrar"])) {
    $valoresSelecionados = $_POST['opcao'];
    $login_con = $_POST['login_con'];
    $nome_con = $_POST['nome_con'];
    $email_con = $_POST['email_con'];
    $senha_con = $_POST['senha_con'];
    $genero = $_POST['genero'];
    $SetorUser = $_POST['SetorUser'];
    $Cidade_user = $_POST['Cidade_user'];
    
    
    $t = [];

// Verifica se a senha tem pelo menos 6 caracteres
if (strlen($senha_con) < 6) {
  echo "A senha deve ter pelo menos 6 caracteres.";
  exit();
  echo " <META HTTP-EQUIV='REFRESH' CONTENT='5;  ./cadastro.php'>";
}

// Verifica se a senha contém pelo menos uma letra maiúscula
if (!preg_match('/[A-Z]/', $senha_con)) {
  echo "A senha deve conter pelo menos uma letra maiúscula.";
  exit();
  echo " <META HTTP-EQUIV='REFRESH' CONTENT='5;  ./cadastro.php'>";
}

// Verifica se a senha contém pelo menos uma letra minúscula
if (!preg_match('/[a-z]/', $senha_con)) {
  echo "A senha deve conter pelo menos uma letra minúscula.";
  exit();
  echo " <META HTTP-EQUIV='REFRESH' CONTENT='5;  ./cadastro.php'>";
}

// Verifica se a senha contém pelo menos um símbolo
if (!preg_match('/[!@#$%^&*()-=_+]/', $senha_con)) {
  echo "A senha deve conter pelo menos um símbolo.";
  exit();
  echo " <META HTTP-EQUIV='REFRESH' CONTENT='5;  ./cadastro.php'>";
}

// Verifica se a senha contém pelo menos um número
if (!preg_match('/\d/', $senha_con)) {
  echo "A senha deve conter pelo menos um número.";
  exit();
  echo " <META HTTP-EQUIV='REFRESH' CONTENT='5;  ./cadastro.php'>";
}

    foreach($valoresSelecionados as $valor) {
       array_push($t, $valor);
    }
   
  $acessos = implode(",", $t); // Converte o array em uma string separada por vírgulas
    //-------------------------------------------Criptografia da senha
  $senha3 = md5($senha_con);
  $senha2 = password_hash($senha_con, PASSWORD_DEFAULT);

//-------------------------------------------Verifica se já existe o cadadtro - login

  $sqluser= "SELECT * FROM login where login_user= '$login_con'";
  $result_user1 = mysqli_query($con_intra, $sqluser);
  $consulta_user1 = mysqli_query($con_intra,$sqluser);
  $slq_query1 = mysqli_num_rows($result_user1);
//-------------------------------------------Verifica se já existe o cadadtro - e-mail 

  $sqluser_email= "SELECT * FROM login where email = '$email_con'";
  $result_user2 = mysqli_query($con_intra, $sqluser_email);
  $consulta_user2 = mysqli_query($con_intra,$sqluser_email);
  $slq_query2 = mysqli_num_rows($result_user2);


  if( $consulta_user1->num_rows > 0 ) {//se retornar algum resultado
    echo '<div style= "text-align: center; margin-top:10%; font-size:35px; background-color: #fff; font-family: "Trebuchet MS", Verdana, sans-serif "> 
					ja existe um login com esse nome</div>';
          echo " <META HTTP-EQUIV='REFRESH' CONTENT='5;  ./cadastro.php'>";
    exit();
  } 
  if ( $consulta_user2->num_rows > 0 ) {//se retornar algum resultado
    echo '<div style= "text-align: center; margin-top:10%; font-size:35px; background-color: #fff; font-family: "Trebuchet MS", Verdana, sans-serif "> 		
    ja existe um login com esse e-mail </div>';
    echo " <META HTTP-EQUIV='REFRESH' CONTENT='5;  ./cadastro.php'>";
    exit();
  }
  else {
    
  }
    $sql = "INSERT INTO login (Login_user, nomeCompleto, email, senha, acessos, genero, ativo, Setor_user) VALUES ('$login_con', '$nome_con', '$email_con','$senha2','$acessos','$genero', '1', '$SetorUser')";
    $consulta = mysqli_query($con_intra, $sql);
    
    if ($consulta) {
        $linhasAfetadas = mysqli_affected_rows($con_intra);
        if ($linhasAfetadas > 0) {
            echo "Cadastrado com sucesso!";
        } else {
            echo "Nenhum registro foi inserido.";
        }
    } else {
        echo "Erro ao realizar o cadastro: " . mysqli_error($con_intra);
    }

   
    
    

  }

  $consulta_cidade = "SELECT * FROM cidades WHERE ativo = '1'"; 
  $con_cidade =$con_chamados->query($consulta_cidade) or die ($con_chamados->error);

  $consulta_setor = "SELECT * FROM setor WHERE ativo = '1'"; 
  $con_setor =$con_chamados->query($consulta_setor) or die ($con_chamados->error);


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>cadastramento gerencial</title>
        <link rel="icon" href="./Home/Imagens/icone.png" /><!-- ICONE DA PAGINA-->
        <link rel="stylesheet" type="text/css" href="./CSS/cadastro.css" />
        <link rel="stylesheet" type="text/css" href="./Home/CSS/node_modules/bootstrap/dist/css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="./Home/CSS/node_modules/bootstrap-icons/bootstrap-icons.svg" />
    </head>
    
    <div class="container" >
  
  <div class="content">      
    <!--FORMULÁRIO DE LOGIN-->
    <div id="login">
    
    </div>

    <!--FORMULÁRIO DE CADASTRO-->
    <div id="cadastro">
      <form method="post" action=""> 
        <h1>Cadastro Gerencial</h1> 
        <p> 
          <label for="nome_cad">Seu Login</label>
          <input id="nome_cad" name="login_con" required="required" type="text" placeholder="nome.sobrenome" />
        </p>

        <p> 
          <label for="nome_cad">Seu nome</label>
          <input id="nome_cad" name="nome_con" required="required" type="text" placeholder="nome completo" />
        </p>
        <p> 
          <label for="senha_cad">Genero?</label><br><br>
          <INPUT class="radio" TYPE="radio" NAME="genero" VALUE="1"> Feminino<br>
          <INPUT class="radio" TYPE="radio" NAME="genero" VALUE="2"> Masculnino<br>
          <INPUT class="radio" TYPE="radio" NAME="genero" VALUE="3"> LGPDQIA+<br>
          <INPUT class="radio" TYPE="radio" NAME="genero" VALUE="4"> Prefiro não dizer
       
             
        </p> 
        
        <p> 
          <label for="email_cad">Seu e-mail</label>
          <input id="email_cad" name="email_con" required="required" type="email" placeholder="contato@dominio.com"/> 
        </p>

        <p> 
          <label for="email_cad">Cidade:</label><br>
          <select class="option_cad" id="Cidade_user" name="Cidade_user" aria-label="Floating label select example">
                      <option value= "" selected="">Selecione</option>
                      <?php while($dado3 = $con_cidade->fetch_array()) { ?>
                                 <option value="<?php echo ($dado3['id_cidade']) ?>"><?php echo ($dado3['nome_cidade']); ?> - <?php echo ($dado3['UF']); ?> <td></td>
                                 </option>
                                 <?php } ?>
                    </select>

<br><br>
                    <label for="email_cad">Setor</label><br>
          <select class="option_cad" id="SetorUser" name="SetorUser" aria-label="email_cad">
                      <option value= "" selected="">Selecione</option>
                      <?php while($dado4 = $con_setor->fetch_array()) { ?>
                                 <option value="<?php echo ($dado4['IDsetor']) ?>"><?php echo ($dado4['nome_setor']); ?> <td></td>
                                 </option>
                                 <?php } ?>
                    </select>



          
        </p>
        
        <p> 
          <label for="senha_cad">Sua senha</label>
          <input id="senha_cad" name="senha_con" required="required" type="password" placeholder="devem conter as regras de senha da empresa"/>
        </p>
        
        <p> 
          <label for="senha_cad">Acesso a Sistemas?</label><br><br>
          <INPUT TYPE="checkbox" NAME="opcao[]" VALUE="1"> Todos<br>
          <INPUT TYPE="checkbox" NAME="opcao[]" VALUE="2"> Permuta<br>
          <INPUT TYPE="checkbox" NAME="opcao[]" VALUE="3"> Chamados TI<br>
          <INPUT TYPE="checkbox" NAME="opcao[]" VALUE="4"> Chamados RH<br>
          <INPUT TYPE="checkbox" NAME="opcao[]" VALUE="5"> Chamados Financeiro<br>             
          <INPUT TYPE="checkbox" NAME="opcao[]" VALUE="6"> Intranet<br>             
        </p>  

      
        
    


        <p> 
          <input type="submit" name="cadastrar" value="Cadastrar"/> 
        </p>      
      </form>
    </div>
  </div>
</div> 