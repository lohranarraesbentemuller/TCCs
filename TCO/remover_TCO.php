<?php
include("config.php");

$sql="delete from TCO where id=".$_GET['id'];
$result=mysqli_query($db,$sql);

header("location:pesquisar_TCO.php");
?>