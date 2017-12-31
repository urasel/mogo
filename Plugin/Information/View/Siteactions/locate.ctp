<div class="hotels view">
<?php //debug($_SERVER);?>
<script src="http://maps.google.com/maps/api/js?sensor=false"  type="text/javascript"></script>
<div class="row">
	<p id='dd'></p>
	<div class="col-md-5">
		<?php
		echo '<div class="row"><div class="col-md-12">';
		echo '<div class="panel panel-info" style="margin-top:0px;">';
		echo '<div class="panel-heading">See in Google Map</div>';
		echo '<div class="panel-body">';
		echo '<div id="map" style="width: auto; height: 300px"></div>';
		echo '</div>';
		echo '</div>';
		echo '</div></div>';
		
		?>
	</div>
	<div class="col-md-7">
		<?php 
		echo '<div class="row"><div class="col-md-12">';
		echo '<div id="placeHolder"></div>';
		
		echo '</div></div>';
		
		?>
		<p id="dd"></p>
	</div>
</div>
<script type="text/javascript">
var customIcons={restaurant:{icon:"http://labs.google.com/ridefinder/images/mm_20_blue.png",shadow:"http://labs.google.com/ridefinder/images/mm_20_shadow.png"},bar:{icon:"http://labs.google.com/ridefinder/images/mm_20_red.png",shadow:"http://labs.google.com/ridefinder/images/mm_20_shadow.png"}},map,pos,accessLat=23.797384,accessLon=90.348938,infowindow="",formattedAddress="";
function initialize(){var a=new google.maps.LatLng(accessLat,accessLon),b={zoom:18,maxZoom:29,minZoom:10,center:a,mapTypeId:google.maps.MapTypeId.ROADMAP};$("#placeHolder").addClass("ajax-loader");map=new google.maps.Map(document.getElementById("map"),b);navigator.geolocation?(navigator.geolocation.getCurrentPosition(function(a){pos=new google.maps.LatLng(a.coords.latitude,a.coords.longitude);(new google.maps.Geocoder).geocode({latLng:pos},function(a,c){var b,d,g,h;c==google.maps.GeocoderStatus.OK&&
a[0]&&(null!=a[0].address_components[0].long_name&&(b=a[0].address_components[0].long_name),null!=a[1].address_components[0].long_name&&(d=a[1].address_components[0].long_name),null!=a[2].address_components[0].long_name&&(h=a[2].address_components[0].long_name),null!=a[4].formatted_address&&(g=a[4].formatted_address),formattedAddress=b+","+d+"\n,"+h+",\n"+g,currentPlaceAddress=(b+"-"+d+"-"+h+"-"+g).replace(/(\n|\r|\s)/g,""),d=a[0].geometry.location,a[0].geometry.location&&(b=d.lat(),d=d.lng(),loadPlaces(b,
d,currentPlaceAddress)),infowindow=new google.maps.InfoWindow({map:map,position:pos,content:'<div class="gm-iw gm-sm" jstcache="0" style="width: 204px;"><div jscontent="i.result.name" class="gm-title" id="locTag" jstcache="1"><b>Current Position</b></div><div class="gm-basicinfo" jstcache="0"><div jscontent="i.result.formatted_address" jsdisplay="i.result.formatted_address" class="gm-addr" id="locValue" jstcache="3">'+formattedAddress+"</div></div></div>"}))});map.setCenter(pos)},function(){handleNoGeolocation(!0)}),
setTimeout(function(){loadPlaces(accessLat,accessLon,"Dhaka, Bangladesh");infowindow=new google.maps.InfoWindow({map:map,position:a,content:'<span id="locTag">GeoLocation Access not Permitted !!!</span>'});map.setCenter(a)},1)):(handleNoGeolocation(!1),setTimeout(function(){loadPlaces(accessLat,accessLon,"Dhaka Bangladesh");infowindow=new google.maps.InfoWindow({map:map,position:a,content:'<span id="locTag">GeoLocation Not Enabled</span>'});map.setCenter(a)},12550))}
function getLatLongDetail(a){var b="";(new google.maps.Geocoder).geocode({latLng:a},function(a,f){if(f==google.maps.GeocoderStatus.OK&&a[0]){b=null!=a[0].formatted_address?a[0].formatted_address:"";var e=a[0].geometry.location,k=e.lat(),e=e.lng();loadPlaces(k,e,b)}})}
function handleNoGeolocation(a){a=a?"Error: The Geolocation service failed Enable Geolocation.":"Error: Your browser doesn't support Geolocation, Try to Enable Geolocation.";a={map:map,position:new google.maps.LatLng(60,105),content:a};new google.maps.InfoWindow(a);map.setCenter(a.position)}function bindInfoWindow(a,b,c,f){google.maps.event.addListener(a,"click",function(){c.setContent(f);c.open(b,a)})}
function downloadUrl(a,b){var c=window.ActiveXObject?new ActiveXObject("Microsoft.XMLHTTP"):new XMLHttpRequest;c.onreadystatechange=function(){4==c.readyState&&(c.onreadystatechange=doNothing,b(c,c.status))};c.open("GET",a,!0);c.send(null)}function doNothing(){}
function loadPlaces(a,b,c){$("#placeHolder").html("");$.ajax({dataType:"html",type:"POST",evalScripts:!0,url:"<?php echo Router::url(array('controller'=>'pages','action'=>'findplace'));?>",data:{lat:a,lng:b,address:c},success:function(a,b){$("#placeHolder").removeClass("ajax-loader");$("#placeHolder").html(a)}})}
$(document).ready(function(){$.fn.stars=function(){return $(this).each(function(){var a=parseFloat($(this).html()),a=16*Math.max(0,Math.min(5,a)),a=$("<span />").width(a);$(this).html(a)})};$.fn.bigstars=function(){return $(this).each(function(){var a=parseFloat($(this).html()),a=29*Math.max(0,Math.min(5,a)),a=$("<span />").width(a);$(this).html(a)})};initialize()});$(function(){$("span.stars").stars();$("span.bigstars").bigstars()});

	</script>

</div>

