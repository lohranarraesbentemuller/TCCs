<?php

 define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'USUARIO_DB');
   define('DB_PASSWORD', 'SENHA_DB');
   define('DB_DATABASE', 'DB');
  // mysql_query("SET NAMES utf8");
  // mysql_query("SET CHARACTER SET utf8");

   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) ;
   if(mysqli_connect_errno()) {

    die("Falha de conexao com banco de dados " .mysqli_connect_error());
   }

$id=$_POST['id'];

$sql="select * from ocorrencia_concat where id_ocorrencia=".$id;
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

$id=$row['id_ocorrencia'];
$sql="delete from ocorrencia where numero=".$id;
$result=mysqli_query($db,$sql);

$id=$row['id_prefixo'];
$sql="delete from ocorrencia_comando where id=".$id;
$result=mysqli_query($db,$sql);

$id=$row['id_ocorrencia'];
$sql="delete from ocorrencia_concat where id=".$id;
$result=mysqli_query($db,$sql);

$id=$row['id_loc'];
$sql="delete from ocorrencia_local where id=".$id;
$result=mysqli_query($db,$sql);

$id=$row['id_solicitante'];
$sql="delete from ocorrencia_solicitante where id=".$id;
$result=mysqli_query($db,$sql);


?>