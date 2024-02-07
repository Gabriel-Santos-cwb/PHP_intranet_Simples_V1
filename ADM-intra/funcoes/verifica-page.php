<?php

/* DEV- Gabriel Eduardo J. Santos - Curitiba/PR */

//Iniciando a sessão:
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}

	if (empty($_SESSION['Login_user'])){
		echo '<div style= "text-align: center; margin-top:10%; font-size:35px; background-color: #fff; font-family: "Trebuchet MS", Verdana, sans-serif "> 
					
		Não autenticado no sistema, efetue o login e tente novamente 
	  
	  
		</div>
		';

      	
     		 echo " <META HTTP-EQUIV='REFRESH' CONTENT='4; ../index.php'>";
			die();

    }
//Acessando valores dentro de uma sessão:
 $_SESSION['Login_user'];
 $_SESSION['id_login'];
 $_SESSION['genero'] ;
 $_SESSION['email'] ;
 $_SESSION['arquivo'] ;
 $_SESSION['nomeCompleto'] ;
 $_SESSION['nivel'] ;
 $_SESSION['Setor_user'] ;

 

 
 $usuario = $_SESSION['Login_user'];
 $IDLogin = $_SESSION['id_login'];
 $IDgenero = $_SESSION['genero'];
 $IDemail = $_SESSION['email'];
 $IDarquivo = $_SESSION['arquivo'];
 $nomeCompleto = $_SESSION['nomeCompleto'];
 $IDnivel = $_SESSION['nivel'];
 $Setor_user = $_SESSION['Setor_user'];





?>