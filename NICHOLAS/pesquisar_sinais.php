<?php
include("config.php");
$chassi=$_POST['chassi'];
$marca=$_POST['marca'];

for($i=1;$i<12;$i++) {
    if($i==10){

        $sql = "select *,length(nome) as tamanho from c".$i." where marca='' group by length(nome)";
    }
    else{
        $sql = "select *,length(nome) as tamanho from c".$i." where marca='".$marca."' group by length(nome)";
    }

   // echo $sql;
    $result = mysqli_query($db, $sql);
    $ch1 = array();
    foreach ($result as $row) {
        array_push($ch1, substr($chassi, $i-1, $row['tamanho']));
    }
    $pch1 = array();
    foreach ($ch1 as $c) {
        $aux = array();
        if($i==10) {
            $sql = "select * from c" . $i . " where marca='' and nome ='" . $c . "'";
        }
        else{

            $sql = "select * from c" . $i . " where marca='" . $marca . "' and nome ='" . $c . "'";
        }

        $result = mysqli_query($db, $sql);
        //$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        foreach($result as $row)
        {
        array_push($aux, $row['nome']);
        array_push($aux, $row['significado']);
        array_push($aux, $row['marca']);
        array_push($aux, $i);
        array_push($pch1, $aux);
        }
    }
    foreach($pch1 as $p)
    {
        //print_r($p);
        echo "Caracter:".$p[0];
        echo "#";
        echo "Significado:".$p[1];
        echo "#";
        echo "Marca:".$p[2];
        echo "#";
        echo "Posição do caracter:".$p[3];
        echo "#";

    }
    if(count($pch1)==0)
    {
        echo "Caracter:".substr($chassi, $i-1, 1);
        echo "#";
        echo "Significado:"."Desconhecido";
        echo "#";
        echo "Marca:".$marca;
        echo "#";
        echo "Posição do caracter:".$i;
        echo "#";

    }
    echo "@";
}


?>