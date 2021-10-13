<?php include("config.php");
$sql="delete from mapa where id=".$_POST['id'];
$result=mysqli_query($db,$sql);
$sql="select * from mapa_categoria where id_mapa=".$_POST['id'];
$result=mysqli_query($db,$sql);
foreach($result as $row)
{
	$sql="delete from mapa_categoria_vtr where id_categoria=".$row['id'];
	//echo $sql."\n";
	$result2=mysqli_query($db,$sql);
}

$sql="delete from mapa_categoria where id_mapa=".$_POST['id'];
$result=mysqli_query($db,$sql);

$sql="insert into  mapa(id,batalhao,data,nome_posto1,nome_posto2,chefe1,chefe2) values(".$_POST['id'].",'".$_POST['batalhao']."','".$_POST['data']."','".$_POST['nome_posto1']."','".$_POST['nome_posto2']."','".$_POST['chefe1']."','".$_POST['chefe2']."')";
$result=mysqli_query($db,$sql);
$titulos=explode("|",$_POST['titulo']);
array_pop($titulos);
$prefixos=explode("|",$_POST['prefixo']);
array_pop($prefixos);
$comandante=explode("|",$_POST['comandante']);
array_pop($comandante);
$motorista=explode("|",$_POST['motorista']);
array_pop($motorista);
$patrulheiro=explode("|",$_POST['patrulheiro']);
array_pop($patrulheiro);
$telefone=explode("|",$_POST['telefone']);
array_pop($telefone);
$setor=explode("|",$_POST['setor']);
array_pop($setor);
$horario=explode("|",$_POST['horario']);
array_pop($horario);
$linhas=explode("@",$_POST['linha']);
array_pop($linhas);
$xx=0; 
$titulos=array_unique($titulos);
$linhas=array_unique($linhas);

foreach($titulos as $titulo)
{
	$sql="insert into mapa_categoria(nome,id_mapa) values('".$titulo."',".$_POST['id'].")";
	$result=mysqli_query($db,$sql);
	$sql="select * from mapa_categoria where nome='".$titulo."' and id_mapa=".$_POST['id']." order by id desc limit 1";
	$result=mysqli_query($db,$sql);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	$id_categoria=$row['id'];
	
/*	if($titulo==explode(";",$prefixo[$xx])[0])
	{
	  	$sql="insert into mapa_categoria_vtr (prefixo,comandante,motorista,patrulheiro,telefone,setor,horario,id_categoria) values('".explode(";",$prefixos[$xx])[1]."','".explode(";",$comandante[$xx])[1]."','".explode(";",$motorista[$xx])[1]."','".explode(";",$patrulheiro[$xx])[1]."','".explode(";",$telefone[$xx])[1]."','".explode(";",$setor[$xx])[1]."','".explode(";",$horario[$xx])[1]."',".$id_categoria.")";
		$result=mysqli_query($db,$sql);
	}*/
	//echo $titulo."\n";
	foreach($linhas as $linha)
	{
		 
		if (explode(";",$linha)[0]==$titulo)
		{
			$prefixo=explode(";",explode("|",$linha)[0])[1];
			$comandante=explode("|",$linha)[1];
			$motorista=explode("|",$linha)[2];
			$patrulheiro=explode("|",$linha)[3];
			$telefone=explode("|",$linha)[4];
			$setor=explode("|",$linha)[5];
			$horario=explode("@",explode("|",$linha)[6])[0];
			
			$sql2="insert into mapa_categoria_vtr(prefixo,comandante,motorista,patrulheiro,telefone,setor,horario,id_categoria) values('".$prefixo."','".$comandante."','".$motorista."','".$patrulheiro."','".$telefone."','".$setor."','".$horario."',".$id_categoria.")";
			echo $sql2;
			$result2=mysqli_query($db,$sql2);
		}
	}
}
	/*
	$prefixos=array();
	$comandantes=array();
	$motoristas=array();
	$patrulheiros=array();
	$telefones=array();
	$setors=array();
	$horarios=array();
	//echo $_POST['horario'];
	//prefixo
    
	foreach(explode("|",$_POST['prefixo']) as $prefixo)
	{
		$temp_titulo=explode(";",$prefixo)[0];
		if($temp_titulo==$titulo)
		{
			echo $temp_titulo."\n";
			array_push($prefixos,explode(";",$prefixo)[1]);
		}
	}
	//comandante
	foreach(explode("|",$_POST['comandante']) as $comandante)
	{
		$temp_titulo=explode(";",$comandante)[0];
		if($temp_titulo==$titulo)
		{
			array_push($comandantes,explode(";",$comandante)[1]);
		}
	}	
	//motorista
	foreach(explode("|",$_POST['motorista']) as $motorista)
	{
		$temp_titulo=explode(";",$motorista)[0];
		if($temp_titulo==$titulo)
		{
			array_push($motoristas,explode(";",$motorista)[1]);
		}
	}
//patrulheiro
	foreach(explode("|",$_POST['patrulheiro']) as $patrulheiro)
	{
		$temp_titulo=explode(";",$patrulheiro)[0];
		if($temp_titulo==$titulo)
		{
			array_push($patrulheiros,explode(";",$patrulheiro)[1]);
		}
	}
//telefone
	foreach(explode("|",$_POST['telefone']) as $telefone)
	{
		$temp_titulo=explode(";",$telefone)[0];
		if($temp_titulo==$titulo)
		{
			array_push($telefones,explode(";",$telefone)[1]);
		}
	}
//setor
	foreach(explode("|",$_POST['setor']) as $setor)
	{
		$temp_titulo=explode(";",$setor)[0];
		if($temp_titulo==$titulo)
		{
			array_push($setors,explode(";",$setor)[1]);
		}
	}
//horario	
	foreach(explode("|",$_POST['horario']) as $horario)
	{
		$temp_titulo=explode(";",$horario)[0];
		if($temp_titulo==$titulo)
		{
			array_push($horarios,explode(";",$horario)[1]);
		}
	}
	
	for($j=0;$j<=count($horarios);$j++)
	{
		$sql="insert into mapa_categoria_vtr(prefixo,comandante,motorista,patrulheiro,telefone,setor,horario,id_categoria) values('".$prefixos[$j]."','".$comandantes[$j]."','".$motoristas[$j]."','".$patrulheiros[$j]."','".$telefones[$j]."','".$setors[$j]."','".$horarios[$j]."',".$id_categoria.")";
		$result=mysqli_query($db,$sql);
		echo $sql;
	}
}*/


?>