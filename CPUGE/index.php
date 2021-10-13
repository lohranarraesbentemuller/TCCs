<?php
 include("config.php");
 include("session.php");
if($_SERVER["HTTPS"] != "on")
{
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
 //   exit();
}
$flag=True;

if($_SERVER["REQUEST_METHOD"] == "POST") {
/*	
numero_copom
natureza
data
prefixo
comandante
solicitante
contato
cidade
bairro
endereco2
latitude
longitude
historico_inicial
*/


if($_POST['natureza']=="") $flag=False;
if($_POST['data']=="") $flag=False;
if($_POST['historico_inicial']=="") $flag=False;
if($_POST['latitude']=="") $flag=False;
if($_POST['longitude']=="") $flag=False;
if($_POST['cidade']=="") $flag=False;
if($_POST['bairro']=="") $flag=False;
if($_POST['endereco2']=="") $flag=False;
if($_POST['solicitante']=="") $flag=False;
if($_POST['contato']=="") $flag=False;
if($_POST['hora']=="") $flag=False;

 
if($flag==False)
{
	echo '<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>';
	echo "<script>$(document).ready(function(){";
	
	if($_POST['natureza']=="")  echo '$("#alerta_natureza").css("display","inherit");';
	if($_POST['data']=="")  echo '$("#alerta_data").css("display","inherit");';
	if($_POST['historico_inicial']=="")  echo '$("#alerta_historico").css("display","inherit");';
	if($_POST['latitude']=="")  echo '$("#alerta_lat").css("display","inherit");';
	if($_POST['longitude']=="")  echo '$("#alerta_lng").css("display","inherit");';
	if($_POST['cidade']=="")  echo '$("#alerta_cidade").css("display","inherit");';
	if($_POST['bairro']=="")  echo '$("#alerta_bairro").css("display","inherit");';
	if($_POST['endereco2']=="")  echo '$("#alerta_endereco").css("display","inherit");';
	if($_POST['solicitante']=="")  echo '$("#alerta_solicitante").css("display","inherit");';
	if($_POST['contato']=="")  echo '$("#alerta_contato_solicitante").css("display","inherit");';
	if($_POST['hora']=="")  echo '$("#alerta_hora").css("display","inherit");';
	echo "});</script>";
}
else{

$sql="insert into ocorrencia(natureza,data,historico_inicial) values('".$_POST['natureza']."','".$_POST['data']. " ".$_POST['hora']."','".$_POST['historico_inicial']."');";
//echo $sql;exit();
$result=mysqli_query($db,$sql);

$sql="insert into ocorrencia_comando(prefixo,comandante) values('".$_POST['prefixo']."','".$_POST['comandante']."');";
$result=mysqli_query($db,$sql);

$maps="https://www.google.com/maps/?q=".$_POST['longitude'].",".$_POST['latitude']; 

//$maps="https://www.google.com/maps/dir/A/B/@<latB>,<lngB>,14z/data=!3m1!4b1!4m14!4m13!1m5!1m1!1s0x935a321a1333df03:0x3ba743f8a88ca99!2m2!1d<latA>!2d<lngA>!1m5!1m1!1s0x935ef6bd58d80867:0xef692bad20d2678e!2m2!1d<lngB>!2d<latB>!3e0";

$sql="insert into ocorrencia_local(cidade,bairro,endereco,lat,lng,maps) values('".$_POST['cidade']."','".$_POST['bairro']."','".$_POST['endereco2']."','".$_POST['longitude']."','".$_POST['latitude']."','".$maps."');";
$result=mysqli_query($db,$sql);

$sql="insert into ocorrencia_solicitante(solicitante,contato) values('".$_POST['solicitante']."','".$_POST['contato']."');";
$result=mysqli_query($db,$sql);

$sql="select numero from ocorrencia order by numero desc limit 1";
 
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

$sql="select id from ocorrencia_comando order by id desc limit 1";
 
$result=mysqli_query($db,$sql);
$row2=mysqli_fetch_array($result,MYSQLI_ASSOC);

$sql="select id from ocorrencia_solicitante order by id desc limit 1";
 
$result=mysqli_query($db,$sql);
$row3=mysqli_fetch_array($result,MYSQLI_ASSOC);

$sql="select id from ocorrencia_local order by id desc limit 1";
 
$result=mysqli_query($db,$sql);
$row4=mysqli_fetch_array($result,MYSQLI_ASSOC);

$sql="insert into ocorrencia_concat(id_ocorrencia,id_prefixo,id_solicitante,id_loc) values(".$row['numero'].",".$row2['id'].",".$row3['id'].",".$row4['id'].")";
 
$result=mysqli_query($db,$sql);
header("location:SGO.php");
}
}
if($flag==True) echo '<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>';
?>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
<script src="../ckeditor/ckeditor.js"></script>
<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../APMB2/Gallery-2.36.0/css/blueimp-gallery.css" />
    <link rel="stylesheet" href="../APMB2/Gallery-2.36.0/css/blueimp-gallery-indicator.css" />
    <link rel="stylesheet" href="../APMB2/Gallery-2.36.0/css/blueimp-gallery-video.css" />
   <!-- <link rel="stylesheet" href="Gallery-2.36.0/css/demo/demo.css" /> -->

<style>
.skin-blue .main-header .navbar{background-color:#154D6E}.skin-blue .main-header .navbar .nav>li>a{color:#fff}.skin-blue .main-header .navbar .nav>li>a:hover,.skin-blue .main-header .navbar .nav>li>a:active,.skin-blue .main-header .navbar .nav>li>a:focus,.skin-blue .main-header .navbar .nav .open>a,.skin-blue .main-header .navbar .nav .open>a:hover,.skin-blue .main-header .navbar .nav .open>a:focus,.skin-blue .main-header .navbar .nav>.active>a{background:rgba(0,0,0,0.1);color:#f6f6f6}.skin-blue .main-header .navbar .sidebar-toggle{color:#fff}.skin-blue .main-header .navbar .sidebar-toggle:hover{color:#f6f6f6;background:rgba(0,0,0,0.1)}.skin-blue .main-header .navbar .sidebar-toggle{color:#fff}.skin-blue .main-header .navbar .sidebar-toggle:hover{background-color:#154D6E}@media (max-width:767px){.skin-blue .main-header .navbar .dropdown-menu li.divider{background-color:rgba(255,255,255,0.1)}.skin-blue .main-header .navbar .dropdown-menu li a{color:#fff}.skin-blue .main-header .navbar .dropdown-menu li a:hover{background:#154D6E}}.skin-blue .main-header .logo{background-color:#154D6E;color:#fff;border-bottom:0 solid transparent}.skin-blue .main-header .logo:hover{background-color:#154D6E}.skin-blue .main-header li.user-header{background-color:#154D6E}.skin-blue .content-header{background:transparent}.skin-blue .wrapper,.skin-blue .main-sidebar,.skin-blue .left-side{background-color:#154D6E}.skin-blue .user-panel>.info,.skin-blue .user-panel>.info>a{color:#fff}.skin-blue .sidebar-menu>li.header{color:#4b646f;background:#1a2226}.skin-blue .sidebar-menu>li>a{border-left:3px solid transparent}.skin-blue .sidebar-menu>li:hover>a,.skin-blue .sidebar-menu>li.active>a{color:#fff;background:#1e282c;border-left-color:#3c8dbc}.skin-blue .sidebar-menu>li>.treeview-menu{margin:0 1px;background:#2c3b41}.skin-blue .sidebar a{color:#b8c7ce}.skin-blue .sidebar a:hover{text-decoration:none}.skin-blue .treeview-menu>li>a{color:#8aa4af}.skin-blue .treeview-menu>li.active>a,.skin-blue .treeview-menu>li>a:hover{color:#fff}.skin-blue .sidebar-form{border-radius:3px;border:1px solid #374850;margin:10px 10px}.skin-blue .sidebar-form input[type="text"],.skin-blue .sidebar-form .btn{box-shadow:none;background-color:#374850;border:1px solid transparent;height:35px}.skin-blue .sidebar-form input[type="text"]{color:#666;border-top-left-radius:2px;border-top-right-radius:0;border-bottom-right-radius:0;border-bottom-left-radius:2px}.skin-blue .sidebar-form input[type="text"]:focus,.skin-blue .sidebar-form input[type="text"]:focus+.input-group-btn .btn{background-color:#fff;color:#666}.skin-blue .sidebar-form input[type="text"]:focus+.input-group-btn .btn{border-left-color:#fff}.skin-blue .sidebar-form .btn{color:#999;border-top-left-radius:0;border-top-right-radius:2px;border-bottom-right-radius:2px;border-bottom-left-radius:0}.skin-blue.layout-top-nav .main-header>.logo{background-color:#154D6E;color:#fff;border-bottom:0 solid transparent}.skin-blue.layout-top-nav .main-header>.logo:hover{background-color:#3b8ab8}
</style>

<script src="../APMB2/responsive-nao-calendar/jquery-nao-calendar.js"></script>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<link href="../FO/dropzone.css" type="text/css" rel="stylesheet" />
 <!doctype html>
<html lang="en">
<head>
<!-- menu lateral-->

    <!-- jQuery CDN - Slim version (=without AJAX) -->
<!--    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

<!--fim do menu -->
<style>
<link href="jumbotron.css" rel="stylesheet">

@import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);

body {
  color: blue;
}
a {
  color: inherit; /* blue colors for links too */
  text-decoration: inherit; /* no underline */
}
body{
    margin: 0;
    font-size: .9rem;
    font-weight: 400;
    line-heigth: 1.6;<nav.
    color: #212529;
    text-align: left;
    background-color: #f5f8fa;
}

.navbar-laravel
{
    box-shadow: 0 2px 4px rgba(0,0,0,.04);
}

.navbar-brand , .nav-link, .my-form, .login-form
{
    font-family: Raleway, sans-serif;
}

.my-form
{
    padding-top: 1.5rem;
    padding-bottom: 1.5rem;
}

.my-form .row
{
    margin-left: 0;
    margin-right: 0;
}

.login-form
{
    padding-top: 1.5rem;
    padding-bottom: 1.5rem;
}

.login-form .row
{
    margin-left: 0;
    margin-right: 0;
}
</style>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="../APMB2/stylesheet" type="text/css">

    <!--<link rel="stylesheet" href="../roosevelt/css/style.css">-->

    <link rel="icon" href="Favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <title>Genesis PMDF</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
	
	<!--datatables-->
  <!-- datatables -->
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<!--<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>-->
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8nB2llO9ZqvBXfAj-mwBjDsYxAlALqn4&libraries=places&sensor=false">
<!--<script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>-->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	
	<!---->
	<!--<script src="dropzone.js"></script>-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
<style>
span {
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
    font-weight: 400;
    overflow-x: hidden;
    overflow-y: auto;
	font-size: 14px;
    line-height: 1.42857143;
    color: #333;
    background-color: #fff;
}
</style>
		<script src="../mapsed-master/ws/js/jquery-1.10.2.js"></script>
		<script src="../mapsed-master/ws/js/bootstrap.js"></script>
<link href="../mapsed-master/mapsed.css" rel="stylesheet">
<link href="../mapsed-master/examples/examples.css" rel="stylesheet">
<script src="../mapsed-master/cmapsed4.js"></script>


<!--teste -->
<script>

function runExample5() 
{         function findMarker(lat, lng) {
			var marker = null;

			for (var i = 0; i < _markers.length; i++) {
				var m = _markers[i];
				if (m.position.lat() == lat && m.position.lng() == lng) {
					marker = m;
					break;
				}
			}

			return marker;

		} // findMarker	    
	    $("#add-places").mapsed({
  
/*showOnLoad: 	
[
{
autoShow: false,
lat:-15.836601293201014,
lng:-48.02178582888769,
town:'Riacho Fundo',
area:'veiculo roubado',
postCode:'15:07',
country:'03/10/2020',
street: 'parque aguas claras',
userData:'210',
telNo:'furto a veiculo'
}]	,	*/ 
		
		searchOptions: {
			enabled: true,		
       },
	   
  
	   
 		 });
 } 
</script>

<script>
$(document).ready(function(){
	  runExample5();  
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
	$('input[name="contato"]').mask('(00)0000-0000');
 	$('input[name="hora"]').mask('00:00:00');
	

});
</script>
<!-- fim teste -->

</head>

<body>

 
 <?php //include("menu.php");?>
 
 <img id="topo" style="" src="topo.png"/>
 <img id="topo_mobile" style="display:none;" src="topo_mobile.png"/>
 
 
 

 
<script src="../dropzone-master/dist/dropzone.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <form  method="post">
   <div class="container" style="margin-top:5%;">
<?php
$sql="SHOW TABLE STATUS FROM nobrega  where name like 'ocorrencia'";
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
?>
    
    <div class="row">
	 <div class="col">
     <span class="hidden-sm hidden-md">Número COPOM</span>
	 <input type="text" name="numero_compom" value='<?php echo intval($row['Auto_increment'],10)+1; ?>' class="form-control genesis" readonly></input>
     </div>
	 <div class="col">
	 <div id="alerta_natureza" style="display:none;" class="alert alert-danger" role="alert">Preencha a Natureza</div>
	 <span class="hidden-sm hidden-md">NATUREZA</span>
	 <input type="text" name="natureza" class="form-control genesis" autocomplete="off"/>
	 </div>
	 <div class="col">
	 <div  style="display:none;" id="alerta_data" class="alert alert-danger" role="alert">Preencha a data</div>
	 <span class="hidden-sm hidden-md">DATA</span>
	 <div class="form-group">
	 <input type="text"  name="data" class="form-control genesis data" autocomplete="off"/>
	 </div>
	 </div>
	 <div class="col">
	 <div  style="display:none;" id="alerta_hora" class="alert alert-danger" role="alert">Preencha a hora</div>
	 <span class="hidden-sm hidden-md">HORA</span>
	 <div class="form-group">
	 <input type="text"  name="hora" class="form-control genesis" autocomplete="off"/>
	 </div>
	 </div>	 
	 <div class="col">
	 <span class="hidden-sm hidden-md">PREFIXO</span>
	 <input type="text"  name="prefixo" class="form-control genesis" autocomplete="off"/>
	 </div>	
	 <div class="col">
	 <span class="hidden-sm hidden-md">COMANDANTE</span>
	 <input type="text"  name="comandante" class="form-control genesis" autocomplete="off"/>
	 </div>
   	</div>

    <div class="row">
	 <div class="col">
	 <div id="alerta_solicitante" style="display:none;" class="alert alert-danger" role="alert">Preencha o solicitante</div>
     <span class="hidden-sm hidden-md">SOLICITANTE</span>
	 <input type="text"  name="solicitante" class="form-control genesis" autocomplete="off" />
     </div>
	 <div class="col">
	 <div id="alerta_contato_solicitante" style="display:none;" class="alert alert-danger" role="alert">Preencha o contato do solicitante</div>
	 <span class="hidden-sm hidden-md">CONTATO</span>
	 <input type="text"  name="contato" class="form-control genesis" autocomplete="off"/>
	 </div>
	 <div class="col">
	 <div id="alerta_cidade" class="alert alert-danger" style="display:none;" role="alert">Preencha a Cidade</div>
	 <span class="hidden-sm hidden-md">CIDADE</span>
	 <input type="text" name="cidade" class="form-control genesis" autocomplete="off"/>
	 </div>

 
   	</div>	

    <div class="row">
	 <div class="col">
	 <div id="alerta_bairro" style="display:none;" class="alert alert-danger" role="alert">Preencha o bairro</div>
	 <span class="hidden-sm hidden-md">BAIRRO</span>
	 <input type="text"  name="bairro" class="form-control genesis" autocomplete="off"/>
	 </div>	
	 <div class="col">
	 <div id="alerta_endereco" style="display:none;" class="alert alert-danger" role="alert">Preencha o endereço</div>
	 <span class="hidden-sm hidden-md">ENDEREÇO</span>
	 <input type="text" name="endereco2" id="endereco2" class="form-control genesis" autocomplete="off"/>
	 </div>

	 <div class="col">
	 <div id="alerta_lng" style="display:none;" class="alert alert-danger" role="alert">Clique no marcador no mapa para inserir a latitude e a longitude</div>
	 <span class="hidden-sm hidden-md">LATITUDE</span>
	 <input type="text" name="longitude" id="longitude" class="form-control genesis" autocomplete="off" readonly />
	 </div>
 	 <div class="col">
	 <div id="alerta_lat" style="display:none;" class="alert alert-danger" role="alert">Clique no marcador no mapa para inserir a latitude e a longitude</div>
     <span class="hidden-sm hidden-md">LONGITUDE</span>
	 <input type="text" name="latitude" id="latitude" class="form-control genesis" autocomplete="off" readonly />
     </div>
   	</div>	
	<div class="row">
	  <div class="col">
	  <div id="alerta_historico" style="display:none;" class="alert alert-danger" role="alert">Preencha o histórico inicial da ocorrência</div>
	    <span class="hidden-sm hidden-md">HISTÓRICO INICIAL</span>
		<textarea name="historico_inicial" class="form-control" rows=8></textarea>
	  </div>
	</div>
	
	   <div class="row">
     <div class="col"></div>
	 <div class="col"></div>
	 <div class="col"></div>
	 <div class="col"></div>
	 <div class="col"></div>
	 <div class="col"></div>
     <div class="col">
       <button class="btn btn-primary"  >Gerar Ocorrência</button>
	  </div>
   </div>
	</form>
<div id="add-places"  class="small-map" style="height:1000px;margin-top:3%;"></div> 	
   

   
</div>   
</body>
 
   
      <!-- Main jumbotron for a primary marketing message or call to action -->
  

 


<script>

var isMobile = false; //initiate as false
// device detection
if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
    || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) { 
    isMobile = true;
}
function retira_acentos(palavra) { 
    com_acento = 'áàãâäéèêëíìîïóòõôöúùûüÁÀÃÂÄÉÈÊËÍÌÎÏÓÒÕÖÔÚÙÛÜ'; 
    sem_acento = 'aaaaaeeeeiiiiooooouuuuAAAAAEEEEIIIIOOOOOUUUU'; 
    nova=''; 
    for(i=0;i<palavra.length;i++) { 
        if (com_acento.search(palavra.substr(i,1))>=0) { 
            nova+=sem_acento.substr(com_acento.search(palavra.substr(i,1)),1); 
        } 
        else { 
            nova+=palavra.substr(i,1); 
        } 
    } 
    return nova; 
}
 



</script>

  <!--<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />-->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!--<link rel="stylesheet" href="../roosevelt/resources/demos/style.css">-->

 
 
 
  <!--<img src="DETALHES.png" style="width:40%;"/>-->
 
 
</div>
  



<img src="baixo.PNG"/>
<script  src="../ESCALA/jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>
<script type="text/javascript"  src="../jQuery-Autocomplete-master/src/jquery.autocomplete.js"></script>
<script type="text/javascript" src="../roosevelt/arrive-master/src/arrive.js"></script>
<script>
$(document).ready(function(){
	$(document).arrive(".mapsed-save-button",function(){
	  $('.mapsed-save-button').click(function(){
	  	$('#endereco2').val($('#endereco').val());
		//alert("pjiasdjia");
	  });
	});
  	 $('#add-places').dblclick(function(){
		$( ".mapsed-add-button" ).trigger( "click" ); 
	 });
 
	
 $(document).arrive(".mapsed-postCode",function(){
	 if($('.mapsed-postCode').html()!='{POSTCODE}')
		 {
		  $('#longitude').val($(".mapsed-postCode").html());	 
		 }
	 else{
		 $('#longitude').val($('#lng').val());
	 }
	//$('#latitude').val($(".mapsed-country").html());
	//$('#longitude').val($(".mapsed-postCode").html());
//	$('#endereco').val($(".mapsed-street").html());
 });
 $(document).arrive(".mapsed-country",function(){
	if($('.mapsed-country').html()!='{COUNTRY}')
		{
		$('#latitude').val($(".mapsed-country").html());
		}
	else{
		$('#latitude').val($('#lat').val());
	}
	//$('#longitude').val($(".mapsed-postCode").html());
//	$('#endereco').val($(".mapsed-street").html());
 });
 $(document).arrive(".mapsed-street",function(){
	//$('#latitude').val($(".mapsed-country").html());
	//$('#longitude').val($(".mapsed-postCode").html());
		if($('.mapsed-street').html()!='{STREET}' && $('.mapsed-street').html()!='' )
		{
	      $('#endereco2').val($(".mapsed-street").html());
		}
		else
		{
			$('#endereco2').val($("#endereco").val());
          if($('#endereco2').val()=='')
		  {
			 if($('.mapsed-name').html()!="{SHORT_NAME}")
				 {
			     $('#endereco2').val($('.mapsed-name').html());
				 }
		  }
		}
 }); 
 //$(document).arrive(".mapsed-search-box-1",function(){
	 //alert("123");
	 $('#latitude, #longitude').focusout(function(){
		  
	 if( $('#latitude').val()!="" && $('#longitude').val()!="")
	 {
		$("#mapsed-search-box-1").val($('#latitude').val()+","+$('#longitude').val());
		//alert($("#mapsed-search-box-1").html());
	 }
	 });
	 
	 $('#endereco2').focusout(function(){
		  
	 if( $('#endereco2').val()!="")
	 {
		$("#mapsed-search-box-1").val($('#endereco2').val());
		//alert($("#mapsed-search-box-1").html());
	 }
	 });
	 

 //});
});
</script>

</html>