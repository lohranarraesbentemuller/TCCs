<?php
include("config.php");
$flag=True;

if($_SERVER["REQUEST_METHOD"] == "POST") {
	$flag=false;
	$sql="select * from conselho where nome like '%".$_POST['busca']."%' or endereco like '%".$_POST['busca']."%' or telefone like '%".$_POST['busca']."%'";
		 
		 $result=mysqli_query($db,$sql);
	//	 print_r($result);
		// exit();
		 //$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
		 $s='';
		 foreach($result as $row)
		 {
			 $s.='<div class="row example1" id="tudo_'.$row['id'].'"  style="margin-top:10%;" >';
             $s.='<div class="ccol-lg-4"  style="float:left; margin-right:5%;">';
             $s.='<a href="#"><center><img class="rounded-circle" src="novo conselho.png" alt="Generic placeholder image" width="50px" height="auto"/></center></a>';
       
		     $s.='</div>';
		 
		     $s.='<div class="teste" style="float:right;font-size:10px;">';
		     $s.= $row['nome'].'<BR>';
			 $telefone=$row['telefone'];
			 $telefone=str_replace("(","",$telefone);
			 $telefone=str_replace(")","",$telefone);
			 $telefone=str_replace(" ","",$telefone);
			// $telefone=substr($telefone,0,2)+substr($telefone,3,9);
		     $s.='<a href="https://api.whatsapp.com/send/?phone=55'.$telefone.'&text&app_absent=0">'.$row['telefone'].'<img src="whatsapp.png" style="width:20px;"></img></a><br>';
			 //foreach($
			 if(strlen($row['endereco'])>=36)
			 {
		     $s.=substr($row['endereco'],0,36).'<BR>'.substr($row['endereco'],36,36); 
			 }
			 else{
				 $s.=$row['endereco'];
				 for($i=0;$i<(36-strlen($row['endereco']));$i++)
				 {
				  $s.="_";
				 }
			 }
		     $s.='</div>';
		     $s.='<BR><BR>';
			 $s.='<span onclick="remover('.$row['id'].')" class="fa fa-trash btn btn-danger" style="color:black;background-color:white;margin-left:1%;"></span><span style="margin-left:1%;background-color:white;" class="fa fa-edit btn btn-warning" onclick="editar('.$row['id'].')"></span>';
		     $s.='</div>			 ';
			  
		 }
		// echo $s; 
}
?>
<!doctype html>
<html lang="en">
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="../roosevelt/arrive-master/src/arrive.js"></script>   
<script  src="../ESCALA/jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	 <script src="https://kit.fontawesome.com/a073e3cdd7.js" crossorigin="anonymous"></script>
    <!--<link rel="icon" href="../bootstrap-4.0.0/favicon.ico">-->

    <title>PMDF</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap-4.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    
<style> 
.example1 {
  border: 1px solid;
  padding: 10px;
  box-shadow: 5px 10px;
  margin-left:10%;
  margin-right:10%;
}
a{
	text-decoration:none;
	color:inherit;
	font-size:10px; !important
	font:inherit;
	font-family:inherit;
}
</style>	
	<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
	var isMobile = false; //initiate as false
// device detection
if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
    || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) { 
    isMobile = true;
}
if (isMobile)
{
	//window.location.href = 'index.php';
	
	$(document).ready(function(){
		$('.titulo').css("font-size","12px");
		
		//alert($( window ).width());
		$('.rounded-circle').css("width","auto");
		//
		$('.rounded-circle').css("height","50px");
		$('.ccol-lg-4').css("float","left");
		$('.ccol-lg-4').css("margin-right","10%");
		//$('.ccol-lg-4').css("margin-right","5%");
		$('.teste').css("font-size","10px");
		$('.btn_busca').css("width",($( window ).width()/10));
		$('.busca').css("width",8*($( window ).width()/10));
		$('.btn_busca').css("float","left");
		$('.btn_busca').css("height",$('.busca').css("height"));
		$('.busca').css("float","left");
		//$('.ccol-lg-4').css("width",($( window ).width()/3)-2);
	});
}
</script>

  </head>
  <body>

    <header>
      <!--<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Carousel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Disabled</a>
            </li>
          </ul>
          <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>-->
	  <?php include("menu.php"); ?>
    </header>

    <main role="main">
 


      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->
<!--<center><h2  style="color:#000000;">Serviços</h2></center> -->
      <div class="container marketing" style="margin-top:5%;">
        <form method="post"><input name="busca" placeholder="Buscar" class="form-control busca" style="margin-bottom:5%;float:left;"/><button class="btn btn-dark btn_busca" type="submit"><span class="fa fa-search"></span></button> </form>
        <!-- Three columns of text below the carousel -->
		<BR>
        <div class="row example1" style="display:none;margin-top:10%;" >
          
         <div class="ccol-lg-4"  style="float:left; margin-right:5%;">
             <a href="logout.php"><center><img class="rounded-circle" src="novo conselho.png" alt="Generic placeholder image" width="50px" height="auto"/></center></a>
          
		 </div>
		 
		 <div class="teste" style="float:right;font-size:10px;">
		   Conselho Tutelar de Planaltina <BR>
		   <a href="https://api.whatsapp.com/send/?phone=5561981997618&text&app_absent=0">(61) 9 8199-7618</a> <img src="whatsapp.png" style="width:20px;" /><br>
		   Rua das Palmeiras - Apartamento 100 <BR>Ed Cristal do Parque
		 </div>
		 
		 </div>
		 
		 
		 <?php
		 if($flag){
		 $sql="select * from conselho";
		 
		 $result=mysqli_query($db,$sql);
	//	 print_r($result);
		// exit();
		 //$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
		 $s='';
		 foreach($result as $row)
		 {
			 $s.='<div class="row example1" id="tudo_'.$row['id'].'"  style="margin-top:10%;" >';
             $s.='<div class="ccol-lg-4"  style="float:left; margin-right:5%;">';
             $s.='<a href="#"><center><img class="rounded-circle" src="novo conselho.png" alt="Generic placeholder image" width="50px" height="auto"/></center></a>';
       
		     $s.='</div>';
		 
		     $s.='<div class="teste" style="float:right;font-size:10px;">';
		     $s.= $row['nome'].'<BR>';
			 $telefone=$row['telefone'];
			 $telefone=str_replace("(","",$telefone);
			 $telefone=str_replace(")","",$telefone);
			 $telefone=str_replace(" ","",$telefone);
			// $telefone=substr($telefone,0,2)+substr($telefone,3,9);
		     $s.='<a href="https://api.whatsapp.com/send/?phone=55'.$telefone.'&text&app_absent=0">'.$row['telefone'].'<img src="whatsapp.png" style="width:20px;"></img></a><br>';
			 //foreach($
			 if(strlen($row['endereco'])>=36)
			 {
		     $s.=substr($row['endereco'],0,36).'<BR>'.substr($row['endereco'],36,36); 
			 }
			 else{
				 $s.=$row['endereco'];
				 for($i=0;$i<(36-strlen($row['endereco']));$i++)
				 {
				  $s.="_";
				 }
			 }
		     $s.='</div>';
		     $s.='<BR><BR>';
			 $s.='<span onclick="remover('.$row['id'].')" class="fa fa-trash btn btn-danger" style="color:black;background-color:white;margin-left:1%;"></span><span style="margin-left:1%;background-color:white;" class="fa fa-edit btn btn-warning" onclick="editar('.$row['id'].')"></span>';
		     $s.='</div>			 ';
			  
		 }
		 }
		 echo $s; 
		 echo '<button id="plus" style="float:right;margin-top:5%;margin-right:10%;background-color:white;  margin-left:auto;" class="btn btn-success" onclick="adicionar()"><img src="plus.png" style="width:20px;height:auto;"/></button>';
		 ?>
		 
         <!-- /.row -->				
        <!-- START THE FEATURETTES -->

       <!-- <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It'll blow your mind.</span></h2>
            <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">Oh yeah, it's that good. <span class="text-muted">See for yourself.</span></h2>
            <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
          </div>
          <div class="col-md-5 order-md-1">
            <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
            <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->

     <!-- </div><!-- /.container -->
<script>
function adicionar(){
	         $('.fa-edit').css("display","none");
	         var s='';
			 s+='<div class="row example1" style="margin-top:10%;" >';
             s+='<div class="ccol-lg-4"  style="float:left; margin-right:5%;">';
             s+='<a href="#"><center><img class="rounded-circle" src="novo conselho.png" alt="Generic placeholder image" width="50px" height="auto"/></center></a>';
       
		     s+='</div>';
		 
		     s+='<div class="teste" style="float:right;font-size:10px;">';
		     s+= '<input class="form-control" placeholder="nome do conselho" id="nome"></input><BR>';
			 s+= '<input class="form-control" placeholder="telefone" id="telefone"></input><BR>';
			 s+= '<input class="form-control" placeholder="endereco" id="endereco"></input><BR>';
			 s+= '<button id="salvar" class="btn btn-info">Salvar</button>'
			//$telefone=$row['telefone'];
			//$telefone=str_replace("(","",$telefone);
			 //$telefone=str_replace(")","",$telefone);
			 //$telefone=str_replace(" ","",$telefone);
			 //$telefone=substr($telefone,0,2)+substr($telefone,3,9);
		     //s+='<a href="https://api.whatsapp.com/send/?phone=55'.$telefone.'&text&app_absent=0">'.$row['telefone'].'</a> <img src="whatsapp.png" style="width:20px;" /><br>';
			 //foreach($
		     //s+=substr($row['endereco'],0,36).'<BR>'.substr($row['endereco'],36,36); 
		     s+='</div>';
		     s+='<BR><BR>';
			 //s+='<span onclick="remover('.$row['id'].')" class="fa fa-trash btn btn-danger" style="color:black;background-color:white;margin-left:1%;"></span><span style="margin-left:1%;background-color:white;" class="fa fa-edit btn btn-warning" onclick="editar('.$row['id'].')"></span>';
		     s+='</div>';
			 $("#plus").after(s);
			 $("#plus").css("display","none");
}
function remover(id){
	var r=confirm("Deseja remover esse endereço?");
	if(r==true)
	{
      var valor="flag=remover&id="+id;
$.ajax({ 
 type:"POST", 
 url: "salvar_conselho.php", 
 data:valor,
  success: function(data){
    //alert("teste");
    //console.log(valor);
	//alert(data);
	 location.reload();
   },
  error: function (jqXHR, exception) {
    var msg = "";
	console.log("deu ruim");
    if (jqXHR.status === 0) {
      msg = "Not connect.\n Verify Network.";
    } else if (jqXHR.status == 404) {
     msg = "Requested page not found. [404]";
	}
    else if (jqXHR.status == 500) {
     msg = "Internal Server Error [500].";
    } else if (exception === "parsererror") {
     msg = "Requested JSON parse failed.";
    } else if (exception === "timeout") {
     msg = "Time out error.";
    } else if (exception === "abort") {
     msg = "Ajax request aborted.";
    } else {
     msg = "Uncaught Error.\n" + jqXHR.responseText;
    }
//alert(html(msg));
}, 
});


	  
	}
}
function editar(id){
	    $('#plus').css("display","none");
	//$
	         //alert($('#tudo_'+id).html());
			 
			 var ssplit='<div class="ccol-lg-4" style="float: left; margin-right: 10%;"><a href="#" style="font-size: 12px; font-family: Verdana;"><center><img class="rounded-circle" src="novo conselho.png" alt="Generic placeholder image" width="50px" height="auto" style="width: auto; height: 50px;"></center></a></div><div class="teste" style="float:right;font-size:10px;">';
			 var nome=$('#tudo_'+id).html().split(ssplit)[1].split("<br>")[0];
			// var ssplit2="";
			// var telefone=$('#tudo_'+id).html().split(ssplit)[1].split("<br>")[0];
			var ssplit2='&amp;text&amp;app_absent=0" style="font-size: 12px; font-family: Verdana;">'
			var telefone=$('#tudo_'+id).html().split(ssplit2)[1].split("<img")[0];
			 //alert(telefone);
			 var ssplit3='<img src="whatsapp.png" style="width:20px;"></a>';
			 var endereco=$('#tudo_'+id).html().split(ssplit3)[1].split("</div")[0];
			 endereco=endereco.replace("<br>","");
			 endereco=endereco.replace("<BR>","");
			 //alert(endereco);
			 
	         var s='';
			// s+='<div class="row example1" style="margin-top:10%;" >';
             s+='<div class="ccol-lg-4"  style="float:left; margin-right:5%;">';
             s+='<a href="#"><center><img class="rounded-circle" src="novo conselho.png" alt="Generic placeholder image" width="50px" height="auto"/></center></a>';
       
		     s+='</div>';
		 
		     s+='<div class="teste" style="float:right;font-size:10px;">';
		     s+= '<input class="form-control" value="'+nome+'" id="nome"></input><BR>';
			 s+= '<input class="form-control" value="'+telefone+'" id="telefone"></input><BR>';
			 s+= '<input class="form-control" value="'+endereco+'" id="endereco"></input><BR>';
			 s+= '<button id="salvar2" name="'+id+'" class="btn btn-info">Salvar</button>'
			//$telefone=$row['telefone'];
			//$telefone=str_replace("(","",$telefone);
			 //$telefone=str_replace(")","",$telefone);
			 //$telefone=str_replace(" ","",$telefone);
			 //$telefone=substr($telefone,0,2)+substr($telefone,3,9);
		     //s+='<a href="https://api.whatsapp.com/send/?phone=55'.$telefone.'&text&app_absent=0">'.$row['telefone'].'</a> <img src="whatsapp.png" style="width:20px;" /><br>';
			 //foreach($
		     //s+=substr($row['endereco'],0,36).'<BR>'.substr($row['endereco'],36,36); 
		     s+='</div>';
		     s+='<BR><BR>';
			 //s+='<span onclick="remover('.$row['id'].')" class="fa fa-trash btn btn-danger" style="color:black;background-color:white;margin-left:1%;"></span><span style="margin-left:1%;background-color:white;" class="fa fa-edit btn btn-warning" onclick="editar('.$row['id'].')"></span>';
		     //s+='</div>';
    $('#tudo_'+id).html(s);	
	
	//alert("editar"+id);
}
$(document).ready(function(){




   $(document).arrive('#salvar2',function(){	
        $('#telefone').mask('(00)0 0000-0000');
         $('#salvar2').click(function(){	 
		 //$(this).parent().html("XXXXXX");
		 
        //var valor="valor="+$(this).attr("id");
		var valor="nome="+$('#nome').val();
		valor+="&telefone="+$('#telefone').val();
		valor+="&endereco="+$('#endereco').val();
		valor+="&id="+$("#salvar2").attr("name");
		valor+="&flag=editar";
$.ajax({ 
 type:"POST", 
 url: "salvar_conselho.php", 
 data:valor,
  success: function(data){
    //alert("teste");
    //console.log(valor);
	//alert(data);
	location.reload();
   },
  error: function (jqXHR, exception) {
    var msg = "";
	console.log("deu ruim");
    if (jqXHR.status === 0) {
      msg = "Not connect.\n Verify Network.";
    } else if (jqXHR.status == 404) {
     msg = "Requested page not found. [404]";
	}
    else if (jqXHR.status == 500) {
     msg = "Internal Server Error [500].";
    } else if (exception === "parsererror") {
     msg = "Requested JSON parse failed.";
    } else if (exception === "timeout") {
     msg = "Time out error.";
    } else if (exception === "abort") {
     msg = "Ajax request aborted.";
    } else {
     msg = "Uncaught Error.\n" + jqXHR.responseText;
    }
//alert(html(msg));
}, 
});
});
});	
	
	
   $(document).arrive('#salvar',function(){	
        $('#telefone').mask('(00)0 0000-0000');
         $('#salvar').click(function(){	 
		 //$(this).parent().html("XXXXXX");
		 
        //var valor="valor="+$(this).attr("id");
		var valor="nome="+$('#nome').val();
		valor+="&telefone="+$('#telefone').val();
		valor+="&endereco="+$('#endereco').val();
		valor+="&flag=salvar";
$.ajax({ 
 type:"POST", 
 url: "salvar_conselho.php", 
 data:valor,
  success: function(data){
    //alert("teste");
    //console.log(valor);
	//alert(data);
	location.reload();
   },
  error: function (jqXHR, exception) {
    var msg = "";
	console.log("deu ruim");
    if (jqXHR.status === 0) {
      msg = "Not connect.\n Verify Network.";
    } else if (jqXHR.status == 404) {
     msg = "Requested page not found. [404]";
	}
    else if (jqXHR.status == 500) {
     msg = "Internal Server Error [500].";
    } else if (exception === "parsererror") {
     msg = "Requested JSON parse failed.";
    } else if (exception === "timeout") {
     msg = "Time out error.";
    } else if (exception === "abort") {
     msg = "Ajax request aborted.";
    } else {
     msg = "Uncaught Error.\n" + jqXHR.responseText;
    }
//alert(html(msg));
}, 
});
});
});
});
</script>

      <!-- FOOTER -->
      <footer class="container">
       <!-- <p class="float-right"><a href="#">Back to top</a></p>
        <p>&copy; 2017-2018 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>-->
		<!--<center><img src="redes sociais.png"/ style="width:200px;"></center>-->
		<!--<center><table><tr><td><a href="https://www.youtube.com/capelasaojorgepmdf"><img src="youtube.png" style="width:70px;"></a></td><td><a href="https://www.facebook.com/capelasaojorge.capelaniapmdf"><img src="facebook.png" style="width:70px;"></a></td><td><a href="https://www.instagram.com/capela.saojorge/"><img src="instagram.png" style="width:70px;"></a></td></tr></table></center>-->
      </footer>
    </main>
    <style>
	 .titulo{
		 font-size:19px;
		 font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
	 }
	 p{
		 font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
		 font-size:14px;
	 }
	</style>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
 
<!--<script type="text/javascript" language="javascript" src="../jquery-3.6.0.min.js"></script>-->
    <script>window.jQuery || document.write('<script src="../bootstrap-4.0.0/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../bootstrap-4.0.0/assets/js/vendor/popper.min.js"></script>
    <script src="../bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../bootstrap-4.0.0/assets/js/vendor/holder.min.js"></script>
  </body>
</html>
