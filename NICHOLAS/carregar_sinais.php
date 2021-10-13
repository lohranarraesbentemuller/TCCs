<?php
include("config.php");
if($_POST['flag']=="remover")
{
	$sql="delete from sinais where id_foto=".$_POST['foto_id']." and x='".$_POST['x']."' and y='".$_POST['y']."'";
	$result=mysqli_query($db,$sql);
	echo $sql;
}
else{
$sql="select * from sinais where id_foto=".$_POST['foto_id'];
//echo $sql;
$result=mysqli_query($db,$sql);
foreach($result as $row)
{
	echo $row['descricao'];
	echo "$";
	echo $row['x'];
	echo "$";
	echo $row['y'];
	echo "$";
	echo $row['legenda'];
	echo "#";
}
}
?>