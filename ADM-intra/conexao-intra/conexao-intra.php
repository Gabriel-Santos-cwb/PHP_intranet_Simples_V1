<?php

/* DEV- Gabriel Eduardo J. Santos - Curitiba/PR */

$host = "localhost";
$user = "root";
$pass = "";
$banco = "intranet";
$con_intra = mysqli_connect($host,$user,$pass,$banco);

if (!$con_intra){
    echo ("conexao falha". mysqli_connect_error());
}else{
    echo ("");
}
//echo "sucesso";
  
date_default_timezone_set('America/sao_paulo');
$dia = date ("d");
$mes = date ("m");
$ano = date ("Y");
 "Dia ". $dia." / ". $mes. " / ". $ano  ;
 $reg_dia= "Dia ". $dia." / ". $mes. " / ". $ano  ;
 $reg_dia1=  $dia.$mes.$ano;

$hora=date("H");
$minuto=date("i");
$segundos=date("s");
 "Horas: ".$hora.":".$minuto.":".$segundos;
$reg_hor =" ás: ".$hora.":".$minuto.":".$segundos;
$horas =  $dia."/". $mes. "/". $ano." ás: ".$hora.":".$minuto.":".$segundos;

?>