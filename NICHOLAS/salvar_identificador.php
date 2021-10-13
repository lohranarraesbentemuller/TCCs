<?php
include("config.php");

if($_POST['flag']=="atualizar"){
$sql="update veiculos set marca='".$_POST['marca']."' where id =".$_POST['id'];

$result=mysqli_query($db,$sql);
$sql="update veiculos set modelo='".$_POST['modelo']."' where id =".$_POST['id'];
$result=mysqli_query($db,$sql);
$sql="update veiculos set ano='".$_POST['ano']."' where id =".$_POST['id'];
//echo $sql;
$result=mysqli_query($db,$sql);

 
$d = dir("./upload/".$_POST['id']);
//echo "Handle: " . $d->handle . "\n";
//echo "Caminho: " . $d->path . "\n";
$x=0;
while (false !== ($entry = $d->read())) {
	if(strlen($entry)>2)
	{
		$x++;
   $sql="insert into imagens(caminho,id_veiculo,principal) values('".$entry."',".$_POST['id'].",'nao')";
  // echo $sql;
   $result=mysqli_query($db,$sql);
	}
}
$d->close(); 
 
 if($x==0)
 {
	 echo "sem foto do veículo";
 }
 $sql="select * from imagens where id_veiculo=".$_POST['id']." and principal='sim'";
 $result=mysqli_query($db,$sql);
 //$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
 if(mysqli_num_rows($result)==0)
 {
 $sql="select * from imagens where id_veiculo=".$_POST['id']." order by id desc limit 1";
 $result=mysqli_query($db,$sql);
 $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
 $sql="update imagens set principal='sim' where id=".$row['id'];
 $result=mysqli_query($db,$sql); 
 }
//$d = dir("/upload/".$_POST['id']);
//echo "Handle: " . $d->handle . "\n";
//echo "Caminho: " . $d->path . "\n";
//while (false !== ($entry = $d->read())) {
 //  //echo $entry."\n";
  // $sql="insert into imagens(caminho,id_veiculo) values('".$entry."',".$_POST['id'].")";
  // echo $sql;
  // $result=mysqli_query($db,$sql);
//}
//$d->close();
}
if($_POST['flag']=="principal")
{
	$sql="update imagens set principal='nao' where id_veiculo=".$_POST['id'];
	$result=mysqli_query($db,$sql);
	$sql="update imagens set principal='sim' where id=".$_POST['id_foto'];
	$result=mysqli_query($db,$sql);
}
if($_POST['flag']=="oculto")
{
	//$sql="update imagens set principal='nao' where id_veiculo=".$_POST['id'];
//	$result=mysqli_query($db,$sql);
	$sql="update imagens set principal='oculto' where id=".$_POST['id_foto'];
	$result=mysqli_query($db,$sql);
}

if($_POST['flag']=="remover")
{
	//$sql="update imagens set principal='nao' where id_veiculo=".$_POST['id'];
	//$result=mysqli_query($db,$sql);
	$sql="select * from imagens where id=".$_POST['id_foto'];
	//echo $sql;
//	echo "<BR>";
	$result=mysqli_query($db,$sql);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	if($row['principal']=="sim")
	{
		echo "você não pode deletar a foto principal";
	}
	else{
	$sql="delete from imagens where id=".$_POST['id_foto'];
//	echo $sql;
//	echo "<BR>";
	$result=mysqli_query($db,$sql);
	}
	unlink('./upload/'.$_POST['id'].'/'.$row['caminho']);
	//echo "<BR>";
//	echo './upload/'.$_POST['id'].'/'.$row['caminho'];
}
if($_POST['flag']=="sinal")
{
	$decricao=$_POST['legenda'];
	$legenda=$_POST['legenda2'];
	$id_foto=$_POST['foto_id'];
	$x=$_POST['x'];
	$y=$_POST['y'];
	$sql="select * from sinais where x='".$x."' and y='".$y."' and descricao='".$decricao."' and id_foto=".$id_foto;
	echo $sql;
	$result=mysqli_query($db,$sql);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	echo "\n";
	echo count($row);
	if(count($row)==0 && $decricao!="")
	{
	  $sql="insert into sinais(x,y,descricao,id_foto,legenda) values('".$x."','".$y."','".$decricao."',".$id_foto.",'".$legenda."')";
	 // echo $sql;
	  $result=mysqli_query($db,$sql);
	}
	else{
		if($descricao!=""){
		$sql="update sinais set legenda='".$decricao."' where id_foto=".$id_foto;
		echo $sql;
		$result=mysqli_query($db,$sql);
		}
		else{
			$sql="delete from sinais where legenda='".$descricao."' and id_foto=".$id_foto;
			$result=mysqli_query($db,$sql);
		}
	}
}
?>