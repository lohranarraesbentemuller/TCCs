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
    array( 'db' => 'id', 'dt' => 'id' ),
    array( 'db' => 'data_do_fato','dt' => 'data'),
    array( 'db' => 'PouN','dt' => 'PouN'),
    array( 'db' => 'id_anotado','dt' => 'id_anotado'),
    array( 'db' => 'codigo','dt' => 'codigo'),
    //array( 'db' => 'cor','dt' => 'cor'),
    
);
$columns = array(
   array( 'db' => 'id','dt' => 'id' ),
   array( 'db' => 'data_do_fato', 'dt' => 'data' ),
   array( 'db' => 'PouN',   'dt' => 'PouN' ),
   array( 'db' => 'defesa', 'dt' => 'defesa' ),
   array( 'db' => 'data_ciencia', 'dt' => 'data_ciencia' ),
   array( 'db' => 'horario', 'dt' => 'horario' ),
   array( 'db' => 'id_anotado', 'dt' => 'id_anotado' ),
   array( 'db' => 'codigo', 'dt' => 'codigo' ),
   array( 'db' => 'conduta_aluno', 'dt' => 'conduta_aluno' ),
   array( 'db' => 'razoes', 'dt' => 'razoes' ),
   array( 'db' => 'status', 'dt' => 'status' )
);

$columns = array(
    array( 'db' => 'id','dt' => 'id'),
	array( 'db' => 'numero','dt' => 'numero'),
	array( 'db' => 'data','dt' => 'data'),
    array( 'db' => 'prefixo','dt' => 'prefixo'),
    array( 'db' => 'comandante','dt' => 'comandante'),
	array( 'db' => 'natureza','dt' => 'natureza'),
	array( 'db' => 'solicitante','dt' => 'solicitante'),
	array( 'db' => 'contato','dt' => 'contato'),
	array( 'db' => 'cidade','dt' => 'cidade'),
	array( 'db' => 'bairro','dt' => 'bairro'),
	array( 'db' => 'endereco','dt' => 'endereco'),
	array( 'db' => 'historico_inicial','dt' => 'historico_inicial')
    
    
);

$table = <<<EOT
 (
 select * from exemplo_rocha_soares
 ) temp
EOT;

$primaryKey='id';
if(isset($_GET['numero']))
{
$where="numero= ".$_GET['numero']." ";
}
else
{
	$where="1=1";
}
//print_r($_GET);echo "<BR>";
//print_r($sql_details);echo "<BR>";
//print_r($table);echo "<BR>";
//print_r($primaryKey);echo "<BR>";
//print_r($columns);echo "<BR>";
//echo $where."<BR>";
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns,$where )
);
//}
       
     ?>
