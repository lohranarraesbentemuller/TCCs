<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'lohran.bentemuller');
   define('DB_PASSWORD', 'B1scoitinho');
   define('DB_DATABASE', 'CPUGE');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) ;
   if(mysqli_connect_errno()) {
    die("Falha de conexao com banco de dados " .mysqli_connect_error());
    }
?>
