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


$numero=$_POST['numero'];
$tipo=$_POST['tipo'];
$marca=$_POST['marca'];
$caractesticias=$_POST['caracteristicas'];
echo $numero;
echo $tipo;
echo $marca;
echo $caractesticias;
$sql="select * from exemplo_rocha_soares where numero=".$numero;
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$ocorrencia_id=$row['id'];
$sql="insert into objetos_rocha_soares(tipo,marca,caracteristicas,ocorrencia_id) values('".$tipo."','".$marca."','".$caractesticias."',".$ocorrencia_id.")";
$result=mysqli_query($db,$sql);


?>