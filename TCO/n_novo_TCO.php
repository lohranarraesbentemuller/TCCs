<?php
include("config.php");
include("session.php");

$sql="insert into contador_TCO (id_TCO) values (0)";
$result=mysqli_query($db,$sql);
 
$sql="select max(id) as id from contador_TCO";
 
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

header("location:novo_TCO.php?id=".$row['id']);
?>