<?php
$this->viewVars['title_for_layout'] = __d('information', 'Points');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Points'), array('action' => 'index'));

if ($this->action == 'admin_instituteedit') {
	$this->Html->addCrumb($this->request->data['Point']['name'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = __d('information', 'Points') . ': ' . $this->request->data['Point']['name'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

$this->append('form-start', $this->Form->create('Point',array('type'=>'file','url' => array('action' =>'instituteedit') )));


$this->append('tab-heading');
	
	echo $this->Croogo->adminTab(__d('information', 'Location'), '#location');
	echo $this->Croogo->adminTab(__d('information', 'Places In this Location'), '#point');
	echo $this->Croogo->adminTab(__d('information', 'Place Information'), '#place');
	echo $this->Croogo->adminTab(__d('information', 'Photo Gallery'), '#photogallery');
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
		
		?>
		
		<?php
	echo $this->Html->tabEnd();
	echo $this->Html->tabStart('points');	
		echo $this->Form->input('Point.country_id');	
		echo $this->Form->input('Point.bd_division_id');	
		echo $this->Form->input('Point.bd_district_id');	
		echo $this->Form->input('Point.seo_name');	
		//debug($this->request->data);
	echo $this->Html->tabEnd();
	//debug($this->request->data);
	$dataClass = ucfirst($this->request->data['PlaceType']['singlename']);
	$imageClass = $dataClass.'Image';
	echo $this->Html->tabStart('place');
		echo $this->Form->input($dataClass.'.id');	
		echo $this->Form->input($dataClass.'.place_type_id');	
		$options = [
			'Boys' 		=> 'Boys',
			'Girls' 		=> 'Girls',
			'Combined' 	=> 'Combined'
		];
		echo $this->Form->input($dataClass.'.institutetype',array('options' => $options,'label' => 'Institute Type'));	
		echo $this->Form->input($dataClass.'.name');	
		echo $this->Form->input($dataClass.'.bn_name');	
		echo $this->Form->input('parentname',array('id' => 'setparent','label' => 'Parent Name'));	
		echo $this->Form->input('parent',array('id' => 'parentid','label' => 'Parent ID'));	
		echo $this->Form->input($dataClass.'.seo_name');	
		echo $this->Form->input($dataClass.'.type');	
		echo $this->Form->input($dataClass.'.level');	
		echo $this->Form->input($dataClass.'.eiin_no');	
		echo $this->Form->input($dataClass.'.post_office');	
		echo $this->Form->input($dataClass.'.details');	
		echo $this->Form->input($dataClass.'.bn_details');	
		echo $this->Form->input($dataClass.'.founded', array('placeholder'=>'Ten'));	
		echo $this->Form->input($dataClass.'.founded_by', array('placeholder'=>'Mr X'));	
		echo $this->Form->input($dataClass.'.storied', array('placeholder'=>'4th'));	
		echo $this->Form->input($dataClass.'.area', array('placeholder'=>'2200 sqr Feet'));	
		echo $this->Form->input($dataClass.'.total_student', array('placeholder'=>'1000'));	
		echo $this->Form->input($dataClass.'.web');	
		echo $this->Form->input($dataClass.'.email');	
		echo $this->Form->input($dataClass.'.mobile');	
		echo $this->Form->input($dataClass.'.phone');	
		echo $this->Form->input($dataClass.'.teaching_staff', array('placeholder'=>'100'));	
		
		
		/************************************Hours Section Start*********************************/
		echo '<div class="input text">';
		echo $this->Form->label('Open and Close Time');
		$storedHours = json_decode($this->data[$dataClass]['hours'],true);
		//debug($storedHours);
		echo '<div class="bs-example" data-example-id="simple-table">';
		$hours = array(
		'01:00' => '01:00 AM',
		'02:00' => '02:00 AM',
		'03:00' => '03:00 AM',
		'04:00' => '04:00 AM',
		'05:00' => '05:00 AM',
		'06:00' => '06:00 AM',
		'07:00' => '07:00 AM',
		'08:00' => '08:00 AM',
		'09:00' => '09:00 AM',
		'10:00' => '10:00 AM',
		'11:00' => '11:00 AM',
		'12:00' => '12:00 PM',
		'13:00' => '01:00 PM',
		'14:00' => '02:00 PM',
		'15:00' => '03:00 PM',
		'16:00' => '04:00 PM',
		'17:00' => '05:00 PM',
		'18:00' => '06:00 PM',
		'19:00' => '07:00 PM',
		'20:00' => '08:00 PM',
		'21:00' => '09:00 PM',
		'22:00' => '10:00 PM',
		'23:00' => '11:00 PM',
		'24:00' => '12:00 AM'
		);
		echo '<table class="table table-bordered">';
		echo '<tr>';
		echo '<td>DAY</td><td>Open</td><td>Closed</td><td>Comments</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td>Saturday :</td><td>'.$this->Form->input('open',array('options' => $hours,'empty' => '(Open Time)','default'=> $storedHours[0]['open'],'name' =>"Hour[0][open]",'label' => false)).'</td><td>'.$this->Form->input('close',array('options' => $hours,'empty' => '(Close Time)','default'=> $storedHours[0]['closed'],'name' =>"Hour[0][closed]",'label' => false)).'</td><td>'.$this->Form->input('Hour.comments',array('name' =>"Hour[0][comments]",'label' => false)).'</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td>Sunday :</td><td>'.$this->Form->input('open',array('options' => $hours,'empty' => '(Open Time)','default'=> $storedHours[1]['open'],'name' =>"Hour[1][open]",'label' => false)).'</td><td>'.$this->Form->input('close',array('options' => $hours,'empty' => '(Close Time)','default'=> $storedHours[1]['closed'],'name' =>"Hour[1][closed]",'label' => false)).'</td><td>'.$this->Form->input('Hour.comments',array('name' =>"Hour[1][comments]",'label' => false)).'</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td>Monday :</td><td>'.$this->Form->input('open',array('options' => $hours,'empty' => '(Open Time)','default'=> $storedHours[2]['open'],'name' =>"Hour[2][open]",'label' => false)).'</td><td>'.$this->Form->input('close',array('options' => $hours,'empty' => '(Close Time)','default'=> $storedHours[2]['closed'],'name' =>"Hour[2][closed]",'label' => false)).'</td><td>'.$this->Form->input('Hour.comments',array('name' =>"Hour[2][comments]",'label' => false)).'</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td>Tuestday :</td><td>'.$this->Form->input('open',array('options' => $hours,'empty' => '(Open Time)','default'=> $storedHours[3]['open'],'name' =>"Hour[3][open]",'label' => false)).'</td><td>'.$this->Form->input('close',array('options' => $hours,'empty' => '(Close Time)','default'=> $storedHours[3]['closed'],'name' =>"Hour[3][closed]",'label' => false)).'</td><td>'.$this->Form->input('Hour.comments',array('name' =>"Hour[3][comments]",'label' => false)).'</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td>Wetnestday :</td><td>'.$this->Form->input('open',array('options' => $hours,'empty' => '(Open Time)','default'=> $storedHours[4]['open'],'name' =>"Hour[4][open]",'label' => false)).'</td><td>'.$this->Form->input('close',array('options' => $hours,'empty' => '(Close Time)','default'=> $storedHours[4]['closed'],'name' =>"Hour[4][closed]",'label' => false)).'</td><td>'.$this->Form->input('Hour.comments',array('name' =>"Hour[4][comments]",'label' => false)).'</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td>Thurstday :</td><td>'.$this->Form->input('open',array('options' => $hours,'empty' => '(Open Time)','default'=> $storedHours[5]['open'],'name' =>"Hour[5][open]",'label' => false)).'</td><td>'.$this->Form->input('close',array('options' => $hours,'empty' => '(Close Time)','default'=> $storedHours[5]['closed'],'name' =>"Hour[5][closed]",'label' => false)).'</td><td>'.$this->Form->input('Hour.comments',array('name' =>"Hour[5][comments]",'label' => false)).'</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td>Friday :</td><td>'.$this->Form->input('open',array('options' => $hours,'empty' => '(Open Time)','default'=> $storedHours[6]['open'],'name' =>"Hour[6][open]",'label' => false)).'</td><td>'.$this->Form->input('close',array('options' => $hours,'empty' => '(Close Time)','default'=> $storedHours[6]['closed'],'name' =>"Hour[6][closed]",'label' => false)).'</td><td>'.$this->Form->input('Hour.comments',array('name' =>"Hour[6][comments]",'label' => false)).'</td>';
		echo '</tr>';
		echo '</table>';
		echo '</div>';
		echo '</div>';
		/************************************Hours Section End*********************************/
		
		if(!empty($this->request->data[$dataClass]['logo'])){
			echo $this->Form->input($dataClass.'.image',array('type'=>'hidden'));
			echo $this->Form->input($dataClass.'.oldlogo',array('type'=>'hidden','value' => $this->request->data[$dataClass]['logo']));
			echo $this->Html->image('institutes/logo/medium/'.$this->request->data[$dataClass]['logo']);
		}
		echo $this->Form->input($dataClass.'.logo',array('type' =>'file','label' =>'Logo'));
		
		echo $this->Form->input($dataClass.'.keywords');	
		echo $this->Form->input($dataClass.'.metatag');	
		echo $this->Form->input($dataClass.'.address');			
		echo $this->Form->input('Point.active');	
		$placeTypeName = $this->data['PlaceType']['name'];
		echo $this->Form->input('Point.placeTypeName', array('type'=>'hidden','value' => "$placeTypeName")); //Pass Category Name For Metatag creation.	
	echo $this->Html->tabEnd();
	
	echo $this->Html->tabStart('point');

		echo $this->Form->input('loadmap', array('type'=>'checkbox','class'=>'checkbox','label'=>'Topic Location','tabindex'=> "9"));
		echo '<div class="panel-heading">Click On the MAP to Save Location</div>';
		echo $this->Form->input('mapinput',array('id'=>'mapinput','type'=>'hidden'));
		?>
		<input type="text" id="searchLoc" /><button type="button" id="searchButton">Search Now</button>
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
		$("#setparent").autocomplete({
            source: '<?php echo $this->base; ?>/information/points/getPoints',
            minLength: 3,
			select: function(event, ui) {
                var $spec = ui.item.id;
                var $pointname = ui.item.label;
                $('#setparent').val($pointname);
                $('#parentid').val($spec);
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
	
	echo $this->Html->tabStart('photogallery');
	//debug($this->data);
		if(isset($this->data[$imageClass]) && count($this->data[$imageClass]) > 0){
			foreach ($this->data[$imageClass] as $image){
				$imageID = 'del-'.$image['id'];
				$imageConID = 'condel-'.$image['id'];
				echo "<div class='tab-pane'  id='$imageConID' style='width:200px;'>";
				$imglink = "institutes/photogallery/".$image['file'];
				echo $this->Html->image($imglink,array('class' =>'snapimageimg img-responsive'));
				echo "<button class='btn btn-danger fulldelbtn' id='$imageID' type='button'>Detele Image</button>";
				echo '</div>';
			}
		}
		echo $this->Form->input('image', array('type'=>'file','label'=>'Add Image','multiple'=>'multiple','name' =>"data[$dataClass][images][]"));
		?>
		<script>
		$('.fulldelbtn').click(function(){
				var delID = $(this).attr('id');
				var modelname = "<?php echo $dataClass.'Image'; ?>";
				var foldername = "<?php echo $this->data['PlaceType']['pluralname']; ?>";
				var classname = "<?php echo $dataClass; ?>";
				var classid = "<?php echo $this->data[$dataClass]['id']; ?>";
				var classImageFile = "<?php echo $this->data[$dataClass]['image']; ?>";
				$.ajax({
					dataType: "html",
					type: "POST",
					evalScripts: true,
					url: '<?php echo $this->base; ?>/information/hospital_images/ajaxdelete',
					data: ({imageid:delID,modelName:modelname,folder:foldername,classname:classname,classid:classid,classImageFile:classImageFile}),
					success: function (data, textStatus){
						$("#con"+delID).remove();
				 
					}
			});
		});
		</script>
		<?php
		
		
		
	echo $this->Html->tabEnd();
	
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
