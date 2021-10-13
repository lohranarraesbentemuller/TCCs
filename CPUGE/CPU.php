<!DOCTYPE html>
<html>
<?php include("config.php"); ?>
<head>
<!--<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
<!--<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-1.9.1.js"></script> -->
<!--<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<script type="text/javascript" language="javascript" src="../jquery-3.6.0.min.js"></script> 
 <script src="https://kit.fontawesome.com/a073e3cdd7.js" crossorigin="anonymous"></script> 
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
let map;
let marker=[];
let pontos=[];
var i =0;
//const chicago = { lat: 41.85, lng: -87.65 };
<?php $sql="select * from centerCPU where id=1";
$result =mysqli_query($db,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
//echo $row['lat'];
//echo $row['lng'];
//exit();
?>
//const chicago = { lat: -15.7997067, lng: -47.8663516 };

 
const chicago = { lat: <?php echo $row['lat'];?>, lng: <?php echo $row['lng'];?> };
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
var poligono_flag=false;
var pontos1=[];
$(document).arrive('.horario', {
    onceOnly: false
}, function () {
  $('.data').mask('00/00/0000');	
  $('.horario').mask('00:00');
   $('.telefone').mask('(00)0 0000-0000');
});



$(document).arrive('#centralizador', {
    onceOnly: false
}, function () {
  document.getElementById("centralizador").className += "btn ";
  document.getElementById("centralizador").className += "btn-light";
    
});
  function carregar_poligonos(){
	  valor="flag=carregar";
$.ajax({ 
 type:"POST", 
 url: "setpoligono.php", 
 data:valor,
  success: function(data){
	  
	  var poligonos=[];
	  
	  var poligono=[];
	  var cor=[];
      for(i=0;i<data.split("poligono").length-1;i++)
	  {
		  pontos1=[];
		  poligono1=data.split("poligono")[i+1];
		  cor1=poligono1.split("cor=")[1].split("#")[0];
		  for(j=0;j<poligono1.split("latitude").length -1;j++)
		  {
			  latitude=poligono1.split("latitude=")[j+1].split("#")[0];
			  longitude=poligono1.split("longitude=")[j+1].split("#")[0];
			 // alert("lat:"+latitude);
			 // alert("lng:"+longitude);
			 // alert(poligono1);
			  pontos1.push({lat:parseFloat(latitude),lng:parseFloat(longitude)});
		  }
		  //poligono.push(pontos);
		  //poligonos.push(poligono);
		  cor.push(cor1);
	      console.log(pontos1);
   
  var bermudaTriangle = new google.maps.Polygon({
    paths: pontos1,
    strokeColor: cor[i],
    strokeOpacity: 0.8,
    strokeWeight: 3,
    fillColor: cor[i],
    fillOpacity: 0.35,
  });
  bermudaTriangle.setMap(map);
  //parte 3 do ajax
    google.maps.event.addListener(bermudaTriangle, 'click', function() {
		if(poligono_flag)
		{
      this.setMap(null);
	  //parte do ajax2
	valor="flag=deletar";
	valor1="&latitude=";
	valor2="&longitude=";
	    //var temp_markers2=pontos;
		const vertices = this.getPath() 
		console.log("AQUI");
		console.log(vertices);
		console.log("AQUI2");
        
		//for(i=0;i<pontos1.length;i++)
	    for (let i = 0; i < vertices.getLength(); i++) 
		{
			const xy = vertices.getAt(i);
		//valor1+=temp_markers2[i].getPosition().lat()+"|";
		//valor2+=temp_markers2[i].getPosition().lng()+"|";
		//alert(pontos[i].lat);
		valor1+=xy.lat()+"|";
		valor2+=xy.lng()+"|";
		}  
    valor+=valor1+valor2;		
	//alert(valor);
	$.ajax({ 
 type:"POST", 
 url: "setpoligono.php", 
 data:valor,
  success: function(data){
    // alert("Dados atualizados");
  //  console.log(valor);
 // alert(valor);
 //   alert(data);
//	console.log(data);
    valor="";
 		//marker[i].setIcon(icon);                                    
	//	marker[i].setLabel(label);
		//alert(marker[id].icon.url);
	
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
	  
	  
	  
	  //parte do ajax2
		}
  });  
  //parte 3 do ajax
  }
	  
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
  function carregar_marcadores(){
	  
	  $.getJSON("carregar_marcadores2.php?", function (data) {
		for(i=0;i<data.data.length;i++)
		{
			   const myLatLng = { lat: parseFloat(data.data[i].lat) , lng: parseFloat(data.data[i].lng) };
			   //const label2={};
			   markerA = new google.maps.Marker({
  	           draggable:true,
               position: myLatLng,
			        icon: {
					//labelOrigin: new google.maps.Point(16,64),
					labelOrigin: new google.maps.Point(32,49),
					url: data.data[i].icone
					},
	           //icon: data.data[i].icone,
               title: data.data[i].id,
               label: {
               text: data.data[i].nome,
               color: 'black',
               fontSize: "20px",
			   //anchor: new google.maps.Point(14, 43),
               //labelOrigin: new google.maps.Point(13.5, 15)
			   }
			   ,
			   
               map: map
               })
			   var mensagem="";
	id=data.data[i].id;
    google.maps.event.addListener(markerA, 'dragend', function(evt){
	var lat = $(this)[0].getPosition().lat();
    var lng = $(this)[0].getPosition().lng();
 
	atualizar_posicao($(this)[0].title,lat,lng);
    });

   

	
	mensagem+='<table class="table" style="font-size:8px;max-width: 250px;">';
	mensagem+='<thead class="thead-dark">';
    mensagem+='<tr>';
    mensagem+='<th scope="col" colspan="3">Informações</th>';
    mensagem+='</tr>';
    mensagem+='</thead>';
	mensagem+='<tr><td>Nome</td><td colspan="2"><input type="text" class="form-control input-sm input_nome nome" id="nome_'+id+'" value="'+data.data[i].nome+'"></input></td></tr>';
    mensagem+='<tr><td>Comandante</td><td colspan="2"><input type="text" class="form-control input-sm input_tropa comandante" id="cmt_'+id+'" value="'+data.data[i].comandante+'"></input></td></tr>';
    mensagem+='<tr><td>Efetivo</td><td colspan="2"><input type="number" min="0" step="1" class="form-control input-sm input_tropa efetivo" id="efetivo_'+id+'" value="'+data.data[i].efetivo+'"></input></td></tr>';
	mensagem+='<tr><td>Contato telefônico</td><td colspan="2"><input type="text" class="form-control input-sm input_tropa telefone" id="telefone_'+id+'" value="'+data.data[i].telefone+'"></input></td></tr>';
	mensagem+='<tr><td>Data de término do serviço</td><td colspan="2"><input type="text" class="form-control input-sm input_tropa data" id="data_'+id+'" value="'+data.data[i].data.split("-")[2]+"/"+data.data[i].data.split("-")[1]+"/"+data.data[i].data.split("-")[0]+'"></input></td></tr>';
	mensagem+='<tr><td>Horário de término do serviço</td><td colspan="2"><input type="text" class="form-control input-sm input_tropa horario" id="horario_'+id+'" value="'+data.data[i].horario+'"></input></td></tr>';
	
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
    var chk="";
    if(parseInt(data.data[i].svg==1))
	{
		chk="checked";
	}
	  
	mensagem+='<tr><td>Situação</td><td colspan="2"><select type="text" class="form-control input-sm input_tropa situacao" id="situacao_'+id+'" ><option '+condicoes+'>Em condições</option><option '+RF+'>em RF</option><option '+DP+'>Delegacia</option></select></td></tr>';
	mensagem+='<tr><td>Marque se SVG</td><td colspan="2"><div class="form-check"><input class="form-check-input input_tropa svg" type="checkbox" value="" id="svg_'+id+'" '+chk+'><label class="form-check-label" for="svg_'+id+'"></label></div></td></tr>';
	
	
	mensagem+='<tr style="display:none;"><td>Velocidade de deslocamento</td><td colspan="2"><select type="text" class="form-control input-sm input_tropa velocidade" id="velocidade_'+id+'"><option '+v3+'>3</option><option '+v2+'>2</option><option '+v1+'>1</option></select></td></tr>';
    mensagem+='<tr style="display:none"><td>Latitude</td><td colspan="2"><input type="text" class="form-control input-sm input_tropa lat" id="lat_'+id+'" value="'+parseFloat(data.data[i].lat)+'"></input></td></tr>';
    mensagem+='<tr style="display:none"><td>Longitude</td><td colspan="2"><input type="text" class="form-control input-sm input_tropa lng" id="lng_'+id+'"  value="'+parseFloat(data.data[i].lng)+'"></input></td></tr>';
    mensagem+='<tr><td><button onclick="salvar('+id+','+i+')" style="font-size:8px;" id="button_save_tropa_'+id+'" type="button" class="btn btn-primary button_save_tropa">Salvar informações e posição</button></td><td></td><td><button  style="font-size:8px;" onclick="deletar('+id+','+i+')" id="button_delete_tropa_'+id+'" type="button" class="btn btn-danger button_delete_tropa">Deletar Tropa</button></td></tr>';
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
		  <?php $sql="select * from centerCPU where id=1";
$result =mysqli_query($db,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
?>
//const chicago = { lat: -15.7997067, lng: -47.8663516 };
//const chicago = { lat: <?php echo $row['lat'];?>, lng: <?php echo $row['lng'];?> };
		  
		  
		 // center: new google.maps.LatLng(-15.7997067,-47.8663516),
		 center: new google.maps.LatLng(<?php echo $row['lat'];?>,<?php echo $row['lng'];?>),
		  
          zoom: 16,
	
        });
		
		directionsService = new google.maps.DirectionsService;
        directionsDisplay = new google.maps.DirectionsRenderer({
         map: map
        });
		
		 const centerControlDiv = document.createElement("div");
		 
  CenterControl(centerControlDiv, map);
  //map.controls[google.maps.ControlPosition.TOP_CENTER].push(centerControlDiv);
  initAutocomplete();
  inserir_efetivo();
  inserir_rotas();
  carregar_marcadores();
  carregar_poligonos();
  callEveryHour();
  //desenhar poligono
  /*const triangleCoords = [
	{ lat: -15.829150837969056, lng: -48.05916190161267 },
     {lat: -15.816939553189796, lng:-48.04309010519543},
    { lat: -15.82737544763237, lng:-48.03839087500134 },
  ];

  const bermudaTriangle = new google.maps.Polygon({
    paths: triangleCoords,
    strokeColor: "#FF0000",
    strokeOpacity: 0.8,
    strokeWeight: 3,
    fillColor: "#FF0000",
    fillOpacity: 0.35,
  });
  bermudaTriangle.setMap(map);
  */
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
  const input2 = document.getElementById("marcar_area");
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
function salvar(id,i){
	

	// console.log(marker);
	// alert(id);
     //alert(marker[id-1].icon.url);
	 //alert(marker[id-1].url);
	
	nome=$('#nome_'+id).val();
	if(nome===null) nome="";
	comandante=$('#cmt_'+id).val();
	if(comandante===null) comandante="";
	efetivo=$('#efetivo_'+id).val();
	telefone=$('#telefone_'+id).val();
	if(telefone===null) telefone="";
	data=$('#data_'+id).val();
	horario=$('#horario_'+id).val();
	situacao=$('#situacao_'+id).val();
	velocidade=$('#velocidade_'+id).val();
	
	if($('#svg_'+id).is(":checked"))
	{
		svg="1";
		 url=marker[i].icon.url;
		 url=url.toString();
		if (url.indexOf("com_mascara") >= 0)
		      url=url.replace("com_mascara","VTRS")
		   var anexos="";
		   if(url.split("/")[7].split("_").length>1)
		     anexos="_"+url.split("/")[7].split("_")[1].split(".png");
		   url=url.replace(url.split("/")[7],"")+url.split("/")[7].split("_")[0].split("-SVG")[0].split(".png")+"-SVG"+anexos+".png";	
		   url=url.replace(",","");
		   var icon= {url: url, labelOrigin: new google.maps.Point(32,49)};	
           marker[i].setIcon(icon);		   
	}
	else
	{
		svg="0";
	}
		//teste
		var label= {text: nome, color: 'black',fontSize: "20px"};
	    //var icon= {labelOrigin: new google.maps.Point(32,49),url: marker.icone};
		var url=""
		if (situacao=="Em condições")
		{
		   url=marker[i].icon.url;
		   url=url.toString();
		    if (url.indexOf("com_mascara") >= 0)
		      url=url.replace("com_mascara","VTRS")
		   url=url.replace(url.split("/")[7],"")+url.split("/")[7].split("_")[0].split(".png")+".png";	  
		}
		if (situacao=="em RF")
		{
		   url=marker[i].icon.url;
		   url=url.toString();
		   if (url.indexOf("VTRS") >= 0)
		      url=url.replace("VTRS","com_mascara")
		   url=url.replace(url.split("/")[7],"")+url.split("/")[7].split("_")[0].split(".png")+"_RF.png";
		   
		}
		if (situacao=="Delegacia")
		{
		   url=marker[i].icon.url;
		   if (url.indexOf("VTRS") >= 0)
		      url=url.replace("VTRS","com_mascara")
		   url=url.replace(url.split("/")[7],"")+url.split("/")[7].split("_")[0].split(".png")+"_DP.png";
		 
		}
		 //alert(marker[id].icon.url);
		 url=url.replace(",","");
		var icon= {url: url, labelOrigin: new google.maps.Point(32,49)};			
	   // marker.setIcon(icon);                                    
		//marker.setLabel(label);
		//
        //alert(url);
		
               
   //teste
	
	valor="id="+id+"&nome="+nome+"&comandante="+comandante+"&efetivo="+efetivo+"&telefone="+telefone+"&situacao="+situacao+"&velocidade="+velocidade+"&data="+data+"&horario="+horario+"&icone="+url+"&svg="+svg+"&flag=atualizar";
	//alert(valor);
	$.ajax({ 
 type:"POST", 
 url: "atualizar2.php", 
 data:valor,
  success: function(data){
    alert("Dados atualizados");
   // console.log(valor);
      
 		marker[i].setIcon(icon);                                    
		marker[i].setLabel(label);
		//alert(marker[id].icon.url);
	
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
 url: "atualizar2.php", 
 data:valor,
  success: function(data){
   
    //alert(data);
	//alert(posicao);
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
          infowindow.open(marker.get("map"), marker);
        });
      } 

function atualizar_posicao(id,lat,lng){
	valor="id="+id+"&lat="+lat+"&lng="+lng+"&flag=atualizar";
	$.ajax({ 
 type:"POST", 
 url: "atualizar2.php", 
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

$sql="select max(id) from markerCPU";
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

if(is_null($row['max(id)']))
  $id=0;
else
  $id=$row['max(id)'];
?>

<script>


var i=<?php echo $id;?>;
$(document).arrive('#btn_moto', {
    onceOnly: true
}, function () {
	
  $('.dropdown-item').click(function(){
	  //AJAX PARA ATUALIZAR ID E ICONE NA BASE DE DADOS
	  var fim="https://www.cfo2019.com/CPUGE/Tropas/pequeno/VTRS/"+$(this).attr("id").split('_')[1]+'.png';
	  var pointA=map.getCenter();	  
	  var valor="id="+i+"&lat="+pointA.lat()+"&lng="+pointA.lng()+"&icone="+fim+"&flag=inserir";
	  
	    $.ajax({ 
       type:"POST", 
       url: "atualizar2.php", 
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
	/*var mensagem="";
	
	
	mensagem+='<table class="table" style="font-size:8px;max-width: 250px;">';
	mensagem+='<thead class="thead-dark">';
    mensagem+='<tr>';
    mensagem+='<th scope="col" colspan="3">Informações</th>';
    mensagem+='</tr>';
    mensagem+='</thead>';
	mensagem+='<tr><td>Nome</td><td colspan="2"><input type="text" class="form-control input-sm input_nome nome" id="nome_'+i+'"></input></td></tr>';
    mensagem+='<tr><td>Comandante</td><td colspan="2"><input type="text" class="form-control input-sm input_tropa comandante" id="cmt_'+i+'" ></input></td></tr>';
    mensagem+='<tr><td>Efetivo</td><td colspan="2"><input type="number" min="0" step="1" class="form-control input-sm input_tropa efetivo" id="efetivo_'+i+'" ></input></td></tr>';
	mensagem+='<tr><td>Contato telefônico</td><td colspan="2"><input type="text" class="form-control input-sm input_tropa telefone" id="telefone_'+i+'" ></input></td></tr>';
	mensagem+='<tr><td>Horário de término do serviço</td><td colspan="2"><input type="text" class="form-control input-sm input_tropa horario" id="horario_'+i+'" ></input></td></tr>';
	mensagem+='<tr><td>Situação</td><td colspan="2"><select type="text" class="form-control input-sm input_tropa situacao" id="situacao_'+i+'" ><option >Em condições</option><option >em RF</option><option >Delegacia</option><option >Outra situação</option></select></td></tr>';
	mensagem+='<tr><td>Marque se SVG</td><td colspan="2"><div class="form-check"><input class="form-check-input input_tropa svg" type="checkbox" value="" id="svg_'+i+'"><label class="form-check-label" for="svg_'+i+'"></label></div></td></tr>';
	mensagem+='<tr style="display:none;"><td>Velocidade de deslocamento</td><td colspan="2"><select type="text" class="form-control input-sm input_tropa velocidade" id="velocidade_'+i+'"><option >3</option><option >2</option><option >1</option></select></td></tr>';
    mensagem+='<tr style="display:none"><td>Latitude</td><td colspan="2"><input type="text" class="form-control input-sm input_tropa lat" id="lat_'+i+'" ></input></td></tr>';
    mensagem+='<tr style="display:none"><td>Longitude</td><td colspan="2"><input type="text" class="form-control input-sm input_tropa lng" id="lng_'+i+'"  ></input></td></tr>';
    mensagem+='<tr><td><button onclick="salvar('+id+','+i+')"  style="font-size:8px;" id="button_save_tropa_'+i+'" type="button" class="btn btn-primary button_save_tropa">Salvar informações e posição</button></td><td></td><td><button  style="font-size:8px;" onclick="deletar('+i+','+i+')" id="button_delete_tropa_'+i+'" type="button" class="btn btn-danger button_delete_tropa">Deletar Tropa</button></td></tr>';
    mensagem+='</table>';
	*/
//	mensagem+='<table class="table" style="font-size:8px;max-width: 250px;">';
//	mensagem+='<thead class="thead-dark">';
  //  mensagem+='<tr>';
  //  mensagem+='<th scope="col" colspan="3">Informações</th>';
 //   mensagem+='</tr>';
//    mensagem+='</thead>';
//	mensagem+='<tr><td>Nome</td><td colspan="2"><input type="text" class="form-control input-sm input_nome nome" id="nome_'+i+'"></input></td></tr>';
   // mensagem+='<tr><td>Comandante</td><td colspan="2"><input type="text" class="form-control input-sm input_tropa comandante" id="cmt_'+i+'"></input></td></tr>';
   // mensagem+='<tr><td>Efetivo</td><td colspan="2"><input type="text" class="form-control input-sm input_tropa efetivo" id="efetivo_'+i+'"></input></td></tr>';
    //mensagem+='<tr><td>Latitude</td><td colspan="2"><input type="text" class="form-control input-sm input_tropa lat" id="lat_'+i+'" value="'+pointA.lat()+'"></input></td></tr>';
    //mensagem+='<tr><td>Longitude</td><td colspan="2"><input type="text" class="form-control input-sm input_tropa lng" id="lng_'+i+'"  value="'+pointA.lng()+'"></input></td></tr>';
    //mensagem+='<tr><td><button onclick="salvar('+i+')" style="font-size:8px;" id="button_save_tropa_'+i+'" type="button" class="btn btn-primary button_save_tropa">Salvar informações e posição</button></td><td></td><td><button  style="font-size:8px;" onclick="deletar('+id+','+i+')" id="button_delete_tropa_'+i+'" type="button" class="btn btn-danger button_delete_tropa">Deletar Tropa</button></td></tr>';
    //mensagem+='</table>';
	
 // attachMessage(markerA,mensagem);
    //ADICIONANDO EVENTO PARA CASO O CURSOR SEJA MOVIDO
  	google.maps.event.addListener(markerA, 'dragend', function(evt){
	var lat = $(this)[0].getPosition().lat();
    var lng = $(this)[0].getPosition().lng();
    $.getJSON("carregar_marcadores2.php?", function (data) {
		for(i=0;i<data.data.length;i++)
		{
			//alert(data.data[i].id);
			
		}
		//alert(parseInt(data.data[i-1].id)+0);
	    atualizar_posicao(parseInt(data.data[i-1].id)+0,lat,lng);
		
		//LOHRAN ARRAES
		valor="id=1&flag=aqui&lat="+lat+"&lng="+lng;
			$.ajax({ 
              type:"POST", 
              url: "atualizar2.php", 
              data:valor,
              success: function(data){
 
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

              }, 
            });	
		
		//LOHRAN ARRAES
		
	
   // atualizar_posicao($(this)[0].title,lat,lng);
	    });
	});
  
  //marker.push(markerA);
 	
	
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

<div class="wrapper" id="rotas_123" style="display:none;" >
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
<button class="fa fa-edit btn btn-dark" id="marcar_area"></button>	
<script>
//var poligono_flag=false;
var cor_original=$('#marcar_area').css("background-color");
var poligonos=[];
var pontos2=[];
var poligono=[];
var temp_markers=[];
var temp_markers2=[];
$(document).ready(function(){
	$('#marcar_area').click(function(){
		//cursor:  url(cursor1.png) 4 12, auto;
		
		if(!poligono_flag){
		//$("#map").css( 'cursor', 'url("marker.png")' );
		poligono_flag=true;
		pontos2=[];
		 
		
		$(this).css("background-color","red");
		}
		else{
			$("#map").css( 'cursor', "pointer" );
		poligono_flag=false;
		$(this).css("background-color",cor_original);
		poligonos.push(poligono)
		
		//desenhando
		var triangleCoords=[];
		for(i=0;i<temp_markers.length;i++)
		{
			//alert(temp_markers[i].getPosition().lat() + " , " +temp_markers[i].getPosition().lng());
			triangleCoords.push({lat:temp_markers[i].getPosition().lat(),lng:temp_markers[i].getPosition().lng()});
		}
		//console.log(triangleCoords);
		 //var triangleCoords = [
		//temp_markers.each(function(){ 
	   //{ lat: $(this).lat, lng: $(this).lng },
	//	});
       //{lat: -15.816939553189796, lng:-48.04309010519543},
      //{ lat: -15.82737544763237, lng:-48.03839087500134 },
        //   ];
	//	 console.log(temp_markers);
  var cor=[]
  cor.push('#' + Math.random().toString(16).slice(2, 8).toUpperCase());
  cor.push('#' + Math.random().toString(16).slice(2, 8).toUpperCase());
  //console.log(triangleCoords);
  var bermudaTriangle = new google.maps.Polygon({
    paths: triangleCoords,
    //strokeColor: "#FF0000",
	strokeColor: cor[0],
    strokeOpacity: 0.8,
    strokeWeight: 3,
    fillColor: cor[1],
    fillOpacity: 0.35,
  });
  bermudaTriangle.setMap(map);
    google.maps.event.addListener(bermudaTriangle, 'click', function() {
		if(poligono_flag)
		{
      this.setMap(null);
	  //parte do ajax2
	valor="flag=deletar";
	valor1="&latitude=";
	valor2="&longitude=";
		for(i=0;i<temp_markers2.length;i++)
		{
		valor1+=temp_markers2[i].getPosition().lat()+"|";
		valor2+=temp_markers2[i].getPosition().lng()+"|";
		}  
    valor+=valor1+valor2;		
	$.ajax({ 
 type:"POST", 
 url: "setpoligono.php", 
 data:valor,
  success: function(data){
    //alert("Dados atualizados");
    console.log(valor);
   // alert(data);
	console.log(data);
    valor="";
	location.reload();
 		//marker[i].setIcon(icon);                                    
	//	marker[i].setLabel(label);
		//alert(marker[id].icon.url);
	
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
	  
	  
	  
	  //parte do ajax2
		}
  });
		//desenhando
		valor="";
		var valor1="&latidude=";
		var valor2="&longitude=";
		//valor+="cor="+cor[1];
		
		for(i=0;i<temp_markers.length;i++)
		{
		valor1+=temp_markers[i].getPosition().lat()+"|";
		valor2+=temp_markers[i].getPosition().lng()+"|";
		temp_markers[i].setMap(null)
		temp_markers[i]=null;
		}
       //parte do ajax
	    valor="cor="+cor[1]+valor1+valor2+"&flag=criar";
	 
	$.ajax({ 
 type:"POST", 
 url: "setpoligono.php", 
 data:valor,
  success: function(data){
    //alert("Dados atualizados");
    console.log(valor);
    //alert(data);
	console.log(data);
 		//marker[i].setIcon(icon);                                    
	//	marker[i].setLabel(label);
		//alert(marker[id].icon.url);
	
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
	   
	   ///parte do ajax
	}
	});
 
  google.maps.event.addListener(map, 'click', function(event) {
	  if(poligono_flag)
	  {
       placeMarker(event.latLng);
      // poligono.push(event.latLng);
      }
   });
	   
});
   
var conta_temp=0;
function placeMarker(location) {
	
    var marker = new google.maps.Marker({
        position: location, 
        map: map
    });
	google.maps.event.addListener(marker, 'click', function() {
		this.setMap(null);
		//temp_markers[conta_temp]=null;
		temp_markers.splice(conta_temp,1);
	});
	//);
	temp_markers.push(marker);
	temp_markers2.push(marker);
}   
   
   
</script>
<div class="dropdown" id="posicionar_efetivo">
  <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Posicionar Efetivo
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a id="btn_COROLLA" class="dropdown-item" href="#"><div class="row"><div class="col"><img style="width:auto;height:50px;" src="Tropas/pequeno/VTRS/COROLLA.png"></img></div><div class="col">COROLLA</div></div></a>
    <a id="btn_ASX" class="dropdown-item" href="#"><div class="row"><div class="col"><img style="width:auto;height:50px;" src="Tropas/pequeno/VTRS/ASX.png"></img></div><div class="col">ASX</div></div></a>
	<a id="btn_PAJERO" class="dropdown-item" href="#"><div class="row"><div class="col"><img style="width:auto;height:50px;" src="Tropas/pequeno/VTRS/PAJERO.png"></img></div><div class="col">PAJERO</div></div></a>
	<a id="btn_LINEA" class="dropdown-item" href="#"><div class="row"><div class="col"><img style="width:auto;height:50px;" src="Tropas/pequeno/VTRS/LINEA.png"></img></div><div class="col">LINEA</div></div></a>
	<a id="btn_POG" class="dropdown-item" href="#"><div class="row"><div class="col"><img style="width:auto;height:50px;" src="Tropas/pequeno/VTRS/POG.png"></img></div><div class="col">POG</div></div></a>
    <a id="btn_moto" class="dropdown-item" href="#"><div class="row"><div class="col"><img style="width:auto;height:50px;" src="Tropas/pequeno/VTRS/moto.png"></img></div><div class="col">GTM</div></div></a>
	
	<!--<a id="btn_bpcaes" class="dropdown-item" href="#"><div class="row"><div class="col"><img style="width:auto;height:50px;" src="Tropas/pequeno/bpcaes.png"></img></div><div class="col">Bpcães</div></div></a>
	<a id="btn_centurion" class="dropdown-item" href="#"><div class="row"><div class="col"><img style="width:auto;height:50px;" src="Tropas/pequeno/centurion.png"></img></div><div class="col">Centurion</div></div></a>
	<a id="btn_midia" class="dropdown-item" href="#"><div class="row"><div class="col"><img style="width:auto;height:50px;" src="Tropas/pequeno/midia.png"></img></div></div><div class="row"><div class="col">Mídia</div></div></a>
	<a id="btn_protestos2" class="dropdown-item" href="#"><div class="row"><div class="col"><img style="width:auto;height:50px;" src="Tropas/pequeno/protestos2.png"></img></div></div><div class="row"><div class="col">Protestos</div></div></a> -->
  </div>
</div>	
	
    <div id="map"></div>

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAv3lo5-XEk2UPbTF2pC3b_depg0HGBSFM&callback=initMap&libraries=places" async defer></script>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"> </script>


<script>
function timeToSeconds(time) {
	time=time.toString();
	 
    time = time.split(":");
    return time[0] * 3600 + time[1] * 60 + time[2];
}
function callEveryHour()
{
	var dt = new Date();
    var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
	
	var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    today = parseInt(dd)  + parseInt(mm)*100  + parseInt(yyyy)*10000;
	
	
	//alert(timeToSeconds("18:00:00"));
	//alert(timeToSeconds(time));
	//var diferenca= parseInt(timeToSeconds("18:00:00"))-parseInt(timeToSeconds(time));
	//alert(diferenca);
	$.getJSON("carregar_marcadores2.php?", function (data) {
		for(i=0;i<data.data.length;i++)
		{
			data_fim=parseInt(data.data[i].data.split("-")[0])*10000+parseInt(data.data[i].data.split("-")[1])*100+parseInt(data.data[i].data.split("-")[2]);
			//alert(data_fim);
			//alert(today);
			//alert(time);
			//alert(data.data[i].horario);
			if(data_fim==today)
			{  
			if (parseInt(timeToSeconds(data.data[i].horario))-parseInt(timeToSeconds(time))<=0) //DELETA TODOS OS MARCADORES QUANDO ACABA O TEMPO
			{
				for(j=0;j<marker.length;j++)
				{
				  if(marker[j].title==data.data[i].id)
					{
						deletar(marker[j].title,j);
					}
				}
			}
			if (parseInt(timeToSeconds(data.data[i].horario))-parseInt(timeToSeconds(time))<=360000) // COLOCA O ICONE DO RELOGIO QNDO FALTA MENOS DE UMA HORA
			{  //alert("entrou");
			//alert (marker.length);
				for(j=0;j<marker.length;j++)
				{
					//alert(marker[j].title);
					if(marker[j].title==data.data[i].id)
					{   
							   url=marker[j].icon.url;
		                       url=url.toString();
		                       if (url.indexOf("VTRS") >= 0)
		                           url=url.replace("VTRS","com_mascara")
		                       url=url.replace(url.split("/")[7],"")+url.split("/")[7].split("_")[0].split(".png")+"_RELOGIO.png";
							   url=url.replace(",","");
							   //alert(url);
						       var icon= {url: url, labelOrigin: new google.maps.Point(32,49)};			
						       marker[j].setIcon(icon)
					}
				}
			}			
			
			
			}
			if(data_fim<today)
			{ 
	//		alert("aqui");
			for(j=0;j<marker.length;j++)
				{
				  if(marker[j].title==data.data[i].id)
					{
						deletar(marker[j].title,j);
					}
				}
			

			}
			
		}
	}); 
	
}

var nextDate = new Date();
if (nextDate.getMinutes() === 0) { // You can check for seconds here too
    //location.reload() 
} else {
    nextDate.setHours(nextDate.getHours() + 1);
    nextDate.setMinutes(0);
    nextDate.setSeconds(0);// I wouldn't do milliseconds too ;)

    var difference = nextDate - new Date();
    //setTimeout(location.reload(), difference);
}


</script>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script  src="../roosevelt/jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>
  </body>
 </html>