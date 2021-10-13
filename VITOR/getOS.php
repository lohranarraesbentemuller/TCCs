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
    array( 'db' => 'os','dt'=>'os'), 
    array( 'db' => 'referencia','dt'=>'referencia'),
    array( 'db' => 'data','dt'=>'data'),
	array( 'db' => 'hora_inicio','dt'=>'hora_inicio'),
	array( 'db' => 'hora_fim','dt'=>'hora_fim'),
	array( 'db' => 'UPM','dt'=>'UPM'),
	array( 'db' => 'data_fim','dt'=>'data_fim'),
	array( 'db' => 'cmt1','dt'=>'cmt1'),
	array( 'db' => 'cmt2','dt'=>'cmt2'),
	array( 'db' => 'enderecado','dt'=>'enderecado'),
	array( 'db' => 'local','dt'=>'local'),
	array( 'db' => 'TSE','dt'=>'TSE'),
	array( 'db' => 'efetivo','dt'=>'efetivo'),
	array( 'db' => 'duracao','dt'=>'duracao'),
	array( 'db' => 'uniforme','dt'=>'uniforme'),
	array( 'db' => 'equipamento','dt'=>'equipamento'),
	array( 'db' => 'armamento','dt'=>'armamento'),
	array( 'db' => 'situacao','dt'=>'situacao'),
	array( 'db' => 'missao','dt'=>'missao'),
	array( 'db' => 'prescricoes','dt'=>'prescricoes'),
	array( 'db' => 'local_data','dt'=>'local_data'),
	array( 'db' => 'nome_posto','dt'=>'nome_posto'),
	array( 'db' => 'chefe','dt'=>'chefe'),
	array( 'db' => 'brasoes','dt'=>'brasoes'),
	array( 'db' => 'evento','dt'=>'evento'),
	array( 'db' => 'n_vigente','dt'=>'n_vigente')
	
   );

$table = <<<EOT
 (
 select n_vigente,OS.id,os,referencia,data,hora_inicio,hora_fim,UPM,data_fim,cmt1,cmt2,enderecado,local,TSE,efetivo,duracao,uniforme,equipamento,armamento,situacao,missao,prescricoes,local_data,nome_posto,chefe,brasoes,evento from OS inner join OS2 on OS.id=OS2.id inner join OS3 on OS.id=OS3.id
 ) temp
EOT;

$primaryKey='id';
if(!isset($_GET['UPM']))
{
 $where="1=1";
}
else{
	$where="UPM='".$_GET['UPM']."'";
}
 echo json_encode(
     SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns,$where )
 );
//}
       
     ?>
 
 
