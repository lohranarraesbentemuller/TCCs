<!DOCTYPE html>
<html>
<head>
<!--<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
<script type="text/javascript" language="javascript" src="../jquery-3.6.0.min.js"></script> 
<script type="text/javascript" src="../roosevelt/arrive-master/src/arrive.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

         <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <style type="text/css">
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }

      /* Optional: Makes the sample page fill the window. */
      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
	  .input-sm{
    height: 20px;
	font-size:8px;
    line-height: 20px;
    margin-bottom: 5px;
    display: inline-block;
    width: 150%;
    float: right;
    color: #333;
    background-color: #fff;
    border: solid 1px #ddd;
    border-radius: 2px;
	  }
    </style>

<!-- BOTAO CENTRALIZADOR -->

<script>
var i2=0;
var rotas22=false;
let map;
let marker=[];
let pontos=[];
var i =0;

//alert(cor_original);
$(document).ready(function(){
	var cor_original=$('#calcular_rota').css("background-color");
	
	$('#calcular_rota').click(function(){
		
		if(!rotas22)
		{
			rotas22=true;
			$('#calcular_rota').css("background-color","#FF0000");
		}
		else{
			rotas22=false;
			$('#calcular_rota').css("background-color",cor_original);
			//alert("aqui");
		}
	});
});
//const chicago = { lat: 41.85, lng: -87.65 };
const chicago = { lat: -15.7997067, lng: -47.8663516 };
function CenterControl(controlDiv, map) {
	
  // Set CSS for the control border.
  const controlUI = document.createElement("div");
  controlUI.style.backgroundColor = "#fff";
  controlUI.style.border = "2px solid #fff";
  controlUI.style.borderRadius = "3px";
  controlUI.style.boxShadow = "0 2px 6px rgba(0,0,0,.3)";
  controlUI.style.cursor = "pointer";
  controlUI.style.marginBottom = "22px";
  controlUI.style.textAlign = "center";
  controlUI.title = "Click to recenter the map";
  controlDiv.appendChild(controlUI);
  // Set CSS for the control interior.
  const controlText = document.createElement("div");
  controlText.id="centralizador";
  //controlText.style.color = "rgb(25,25,25)";
  //controlText.style.color = "rgb(25,25,25)";
  //controlText.style.fontFamily = "Roboto,Arial,sans-serif";
  //controlText.style.fontSize = "16px";
  //controlText.style.lineHeight = "38px";
  //controlText.style.paddingLeft = "5px";
  //controlText.style.paddingRight = "5px";
  controlText.innerHTML = "Centralizar Mapa";
  controlUI.appendChild(controlText);
  // Setup the click event listeners: simply set the map to Chicago.
  controlUI.addEventListener("click", () => {
    map.setCenter(chicago);
  });
}


</script>

<!-- CALCULADOR DE ROTAS -->
<script>
function secondsTimeSpanToHMS(s) {
    var h = Math.floor(s/3600); //Get whole hours
    s -= h*3600;
    var m = Math.floor(s/60); //Get remaining minutes
    s -= m*60;
    return h+":"+(m < 10 ? '0'+m : m)+":"+(s < 10 ? '0'+s : s); //zero padding on minutes and seconds
}
function sumtime(timea,timeb){
	    var time1 = timea;
        var time2 = timeb;
        
        
        var hour=0;
        var minute=0;
        var second=0;
        
        var splitTime1= time1.split(':');
        var splitTime2= time2.split(':');
        
	    hour = parseInt(splitTime1[0])+parseInt(splitTime2[0]);
        minute = parseInt(splitTime1[1])+parseInt(splitTime2[1]);
        hour = hour + minute/60;
        minute = minute%60;
        second = parseInt(splitTime1[2])+parseInt(splitTime2[2]);
        minute = minute + second/60;
        second = second%60;
		hour=hour.toString()
		minute=minute.toString()
		second=second.toString()
		hour=hour.split(".")[0]
		minute=minute.split(".")[0]
		second=second.split(".")[0]
		second="00";
		return  hour+':'+minute+':'+second;
	
}
 


function calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB,travel) {
  directionsService.route({
    origin: pointA,
    destination: pointB,
    travelMode: travel
  }, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
	  // Display the distance:
         document.getElementById('distance').innerHTML = 
            parseInt(response.routes[0].legs[0].distance.value,10)/1000 + " Kilômetros";

         // Display the duration:
         document.getElementById('duration').innerHTML = 
            response.routes[0].legs[0].duration.value +" segundos";

        // directionsDisplay.setDirections(response);
	  
	  
    } else {
     // window.alert('Directions request failed due to ' + status);
	 // initMap();
    }
  });
}


</script>

 
<script>
 

$(document).arrive('#centralizador', {
    onceOnly: false
}, function () {
  document.getElementById("centralizador").className += "btn ";
  document.getElementById("centralizador").className += "btn-light";
    
});

  function carregar_marcadores(){
	  
	  $.getJSON("carregar_marcadores.php?", function (data) {
		for(i=0;i<data.data.length;i++)
		{
			   const myLatLng = { lat: parseFloat(data.data[i].lat) , lng: parseFloat(data.data[i].lng) };
			   markerA = new google.maps.Marker({
  	           draggable:true,
               position: myLatLng,
	           icon: data.data[i].icone,
               title: data.data[i].id,
               label: "",
               map: map
               })
			   
			   var mensagem="";
	id=data.data[i].id;
    google.maps.event.addListener(markerA, 'dragend', function(evt){
	var lat = $(this)[0].getPosition().lat();
    var lng = $(this)[0].getPosition().lng();
 
	atualizar_posicao($(this)[0].title,lat,lng);
    });

    google.maps.event.addListener(markerA, "click", function (e) { 
	           if(rotas22){
               	var lat = $(this)[0].getPosition().lat();
                var lng = $(this)[0].getPosition().lng();
				var coord= {lat,lng};
				var travel=google.maps.TravelMode.DRIVING;
				if( $( "#velocidade_"+i+" option:selected" ).text() == 1)
				   var travel=google.maps.TravelMode.WALKING;
				if( $( "#velocidade_"+i+" option:selected" ).text() == 2)
				   var travel=google.maps.TravelMode.BICYCLING;
				
				if(pontos.length==2)
				{
					pontos.shift();
				}
				pontos.push(coord);
				if(pontos.length==2)
				{
				//$('rotas_123').css("display","inherit");
				   calculateAndDisplayRoute(directionsService, directionsDisplay, pontos[0], pontos[1],travel);
				   
				   
				}
			   }
            });


	
	mensagem+='<table class="table"  style="font-size:8px;max-width: 250px;">';
	mensagem+='<thead class="thead-dark" id="tabela_de_rotas">';
    mensagem+='<tr>';
    mensagem+='<th scope="col" colspan="3">Informações</th>';
    mensagem+='</tr>';
    mensagem+='</thead>';
    mensagem+='<tr><td>Comandante</td><td colspan="2"><input type="text" class="form-control input-sm input_tropa comandante" id="cmt_'+id+'" value="'+data.data[i].comandante+'"></input></td></tr>';
    mensagem+='<tr><td>Efetivo</td><td colspan="2"><input type="text" class="form-control input-sm input_tropa efetivo" id="efetivo_'+id+'" value="'+data.data[i].efetivo+'"></input></td></tr>';
	mensagem+='<tr><td>Contato telefônico</td><td colspan="2"><input type="text" class="form-control input-sm input_tropa telefone" id="telefone_'+id+'" value="'+data.data[i].telefone+'"></input></td></tr>';
	mensagem+='<tr><td>Horário de chegada</td><td colspan="2"><input type="text" class="form-control input-sm input_tropa horario" id="horario_'+id+'" value="'+data.data[i].horario+'"></input></td></tr>';
	
	var condicoes='';
	var RF='';
	var DP='';
	var Outra='';
	
	var v1='';
	var v2='';
	var v3='';
	
	//alert(data.data[i].velocidade);
	if(data.data[i].situacao=="Em condições")
	  condicoes="selected";
	if(data.data[i].situacao=="em RF")
	  RF="selected";  
	if(data.data[i].situacao=="Delegacia")
	  DP="selected";  	  

	if(data.data[i].situacao=="Outra")
	  Outra="selected";  	  

	if(parseInt(data.data[i].velocidade)==1)
	{
	  v1="selected";

	}
	if(parseInt(data.data[i].velocidade)==2)
	{
	  v2="selected";  
	}
	//alert(data.data[i].velocidade);
	if(parseInt(data.data[i].velocidade)==3)
	{
	  v3="selected";  	  
	}
  
	  
	mensagem+='<tr><td>Situação</td><td colspan="2"><select type="text" class="form-control input-sm input_tropa situacao" id="situacao_'+id+'" ><option '+condicoes+'>Em condições</option><option '+RF+'>em RF</option><option '+DP+'>Delegacia</option><option '+Outra+'>Outra situação</option></select></td></tr>';
	mensagem+='<tr><td>Velocidade de deslocamento</td><td colspan="2"><select type="text" class="form-control input-sm input_tropa velocidade" id="velocidade_'+id+'"><option '+v3+'>3</option><option '+v2+'>2</option><option '+v1+'>1</option></select></td></tr>';
    mensagem+='<tr style="display:none"><td>Latitude</td><td colspan="2"><input type="text" class="form-control input-sm input_tropa lat" id="lat_'+id+'" value="'+parseFloat(data.data[i].lat)+'"></input></td></tr>';
    mensagem+='<tr style="display:none"><td>Longitude</td><td colspan="2"><input type="text" class="form-control input-sm input_tropa lng" id="lng_'+id+'"  value="'+parseFloat(data.data[i].lng)+'"></input></td></tr>';
    mensagem+='<tr><td><button onclick="salvar('+id+')" style="font-size:8px;" id="button_save_tropa_'+id+'" type="button" class="btn btn-primary button_save_tropa">Salvar informações e posição</button></td><td></td><td><button  style="font-size:8px;" onclick="deletar('+id+','+i+')" id="button_delete_tropa_'+id+'" type="button" class="btn btn-danger button_delete_tropa">Deletar Tropa</button></td></tr>';
    mensagem+='</table>';
	
  
  
  marker.push(markerA);
  
	attachMessage(markerA,mensagem);
    //ADICIONANDO EVENTO PARA CASO O CURSOR SEJA MOVIDO
   
			   
			   
	    }
	  });
  }
 
  function initMap() {
	    
        map = new google.maps.Map(document.getElementById("map"), {
          //center: new google.maps.LatLng(-33.91722, 151.23064),
		  center: new google.maps.LatLng(-15.7997067,-47.8663516),
		  
          zoom: 16,
	
        });
		
		directionsService = new google.maps.DirectionsService;
        directionsDisplay = new google.maps.DirectionsRenderer({
         map: map
        });
		
		 const centerControlDiv = document.createElement("div");
		 
  CenterControl(centerControlDiv, map);
  map.controls[google.maps.ControlPosition.TOP_CENTER].push(centerControlDiv);
  initAutocomplete();
  inserir_efetivo();
  inserir_rotas();
  carregar_marcadores();
  }
   		
</script>

<!--drop down menu para adicionar efetivo-->
<script>

</script>

<!-- INSERIR TROPAS -->
<script>
function inserir_efetivo() {
 
  const input = document.getElementById("posicionar_efetivo");
 
  map.controls[google.maps.ControlPosition.BOTTOM_LEFT].push(input);
  
  const input2 = document.getElementById("calcular_rota");
 
  map.controls[google.maps.ControlPosition.BOTTOM_LEFT].push(input2); 
 
}

function inserir_rotas() {
 
  const input = document.getElementById("rotas_123");
 
  map.controls[google.maps.ControlPosition.TOP_RIGHT].push(input);
 
 
}

</script>

</script>
<!-- SEARCH BOX -->
<script>
function initAutocomplete() {
  //const map = new google.maps.Map(document.getElementById("map"), {
   // center: { lat: -33.8688, lng: 151.2195 },
   // zoom: 13,
  //  mapTypeId: "roadmap",
  //});
  // Create the search box and link it to the UI element.
  const input = document.getElementById("pac-input");
  
  const searchBox = new google.maps.places.SearchBox(input);
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
  // Bias the SearchBox results towards current map's viewport.
  map.addListener("bounds_changed", () => {
    searchBox.setBounds(map.getBounds());
  });
  let markers = [];
  // Listen for the event fired when the user selects a prediction and retrieve
  // more details for that place.
  searchBox.addListener("places_changed", () => {
    const places = searchBox.getPlaces();

    if (places.length == 0) {
      return;
    }
    // Clear out the old markers.
    markers.forEach((marker) => {
      marker.setMap(null);
    });
    markers = [];
    // For each place, get the icon, name and location.
    const bounds = new google.maps.LatLngBounds();
    places.forEach((place) => {
      if (!place.geometry || !place.geometry.location) {
        console.log("Returned place contains no geometry");
        return;
      }
      const icon = {
        url: place.icon,
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(25, 25),
      };
      // Create a marker for each place.
      markers.push(
        new google.maps.Marker({
          map,
          icon,
          title: place.name,
          position: place.geometry.location,
        })
      );

      if (place.geometry.viewport) {
        // Only geocodes have viewport.
        bounds.union(place.geometry.viewport);
      } else {
        bounds.extend(place.geometry.location);
      }
    });
    map.fitBounds(bounds);
  });
}
</script>
<!-- ADICIONAR PAINEL DE INFORMACOES -->
<script>
function salvar(id){
	
	comandante=$('#cmt_'+id).val()
	efetivo=$('#efetivo_'+id).val();
	telefone=$('#telefone_'+id).val();
	horario=$('#horario_'+id).val();
	situacao=$('#situacao_'+id).val();
	velocidade=$('#velocidade_'+id).val();
	valor="id="+id+"&comandante="+comandante+"&efetivo="+efetivo+"&telefone="+telefone+"&situacao="+situacao+"&velocidade="+velocidade+"&horario="+horario+"&flag=atualizar";
	//valor="";
	$.ajax({ 
 type:"POST", 
 url: "atualizar.php", 
 data:valor,
  success: function(data){
    alert("Dados atualizados");
	//alert(data)
   // console.log(valor);
      
 	
	
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

}, 
});	
}
function criar(id){
//	aa=""
//	for(i=0;i<marker.length;i++)
//	{
//		aa+=marker[i].icon+" ";
//	}
	//alert(aa);
	comandante=$('#cmt_'+id).val()
	efetivo=$('#efetivo_'+id).val();
	telefone=$('#telefone_'+id).val();
	horario=$('#horario_'+id).val();
	situacao=$('#situacao_'+id).val();
	velocidade=$('#velocidade_'+id).val();
	valor="";
	valor+="lat="+$('#lat_'+id).val();
	valor+="&lng="+$('#lng_'+id).val();
	valor+="&comandante="+comandante;
	valor+="&efetivo="+efetivo;
	valor+="&telefone="+telefone;
	valor+="&situacao="+situacao;
	valor+="&velocidade="+velocidade;
	valor+="&horario="+horario;
	valor+="&flag=criar";
	valor+="&icon="+marker[id].icon;
	$.ajax({ 
 type:"POST", 
 url: "atualizar.php", 
 data:valor,
  success: function(data){
    alert("Dados atualizados");
	//alert(valor);
//	alert(data)
   // console.log(valor);
      
 	
	
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

}, 
});	
	
	
}
function deletar(id,posicao){
 
	
	
	valor="id="+id+"&flag=deletar";
	$.ajax({ 
 type:"POST", 
 url: "atualizar.php", 
 data:valor,
  success: function(data){
   
      
 	marker[posicao].setMap(null);
	
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

}, 
});	
	
	
	
	
}
     function attachMessage(marker, secretMessage) {
        const infowindow = new google.maps.InfoWindow({
          content: secretMessage,
        });
        marker.addListener("click", () => {
			if(!rotas22){
          infowindow.open(marker.get("map"), marker);
			}
        });
      } 

function atualizar_posicao(id,lat,lng){
	valor="id="+id+"&lat="+lat+"&lng="+lng+"&flag=atualizar";
	$.ajax({ 
 type:"POST", 
 url: "atualizar.php", 
 data:valor,
  success: function(data){
   //alert("teste");
   //alert(valor);
   // console.log(valor);
      
 	
	
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
</script>

<!--POSICIONAR EFETIVO -->

<?php
include("config.php");
$sql="select max(id) from markerGE";
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

if(is_null($row['max(id)']))
  $id=0;
else
  $id=$row['max(id)'];
?>

<script>


var i=<?php echo $id;?>;
$(document).arrive('#btn_protestos2', {
    onceOnly: true
}, function () {
	
  $('.dropdown-item').click(function(){
	  //AJAX PARA ATUALIZAR ID E ICONE NA BASE DE DADOS
	  var fim="https://www.cfo2019.com/CPUGE/Tropas/pequeno/"+$(this).attr("id").split('_')[1]+'.png';
	  var pointA=map.getCenter();	  
	  //var valor="id="+i+"&lat="+pointA.lat()+"&lng="+pointA.lng()+"&icone="+fim+"&flag=inserir";
	  valor="";
	    $.ajax({ 
       type:"POST", 
       url: "atualizar.php", 
       data:valor,
       success: function(data){
   var pointA=map.getCenter();
   markerA = new google.maps.Marker({
	  draggable:true,
      position: pointA,
	  icon: fim,
      title: "point A",
      label: "",
      map: map
    })
	var mensagem="";
	
	mensagem+='<table class="table" style="font-size:8px;max-width: 250px;">';
	mensagem+='<thead class="thead-dark">';
    mensagem+='<tr>';
    mensagem+='<th scope="col" colspan="3">Informações</th>';
    mensagem+='</tr>';
    mensagem+='</thead>';
    mensagem+='<tr><td>Comandante</td><td colspan="2"><input type="text" class="form-control input-sm input_tropa comandante" id="cmt_'+i2+'"></input></td></tr>';
    mensagem+='<tr><td>Efetivo</td><td colspan="2"><input type="text" class="form-control input-sm input_tropa efetivo" id="efetivo_'+i2+'"></input></td></tr>';
	mensagem+='<tr><td>Contato Telefônico</td><td colspan="2"><input type="text" class="form-control input-sm input_tropa efetivo" id="telefone_'+i2+'"></input></td></tr>';
	mensagem+='<tr><td>horário de chegada</td><td colspan="2"><input type="text" class="form-control input-sm input_tropa efetivo" id="horario_'+i2+'"></input></td></tr>';
	mensagem+='<tr><td>Situação</td><td colspan="2"><input type="text" class="form-control input-sm input_tropa efetivo" id="situacao_'+i2+'"></input></td></tr>';
	mensagem+='<tr><td>Velocidade de deslocamento</td><td colspan="2"><select class="form-control input-sm input_tropa efetivo" id="velocidade_'+i2+'"><option>3</option><option>2</option><option>1</option></select></td></tr>';
	
    mensagem+='<tr><td>Latitude</td><td colspan="2"><input type="text" class="form-control input-sm input_tropa lat" id="lat_'+i2+'" value="'+pointA.lat()+'"></input></td></tr>';
    mensagem+='<tr><td>Longitude</td><td colspan="2"><input type="text" class="form-control input-sm input_tropa lng" id="lng_'+i2+'"  value="'+pointA.lng()+'"></input></td></tr>';
    mensagem+='<tr><td><button onclick="criar('+i2+')" style="font-size:8px;" id="button_save_tropa_'+i2+'" type="button" class="btn btn-primary button_save_tropa">Salvar informações e posição</button></td><td></td><td><button  style="font-size:8px;" onclick="deletar('+i+','+i2+')" id="button_delete_tropa_'+i2+'" type="button" class="btn btn-danger button_delete_tropa">Deletar Tropa</button></td></tr>';
    mensagem+='</table>';
	
  attachMessage(markerA,mensagem);
    //ADICIONANDO EVENTO PARA CASO O CURSOR SEJA MOVIDO
  	google.maps.event.addListener(markerA, 'dragend', function(evt){
	var lat = $(this)[0].getPosition().lat();
    var lng = $(this)[0].getPosition().lng();
 
	atualizar_posicao($(this)[0].title,lat,lng);
    });
  
  marker.push(markerA);
  i2++;	
	
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

}, 
});	
	
	  //AJAX PARA ATUALIZAR ID E ICONE NA BASE DE DADOS

	  	
 
  });
    
});
</script>

</head>
  <body>
   <input
      id="pac-input"
      class="controls form-control"
	  style="width:400px;margin-top:1%;"
      type="text"
      placeholder="Buscar cidade"
    />

<div class="wrapper" id="rotas_123" >
<table class="table" style="font-size:8px;max-width: 250px;">
<thead class="thead-dark">
<tr>
<th scope="col" colspan="3" style="font-size:14px;">Rotas</th>
</tr>
</thead>
<tr style="background-color:white;font-size:12px;"><td>Distância</td><td colspan="2" id="distancia"><span id="distance">0</span></td></tr>
<tr style="background-color:white;font-size:12px;"><td>Tempo de deslocamento</td><td colspan="2" id="tempo"><span id="duration">0</span></td></tr>
</table>
</div>
<button class="btn btn-dark" id="calcular_rota">Calcular Rota</button>
<div class="dropdown" id="posicionar_efetivo">
  <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Posicionar Efetivo
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
  <a id="btn_pocm4" class="dropdown-item" href="#"><div class="row"><div class="col"><img style="width:auto;height:50px;" src="Tropas/pequeno/pocm4.png"></img></div><div class="col">Tropa de POCM</div></div></a>
    <a id="btn_pocm3" class="dropdown-item" href="#"><div class="row"><div class="col"><img style="width:auto;height:50px;" src="Tropas/pequeno/pocm3.png"></img></div><div class="col">POG</div></div></a>
    <a id="btn_bpchoque" class="dropdown-item" href="#"><div class="row"><div class="col"><img style="width:auto;height:50px;" src="Tropas/pequeno/bpchoque.png"></img></div><div class="col">Tropa de Choque</div></div></a>
    <a id="btn_choquemontado" class="dropdown-item" href="#"><div class="row"><div class="col"><img style="width:auto;height:50px;" src="Tropas/pequeno/choquemontado.png"></img></div><div class="col">Choque Montado</div></div></a>
	<a id="btn_bpcaes" class="dropdown-item" href="#"><div class="row"><div class="col"><img style="width:auto;height:50px;" src="Tropas/pequeno/bpcaes.png"></img></div><div class="col">Bpcães</div></div></a>
	<a id="btn_centurion" class="dropdown-item" href="#"><div class="row"><div class="col"><img style="width:auto;height:50px;" src="Tropas/pequeno/centurion.png"></img></div><div class="col">Centurion</div></div></a>
	<a id="btn_midia" class="dropdown-item" href="#"><div class="row"><div class="col"><img style="width:auto;height:50px;" src="Tropas/pequeno/midia.png"></img></div></div><div class="row"><div class="col">Mídia</div></div></a>
	<a id="btn_crime" class="dropdown-item" href="#"><div class="row"><div class="col"><img style="width:auto;height:50px;" src="Tropas/pequeno/crime.png"></img></div></div><div class="row"><div class="col">Ocorrência</div></div></a>
	<a id="btn_protestos2" class="dropdown-item" href="#"><div class="row"><div class="col"><img style="width:auto;height:50px;" src="Tropas/pequeno/protestos2.png"></img></div></div><div class="row"><div class="col">Protestos</div></div></a>
  </div>
</div>	
	
    <div id="map"></div>

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
	
	
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAv3lo5-XEk2UPbTF2pC3b_depg0HGBSFM&callback=initMap&libraries=places" async defer></script>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"> </script>
    

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </body>
 </html>