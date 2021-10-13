<?php


/*$ds          = DIRECTORY_SEPARATOR;  //1
 
$storeFolder = 'uploads';   //2
 
if (!empty($_FILES)) {
     
    $tempFile = $_FILES['file']['tmp_name'];          //3             
      
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
     
    $targetFile =  $targetPath. $_FILES['file']['name'];  //5
 
    move_uploaded_file($tempFile,$targetFile); //6
     
}*/
?>
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

$id=$_GET['iddid'];
$ds = DIRECTORY_SEPARATOR;  // Store directory separator (DIRECTORY_SEPARATOR) to a simple variable. This is just a personal preference as we hate to type long variable name.
$storeFolder = 'uploads';   // Declare a variable for destination folder.
if (!empty($_FILES)) {

    $tempFile = $_FILES['file']['tmp_name'];          // If file is sent to the page, store the file object to a temporary variable.
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  // Create the absolute path of the destination folder.
    // Adding timestamp with image's name so that files with same name can be uploaded easily.
    $date = new DateTime();
    $newFileName = $id."_".$date->getTimestamp().$_FILES['file']['name'];
    $targetFile =  $targetPath.$newFileName;  // Create the absolute path of the uploaded file destination.
    move_uploaded_file($tempFile,$targetFile); // Move uploaded file to destination.

    echo $newFileName;
}
?>
 