<?php
$id=$_GET['id'];

$d = dir("./uploads");
echo '{"draw":0,"recordsTotal":1,"recordsFiltered":1,"data":';
$x=1;
$s="[{";
while (false !== ($entry = $d->read())) {
   //echo $entry."\n";
   if(explode("_",$entry)[0]==$id)
   {
	   $s.='"'."s".$x.'":';
	   $s.='"'.$entry.'"';
	   $s.=",";	
       $x=$x+1;
   }
}
$d->close();
$s=substr($s,0,strlen($s)-1);
echo $s;
echo "}]}";
?>