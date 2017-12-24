<div class="Places form">
<style type="text/css">
	h1.heading{padding:0px;margin: 0px 0px 10px 0px;text-align:center;font: 18px Georgia, "Times New Roman", Times, serif;}

	/* width and height of google map */
	#google_map {width: 100%; height: 600px;margin-top:0px;margin-left:auto;margin-right:auto;}

	/* Marker Edit form */
	.marker-edit label{margin-bottom: 5px;float:left;}
	.marker-edit label span {width: 100px;float: left;}
	.marker-edit label input, .marker-edit label select{height: 24px;}
	.marker-edit label textarea{height: 60px;}
	.marker-edit label input, .marker-edit label select, .marker-edit label textarea {width: 60%;margin:0px;padding-left: 5px;border: 1px solid #DDD;border-radius: 3px;}
	.marker-info-win select,.marker-info-win input[type="text"],.marker-info-win textarea{
		float:left;width:294px;
	}
	.marker-info-win .input label{
		float:left;width:80px;
	}
	input#PlacePrivate{
	float:none;
	position:relative;
	}
	/* Marker Info Window */
	h1.marker-heading{color: #585858;margin: 0px;padding: 0px;font: 18px "Trebuchet MS", Arial;border-bottom: 1px dotted #D8D8D8;}
	div.marker-info-win {margin-right: 0px;width:440px;}
	div.marker-info-win p{padding: 0px;margin: 10px 0px 10px 0;}
	div.marker-inner-win{padding: 15px;}
	#readyPType{display:none;}
	.mapcontainer,.locationdiv{
	display:none;
	}
	.save-marker{
		margin-top: 15px;
		
	}
	.checkbox{
		clear:both;
	}
	.radio input[type="radio"], .radio-inline input[type="radio"], .checkbox input[type="checkbox"], .checkbox-inline input[type="checkbox"] {
	  margin-left: 0px;
	  position: absolute;
	}
	.marker-info-win div.input input,.marker-info-win div.input select, .marker-info-win div.input textarea{
		margin-bottom:5px;
	}
	.ui-menu .ui-menu-item {
	  border-bottom: 1px solid #ccc;
	  cursor: pointer;
	  list-style-image: url("data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7");
	  margin: 0;
	  min-height: 0;
	  padding: 5px 0.7em 4px 0.4em;
	  position: relative;
	}
</style>
<?php echo $this->Form->create('Place'); ?>
	<fieldset>
		<legend><?php echo __('Add Place'); ?></legend>
		<p id="dd"></p>
	<?php
		echo '<div class="row"><div class="col-md-12">';
		echo '<div class="panel panel-info">';
		echo '<div class="panel-heading">Location Details</div>';
		echo '<div class="panel-body">';
		echo $this->Form->input('countryid', array('class'=>'form-control','label'=>'Country Name','placeholder'=>'Type Country Name','id'=>'autoCountry','empty'=>'Country Name','tabindex'=> "1"));
		echo $this->Form->input('country_id', array('type' =>'hidden','class'=>'form-control ','id'=>'CountryId','empty'=>'Country Name'));
		//echo '<div id="countryloader" style="margin:0 auto;text-align:center;"></div>';
		echo $this->Form->input('selectedLat', array('type' =>'hidden'));
		echo $this->Form->input('selectedLng', array('type' =>'hidden'));
		echo '<div id="zoneDiv"></div>';
		echo '<div id="districtDiv"></div>';
		echo '<div id="thanaDiv"></div>';
		echo '<span class="locationdiv">';
		echo $this->Form->input('location', array('class'=>'form-control','placeholder'=>'Type Area Name','tabindex'=> "5"));
		echo '</span>';
		echo $this->Form->input('maplocation', array('id'=>'maplocation','type'=>'hidden'));
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		
		echo '<div class="row mapcontainer">';
		echo '<div class="col-md-12">';
			echo '<div class="panel panel-info">';
			echo '<div class="panel-heading">Click On the MAP to Save Location</div>';
			echo '<div class="panel-body mapsize" style="padding:0px;">';
			?>
			<input id="mapinput" type="hidden" style="width: 80%;" value="Institut Teknologi Telkom, Sukapura, Dayeuhkolot, Bandung 40257, Indonesia" maxlength="100">
			<div id="google_map"></div>
			<?php
			echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		
		
		
	?>
	</fieldset>

<button type="button" name="save-marker" class="btn btn-primary btn-xs">Click to Load Map</button>
<button type="button" name="resizemap" class="btn btn-primary btn-xs resizemap" onClick="resizeDiv()">Resize Map</button>
</form>
</div>
<script type="text/javascript">
var siteurl = 'http://localhost/infomap24';
var selectedLat,selectedLng,markers=[],nearestPlaceMarker=[],nearestPlaceMarkerWindow=[];function resizeDiv(){vpw=$(window).width();vph=$(window).height();$(".mapsize").css({height:vph+"px"});$(".mapsize").css({width:vpw+"px"})}
$(document).ready(function(){function g(a,c){selectedLat=$("#PlaceSelectedLat").val();selectedLng=$("#PlaceSelectedLng").val();$.get("http://localhost/infomap24/places/savedplaces/"+a+"/"+c,function(b){$(b).find("marker").each(function(){var b=$(this).attr("name"),a="<p>"+$(this).attr("address")+"</p>";$(this).attr("type");var c=new google.maps.LatLng(parseFloat($(this).attr("lat")),parseFloat($(this).attr("lng")));h(c,b,a,!0,!0,!0,"http://oximap.com/img/marker-ping.png")})})}function h(a,c,b,f,e,q,m){a=new google.maps.Marker({position:a,
map:d,draggable:!1,animation:google.maps.Animation.DROP,title:"Hello World!",icon:"http://www.oximap.com/img/marker-ping.png",label:'<i class="fa fa-fire-extinguisher"></i>'});var n=new google.maps.InfoWindow;b='<div class="gm-iw gm-sm" jstcache="0" style="width: 204px;"><div jscontent="i.result.name" class="gm-title" jstcache="1">'+c+'</div><div class="gm-basicinfo" jstcache="0"><div jscontent="i.result.formatted_address" jsdisplay="i.result.formatted_address" class="gm-addr" jstcache="3">'+
b+'</div></div><div jsdisplay="svImg" class="gm-photos" jstcache="2"><span jsvalues=".onclick:svClickFn" jsdisplay="!photoImg" class="gm-wsv" jstcache="6"><img width="204" height="50" jsvalues=".src:svImg" jstcache="11" src="http://cbk0.googleapis.com/cbk?output=thumbnail&amp;cb_client=apiv3&amp;v=4&amp;gl=US&amp;panoid=J76_oMnVmIYkxP3zB5YmyQ&amp;yaw=139.72031499384002&amp;w=204&amp;h=50&amp;thumb=2"></span></div></div>';$('<h1 class="marker-heading">'+c+"</h1>");n.setContent(b);google.maps.event.addListener(a,
"click",function(){this.getPosition();n.open(d,this)})}function k(){var a={center:l,zoom:18,maxZoom:24,minZoom:14,zoomControlOptions:{style:google.maps.ZoomControlStyle.SMALL},scaleControl:!0,mapTypeId:google.maps.MapTypeId.ROADMAP};d=new google.maps.Map(document.getElementById("google_map"),a);var c=new google.maps.Marker,b=new google.maps.InfoWindow;google.maps.event.addListener(d,"click",function(a){c.setPosition(a.latLng);
b.setPosition(a.latLng);$("<h3>Marker position is:</h3>"+a.latLng.k+", "+a.latLng.D+'<br/><button type="button" name="save-marker" class="save-marker">Save Location</button>');var e=$('<div class="marker-info-win"><div class="marker-inner-win"><span class="info-content"><h1 class="marker-heading">Want to Save Place ?</h1></span><br/><div class="input select required"><label for="PlacePlaceTypeId">Place Type</label><select tabindex="1" required="required" id="PlacePlaceTypeId" placeholder="Place Type" class="form-control" name="data[Place][place_type_id]"><option value="26">Administration</option><option value="32">Airlines</option><option value="14">ATM Boothes</option><option value="11">Banks</option><option value="29">Book Store</option><option value="8">Bus Terminal</option><option value="43">Co-Operative Society</option><option value="18">Community Center</option><option value="34">Departmental Stores</option><option value="39">Diagnostic Centers &amp; Pathological Lab</option><option value="10">Educational Institutes</option><option value="40">Fashion &amp; Jewelry</option><option value="21">Fast Food</option><option value="4">Fire Services</option><option value="38">Garments &amp; Accessories</option><option value="30">Health &amp; Beauty</option><option value="35">Health &amp; Fitness Center</option><option value="13">Holy Places</option><option value="1">Hospital &amp; Clinic</option><option value="15">Hotel &amp; Restaurant</option><option value="25">House</option><option value="7">Lake</option><option value="37">Mills &amp; Industries</option><option value="28">Movie Theater</option><option value="17">Notable Places</option><option value="12">Organizations</option><option value="22">Others</option><option value="16">Petrol Pump</option><option value="3">Pharmacies</option><option value="23">Places</option><option value="6">Play Field</option><option value="19">Police Station</option><option value="36">Real Estate</option><option value="31">Rent-A-Car</option><option value="33">Residential Hotel</option><option value="24">Roads</option><option value="41">School &amp; College</option><option value="27">Shop</option><option value="2">Shopping Mall</option><option value="5">Stadium</option><option value="20">Sweet &amp; Bakery</option><option value="42">University</option></select></div><div class="input text required"><label for="PlaceName">Name</label><input type="text"  id="PlaceName" maxlength="255" tabindex="2" placeholder="Name of Location" class="form-control popupsearch" name="data[Place][name]"></div><div class="input text"><label for="PlaceAddress">Address</label><textarea id="PlaceAddress" rows="4" cols="30" tabindex="4" rows="5" placeholder="Type Location Address" class="form-control" name="data[Place][address]"></textarea></div><div class="input text"><label for="PlaceWeb">Website</label><input type="text" id="PlaceWeb" rows="5" placeholder="WebSite" class="form-control" name="data[Place][web]"></div><div class="input text"><label for="PlaceEmail">Email</label><input type="text" id="PlaceEmail" tabindex="4" placeholder="Email Address" class="form-control" name="data[Place][email]"></div><div class="input text"><label for="PlaceWeb">Mobile</label><input type="text" id="PlacePhone" tabindex="4" placeholder="Phone Number" class="form-control" name="data[Place][phone]"></div><div class="input checkbox"><input type="hidden" value="0" id="PlacePrivate_" name="data[Place][private]"><input type="checkbox" id="PlacePrivate" value="1" tabindex="13" name="data[Place][private]"><label for="PlacePrivate">Private</label></div><button type="button" name="save-marker" class="save-marker btn btn-primary btn-xs">Save Location</button></div></div>');
b.setContent(e[0]);b.open(d);g(a.latLng.A,a.latLng.F);a=e.find("button.save-marker")[0];google.maps.event.addDomListener(a,"click",function(a){$("#maplocation").val(c.getPosition().toUrlValue());a=$("#CountryId").val();var m=$("#addresszoneid option:selected").val(),d=$("#addressdistrictid option:selected").val(),e=$("#thanalist option:selected").val(),f=$("#PlaceLocation").val(),g=$("#maplocation").val(),h=$("#PlacePlaceTypeId option:selected").val(),k=$("#PlaceName").val(),l=$("#PlaceAddress").val().replace(/(\r\n|\n|\r)/g,"<br/>"),pw=$("#PlaceWeb").val(),pe=$("#PlaceEmail").val(),pf=$("#PlacePhone").val(),
p=0,p=$("#PlacePrivate").is(":checked")?1:0;b.close();$.ajax({type:"POST",url:siteurl+"/points/adminsave",data:{countryID:a,divisionID:m,districtID:d,thanaID:e,location:f,latlng:g,typeID:h,placename:k,placeaddress:l,privateplace:p,placeweb:pw,placeemail:pe,placephone:pf},success:function(a){},error:function(a,b,c){alert(c)}})})})}var l=new google.maps.LatLng(23.699865,90.430389),d;$("#autoCountry").autocomplete({source:"<?php echo $this->base; ?>/countries/getCountries",minLength:1,select:function(a,c){var b=c.item.id;$("#countryloader").removeClass("spinner");
$("#CountryId").val(b);$("#zoneDiv").html("");$("#districtDiv").html("");$("#thanaDiv").html("");$.ajax({dataType:"html",type:"POST",evalScripts:!0,url:"<?php echo Router::url(array('controller'=>'zones','action'=>'ajaxzone'));?>",data:{countryid:b},success:function(a,b){$("#zoneDiv").html(a);$(".locationdiv").show()}})}});$("#CountryId").change(function(){$("#zoneDiv").html("");$("#districtDiv").html("");$("#thanaDiv").html("");var a=$(this).val();$.ajax({dataType:"html",type:"POST",evalScripts:!0,
url:"<?php echo Router::url(array('controller'=>'zones','action'=>'ajaxzone'));?>",data:{countryid:a},success:function(a,b){$("#zoneDiv").html(a)}})});$("#PlaceLocation").focusout(function(){var a=$("#autoCountry").val(),c=$("#addresszoneid option:selected").text(),b=$("#addressdistrictid option:selected").text(),f=$("#thanalist option:selected").text(),a=$(this).val()+","+f+","+b+","+c+","+a;$("#mapinput").val(a);(new google.maps.Geocoder).geocode({address:document.getElementById("mapinput").value},
function(a,b){if(b==google.maps.GeocoderStatus.OK){var c=a[0];document.getElementById("mapinput").value=c.formatted_address;document.getElementById("PlaceSelectedLat").value=c.geometry.location.A;document.getElementById("PlaceSelectedLng").value=c.geometry.location.F;c.geometry.viewport?d.fitBounds(c.geometry.viewport):d.setCenter(c.geometry.location)}else b==google.maps.GeocoderStatus.ZERO_RESULTS?alert("Sorry, the geocoder failed to locate the specified address."):alert("Sorry, the geocoder failed with an internal error.")});
$(".mapcontainer").show();k()})
});
</script>

