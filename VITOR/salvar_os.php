<?php 
include("config.php");
$os=$_POST['os'];
$referencia=$_POST['referencia'];
$data=$_POST['data'];
$hora_inicio=$_POST['hora_inicio'];
$hora_fim=$_POST['hora_fim'];
$tabela=$_POST['tabela'];
$upm=$_POST['upm'];
$data_fim=$_POST['data_fim'];

$n_vigente=str_replace(" ","",$_POST['n_vigente']);

$cmt1=$_POST['cmt1'];
$cmt2=$_POST['cmt2'];
$enderecado=$_POST['enderecado'];
$local=$_POST['local'];
$TSE=$_POST['TSE'];
$efetivo =$_POST['efetivo'];
$duracao=$_POST['duracao'];
$uniforme=$_POST['uniforme'];
$equipamento=$_POST['equipamento'];
$armamento=$_POST['armamento'];
$situacao=$_POST['situacao'];
$missao=$_POST['missao'];
$prescricoes=$_POST['prescricoes'];
$local_data=$_POST['local_data'];
$nome_posto =$_POST['nome_posto'];
$chefe =$_POST['chefe'];
$brasoes=$_POST['brasoes'];
$evento=$_POST['evento'];
if($_POST['flag']=="inserir")
{

$sql="insert into OS2(cmt1,cmt2,enderecado,local,TSE,efetivo,duracao,uniforme,equipamento,armamento,situacao,missao,prescricoes,local_data,nome_posto,chefe,brasoes,evento) values('".$cm1."','".$cmt2."','".$enderecado."','".$local."','".$TSE."','".$efetivo."','".$duracao."','".$uniforme."','".$equipamento."','".$armamento."','".$situacao."','".$missao."','".$prescricoes."','".$local_data."','".$nome_posto."','".$chefe."','".$brasoes."','".$evento."')";
$result=mysqli_query($db,$sql);
$sql="insert into OS(upm,os,referencia,data,data_fim,hora_inicio,hora_fim) values('".$upm."','".$os."','".$referencia."','".$data."','".$data_fim."','".$hora_inicio."','".$hora_fim."')";
$result=mysqli_query($db,$sql);
$sql="insert into OS3(n_vigente) values ('".$n_vigente."')";
$result=mysqli_query($db,$sql);
}
else{
	$sql="update OS3 set n_vigente='".$n_vigente."' where id=".$_POST['id'];
	$result=mysqli_query($db,$sql);
	$sql="update OS set upm='".$upm."' where id=".$_POST['id'];
	$result=mysqli_query($db,$sql);
	$sql="update OS set os='".$os."' where id=".$_POST['id'];
	$result=mysqli_query($db,$sql);
	$sql="update OS set referencia='".$referencia."' where id=".$_POST['id'];
	$result=mysqli_query($db,$sql);
	$sql="update OS set data='".$data."' where id=".$_POST['id'];
	$result=mysqli_query($db,$sql);
	$sql="update OS set data_fim='".$data_fim."' where id=".$_POST['id'];
	$result=mysqli_query($db,$sql);
	$sql="update OS set hora_inicio='".$hora_inicio."' where id=".$_POST['id'];
	$result=mysqli_query($db,$sql);
	$sql="update OS set hora_fim='".$hora_fim."' where id=".$_POST['id'];
	$result=mysqli_query($db,$sql);
	
	$sql="update OS2 set cmt1='".$cmt1."' where id=".$_POST['cmt1'];
	$result=mysqli_query($db,$sql);
	$sql="update OS2 set cmt2='".$cmt2."' where id=".$_POST['cmt2'];
    $result=mysqli_query($db,$sql);
	$sql="update OS2 set enderecado='".$enderecado."' where id=".$_POST['enderecado'];
    $result=mysqli_query($db,$sql);
	$sql="update OS2 set local='".$local."' where id=".$_POST['local'];
    $result=mysqli_query($db,$sql);
	$sql="update OS2 set TSE='".$TSE."' where id=".$_POST['TSE'];
    $result=mysqli_query($db,$sql);
	$sql="update OS2 set efetivo='".$efetivo."' where id=".$_POST['efetivo'];
    $result=mysqli_query($db,$sql);
	$sql="update OS2 set duracao='".$duracao."' where id=".$_POST['duracao'];
    $result=mysqli_query($db,$sql);
	$sql="update OS2 set uniforme='".$uniforme."' where id=".$_POST['uniforme'];
    $result=mysqli_query($db,$sql);
	$sql="update OS2 set equipamento='".$equipamento."' where id=".$_POST['equipamento'];
    $result=mysqli_query($db,$sql);
	$sql="update OS2 set armamento='".$armamento."' where id=".$_POST['armamento'];
    $result=mysqli_query($db,$sql);
	$sql="update OS2 set situacao='".$situacao."' where id=".$_POST['situacao'];
    $result=mysqli_query($db,$sql);
	$sql="update OS2 set missao='".$missao."' where id=".$_POST['missao'];
    $result=mysqli_query($db,$sql);
	$sql="update OS2 set prescricoes='".$prescricoes."' where id=".$_POST['prescricoes'];
    $result=mysqli_query($db,$sql);
	$sql="update OS2 set local_data='".$local_data."' where id=".$_POST['local_data'];
    $result=mysqli_query($db,$sql);
	$sql="update OS2 set nome_posto='".$nome_posto."' where id=".$_POST['nome_posto'];
    $result=mysqli_query($db,$sql);
	$sql="update OS2 set chefe='".$chefe."' where id=".$_POST['chefe'];
    $result=mysqli_query($db,$sql);
	$sql="update OS2 set brasoes='".$brasoes."' where id=".$_POST['brasoes'];
    $result=mysqli_query($db,$sql);
	$sql="update OS2 set evento='".$evento."' where id=".$_POST['evento'];
    $result=mysqli_query($db,$sql);
	
}
?>