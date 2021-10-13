<?php
include("config.php");
?>

<!--<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>-->
<script type="text/javascript" language="javascript" src="../jquery-3.6.0.min.js"></script>
 <!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAv3lo5-XEk2UPbTF2pC3b_depg0HGBSFM&sensor=false"></script>-->
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAv3lo5-XEk2UPbTF2pC3b_depg0HGBSFM&callback=initMap" async defer></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
<style>
    html,
    body {
      height: 100%;
      margin: 0;
      padding: 0;
    }
    #map-canvas {
      height: 100%;
      width: 100%;
    }
</style>

<div class="paginaPrinc" id="paginaPrinc">
    <div style="" id="latitud"></div>
    <div style=""  id="longitud"></div>
  <!--  <div id="map" class="map"></div>-->
</div>
    <script type="text/javascript">
        var longitud;
        var latitud;

var options = {
    enableHighAccuracy: true,
    timeout: 5000,
    maximumAge: 0
};
  


 
function success(pos) {
    var crd = pos.coords;
    latitud = crd.latitude
    longitud = crd.longitude   
    document.getElementById("latitud").innerHTML = latitud 
    document.getElementById("longitud").innerHTML = longitud 
    map = new google.maps.Map(document.getElementById("map-canvas"), {
        center: {lat: latitud, lng: longitud},
        zoom: 14
    });
	
};

function error(err) {
    document.getElementById("map").innerHTML = ('ERROR(' + err.code + '): ' + err.message);
};

function initMap() {
	//alert($('#latitud').html());
    //alert($('#longitud').html());

    var pointA = new google.maps.LatLng($('#latitud').html(), $('#longitud').html()),
    pointB = new google.maps.LatLng(-15.8347209,-48.0100656 ),
    myOptions = {
      zoom: 7,
      center: pointA
    },
    map = new google.maps.Map(document.getElementById('map-canvas'), myOptions),
    // Instantiate a directions service.
    directionsService = new google.maps.DirectionsService,
    directionsDisplay = new google.maps.DirectionsRenderer({
      map: map
    }),
    markerA = new google.maps.Marker({
      position: pointA,
      title: "point A",
      label: "A",
      map: map
    }),
    markerB = new google.maps.Marker({
      position: pointB,
      title: "point B",
      label: "B",
      map: map
    });

  // get route from A to B
  calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB);

}



function calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB) {
  directionsService.route({
    origin: pointA,
    destination: pointB,
    travelMode: google.maps.TravelMode.DRIVING
  }, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
    } else {
      //window.alert('Directions request failed due to ' + status);
	  initMap();
    }
  });
}
var a= navigator.geolocation.getCurrentPosition(success, error);

$(document).on('pageinit',function(){
//$(document).ready(function(){
	if($('#latitud').html()!="") 
	{
		initMap();
	}
});

</script>
<div id="map-canvas"></div>

