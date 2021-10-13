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
  
 if(!isset($_SESSION['login_user'])){
      //header("location:login.php");
	  echo "<script type='text/javascript'>window.top.location='login.php';</script>"; //exit;
  }
 /* echo count(explode("index.php",$caminho));
  echo $_SESSION['papel'];
  echo  $_SESSION['login_user'];
  echo $row['papel'];
  exit(); */
 
  if (count(explode("index.php",$caminho))==2 || $caminho=="/nobrega/")
  {
	//  if($row['papel']!='copom')
	//  {
	//	  header("location:SGO.php");
	//  }
  }
?>