<?php
include("config.php");
include("session.php");


if($_POST['flag']=="remover")
{
	unlink($_POST['arquivo']);
}

$s="";
if(!isset($_GET['pasta']))
{
$d = dir("./upload/1");
}
else
{
$d = dir("./upload/".$_GET['pasta']);
}
//echo "Handle: " . $d->handle . "\n";
//echo "Caminho: " . $d->path . "\n";
$i=0;
while (false !== ($entry = $d->read())) {
	//$s.=$entry."#";
	//echo json_encode(array("arquivo".$i=>$entry));
	echo $entry."#";
	$i=$i+1;
}
 //  echo $entry."\n";
//}
//$d->close();

///echo $s;


?>