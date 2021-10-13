<?php
include("config.php");
$id=$_POST['id'];
$sql="select * from mapa_categoria where id_mapa=".$id;
echo $sql."\n";
$result=mysqli_query($db,$sql);
foreach($result as $row)
{
	$sql="delete from mapa_categoria_vtr where id_categoria=".$row['id'];
	echo $sql."\n";
	$result2=mysqli_query($db,$sql);

}
$sql="delete from mapa_categoria where id_mapa=".$id;
echo $sql."\n";
$result=mysqli_query($db,$sql);

$sql="delete from mapa where id=".$id;
$result=mysqli_query($db,$sql);
?>