<!--<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>-->
<script type="text/javascript" language="javascript" src="../jquery-3.6.0.min.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAv3lo5-XEk2UPbTF2pC3b_depg0HGBSFM&callback=initMap"   ></script>
<script>function initialize() {

    //Add the event listener after Google Mpas and window is loaded
    $('#show-map').click(function () {
         var mapOptions = {
	    center: { lat: 0, lng: 0 },
	    zoom: 8
	};
	var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    });
}

google.maps.event.addDomListener(window, 'load', initialize);</script>
<style>
#map-canvas {
  height: 30em;
  width: 30em;
}
</style>
<button id="show-map">Show Map</button>

<div id="map-canvas"></div>