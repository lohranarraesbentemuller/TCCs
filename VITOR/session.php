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
 
  $sql="select * from login_esfo where id_login=".$row['id'];
  //echo $sql;
 // exit();
  $result=mysqli_query($db,$sql);
  $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
  
  $antiguidade=$row['matricula_esfo'];
  $matricula_esfo=$antiguidade;
  $sql="select * from informacoes1 where matricula_esfo=".$matricula_esfo;
  $result=mysqli_query($db,$sql);
  $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
  $nome_de_guerra=$row['nome_de_guerra'];
  $pelotao=$row['pelotao'];
  $cia=$row['turma'];
  $matricula=$row['matricula_pmdf'];
  if($cia=="23 turma")
   $cia=1;
  else
    $cia=2;
  $sql="select * from antiguidade_esfo where matricula_esfo=".$matricula_esfo;
  $result=mysqli_query($db,$sql);
  $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
  $antiguidade=$row['antiguidade'];  
 if(!isset($_SESSION['login_user'])){
      //header("location:login.php");
	  echo "<script type='text/javascript'>window.top.location='login.php';</script>"; //exit;
  }

 

//teste 

 
  
 
  
?>