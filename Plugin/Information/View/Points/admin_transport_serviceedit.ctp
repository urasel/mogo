<?php
$this->viewVars['title_for_layout'] = __d('information', 'Points');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Points'), array('action' => 'index'));

if ($this->action == 'admin_stadiumedit') {
	$this->Html->addCrumb($this->request->data['Point']['name'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = __d('information', 'Points') . ': ' . $this->request->data['Point']['name'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Edit'), '/' . $this->request->url);
}

$this->append('form-start', $this->Form->create('Point',array('type'=>'file','url' => array('action' =>'transportServiceedit') )));


$this->append('tab-heading');
	
	echo $this->Croogo->adminTab(__d('information', 'Location'), '#location');
	echo $this->Croogo->adminTab(__d('information', 'Places In this Location'), '#point');
	echo $this->Croogo->adminTab(__d('information', 'General Information'), '#place');
	echo $this->Croogo->adminTab(__d('information', 'Point Details'), '#points');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');

	echo $this->Html->tabStart('location');
		echo $this->Form->input('Point.id');	
		echo $this->Form->input('countryid', array('label'=>'Country Name','placeholder'=>'Type Country Name','id'=>'autoCountry','empty'=>'Country Name','tabindex'=> "2"));
		echo $this->Form->input('Location.country_id', array('type' =>'hidden','id'=>'CountryId','empty'=>'Country Name'));
		
		echo '<div id="zoneDiv"></div>';
		echo '<div id="districtDiv"></div>';
		echo '<div id="thanaDiv"></div>';
		echo '<span class="locationdiv">';
		echo $this->Form->input('Location.location', array('placeholder'=>'Type Area Name','tabindex'=> "5"));
		echo '</span>';
		echo $this->Form->input('Location.maplocation', array('id'=>'maplocation','type'=>'hidden'));
		echo $this->Form->input('selectLat', array('type'=>'hidden'));
		echo $this->Form->input('selectLng', array('type'=>'hidden'));
		echo $this->Form->input('placeTypeName', array('type'=>'hidden'));
		echo $this->Form->input('Location.address', array('label'=>'Address','tabindex'=> "6"));
		
	echo $this->Html->tabEnd();
	echo $this->Html->tabStart('points');	
		echo $this->Form->input('Point.country_id');	
		echo $this->Form->input('Point.bd_division_id');	
		echo $this->Form->input('Point.bd_district_id');	
		echo $this->Form->input('Point.seo_name');	
		//debug($this->request->data);
	echo $this->Html->tabEnd();
	
	$dataClass = ucfirst($this->request->data['PlaceType']['singlename']);
	$imageClass = $dataClass.'Image';
	echo $this->Html->tabStart('place');
		echo $this->Form->input($dataClass.'.id');	
		echo $this->Form->input($dataClass.'.place_type_id');	
		echo $this->Form->input($dataClass.'.transport_type_id');	
		echo $this->Form->input($dataClass.'.transport_service_provider_id');	
		echo $this->Form->input($dataClass.'.name');	
		echo $this->Form->input($dataClass.'.bn_name');	
		echo $this->Form->input($dataClass.'.details');	
		echo $this->Form->input($dataClass.'.bn_details');	
		echo $this->Form->input($dataClass.'.mobile');	
		echo $this->Form->input($dataClass.'.website');	
		echo $this->Form->input($dataClass.'.email');			
		echo $this->Form->input($dataClass.'.metatag');			
		echo $this->Form->input($dataClass.'.keyword');		
		
		if(!empty($this->request->data[$dataClass]['logo'])){
			echo $this->Form->input($dataClass.'.image',array('type'=>'hidden'));
			echo $this->Form->input($dataClass.'.oldlogo',array('type'=>'hidden','value' => $this->request->data[$dataClass]['logo']));
			echo $this->Html->image('transportService/logo/medium/'.$this->request->data[$dataClass]['logo']);
		}
		echo $this->Form->input($dataClass.'.logo',array('type' => 'file'));
		echo $this->Form->input('Point.active');	
		$placeTypeName = $this->data['PlaceType']['name'];
		echo $this->Form->input('Point.placeTypeName', array('type'=>'hidden','value' => "$placeTypeName")); //Pass Category Name For Metatag creation.	
	echo $this->Html->tabEnd();
	
	echo $this->Html->tabStart('point');

		echo $this->Form->input('loadmap', array('type'=>'checkbox','class'=>'checkbox','label'=>'Topic Location','tabindex'=> "9"));
		echo '<div class="panel-heading">Click On the MAP to Save Location</div>';
		echo $this->Form->input('mapinput',array('id'=>'mapinput','type'=>'hidden'));
		?>
		<div id="google_map"></div>
		<div style="display:none" id="hiddendata">
			<div class="marker-info-win">
				<div class="marker-inner-win">
				<span class="info-content"><h1 class="marker-heading">Want to Change Place ?</h1></span><br/>
				
				<button type="button" name="save-marker" id="save-marker-data" class="save-marker btn btn-primary btn-xs">Save Location</button>
				</div>
			</div>
		</div>
		<p id="dd"></p>
		
		
<script type="text/javascript">
	var selectedLat;
	var selectedLng;
	var markers = [];
	function resizeDiv() {
		vpw = $(window).width();
		vph = $(window).height();
		$('.mapsize').css({'height': vph + 'px'});
		$('.mapsize').css({'width': vpw + 'px'});
	}
	
	$(document).ready(function() {
	
		var placeTypeName = $('#PlacePlaceTypeId option:selected').text();
		$('#PointPlaceTypeName').val(placeTypeName);
			
		$('#PlacePlaceTypeId').change(function(){
			var placeTypeName = $('#PlacePlaceTypeId option:selected').text();
			$('#PointPlaceTypeName').val(placeTypeName);
		});
	
		var curlat = '<?php echo $this->request->data['Point']['lat'];?>';
		var curlng = '<?php echo $this->request->data['Point']['lng'];?>';
		
		var mapCenter = new google.maps.LatLng(curlat, curlng); //Google map Coordinates
		
		var map;
		callMap();
		$("#autoCountry").autocomplete({
            source: '<?php echo $this->base; ?>/general/countries/getCountries',
            minLength: 1,
			select: function(event, ui) {
                var $spec = ui.item.id;
				$('#countryloader').removeClass('spinner');
                $('#CountryId').val($spec);
				$("#zoneDiv").html("");
				$("#districtDiv").html("");
				$("#thanaDiv").html("");
				var countryID = $spec;
				$.ajax({
					dataType: "html",
					type: "GET",
					evalScripts: true,
					url: '<?php echo $this->base; ?>/general/zones/ajaxzone',
					data: ({countryid:countryID}),
					success: function (data, textStatus){
						$("#zoneDiv").html(data);
						$(".locationdiv").show();
				 
					}
				});
            }
		});
		
		$('#CountryId').change(function(){
				$("#zoneDiv").html("");
				$("#districtDiv").html("");
				$("#thanaDiv").html("");
				var countryID = $(this).val();
				$.ajax({
					dataType: "html",
					type: "POST",
					evalScripts: true,
					url: '<?php echo $this->base; ?>/general/zones/ajaxzone',
					data: ({countryid:countryID}),
					success: function (data, textStatus){
						$("#zoneDiv").html(data);
				 
					}
			});
		});
		
		$('#PointLoadmap').click(function(){
			var country = $( "#autoCountry" ).val();
			var division = $( "#addresszoneid option:selected" ).text();
			var district = $( "#addressdistrictid option:selected" ).text();
			var thana = $( "#thanalist option:selected" ).text();
			var address = $("#LocationLocation").val();
			var searchString = address+','+thana+','+district+','+division+','+country;
			alert(searchString);
			$('#mapinput').val(searchString);
			
			var geocoder = new google.maps.Geocoder();
		
				  geocoder.geocode({
					address: document.getElementById("mapinput").value
				  }, function(results, status) {
					if (status == google.maps.GeocoderStatus.OK) {
					  var result = results[0];
					  //document.getElementById('dd').innerHTML = JSON.stringify(result);
					  document.getElementById("mapinput").value = result.formatted_address;
					  document.getElementById('PointSelectLat').value = result.geometry.location.lat();
					  document.getElementById('PointSelectLng').value = result.geometry.location.lng();
					  if (result.geometry.viewport) {
						map.fitBounds(result.geometry.viewport);
					  }
					  else {
						map.setCenter(result.geometry.location);
					  }
					} else if (status == google.maps.GeocoderStatus.ZERO_RESULTS) {
					  alert("Sorry, the geocoder failed to locate the specified address.");
					} else {
					  alert("Sorry, the geocoder failed with an internal error.");
					}
				  });
				  $('.mapcontainer').show();
				  callMap();
				
		});
		

		//############### Google Map Initialize ##############
		
		function nearestplaces(lat,lng){
			
			selectedLat = $("#PointSelectLat").val();
			selectedLng = $("#PointSelectLng").val();
			
			$.get("savedplaces/"+lat+"/"+lng, function (data) {
					$(data).find("marker").each(function () {
						  var name 		= $(this).attr('name');
						  var address 	= '<p>'+ $(this).attr('address') +'</p>';
						  var type 		= $(this).attr('type');
						  var point 	= new google.maps.LatLng(parseFloat($(this).attr('lat')),parseFloat($(this).attr('lng')));
						  place_marker(point, name, address, true, true, true, "http://www.infomap24.com/img/marker-ping.png");
					});
				});	
		}
	
		function place_marker(MapPos, MapTitle, MapDesc,  InfoOpenDefault, DragAble, Removable, iconPath)
		{	  	  		  
			
			//new marker
			
			var marker = new google.maps.Marker({
				position: MapPos,
				map: map,
				draggable:false,
				animation: google.maps.Animation.DROP,
				title:"Hello World!",
				icon: iconPath
			});
			var infowindow = new google.maps.InfoWindow();
			var content = 	'<div class="gm-iw gm-sm" jstcache="0" style="width: 204px;">'+
							'<div jscontent="i.result.name" class="gm-title" jstcache="1">'+MapTitle+'</div>'+
							'<div class="gm-basicinfo" jstcache="0">'+
							'<div jscontent="i.result.formatted_address" jsdisplay="i.result.formatted_address" class="gm-addr" jstcache="3">'+MapDesc+'</div>'+
							'</div>'+
							'<div jsdisplay="svImg" class="gm-photos" jstcache="2">'+
							'<span jsvalues=".onclick:svClickFn" jsdisplay="!photoImg" class="gm-wsv" jstcache="6">'+
							'<img width="204" height="50" jsvalues=".src:svImg" jstcache="11" src="http://cbk0.googleapis.com/cbk?output=thumbnail&amp;cb_client=apiv3&amp;v=4&amp;gl=US&amp;panoid=J76_oMnVmIYkxP3zB5YmyQ&amp;yaw=139.72031499384002&amp;w=204&amp;h=50&amp;thumb=2">'+
							'</span>'+
							'</div>'+
							'</div>';
			
			var contentString = $('<h1 class="marker-heading">'+MapTitle+'</h1>');
			
			var onMarkerClick = function() {
			  var marker = this;
			  var latLng = marker.getPosition();
			  infoWindow.setContent('<h3>Marker position is:</h3>' +
				  latLng.lat() + ', ' + latLng.lng());

			  infoWindow.open(map, marker);
			};
			
			//Create an infoWindow
			
			//set the content of infoWindow
			//infowindow.setContent(contentString[0]);
			infowindow.setContent(content);
			
			google.maps.event.addListener(marker, 'click', function() {
					var marker = this;
					var latLng = marker.getPosition();
					infowindow.open(map,marker); // click on marker opens info window 
			});
			
			
		}
	
		function callMap(){
		
			var googleMapOptions = 
				{ 
					center: mapCenter, // map center
					//center: new google.maps.LatLng(37.4419, -122.1419),
					zoom: 16, //zoom level, 0 = earth view to higher value
					maxZoom: 26,
					minZoom: 10,
					zoomControlOptions: {
					style: google.maps.ZoomControlStyle.SMALL //zoom control size
					},
					scaleControl: true, // enable scale control
					mapTypeId: google.maps.MapTypeId.ROADMAP // google map type
				};
				
			map = new google.maps.Map(document.getElementById('google_map'),googleMapOptions);
			//nearestplaces();
			var marker = new google.maps.Marker();
			var infoWindow = new google.maps.InfoWindow;
			var name = '<?php echo $this->request->data[$dataClass]['name'];?>';
			place_marker(mapCenter, name, '', true, true, true, "http://infomap24.com/img/marker-ping.png");
			var counter = 0;
			google.maps.event.addListener(map, 'click', function(mEvent) {
				marker.setPosition(mEvent.latLng);
				//marker.setMap(map);
				//document.getElementById('dd').innerHTML = JSON.stringify(mEvent.latLng);
				//$('#maplocation').val(mEvent.latLng.J+','+mEvent.latLng.M);
				var myLatLng = mEvent.latLng;
				var pointlat = myLatLng.lat();
				var pointlng = myLatLng.lng();
				$('#maplocation').val(pointlat+','+pointlng);
				infoWindow.setPosition(mEvent.latLng);
				
				var contentString= document.getElementById('hiddendata').innerHTML;
				infoWindow.setContent(contentString);
				
				infoWindow.open(map);
				
				google.maps.event.addDomListener(document.getElementById('save-marker-data'), "click", function(event) {
						
						var countryID = $('#CountryId').val();
						var divisionID = $('#addresszoneid option:selected').val();
						var districtID = $('#addressdistrictid option:selected').val();
						var thanaID = $('#thanalist option:selected').val();
						var location = $('#PlaceLocation' ).val();
						var latlng = $('#maplocation').val();
						var typeID = $('#PointPlaceTypeId option:selected').val();
						var placeTypeName = $('#PointPlaceTypeId option:selected').text();
						var placename = $('#PlaceName' ).val();
						var placeaddress = $('#PlaceAddress' ).val();
						var web = $('#PlaceWeb' ).val();
						var email = $('#PlaceEmail' ).val();
						var pointphone = $('#PlaceMobile' ).val();
						var PlaceBanglaName = $('#PlaceBanglaName' ).val();
						var PlaceFax = $('#PlaceFax' ).val();
						var PlaceSeoName = $('#PlaceSeoName' ).val();
						var PlaceKeyword = $('#PlaceKeyword' ).val();
						var PlaceMetatag = $('#PlaceMetatag' ).val();
						var PlaceDetails = $('#PlaceDetails').val();
						var PlaceEstablish = $('#PlaceEstablish').val();
						var PlaceHistory = $('#PlaceHistory').val();
						//var privatecheck = 0;
						if($('#PointPrivate').is(':checked')){
							privatecheck = 1;
						}else{
							privatecheck = 0;
						}
						
						if($('#PlacePopular').is(':checked')){
							popularcheck = 1;
						}else{
							popularcheck = 0;
						}
						
						if($('#PlaceActive').is(':checked')){
							activecheck = 1;
						}else{
							activecheck = 0;
						}
						
						infoWindow.close();
						
						var myData = {countryID : countryID, divisionID : divisionID, districtID : districtID, thanaID : thanaID, location : location, latlng : latlng, typeID: typeID,placeTypeName: placeTypeName, placename: placename, placeaddress: placeaddress,placeweb: web,placeemail: email,privateplace: privatecheck,placephone: pointphone,PlaceBanglaName: PlaceBanglaName,PlaceFax: PlaceFax,PlaceSeoName: PlaceSeoName,PlaceKeyword: PlaceKeyword,PlaceMetatag: PlaceMetatag,PlaceDetails: PlaceDetails,PlaceEstablish: PlaceEstablish,PlaceHistory: PlaceHistory,popularcheck: popularcheck,activecheck: activecheck}; //post variables
						
						$.ajax({
						  type: "GET",
						  url: "pointeditsave",
						  data: myData,
						  success:function(data){
						  
							},
							error:function (xhr, ajaxOptions, thrownError){
								alert(thrownError); //throw any errors
							}
						});
					
				});
			  });
		}
		
});	
</script>	
		<?php
	echo $this->Html->tabEnd();
	
		?>
		
		<?php
		
	
	echo $this->Croogo->adminTabs();

$this->end();

$this->append('panels');
	echo $this->Html->beginBox(__d('croogo', 'Publishing')) .
		$this->Form->button(__d('croogo', 'Apply'), array('name' => 'apply')) .
		$this->Form->button(__d('croogo', 'Save'), array('button' => 'primary')) .
		//$this->Form->button(__d('croogo', 'Save & New'), array('button' => 'success', 'name' => 'save_and_new')) .
		$this->Html->link(__d('croogo', 'Cancel'), array('action' => 'index'), array('button' => 'danger'));
	echo $this->Html->endBox();

	echo $this->Croogo->adminBoxes();
$this->end();
$this->Js->alert('Hey there');
$this->append('form-end', $this->Form->end());
