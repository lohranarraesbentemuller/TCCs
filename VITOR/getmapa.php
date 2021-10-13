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
    array( 'db' => 'batalhao','dt'=>'batalhao'), 
    array( 'db' => 'data','dt'=>'data'),
    array( 'db' => 'nome_posto1','dt'=>'nome_posto1'),
	array( 'db' => 'nome_posto2','dt'=>'nome_posto2')
   );

$table = <<<EOT
 (
 select * from mapa
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
 
 
