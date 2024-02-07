<?php
session_start();
/* DEV- Gabriel Eduardo J. Santos - Curitiba/PR */

// Chama a conexão com o banco de dados 
include('../conexao-intra/conexao-intra.php');


// Traz as informações do botão de login 
$btnLogin = filter_input(INPUT_POST, 'trava', FILTER_SANITIZE_STRING);

// Verificações


if ($btnLogin) {
    $usuario = mysqli_real_escape_string($con_intra, $_POST['login']);
     $senha = mysqli_real_escape_string($con_intra, $_POST['senha']);

    if (!empty($usuario) && !empty($senha)) {
        // Consulta para verificar se o usuário existe no banco de dados
        $result_usuario = "SELECT Login_user, senha FROM login WHERE Login_user = '$usuario' LIMIT 1";
        $resultado_usuario = mysqli_query($con_intra, $result_usuario);

        if ($resultado_usuario) {
            $row_usuario = mysqli_fetch_assoc($resultado_usuario);
            if (!empty($row_usuario) && password_verify($senha, $row_usuario['senha'])) {
                // Se a senha estiver correta, inicia a sessão e guarda o nome de usuário

                // Consulta para obter os dados do usuário
                $result_consulta = "SELECT Setor_user, desativado_Intranet, acessos, id_login, nomeCompleto, Login_user, genero, arquivo, email, nivel, ativo FROM login WHERE Login_user = '$usuario' LIMIT 1";
                $resultado_consulta = mysqli_query($con_intra, $result_consulta);

                // Se a consulta for verdadeira, obtém os dados do usuário
                if ($resultado_consulta) {
                    while ($conx = mysqli_fetch_assoc($resultado_consulta)) {
                       $IDLogin = $conx['id_login'];
                       $nomeCompleto = $conx['nomeCompleto'];
                       $Login_user = $conx['Login_user'];
                       $IDgenero = $conx['genero'];
                       $IDemail = $conx['email'];
                       $IDarquivo = $conx['arquivo'];
                       $IDnivel = $conx['nivel'];
                       $ativo = $conx['ativo'];
                       $acesso = $conx['acessos'];
                       $Desativado = $conx['desativado_Intranet'];
                       $Setor_user = $conx['Setor_user'];
                    }
                }

             
                    // verifica se possui permissão de acesso ao sistema 
                $acesso = $acesso;
                $valoresPermitidos = array(1, 6); // 1 é o valor de ADM 6 o valor de acesso da intra
                $acessos = explode(",", $acesso);

                if (array_intersect($acessos, $valoresPermitidos)) {
                
                } else {
                    echo '<div style= "text-align: center; margin-top:10%; font-size:35px; background-color: #fff; font-family: "Trebuchet MS", Verdana, sans-serif "> 
					
					OPS, seu usuario não tem permissão a esse sistema, contate um administrador para mais informações


					</div>
					';
					echo " <META HTTP-EQUIV='REFRESH' CONTENT='4;  ../index.php'>";
					exit();
                }

                   // verifica se Foi desativado do acesso a esse sistema 

                   if($Desativado == '1'){
                    echo '<div style= "text-align: center; margin-top:10%; font-size:35px; background-color: #fff; font-family: "Trebuchet MS", Verdana, sans-serif "> 
					
					OPS, seu usuario não tem permissão a esse sistema, contate um administrador para mais informações


					</div>
					';
					echo " <META HTTP-EQUIV='REFRESH' CONTENT='4;  ../index.php'>";
					exit();
                }

                $_SESSION['Login_user'] = $usuario;
                $_SESSION['id_login'] = $IDLogin;
                $_SESSION['genero'] = $IDgenero;
                $_SESSION['email'] = $IDemail;
                $_SESSION['arquivo'] = $IDarquivo;
                $_SESSION['nomeCompleto'] = $nomeCompleto;
                $_SESSION['nivel'] = $IDnivel;
                $_SESSION['ativo'] = $ativo;
                $_SESSION['acessos'] = $acesso;
                $_SESSION['Setor_user'] = $Setor_user;



				if($ativo != '1'){

					echo '<div style= "text-align: center; margin-top:10%; font-size:35px; background-color: #fff; font-family: "Trebuchet MS", Verdana, sans-serif "> 
					
					OPS, seu usuario não esta ativo contate um administrador para mais informações


					</div>
					';
					echo " <META HTTP-EQUIV='REFRESH' CONTENT='4;  ../index.php'>";
					exit();

				}
				
                echo "success";
                echo "<script> window.location.href='../inicio.php';</script>";
               

            } else {
                // Se a senha estiver incorreta, define a variável de sessão "nao_autenticado" como true
                $_SESSION['nao_autenticado'] = true;
				echo '<div style= "text-align: center; margin-top:10%; font-size:35px; background-color: #fff; font-family: "Trebuchet MS", Verdana, sans-serif "> 
					
				Usuário  ou senha incorretos, tente novamente


				</div>
				';
                echo " <META HTTP-EQUIV='REFRESH' CONTENT='4;  ../index.php'>";
                exit();
            }
        }
    }
}

?>
