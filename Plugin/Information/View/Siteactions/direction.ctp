<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">

var directionDisplay,directionsService=new google.maps.DirectionsService,map,marker1,marker2,origin=null,destination=null,waypoints=[],markers=[],directionsVisible=!1,alat="<?php echo $firstPointLat;?>",alng="<?php echo $firstPointLng;?>",blat="<?php echo $secondPointLat;?>",blng="<?php echo $secondPointLng;?>",destination="http://oximap.com/img/destination.png",startpoint="http://oximap.com/img/walk.png";
function initialize(){directionsDisplay=new google.maps.DirectionsRenderer;var a={zoom:13,mapTypeId:google.maps.MapTypeId.ROADMAP,center:new google.maps.LatLng(alat,alng)};map=new google.maps.Map(document.getElementById("map_canvas"),a);directionsDisplay.setMap(map);directionsDisplay.setPanel(document.getElementById("directionsPanel"));marker1=new google.maps.Marker({map:map,position:new google.maps.LatLng(alat,alng),draggable:!1,icon:startpoint});marker2=new google.maps.Marker({map:map,position:new google.maps.LatLng(blat,
blng),draggable:!1,icon:destination});calcRoute()}
function calcRoute(){var a;switch(document.getElementById("mode").value){case "bicycling":a=google.maps.DirectionsTravelMode.BICYCLING;break;case "driving":a=google.maps.DirectionsTravelMode.DRIVING;break;case "walking":a=google.maps.DirectionsTravelMode.WALKING}a={origin:marker1.getPosition(),destination:marker2.getPosition(),waypoints:waypoints,travelMode:a,optimizeWaypoints:document.getElementById("optimize").checked,avoidHighways:document.getElementById("highways").checked,avoidTolls:document.getElementById("tolls").checked};
directionsService.route(a,function(a,b){b==google.maps.DirectionsStatus.OK&&directionsDisplay.setDirections(a)});clearMarkers();directionsVisible=!0}function clearMarkers(){for(var a=0;a<markers.length;a++)markers[a].setMap(null)}function updateMode(){directionsVisible&&calcRoute()}google.maps.event.addDomListener(window,"load",initialize);

</script>
<section>
<div class="container">
	<div class="row placeview">
<?php
	echo '<div class="col-md-12">';
	echo '<h3>'.$pageHeader.'</h3>';
	echo '</div>';
	
	echo '<div class="col-md-8">';
		echo '<div class="panel panel-info" style="margin-top:0px;">';
			echo '<div class="panel-heading">Map Direction</div>';
				echo '<div class="panel-body">';
					echo '<div class="col-md-4">';
						echo '<select id="mode" class="form-control" onchange="updateMode()">';
						echo '<option value="driving">Driving</option>';
						echo '<option value="bicycling">Bicycling</option>';
						echo '<option value="walking">Walking</option>';
						echo '</select>';
					echo '</div>';
					echo '<div class="col-md-8">';
						echo '<div class="checkbox">';
							echo '<label>';
							  echo '<input type="checkbox" onchange="updateMode()" id="optimize" checked> Optimize';
							echo '</label>';
							echo '<label>';
							  echo '<input type="checkbox" onchange="updateMode()" id="highways" checked > Avoid highways';
							echo '</label>';
							echo '<label>';
							  echo '<input type="checkbox" onchange="updateMode()" id="tolls" checked > Avoid tolls';
							echo '</label>';
						echo '</div>';
					echo '</div>';
					echo '<div id="map_canvas" style="width: auto; height: 400px"></div>';
				echo '</div>';
			
	echo '</div>';
	echo '</div>';
		echo '<div class="col-md-4">';
			echo '<div class="row">';
				echo '<div class="col-md-12">';
					echo '<div class="panel panel-info" style="margin-top:0px;">';
					echo '<div class="panel-heading">Destination Address</div>';
					echo '<div class="panel-body">';
						echo $placeDetails['Place']['address'].'<br/>';
					echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
			echo '<div class="row">';
				echo '<div class="col-md-12">';
					echo '<div class="panel panel-info" style="margin-top:0px;">';
					echo '<div class="panel-heading">Texual Direction</div>';
						echo '<div class="panel-body"><div class="col-md-12" id="directionsPanel">';
						echo '</div>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
		echo '</div>';
		
	echo '</div>';
			
?>
</div>
</div>
</section>


