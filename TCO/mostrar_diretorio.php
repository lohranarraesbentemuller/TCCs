<?php
$s="";
$d = dir("./uploads/".$_GET['id']);
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