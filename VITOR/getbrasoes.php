<?php

$brasoes=array();

$d = dir("./PMDF-brasoesPNG");
//echo "Handle: " . $d->handle . "\n";
//echo "Caminho: " . $d->path . "\n";
while (false !== ($entry = $d->read())) {
	if(strlen($entry)>2)
   //echo $entry."#";
   array_push($brasoes,$entry);
}
$d->close();

sort($brasoes);
foreach($brasoes as $row)
{
	echo $row."#";
}

?>