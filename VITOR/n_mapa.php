<?php
include("config.php");
$data=$_GET['data'];
$batalhao=$_GET['batalhao'];


$sql="select max(id)+1 as id from mapa";
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC); 
$id=$row['id'];

$sql="insert into mapa(id,batalhao,data,nome_posto1,nome_posto2,chefe1,chefe2) values(".$id.",'".$batalhao."','".$data."','NOME COMPLETO','NOME COMPLETO','POSTO - MATRÍCULA','POSTO - MATRÍCULA')";
$result=mysqli_query($db,$sql);

$sql="select hora_inicio,hora_fim,OS,UPM,data,data_fim,n_vigente from OS inner join OS3 on OS.id=OS3.id inner join OS2 on OS2.id=OS.id where '".$data."'>=data and '".$data."'<=data_fim and locate('".$data."',n_vigente)=0 and UPM like '%".$batalhao."%'";
//echo $sql;
$result=mysqli_query($db,$sql);

foreach($result as $row)
{
	$sql="insert into mapa_categoria(nome,id_mapa) values('".$row['OS']."',".$id.")";
    $result2=mysqli_query($db,$sql);	
	$sql2="select * from mapa_categoria order by id desc limit 1";
	$result3=mysqli_query($db,$sql2);	
	$row2=mysqli_fetch_array($result3,MYSQLI_ASSOC);
	$sql3="insert into mapa_categoria_vtr(horario,id_categoria) values('".explode(":",$row['hora_inicio'])[0]." as ".explode(":",$row['hora_fim'])[0]."',".$row2['id'].")";
	$result3=mysqli_query($db,$sql3);	
	//echo $sql."<BR>";
//	echo $sql2."<BR>";
//	echo $sql3."<BR>";

}

	$sql="insert into mapa_categoria(nome,id_mapa) values('GTOP',".$id.")";
    $result2=mysqli_query($db,$sql);	
	$sql2="select * from mapa_categoria order by id desc limit 1";
	$result3=mysqli_query($db,$sql2);	
	$row2=mysqli_fetch_array($result3,MYSQLI_ASSOC);
	$sql3="insert into mapa_categoria_vtr(id_categoria) values(".$row2['id'].")";
	$result3=mysqli_query($db,$sql3);	
	//echo $sql3."<BR>";
	$sql="insert into mapa_categoria(nome,id_mapa) values('GTM',".$id.")";
    $result2=mysqli_query($db,$sql);	
	$sql2="select * from mapa_categoria order by id desc limit 1";
	$result3=mysqli_query($db,$sql2);	
	$row2=mysqli_fetch_array($result3,MYSQLI_ASSOC);
	$sql3="insert into mapa_categoria_vtr(id_categoria) values(".$row2['id'].")";
	//echo $sql3."<BR>";
	$result3=mysqli_query($db,$sql3);	
	$sql="insert into mapa_categoria(nome,id_mapa) values('ORDINÁRIO',".$id.")";
    $result2=mysqli_query($db,$sql);	
	$sql2="select * from mapa_categoria order by id desc limit 1";
	$result3=mysqli_query($db,$sql2);	
	$row2=mysqli_fetch_array($result3,MYSQLI_ASSOC);
	$sql3="insert into mapa_categoria_vtr(id_categoria) values(".$row2['id'].")";
	//echo $sql3."<BR>";
	$result3=mysqli_query($db,$sql3);	
	
header("location:mapa.php?id=".$id);
?>