<?php
   if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

 //print_r($_SESSION);exit("TESTE");
   $user_check = $_SESSION['login_user'];
   $sql2="select * from login where nome = '".$user_check."' ";
   $ses_sql = mysqli_query($db,$sql2);
   //echo $sql2;
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   $login_session = $row['nome'];

 $caminho=$_SERVER['REQUEST_URI'];
 $papeis=explode("|",$_SESSION['papel']);
 
 $db2 = mysqli_connect('localhost','USUARIO_DB','SENHA_DB','DB') ;
   if(mysqli_connect_errno()) {

    die("Falha de conexao com banco de dados " .mysqli_connect_error());

    }	
  $sql="select * from login where nome like '".$user_check."'";
  $result=mysqli_query($db2,$sql);
  $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
  //print_r($row);exit();
  $sql="select * from login_esfo where id_login=".$row['id'];
  $result=mysqli_query($db2,$sql);
  $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
  //print_r($row);exit();
  $sql="select * from informacoes1 where matricula_esfo=".$row['matricula_esfo'];
  $result=mysqli_query($db2,$sql);
  $row=mysqli_fetch_array($result,MYSQLI_ASSOC);  
  $nome_completo=$row['nome_completo'];
  $matricula_pmdf=$row['matricula_pmdf'];
  $nome_de_guerra=$row['nome_de_guerra'];
 

 if(!isset($_SESSION['login_user'])){
      header("location:login.php");
	  
  }

?>