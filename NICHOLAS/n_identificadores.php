<?php
include("config.php");

$sql="select ifnull(max(id),0) as id from veiculos";
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

$id=intval($row['id'],10)+1;

$sql="insert into veiculos(id) values(".$id.")";
$result=mysqli_query($db,$sql);

header("location:inserir_sinais_identificadores.php?id=".$id);

?>