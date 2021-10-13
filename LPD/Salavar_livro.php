<?php
include("config.php");
include("session.php");
//$sql="delete from login where id=".$_POST['id'];
//$result=mysqli_query($db,$sql);
//header("location:cadastrar_usuario.php");

if ($_POST['flag']=='devolver')
{
	$sql="update livro set status='criado' where id=".$_POST['id'];
	$result=mysqli_query($db,$sql);
	//echo $sql;
	//echo "<BR>";
	$sql="update livro set oficial='".$nome_completo."' where id=".$_POST['id'];
	$result=mysqli_query($db,$sql);
	//echo $sql;
	//echo "<BR>";
} 

if ($_POST['flag']=='homologar')
{
	$sql="update livro set status='homologado' where id=".$_POST['id'];
	$result=mysqli_query($db,$sql);
	//echo $sql;
	//echo "<BR>";
	$sql="update livro set oficial='".$nome_completo."' where id=".$_POST['id'];
	$result=mysqli_query($db,$sql);
	//echo $sql;
	//echo "<BR>";
} 
if ($_POST['flag']=='salvar')
{
	$sql="insert into livro (autor) values('".$_POST['autor']."')";
	//echo $sql;
	$result=mysqli_query($db,$sql);
	$sql = "select * from livro where order by id desc";
	$result=mysqli_query($db,$sql);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	$sql="update livro set status='criado' where id=".$row['id'];
	$result=mysqli_query($db,$sql);
	
    //$sql="select * from login order by id desc limit 1";
	//$result=mysqli_query($db,$sql);
	//$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
//	$sql="insert into dados(id) values(".$row['id'].")";
//	$result=mysqli_query($db,$sql);//
	//$sql="insert into minhas_equipes(id) values(".$row['id'].")";
	//$result=mysqli_query($db,$sql);
	
}
if ($_POST['flag']=='remover')
{
	$sql="delete from livro where id=".$_POST['id'];
	$result=mysqli_query($db,$sql);
	$sql="delete from livro_topico1 where id_livro=".$_POST['id'];
	$result=mysqli_query($db,$sql);
	$sql="delete from livro_topico2 where id_livro=".$_POST['id'];
	$result=mysqli_query($db,$sql);
	$sql="delete from livro_topico3 where id_livro=".$_POST['id'];
	$result=mysqli_query($db,$sql);
	$sql="delete from livro_topico4 where id_livro=".$_POST['id'];
	$result=mysqli_query($db,$sql);
	$sql="delete from livro_topico5 where id_livro=".$_POST['id'];
	$result=mysqli_query($db,$sql);
	$sql="delete from livro_topico6 where id_livro=".$_POST['id'];
	$result=mysqli_query($db,$sql);
	$sql="delete from livro_topico7 where id_livro=".$_POST['id'];
	$result=mysqli_query($db,$sql);
	$sql="delete from livro_topico8 where id_livro=".$_POST['id'];
	$result=mysqli_query($db,$sql);
	$sql="delete from livro_topico9 where id_livro=".$_POST['id'];
	$result=mysqli_query($db,$sql);
	$sql="delete from livro_topico10 where id_livro=".$_POST['id'];
	$result=mysqli_query($db,$sql);
	$sql="delete from livro_topico11 where id_livro=".$_POST['id'];
	$result=mysqli_query($db,$sql);
 	//$sql="delete from dados where id=".$_POST['id'];
	//$result=mysqli_query($db,$sql);
	//$sql="delete from minhas_equipes where id=".$_POST['id'];
	//$result=mysqli_query($db,$sql);
}
?>