<?php
include "config.php";
include "session.php";
function getWeekday($date) {
    return date('w', strtotime($date)); //5 eh sexta 6 sabado 0 domingo 1 segunda 2 terca 3 quarta 4 quinta
	//terca = subtrai data por ela mesma (em semanas) e soma 2 (se acima de terca), domingo e segunda, subtrai por 5 e soma o proprio valor 
} //echo date('Y-m-d', strtotime($Date. ' + 2 days'));
function getTerca($date){
	$dia_da_semana=" - ".getWeekDay($date)." days";
 
	$data= date('Y-m-d', strtotime($date. ' + 2 days'));
	$terca= date('Y-m-d', strtotime($data. $dia_da_semana));
	//$terca= $data - $dia_da_semana + " 2 days" ;
	if(getWeekDay($date)<2)
	{
		$dia_da_semana=" + ".getWeekDay($date)." days";
		$data= date('Y-m-d', strtotime($date. ' - 5 days'));
		$terca = date('Y-m-d', strtotime($date. $dia_da_semana));
	}
	return $terca;
}
/*function days_diff($d1, $d2) {
	$d1 = date_create($d1);
    $d2 = date_create($d2);
    $x1 = days($d1);
    $x2 = days($d2);
   
    if ($x1 && $x2) {
        return abs($x1 - $x2);
    }
}

function days($x) {
    if (get_class($x) != 'DateTime') {
        return false;
    }
   
    $y = $x->format('Y') - 1;
    $days = $y * 365;
    $z = (int)($y / 4);
    $days += $z;
    $z = (int)($y / 100);
    $days -= $z;
    $z = (int)($y / 400);
    $days += $z;
    $days += $x->at('z');

    return $days;
}*/

include("config.php");
//include('session.php');
$sql="select distinct(escala) from postos";
$result = mysqli_query($db,$sql);
$escalas=array();
array_push($escalas," ");
foreach($result as $row)
{
	array_push($escalas,$row['escala']);
}

$sql="select * from postos";
$result = mysqli_query($db,$sql);
$postos=array();
$esscala=array();
foreach($result as $row)
{
	array_push($postos,$row['posto']);
	array_push($esscala,$row["escala"]);
}
 
if($_SERVER["REQUEST_METHOD"] == "POST") {
	
	
	//teste
	 
        if(isset($_POST['gerarescala'])){
                echo "teste";
                $data=$_POST['data_oculta'];
                $escala=$_POST['turma2'];
                //$escala="23";
                $command = escapeshellcmd('python escala.py '.$data.' '.$escala);
                $output = shell_exec($command);
                echo $output;

        }
        else{
                exit();
        }
 

	
	//teste
	
	
	
	
	 if (isset($_POST['btnDelete'])) {
        
		$sql="delete  from escala where data='".$_POST['data']."' and escala=".intval(substr($_POST['escala'],0,2));
		$result=mysqli_query($db,$sql);
		
    } else {
        // Assume btnSubmit
		$terca=getTerca($_POST['data']);
    for($dias_da_semana=0;$dias_da_semana<7;$dias_da_semana++)
		{
			//$dia_da_semana=1;
	       // echo "<script>$(document).ready(function(){$('data').val('1111-11-0".$dias_da_semana."');});</script>";
		      echo "<script> $('data').val('1111-11-0".$dias_da_semana."'); </script>";
			$soma=" + ".$dias_da_semana." days ";
			 
			$hoje=date('Y-m-d', strtotime($terca. $soma));
			
			//echo $hoje."<BR>";
	//verificando se já não existe uma escala para essa data
	$sql="select * from escala where data='".$hoje."' and escala=".$_POST['escala'];
	$cor="Preta";
	if($dias_da_semana==3)
		$cor="Azul";
	if($dias_da_semana==4)
		$cor="Vermelha";
	if($dias_da_semana==5)
		$cor="Vermelha";	
	$result=mysqli_query($db,$sql);
	if(mysqli_num_rows($result)!=0)
		continue;//exit("escala já realizada para esse dia, delete a escala antiga antes de prosseguir");

//caminhao da migracao
	$sql="select * from cadetes_servico";
	$result=mysqli_query($db,$sql);
	$sql2="select * from postos";
	$result2=mysqli_query($db,$sql2);
	$horario=array();
	array_push($horario,1);
	array_push($horario,2);
	array_push($horario,3);
	foreach($result as $row) //atualizando os postos e horarios para girar depois
	{
	$total_postos="";
	$total_horarios="";
	//teste3
	$sql="select count(id_cadete) from escala where id_cadete=".$row['id']; //total
	$result=mysqli_query($db,$sql);
	//echo $sql."<BR>";
	$row222=mysqli_fetch_array($result,MYSQLI_ASSOC);
	$sql="update cadetes_servico set total=".$row222['count(id_cadete)']." where id=".$row['id'];
	$result=mysqli_query($db,$sql);
	;
	
	$sql="select count(id_cadete) from escala where id_cadete=".$row['id']." and cor='Vermelha'"; //total
	$result=mysqli_query($db,$sql);
	$row222=mysqli_fetch_array($result,MYSQLI_ASSOC);
	$sql="update cadetes_servico set vermelhas=".$row222['count(id_cadete)']." where id=".$row['id'];
	$result=mysqli_query($db,$sql);	
	
	$sql="select count(id_cadete) from escala where id_cadete=".$row['id']." and cor='Preta'"; //total
	$result=mysqli_query($db,$sql);
	$row222=mysqli_fetch_array($result,MYSQLI_ASSOC);
	$sql="update cadetes_servico set pretas=".$row222['count(id_cadete)']." where id=".$row['id'];
	$result=mysqli_query($db,$sql);	
	
	$sql="select count(id_cadete) from escala where id_cadete=".$row['id']." and cor='Azul'"; //total
	$result=mysqli_query($db,$sql);
	$row222=mysqli_fetch_array($result,MYSQLI_ASSOC);
	$sql="update cadetes_servico set azuis=".$row222['count(id_cadete)']." where id=".$row['id'];
	$result=mysqli_query($db,$sql);	
	//teste3
	  foreach($result2 as $row2)
	  {
	    $sql="select count(id_posto) from escala where id_cadete=".$row['id']." and id_posto=".$row2['id'];	 //conta o numero de vezes que tirou aquele posto
	    $result3 =mysqli_query($db,$sql);
	    $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
		$total_postos=$total_postos.$row2['id'].":".$row3['count(id_posto)']."|";
	  }
	  foreach($horario as $h)
	  {
		$sql="select count(horario) from escala where id_cadete=".$row['id']." and horario=".$h;	 //conta o numero de vezes que tirou aquele posto
	    $result3 =mysqli_query($db,$sql);
	    $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);
		$total_horarios=$total_horarios.$row3['count(horario)']."|";
	  }
	  $sql="update cadetes_servico set postos='".$total_postos."' where id=".$row['id'];
	  //echo $sql."<BR>";
	  $result3=mysqli_query($db,$sql);
	  $sql="update cadetes_servico set horarios='".$total_horarios."' where id=".$row['id'];
	  $result3=mysqli_query($db,$sql);
	  //echo $sql."<BR>";
	}
	
//caminhao da migracao

	
	//alimentando o banco de dados com descanso
	$a_data=explode("-",$hoje);
	$a_data=intval($a_data[0],10)*10000+intval($a_data[1],10)*100+intval($a_data[2],10);
	$sql="select * from cadetes_servico";
	$result=mysqli_query($db,$sql);
	foreach($result as $row)
	{
		$sql="select max(data) from escala where id_cadete=".$row['id'];
		$result2=mysqli_query($db,$sql);
		$row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
		$u_data=explode("-",$row2['max(data)']);
		$u_data=intval($u_data[0],10)*10000+intval($u_data[1],10)*100+intval($u_data[2],10);
		$descanso=sqrt(($u_data-$a_data)*($u_data-$a_data)); //retorna o módulo da diferença entre a data atual e a data do ultimo servico do cadete
		
		if ($u_data=0) $descanso=0;
		$sql="update cadetes_servico set descanso = ".$descanso." where id =".$row['id'];
		$result2=mysqli_query($db,$sql);
	}
	
	$p=0;
	$aux_posto=array();
	for($i=0;$i<count($postos);$i++)
	{

      if ($_POST['posto'.$i]=="on")
	  {
	  array_push($aux_posto,$postos[$i]);
  	  }
	}

	//$cor=$_POST['cor'];
	
	$tudo=array();
	$turma=explode(" ",$_POST['escala'])[0];
//preta
	if ($cor=="Preta")
	{ 
	
 
	//$sql="select * from cadetes_servico order by antiguidade where antiguidade";
	$sql="select * from cadetes_servico where antiguidade like '". $turma ."%' order by antiguidade asc";
	//echo $sql;
	$result = mysqli_query($db,$sql);
	
    $antiguidade=array();
	$cadetes=array();
	$vermelhas=array();
	$azuis=array();
	$pretas=array();
	$descanso=array();
	$horas=array();
	$total=array();
	
	 
	
	foreach($result as $row)
	  {
 	     array_push($antiguidade,$row["antiguidade"]);
 	     array_push($cadetes,$row['cadetes']);
 	     array_push($vermelhas,$row['vermelhas']);
 	     array_push($azuis,$row['azuis']);
 	     array_push($pretas,$row['pretas']);
 	     array_push($descanso,$row['descanso']);
 	     array_push($horas,$row['horas']);
 	     array_push($total,$row['total']);
		 $tudo2=array();
 	     array_push($tudo2,$row["antiguidade"]); //0
 	     array_push($tudo2,$row['cadetes']); //1
 	     array_push($tudo2,$row['vermelhas']); //2
 	     array_push($tudo2,$row['azuis']); //3
 	     array_push($tudo2,$row['pretas']); //4
 	     array_push($tudo2,$row['descanso']); //5
 	     array_push($tudo2,$row['horas']); //6
 	     array_push($tudo2,$row['total']); //7
		 array_push($tudo2,$row['id']);//8
		 
		 array_push($tudo,$tudo2);

  	  }
     

	 $k=0;

	 for($k=0;$k<count($tudo);$k++) //ordenando pelo total de servicos
	 {
		   //$w=0;
		   for($w=0;$w<count($tudo);$w++)
		   {
			 if($tudo[$k][7]<$tudo[$w][7])
			 {
				 $aux=$tudo[$k];
				 $tudo[$k]=$tudo[$w];
				 $tudo[$w]=$aux;
			 }				 
		   }
	 }


	
	 for($k=0;$k<count($tudo);$k++) //ordenando pelo tempo do ultimo servico
	 {
		   //$w=0;
		   for($w=0;$w<count($tudo);$w++)
		   {
			 if($tudo[$k][5]>$tudo[$w][5])
			 {
				 $aux=$tudo[$k];
				 $tudo[$k]=$tudo[$w];
				 $tudo[$w]=$aux;
			 }				 
		   }
	  
	 }

	 
	 
	 for($k=0;$k<count($tudo);$k++) //ordena pelas pretas
	 {
		   for($w=0;$w<count($tudo);$w++)
		   {
			 if($tudo[$k][4]<$tudo[$w][4])
			 {
				 $aux=$tudo[$k];
				 $tudo[$k]=$tudo[$w];
				 $tudo[$w]=$aux;
			 }				 
		   }
		 
	 }	 

	/* for($k=0;$k<count($tudo);$k++) //ordena pelas azuis (quem tem menos desce)
	 {
		   for($w=0;$w<count($tudo);$w++)
		   {
			 if($tudo[$k][3]>$tudo[$w][3])
			 {
				 $aux=$tudo[$k];
				 $tudo[$k]=$tudo[$w];
				 $tudo[$w]=$aux;
			 }				 
		   }
		   
	 }
	 	  //teste_lohran 22-01-2020
	  //print_r($row);
	 // echo "<BR>";
	  foreach($tudo as $tud)
	  {
		  print_r($tud);
		  echo "<BR>";
	  }
	  exit();
	  //teste_lohran 22-01-2020	

	 for($k=0;$k<count($tudo);$k++) //ordena pelas vermelhas (quem tem menos)
	 {
		   for($w=0;$w<count($tudo);$w++)
		   {
			 if($tudo[$k][2]>$tudo[$w][2])
			 {
				 $aux=$tudo[$k];
				 $tudo[$k]=$tudo[$w];
				 $tudo[$w]=$aux;
			 }				 
		   }
		 
	 }*/

	}

//azul
	if ($cor=="Azul")
	{ 
	
 
	//$sql="select * from cadetes_servico order by antiguidade desc";
	$sql="select * from cadetes_servico where antiguidade like '". $turma ."%' order by antiguidade desc";
	$result = mysqli_query($db,$sql);
	
    $antiguidade=array();
	$cadetes=array();
	$vermelhas=array();
	$azuis=array();
	$pretas=array();
	$descanso=array();
	$horas=array();
	$total=array();
	
	foreach($result as $row)
	  {
 	     array_push($antiguidade,$row["antiguidade"]);
 	     array_push($cadetes,$row['cadetes']);
 	     array_push($vermelhas,$row['vermelhas']);
 	     array_push($azuis,$row['azuis']);
 	     array_push($pretas,$row['pretas']);
 	     array_push($descanso,$row['descanso']);
 	     array_push($horas,$row['horas']);
 	     array_push($total,$row['total']);
		 $tudo2=array();
 	     array_push($tudo2,$row["antiguidade"]); //0
 	     array_push($tudo2,$row['cadetes']); //1
 	     array_push($tudo2,$row['vermelhas']); //2
 	     array_push($tudo2,$row['azuis']); //3
 	     array_push($tudo2,$row['pretas']); //4
 	     array_push($tudo2,$row['descanso']); //5
 	     array_push($tudo2,$row['horas']); //6
 	     array_push($tudo2,$row['total']); //7
		 array_push($tudo2,$row['id']);//8
		 
		 array_push($tudo,$tudo2);

  	  }


	 $k=0;
	 for($k=0;$k<count($tudo);$k++)
	 {
		   //$w=0;
		   for($w=0;$w<count($tudo);$w++)
		   {
			 if($tudo[$k][7]<$tudo[$w][7])
			 {
				 $aux=$tudo[$k];
				 $tudo[$k]=$tudo[$w];
				 $tudo[$w]=$aux;
			 }				 
		   }
	 }

	 for($k=0;$k<count($tudo);$k++)
	 {
		   //$w=0;
		   for($w=0;$w<count($tudo);$w++)
		   {
			 if($tudo[$k][5]>$tudo[$w][5])
			 {
				 $aux=$tudo[$k];
				 $tudo[$k]=$tudo[$w];
				 $tudo[$w]=$aux;
			 }				 
		   }
	 }
 
	 for($k=0;$k<count($tudo);$k++)
	 {
		   //$w=0;
		   for($w=0;$w<count($tudo);$w++)
		   {
			 if($tudo[$k][3]<$tudo[$w][3])
			 {
				 $aux=$tudo[$k];
				 $tudo[$k]=$tudo[$w];
				 $tudo[$w]=$aux;
			 }				 
		   }
	 }

	/* for($k=0;$k<count($tudo);$k++) //ordena pelas vermelhas (quem tem menos)
	 {
		   for($w=0;$w<count($tudo);$w++)
		   {
			 if($tudo[$k][2]>$tudo[$w][2])
			 {
				 $aux=$tudo[$k];
				 $tudo[$k]=$tudo[$w];
				 $tudo[$w]=$aux;
			 }				 
		   }
	 }*/	 
	}

//azul
//vermelhas
	if ($cor=="Vermelha")
	{ 
	
 
	//$sql="select * from cadetes_servico order by antiguidade desc";
	$sql="select * from cadetes_servico where antiguidade like '". $turma ."%' order by antiguidade desc";
	$result = mysqli_query($db,$sql);
	
    $antiguidade=array();
	$cadetes=array();
	$vermelhas=array();
	$azuis=array();
	$pretas=array();
	$descanso=array();
	$horas=array();
	$total=array();
	
	foreach($result as $row)
	  {
 	     array_push($antiguidade,$row["antiguidade"]);
 	     array_push($cadetes,$row['cadetes']);
 	     array_push($vermelhas,$row['vermelhas']);
 	     array_push($azuis,$row['azuis']);
 	     array_push($pretas,$row['pretas']);
 	     array_push($descanso,$row['descanso']);
 	     array_push($horas,$row['horas']);
 	     array_push($total,$row['total']);
		 $tudo2=array();
 	     array_push($tudo2,$row["antiguidade"]); //0
 	     array_push($tudo2,$row['cadetes']); //1
 	     array_push($tudo2,$row['vermelhas']); //2
 	     array_push($tudo2,$row['azuis']); //3
 	     array_push($tudo2,$row['pretas']); //4
 	     array_push($tudo2,$row['descanso']); //5
 	     array_push($tudo2,$row['horas']); //6
 	     array_push($tudo2,$row['total']); //7
		 array_push($tudo2,$row['id']);//8
		 
		 array_push($tudo,$tudo2);

  	  }


	 $k=0;
	 for($k=0;$k<count($tudo);$k++)
	 {
		   //$w=0;
		   for($w=0;$w<count($tudo);$w++)
		   {
			 if($tudo[$k][7]<$tudo[$w][7])
			 {
				 $aux=$tudo[$k];
				 $tudo[$k]=$tudo[$w];
				 $tudo[$w]=$aux;
			 }				 
		   }
	 }
	 	 $k=0;
	 for($k=0;$k<count($tudo);$k++)
	 {
		   //$w=0;
		   for($w=0;$w<count($tudo);$w++)
		   {
			 if($tudo[$k][5]>$tudo[$w][5])
			 {
				 $aux=$tudo[$k];
				 $tudo[$k]=$tudo[$w];
				 $tudo[$w]=$aux;
			 }				 
		   }
	 }
	 for($k=0;$k<count($tudo);$k++)
	 {
		   //$w=0;
		   for($w=0;$w<count($tudo);$w++)
		   {
			 if($tudo[$k][2]<$tudo[$w][2])
			 {
				 $aux=$tudo[$k];
				 $tudo[$k]=$tudo[$w];
				 $tudo[$w]=$aux;
			 }				 
		   }
	 }	 
	}
    

	$sql="select * from baixados where data_inicio<='".$hoje."' and data_fim>='".$hoje."'";	
	$result=mysqli_query($db,$sql);
	$baixados=array();
	foreach ($result as $row)
	{
		array_push($baixados,$row['id_cadete']);
	}
	
	//$Date = "2010-09-17";
    $dd_inicio= date('Y-m-d', strtotime($hoje. ' - 4 days'));
    $dd_fim= date('Y-m-d', strtotime($hoje. ' + 4 days'));
	
	$sql2="select * from escala where data>'".$dd_inicio."' and data<'".$dd_fim."'";
	
	 
	$result2=mysqli_query($db,$sql2);

	$ndescansados=array();
	foreach ($result2 as $row)
	{
		array_push($ndescansados,$row['id_cadete']);
	}

    $x=0;
	$tudo2=array();
	for($i=0;$i<count($tudo);$i++)
	{
		if(!in_array($tudo[$i][8],$baixados)) //removendo baixados
		{
			array_push($tudo2,$tudo[$i]);
            //print_r($tudo[$i]);echo "<BR>";
		}
	}
	//foreach($tudo2 as $qweqwe)
	//{print_r($qweqwe);echo "<BR>";}
	
	$tudo=array();
	for($i=0;$i<count($tudo2);$i++)
	{
		if(!in_array($tudo2[$i][8],$ndescansados)) //removendo descanso menor que 72 horas
		{
			array_push($tudo,$tudo2[$i]);
 
		}
	}
 
 

 
	 
	$tudo_tabela=$tudo;

	$id_post=array();
	foreach($aux_posto as $ap)
	{
	   $sql22="select * from postos where posto='".$ap."'";
	   $result22=mysqli_query($db,$sql22);
	   $row22=mysqli_fetch_array($result22,MYSQLI_ASSOC);
	   array_push($id_post,$row22['id']);
	}	
	$ESCOLHIDOS=$tudo;
	$RESERVAS=$tudo;
//	print_r($tudo);
	$ESCOLHIDOS=array_slice($ESCOLHIDOS,0,(count($aux_posto)*3),true);
//	print_r($ESCOLHIDOS);echo "<BR>";
	$RESERVAS=array_slice($RESERVAS,count($ESCOLHIDOS),(count($tudo)-count($ESCOLHIDOS)),true);
//	echo count($ESCOLHIDOS)."<BR>";
	//escolhendo postos
	$todo_mundo_posto=array();
	 //print_r($ESCOLHIDOS);
 
	foreach($ESCOLHIDOS as $e)
	{
		$meus_postos2=array();
		$sqlposto="select * from cadetes_servico where id=".$e[8];
		$resultposto=mysqli_query($db,$sqlposto);
		$rowposto=mysqli_fetch_array($resultposto,MYSQLI_ASSOC);
		$meus_postos=explode("|",$rowposto['postos']);
		array_push($meus_postos2,$e[8]);
		foreach($meus_postos as $mp)
		{
			if(in_array(explode(":",$mp)[0],$id_post))
			{
			array_push($meus_postos2,$mp);
		    }
		}
		array_push($meus_postos2,$rowposto['horarios']);
		
		array_push($todo_mundo_posto,$meus_postos2);
 
	}
//colocando os reservas em outra tabela
    $sql="delete from reserva where cor='".$cor."' and escala=".intval(substr($_POST['escala'],0,2),10);
	$result=mysqli_query($db,$sql);
    foreach($RESERVAS as $e)
    {
		$sql = "insert into reserva(id_cadete ,data,cor,escala) values (".$e[8].",'".$hoje."','".$cor."'".",".intval(substr($_POST['escala'],0,2),10).")";
		//echo $sql."<BR>";
		$result=mysqli_query($db,$sql);
	}
 
 
//	echo "AQUI ".count($todo_mundo_posto)."<BR>";
	$todo_mundo_posto2=array();
	for($loop=1;$loop<(count($todo_mundo_posto[0]) );$loop++)
	{
		$paux=array();
		$menor=1000;
		$aposto=explode(":",$todo_mundo_posto[0][$loop])[0]; //posto escolhido para girar
		for($loop2=0;$loop2<count($todo_mundo_posto);$loop2++)
		{		  
	       $ocorrenciaposto=explode(":",$todo_mundo_posto[$loop2][$loop])[1];  //numero de vezes que o cadete tirou esse posto
		   if($ocorrenciaposto<$menor)
		   {
			   $menor=$ocorrenciaposto;
			   $menorpostoindice=$loop2;
//			   echo "CADETE menor ";
//			   print_r($todo_mundo_posto[$loop2]);
//			   echo "<BR>";
		   }
		   
		}
		array_push($paux,$todo_mundo_posto[$menorpostoindice] );
		array_splice($todo_mundo_posto,$menorpostoindice,1);
		//echo "PAUX NESSE MOMENTO ";
		//print_r($paux);echo "<BR>";
		//echo "TODO MUNDO POSTO NESSE MOMENTO ". count($todo_mundo_posto)."<BR>";
		$menor=1000;
		for($loop2=0;$loop2<count($todo_mundo_posto);$loop2++)
		{		  
	       $ocorrenciaposto=explode(":",$todo_mundo_posto[$loop2][$loop])[1];  //numero de vezes que o cadete tirou esse posto
		   if($ocorrenciaposto<$menor)
		   {
			   $menor=$ocorrenciaposto;
			   $menorpostoindice=$loop2;
//			   echo "CADETE 2menor ";
//			   print_r($todo_mundo_posto[$loop2]);
//			   echo "<BR>";
		   }
		   
		}
		array_push($paux,$todo_mundo_posto[$menorpostoindice]);
		array_splice($todo_mundo_posto,$menorpostoindice,1);
		//echo "PAUX NESSE MOMENTO ";
		//print_r($paux);echo "<BR>";
		//echo "TODO MUNDO POSTO NESSE MOMENTO ". count($todo_mundo_posto)."<BR>";
		$menor=1000;
		for($loop2=0;$loop2<count($todo_mundo_posto);$loop2++)
		{		  
	       $ocorrenciaposto=explode(":",$todo_mundo_posto[$loop2][$loop])[1];  //numero de vezes que o cadete tirou esse posto
		   if($ocorrenciaposto<$menor)
		   {
			   $menor=$ocorrenciaposto;
			   $menorpostoindice=$loop2;
//			   echo "CADETE 3menor ";
//			   print_r($todo_mundo_posto[$loop2]);
//			   echo "<BR>";
		   }
		}
		array_push($paux,$todo_mundo_posto[$menorpostoindice] );
		array_splice($todo_mundo_posto,$menorpostoindice,1);
		//echo "PAUX NESSE MOMENTO ";
		//print_r($paux);echo "<BR>";
		//echo "TODO MUNDO POSTO NESSE MOMENTO ". count($todo_mundo_posto)."<BR>";
		$menor=1000;
		//echo "<BR>FECHOU LOOP <BR>";
		$paux2=array();
		for($loop2=0;$loop2<count($paux);$loop2++)
		{
			if(intval(explode("|",end($paux[$loop2]))[0],10)<$menor) //1 horario
			{
				$menor=intval(explode("|",end($paux[$loop2]))[0],10);
				$menorpostoindice=$loop2;
			}
		}
		array_push($paux2,$paux[$menorpostoindice]);
		array_splice($paux,$menorpostoindice,1);
		$menor=1000;
		for($loop2=0;$loop2<count($paux);$loop2++)
		{
			if(intval(explode("|",end($paux[$loop2]))[1],10)<$menor) //2 horario
			{
				$menor=intval(explode("|",end($paux[$loop2]))[1],10);
				$menorpostoindice=$loop2;
			}
		}
		array_push($paux2,$paux[$menorpostoindice]);
		array_splice($paux,$menorpostoindice,1);
		$menor=1000;
		for($loop2=0;$loop2<count($paux);$loop2++)
		{
			if(intval(explode("|",end($paux[$loop2]))[1],10)<$menor) //2 horario
			{
				$menor=intval(explode("|",end($paux[$loop2]))[1],10);
				$menorpostoindice=$loop2;
			}
		}		
 		array_push($paux2,$paux[$menorpostoindice]);
		array_splice($paux,$menorpostoindice,1);
		//echo "TEMPO ORDENADO NESSE MOMENTO ";
		//print_r($paux2); echo "<BR><BR>";
		foreach($paux2 as $ppp2)
		{
			array_push($todo_mundo_posto2,$ppp2);
		}
		//array_push($todo_mundo_posto2,$paux2);
	}
 
    for($i=0;$i<count($aux_posto);$i++)
	{
		for($j=0;$j<3;$j++)
		{
           $posto_escolhido=$id_post[$i];
		   $horario_escolhido=$j+1;
		   $sql = "insert into escala(id_cadete,data,horario,id_posto,cor,escala) values(".$todo_mundo_posto2[(($i)*3)+$j][0].",'".$hoje."',".$horario_escolhido.",".$posto_escolhido.",'".$cor."',".intval(substr($_POST['escala'],0,2),10).")";
		   $result=mysqli_query($db,$sql);
		}
	}		
}
}	//se der merda é aqui	
	


}
 ?>
 <!DOCTYPE html>

<!--<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>-->
<script type="text/javascript" language="javascript" src="../jquery-3.6.0.min.js"></script>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<html>

<!--- teste -->
<style type="text/css">
/*.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg .tg-llyw{background-color:#c0c0c0;border-color:inherit;text-align:left;vertical-align:top}
.tg .tg-rq3n{background-color:#ffffff;border-color:inherit;text-align:center;vertical-align:middle}
.tg .tg-c6of{background-color:#ffffff;border-color:inherit;text-align:left;vertical-align:top}*/
</style>

 <link href="dropzone.css" type="text/css" rel="stylesheet" />
 
<!-- 2 -->
<script src="dropzone.js"></script>


 
 <head>
 <link rel="shortcut icon" type="image/png" href="/favicon.png"/>

	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
	<title>Documentos Importantes</title>
	
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
	
	<!--<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
	<link rel="stylesheet" type="text/css" href="../dropzone-master/dist/dropzone.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
	<style type="text/css" class="init">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</style>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<!-- Bootstrap Date-Picker Plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    
	<link rel="stylesheet" href="../zTree_v3-master/css/zTreeStyle/zTreeStyle.css" type="text/css">
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
	<script type="text/javascript" class="init"></script>
<script>
$(document).ready(function() {
	    $('td').css("vertical-align","middle");
        $('td').css("font-size","12px");
        $('th').css("font-size","13px");

	var date_input=$('input[name="data"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        //format: 'mm/dd/yyyy',
		format: 'yyyy-mm-dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
	$('input[name="data"]').mask('0000-00-00');
	
	
	$("#data").change(function(){
		 
	var ano=($(this).val()).split("-")[0];
	var mes=($(this).val()).split("-")[1];
	var dia=($(this).val()).split("-")[2];
	var data=new Date(ano, mes, dia);
	var url="Dia_da_semana.php?data="+$(this).val();
	console.log(url);
    $.get(url,function(data){
	    //console.log(data); 
		//sabado é 6
		if(data==5)
		{
			$('#cor').val("Azul");
		}
		if(data==6)
		{
			$('#cor').val("Vermelha");
		}
		if(data==0)
		{
			$('#cor').val("Vermelha");
		}
		if(data>0 && data<5)
			$('#cor').val("Preta");
     });
	});
	
	$(".a").css("display","none");//teste aqui
	$("#Postoss").css("display","none");
	$("#sort").change(function(){
		var escala=$(this).val();
		//console.log(escala);
		$(".a").css("display","inline");//teste aqui
		$("#Postoss").css("display","inline");
		$("#checkboxes").children().each(function(index){
			$(this).prop("checked", false);
			var a =($(this).attr("class"));
			if(a!=null)
			{
			a=a.toString();
			a=a.split(escala);
			console.log(a);
			
			//if($(this).attr("class")==escala)
			if(a.length>1)	
			{
			  $(this).css("display","inline");
			}
			else
			{
		      $(this).css("display","none");
			}
			}
		});
	});


$(function(){
    //$('.myCalendar').calendar({
	//date = new Date(),
	//autoSelect: true,
	//select: function(date){
	//console.log('SELECT',date);
//	}
//	 toggle: function(y, m) {
  //  console.log('TOGGLE', y, m)
   // }
  // });

//$('.myCalendar').calendar({
 // date: new Date(),
 // autoSelect: true
//});


$('.myCalendar').calendar({
  
  select: function(date) {
	  switch(((date).toString()).split(' ')[1])
  {
	  case 'Jan':
	  var mes='01';
	  break;
	  case 'Feb':
	  var mes='02';
	  break;
	  case 'Mar':
	  var mes='03';
	  break;
	  case 'Apr':
	  var mes='04';
	  break;
	  case 'May':
	  var mes= '05';
	  break;
	  case 'Jun':
	  var mes='06';
	  break;
	  case 'Jul':
	  var mes='07';
	  break;
	  case 'Aug':
	  var mes='08';
	  break;
	  case 'Sep':
	  var mes='09';
	  break;
	  case 'Oct':
	  var mes='10';
	  break;
	  case 'Nov':
	  var mes='11';
	  break;
	  case 'Dec':
	  var mes='12';  
  }   
      $(".tg-c6of").html("XXXXXX");
	  
	  var clicado=((date).toString()).split(' ')[3] + '-'+ mes +'-'+ ((date).toString()).split(' ')[2];
	  $('#data_oculta').val(clicado);
	  var clicado2=new Date(clicado.split("-")[0],(parseInt(clicado.split("-")[1])-1).toString(),clicado.split("-")[2]);
	//  var url="Dia_da_semana.php?data="+clicado;
	  //$.get(url,function(dia_da_semana){
	  //console.log(dia_da_semana);  
	  //var clicado2= new Date(clicado.split("-")[0],(parseInt(clicado.split("-")[1],10)-1 ).toString(),clicado.split("-")[2]);	  
	  terca=new Date(clicado2);
	  //terca=setDate(terca.getDate()+29);
	  console.log(terca);
	  //terca.setDate(
	  terca.setDate(clicado2.getDate() - clicado2.getDay() + 2);
	  if(clicado2.getDay()<2)
	  {
		  terca.setDate(clicado2.getDate() - clicado2.getDay() - 5);
	  }
	//  var terca=clicado2.getDay()-3;
	  var posto="";
	  var horario="";
	  var dia="";
 
      $.getJSON("getEscalas.php", function (data) { 
	  $.getJSON("getCadetes.php", function (cadetes) { 
	 // console.log(data);
	  for(i=0;i<data.data.length;i++)
	  {
		var s=data.data[i].data.split("-");
		var q= new Date(s[0],(parseInt(s[1],10)-1).toString(),s[2]);
		// console.log(q + ' ' + terca);
		var segunda=new Date(terca);
		segunda.setDate(terca.getDate() + 6);
		if(q >= terca  &&   q<=segunda)
		{
		//console.log("teste");
		    
			$(".tg-c6of").each(function(){
				 horario=($(this).attr("id")).split("_")[1]
				 posto=($(this).attr("id")).split("_")[2]
				 dia=($(this).attr("id")).split("_")[3]
				 
				 if(q.getDay()==0)
					 qalterado=5;
				 if(q.getDay()==1)
					 qalterado=6;
				 if(q.getDay()==2)
					 qalterado=0;
				 if(q.getDay()==3)
					 qalterado=1;
				 if(q.getDay()==4)
					 qalterado=2;
				 if(q.getDay()==5)
					 qalterado=3;
				 if(q.getDay()==6)
					 qalterado=4;
					 
				 if (dia==qalterado)
				 {  
					 //console.log("lohran");
					if(posto==data.data[i].id_posto)
					{  //console.log("lohran2");
						if(horario==data.data[i].horario)
						{//console.log("lohran3 "+data.data[i].id_cadete);
					         //var td_tabela=this;
							 var id_cadete=data.data[i].id_cadete;
					       
						  	  //$(this).html(data.data[i].id_cadete);
							  for(qq=0;qq<cadetes.data.length;qq++)
							  {
							    if(id_cadete == cadetes.data[qq].id)
								{
								  $(this).html("CAD "+cadetes.data[qq].cadetes);
								}
							  }
						   
						}
					}
				 }
			});
 
		}
		 
	  }
	  
	  });
	  });
	  
	/*$("#exampleFormControlSelect2").children().each(function(index){
	
		if($(this).val()==((date).toString()).split(' ')[3] + '-'+ mes +'-'+ ((date).toString()).split(' ')[2])
		{
			console.log($(this).val());
 
			$(this).attr('selected','selected');
		}
	});*/
//}); //se der merda é aqui
  }

});
//});
});
	
});


 
</script>
<style>
/*
button span {
  display: none;
}
.mobile-container {
  max-width: 480px;
  margin: auto;
  height: 500px;
  color: black;
  border-radius: 10px;
}

.topnav {
  overflow: hidden;
  background-color: #333;
  position: relative;
}

.topnav #myLinks {
  display: none;
}

.topnav a {
  color: white;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
  display: block;
}

.topnav a.icon {
  background: black;
  display: block;
  position: absolute;
  right: 0;
  top: 0;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.active { */
/*  background-color: #007bff;
  background-color: silver;
  color: white;
}*/

</style>
<link rel="stylesheet" href="../APMB2/responsive-nao-calendar/aicon/style.css">
<link rel="stylesheet" href="../APMB2/responsive-nao-calendar/css/jquery-nao-calendar.css">
<script src="../APMB2/responsive-nao-calendar/jquery-nao-calendar.js"></script>	
	<style>
.myCalendar.nao-month td {
  padding: 15px;
}

.myCalendar .month-head>div,
.myCalendar .month-head>button {
  padding: 15px;
}
</style>


</head>
<body class="wide comments example dt-example-bootstrap">

<?php include("menu.php");?>

<div class = "container" style="margin-top:10%">

<!-- Top Navigation Menu -->






<h3>Árvore de arquivos</h3>

<ul id="treeDemo" class="ztree">
</ul>
<SCRIPT type="text/javascript">
<!--
var setting = {
data: {
simpleData: {
enable: true
}
}
};
</SCRIPT>
<?php 
$s="";
$s=$s."<SCRIPT>"."\n";
$s=$s."var zNodes =["."\n";
$s=$s.'{ id:1, pId:0, name:"Documentos", open:true,isParent:true},'."\n";
$sql="Select distinct(escala) from postos";
$result=mysqli_query($db,$sql);
$i=1;
$em_pastas = array();
foreach($result as $row)
{
   $s=$s.'{ id:1'.$i.', pId:1, name:" Documentos da '.$row['escala'].'",isParent:true},'."\n";
   $files = scandir('./uploads');
   $j=1;
   foreach($files as $file) {
	 //echo $file;
     if(count(explode($row['escala'],$file))>1)
	 {
		 $s=$s."{ id:1".$i.$j.", pId:1".$i.", name:'".$file."' ,url:'uploads/".$file."'},"."\n";
		 $j=$j+1;
		 array_push($em_pastas,$file);
	 }
   }  
   
$i=$i+1;   
}
    foreach($files as $file)
	{
		if(!in_array($file,$em_pastas))
		{
			if ($file!="." && $file !="..")
			$s=$s."{id:2,pId:2,name:'".$file."', url:'uploads/".$file."'},"."\n";
		}
	}
/*$s=$s.'{ id:11, pId:1, name:"pNode 11"},';
$s=$s.'{ id:111, pId:11, name:"leaf node 111"},';
$s=$s.'{ id:112, pId:11, name:"leaf node 112"},';
$s=$s.'{ id:113, pId:11, name:"leaf node 113"},';
$s=$s.'{ id:114, pId:11, name:"leaf node 114"},';
$s=$s.'{ id:12, pId:1, name:"pNode 12"},';
$s=$s.'{ id:121, pId:12, name:"leaf node 121"},';
$s=$s.'{ id:122, pId:12, name:"leaf node 122"},';
$s=$s.'{ id:123, pId:12, name:"leaf node 123"},';
$s=$s.'{ id:124, pId:12, name:"leaf node 124"},';
$s=$s.'{ id:13, pId:1, name:"pNode 13 - no child", isParent:true},';
$s=$s.'{ id:2, pId:0, name:"pNode 2"},';
$s=$s.'{ id:21, pId:2, name:"pNode 21", open:true},';
$s=$s.'{ id:211, pId:21, name:"leaf node 211"},';
$s=$s.'{ id:212, pId:21, name:"leaf node 212"},';
$s=$s.'{ id:213, pId:21, name:"leaf node 213"},';
$s=$s.'{ id:214, pId:21, name:"leaf node 214"},';
$s=$s.'{ id:22, pId:2, name:"pNode 22"},';
$s=$s.'{ id:221, pId:22, name:"leaf node 221"},';
$s=$s.'{ id:222, pId:22, name:"leaf node 222"},';
$s=$s.'{ id:223, pId:22, name:"leaf node 223"},';
$s=$s.'{ id:224, pId:22, name:"leaf node 224"},';
$s=$s.'{ id:23, pId:2, name:"pNode 23"},';
$s=$s.'{ id:231, pId:23, name:"leaf node 231"},';
$s=$s.'{ id:232, pId:23, name:"leaf node 232"},';
$s=$s.'{ id:233, pId:23, name:"leaf node 233"},';
$s=$s.'{ id:234, pId:23, name:"leaf node 234"},';
$s=$s.'{ id:3, pId:0, name:"pNode 3 - no child", isParent:true}';*/
$s=$s.'];';
$s=$s.'</SCRIPT>'."\n";
echo $s;?>
<SCRIPT>
$(document).ready(function(){
	$("div#myId").dropzone({ url: "/file/post" });
	 $('.dz-message').children('span').each(function()
	 {
		//$(this).val("Solte os arquivos aqui para upload");
		 ($(this).html("Solte arquivos aqui para upload"));
		 
	 });
$.fn.zTree.init($("#treeDemo"), setting, zNodes);


});
//-->
</SCRIPT>
 
<!--<form action="upload.php" class="dropzone"></form>-->

 	  
	  
<script src="../dropzone-master/dist/dropzone.js"></script>
 
</body>
<script  src="../ESCALA/jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>
<script type="text/javascript" src="../roosevelt/arrive-master/src/arrive.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src= "../zTree_v3-master/js/jquery.ztree.core.js"></script>
</html>