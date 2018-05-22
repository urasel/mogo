<?php
	  $breadcumpArray = array_reverse($breadcumpArray);
	  //debug($breadcumpArray);exit;
	  $currentLng = $this->Session->read('Config.language');
      $this->Html->addCrumb(__('Sitemap'), array('plugin'=>'information','controller' => 'siteactions','action' => 'sitemap')) ;
	  foreach($breadcumpArray as $breadcumb){
			//debug($breadcumb);exit;
			 $stringlength = strlen($breadcumb['PlaceType']['seo_name']);
			$newID = $stringlength.$breadcumb['PlaceType']['id'];
			if($breadcumb['hasChild'] == true){
				$this->Html->addCrumb($breadcumb['PlaceType']['name'],array('plugin'=>'information','controller' => 'siteactions','action'=>'subcategories','category'=>$breadcumb['PlaceType']['seo_name'],'id'=> $newID,'language'=>$currentLng,'ext' => 'asp') ,array('alt' =>$breadcumb['PlaceType']['name']));
			}else{
				$this->Html->addCrumb($breadcumb['PlaceType']['name'],array('plugin'=>'information','controller' => 'siteactions','action'=>'categories','category'=>$breadcumb['PlaceType']['seo_name'],'id'=> $newID,'page'=>1,'ext' => 'asp') ,array('alt' =>$breadcumb['PlaceType']['name']));
			}
			 
		  
	  }
	  //$className = 'Point';
	  $className = ucfirst($pointDetails['PlaceType']['singlename']);
	  if($currentLng == 'bn' && !empty($pointDetails[$className]['bn_name'])){
		$name = $pointDetails[$className]['bn_name'];
		}else{
			$name = $pointDetails[$className]['name'];
		}
	  $this->Html->addCrumb($title_for_layout,  '' , array('class' => 'active'));
	  
	  $destinationName = $pointDetails['Point']['name'];
	  $destinationLat = $pointDetails['Point']['lat'];
	  $destinationLng = $pointDetails['Point']['lng'];
	  
?>

<style>
      #map {
        border: 5px solid #ccc;
		height: 500px;
		margin-bottom: 10px;
      }
      .controls {
        margin-top: 10px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      }

      #origin-input,
      #destination-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
		width:97%;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
      }

      #origin-input:focus,
      #destination-input:focus {
        border-color: #4d90fe;
      }

      #mode-selector {
        color: #fff;
        background-color: #4d90fe;
        margin-left: 12px;
		margin-right: 6px;
        padding: 5px 11px 0px 11px;
      }

      #mode-selector label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
      #right-panel select, #right-panel input {
        font-size: 15px;
      }

      #right-panel select {
        width: 100%;
      }

      #right-panel i {
        font-size: 12px;
      }
      #right-panel {
        border: 5px solid #ccc;
		height: 500px;
		overflow: scroll;
		padding-left: 10px;
		margin-bottom: 10px;
		display:none;
      }
      #floating-panel {
        background: #fff;
        padding: 5px;
        font-size: 14px;
        font-family: Arial;
        border: 1px solid #ccc;
        box-shadow: 0 2px 2px rgba(33, 33, 33, 0.4);
        display: none;
      }
	  .controlItems{
		  display:none;
	  }

    </style>
<section>
<div class="container">
	<div class="row placeview">
	<div class="controlItems">
	<div class="row" id="mapcontrols">
		<div class="col-md-7 col-sm-8 col-xs-12">
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12">
				<input id="origin-input" class="controls" type="text"
					placeholder="Enter an origin location">
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12">
				<input id="destination-input" class="controls" type="text"
					placeholder="<?php echo $destinationName; ?>" value="<?php echo $destinationName; ?>">
				</div>
			</div>
		</div>
		
		
		<div class="col-md-5 col-sm-4 col-xs-12">
			<div id="mode-selector" class="controls">
			  <input type="radio" name="type" id="changemode-walking" checked="checked">
			  <label for="changemode-walking">Walking</label>

			  <input type="radio" name="type" id="changemode-transit">
			  <label for="changemode-transit">Transit</label>

			  <input type="radio" name="type" id="changemode-driving">
			  <label for="changemode-driving">Driving</label>
			</div>
		</div>
	</div>
	</div>
	<div class="row placeview">
		<div class="col-md-8">
			<div class="col-md-12 zeropadding posttitleblock">
			<div class="col-sm-1 col-xs-2 col-md-1" style="padding:0px;">
			<div class="viewcaticon">
			<?php
			if(!empty($pointDetails[$className]['image'])){
			echo $this->Html->image('places/logo/small/'.$pointDetails[$className]['image']);
			}else{
			$icon = $pointDetails['PlaceType']['icon'];
			echo "<i class='$icon'></i>";
			}
			?>
			</div>
			</div>
			<div class="col-sm-11 col-xs-10 col-md-11">
			<?php 
			//debug($pointDetails);
			if($pointDetails['Point']['place_type_id'] == 102){
			$placeName = $name.__(' distance and direction in map');
			$placeAddress = $pointDetails['Point']['address'];
			}else if($pointDetails['Point']['place_type_id'] == 103){
			$placeName = $name.__(' distance and direction in map');
			$placeAddress = $pointDetails['Point']['address'];
			}else if($pointDetails['PlaceType']['singlename'] == 'institute'){
			$placeName = $name.__(' distance and direction in map');
			$placeAddress = $pointDetails['Point']['address'];
			}else if($pointDetails['PlaceType']['singlename'] == 'place'){
			$placeName = $name.__(' distance and direction in map');
			$placeAddress = $pointDetails['Place']['address'];
			}else if($pointDetails['PlaceType']['singlename'] == 'stadium'){
			$placeName = $name.__(' distance and direction in map');
			$placeAddress = $pointDetails['Point']['address'];
			}else if($pointDetails['PlaceType']['singlename'] == 'hospital'){
			$placeName = $name.__(' distance and direction in map');
			$placeAddress = $pointDetails['Hospital']['address'];
			}else{
			$placeName = $name;
			$placeAddress = $pointDetails['BdThanas']['name'].', '.$pointDetails['BdDivision']['name'].','.$pointDetails['Country']['name'].' ';
			}
			
			//echo '<div class="col-sm-12 col-md-12 col-xs-12 zeropadding"><h1>'.$placeName.'</h1></div>'; 
			echo '<h2>'.$placeName.'</h2>'; 
			echo '<div class="col-sm-12 col-md-12 col-xs-12 zeropadding"><p>'.$placeAddress.'</p></div></div>'; 
			
			?>
			
			</div>
		<div class="row" id="social-block- margintop10px">
			<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="fb-like" data-href="<?php echo 'http://www.infomap24.com/'.$this->params->url;?>" data-width="300" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true" style="float:left;"></div>
			</div>
		
		</div>
		
		<div class="col-md-12">
		<div class="row">
			<div id="map"></div>
			
			
			<div class="col-md-12">
				<div class="row">
				<?php echo $this->element('content-section-ten');?>
				</div>
			</div>
		
		</div>
		</div>
		<div class="col-md-4">
		<div class="row">
			<div class="col-md-12 zeropadding">
			<div id="right-panel"></div>
			</div>
		</div>
		</div>
		
		</div>
    </div>
</div>
</div>
</section>
	
    <script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initMap() {
        var origin_place_id = null;
        var destination_place_id = null;
        var travel_mode = google.maps.TravelMode.WALKING;
		var myLatLng = {lat: <?php echo $destinationLat; ?>, lng: <?php echo $destinationLng; ?>};
        var map = new google.maps.Map(document.getElementById('map'), {
          mapTypeControl: false,
          center: myLatLng,
          zoom: 13
        });
		var marker = new google.maps.Marker({
		  position: myLatLng,
		  map: map,
		  title: '<?php echo $name; ?>'
		});
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        directionsDisplay.setMap(map);
		directionsDisplay.setPanel(document.getElementById('right-panel'));
        var origin_input = document.getElementById('origin-input');
        var destination_input = document.getElementById('destination-input');
        var modes = document.getElementById('mode-selector');
        var mapcontrols = document.getElementById('mapcontrols');
        var rightpanel = document.getElementById('right-panel');
        //map.controls[google.maps.ControlPosition.TOP_LEFT].push(origin_input);
        //map.controls[google.maps.ControlPosition.TOP_LEFT].push(destination_input);
        //map.controls[google.maps.ControlPosition.TOP_LEFT].push(modes);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(mapcontrols);

        var origin_autocomplete = new google.maps.places.Autocomplete(origin_input);
        origin_autocomplete.bindTo('bounds', map);
        var destination_autocomplete = new google.maps.places.Autocomplete(destination_input);
        destination_autocomplete.bindTo('bounds', map);

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        function setupClickListener(id, mode) {
          var radioButton = document.getElementById(id);
          radioButton.addEventListener('click', function() {
            travel_mode = mode;
			//route(origin_place_id, destination_place_id, travel_mode,directionsService, directionsDisplay);
			route(origin_place_id, travel_mode,directionsService, directionsDisplay);
          });
        }
        setupClickListener('changemode-walking', google.maps.TravelMode.WALKING);
        setupClickListener('changemode-transit', google.maps.TravelMode.TRANSIT);
        setupClickListener('changemode-driving', google.maps.TravelMode.DRIVING);
		
        function expandViewportToFitPlace(map, place) {
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
          }
        }
        origin_autocomplete.addListener('place_changed', function() {
          var place = origin_autocomplete.getPlace();
          if (!place.geometry) {
            window.alert("Autocomplete's returned place contains no geometry");
            return;
          }
          expandViewportToFitPlace(map, place);

          // If the place has a geometry, store its place ID and route if we have
          // the other place ID
          origin_place_id = place.place_id;
          //route(origin_place_id, destination_place_id, travel_mode,directionsService, directionsDisplay);
          route(origin_place_id, travel_mode,directionsService, directionsDisplay);
        });
		
        destination_autocomplete.addListener('place_changed', function() {
          var place = destination_autocomplete.getPlace();
          if (!place.geometry) {
            window.alert("Autocomplete's returned place contains no geometry");
            return;
          }
          expandViewportToFitPlace(map, place);
		
          // If the place has a geometry, store its place ID and route if we have
          // the other place ID
          destination_place_id = place.place_id;
          //route(origin_place_id, destination_place_id, travel_mode,directionsService, directionsDisplay);
          route(origin_place_id, travel_mode,directionsService, directionsDisplay);
        });

        function route(origin_place_id, travel_mode,
                       directionsService, directionsDisplay) {
          if (!origin_place_id) {
            return;
          }
		  var end = new google.maps.LatLng(<?php echo $destinationLat; ?>,<?php echo $destinationLng; ?>);
          directionsService.route({
            origin: {'placeId': origin_place_id},
            destination: end,
            travelMode: travel_mode
          }, function(response, status) {
            if (status === google.maps.DirectionsStatus.OK) {
              directionsDisplay.setDirections(response);
			  rightpanel.style.display = "block";
            } else {
              window.alert('Directions request failed due to ' + status);
            }
          });
        }
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByuSWnZVwYdM3glA1chO-NuY1z6qz-zBQ&libraries=places&callback=initMap" async defer></script>
