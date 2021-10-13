<?php
//include('config.php');
 
		
require( '../FO/ssp.class.php' );
		  
$sql_details = array(
    'user' => 'USUARIO_DB',
    'pass' => 'SENHA_DB',
    'db'   => 'DB',
    'host' => 'localhost'
);
 //| id | data_do_fato | PouN     | defesa | data_ciencia | horario | id_anotado | codigo | conduta_aluno          | razoes |

 
$columns = array(
    array( 'db' => 'id','dt' => 'id'),
    array( 'db' => 'matricula_esfo','dt'=>'matricula_esfo'), 
    array( 'db' => 'cia','dt'=>'cia'),
    array( 'db' => 'pelotao','dt'=>'pelotao'),
	array( 'db' => 'pauta','dt'=>'pauta'),
	array( 'db' => 'cadete','dt'=>'cadete'),
	array( 'db' => 'matricula','dt'=>'matricula'),
	array( 'db' => 'saida','dt'=>'saida'),
	array( 'db' => 'motivo','dt'=>'motivo'),
	array( 'db' => 'retorno','dt'=>'retorno'),
	array( 'db' => 'hoje','dt'=>'hoje'),
	array( 'db' => 'oficial','dt'=>'oficial')
	
   );


$table = <<<EOT
 (
 select  * from guia
 ) temp
EOT;

$primaryKey='id';
if(!isset($_GET['matricula_esfo']))
{
 $where="1=1";
}
else{
	$where="matricula_esfo=".$_GET['matricula_esfo'];
}
 echo json_encode(
     SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns,$where )
 );
//}
       
     ?>
 
 
