<?php
   session_start();
   
   if(session_destroy()) {
      //header("Location: login.php");
	  $lohranq="login.php";
	  echo "<script type='text/javascript'>window.top.location='".$lohranq."';</script>"; exit;
   }
?>

