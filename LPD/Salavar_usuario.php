<?php
include("config.php");
//$sql="delete from login where id=".$_POST['id'];
//$result=mysqli_query($db,$sql);
//header("location:cadastrar_usuario.php");
if ($_POST['flag']=='salvar')
{
	$sql="insert into login (nome,senha,papel) values('".$_POST['nome']."',SHA2('".$_POST['senha']."',224),'".$_POST['papel']."')";
	$result=mysqli_query($db,$sql);
    
	
}
if ($_POST['flag']=='remover')
{
	$sql="delete from login where id=".$_POST['id'];
	$result=mysqli_query($db,$sql);
  
}
?>