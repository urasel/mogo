<?php
//debug($place);
//debug($nearbies);exit;
	  $language = $this->Session->read('Config.language');
	  $currentLng = $this->Session->read('Config.language');
	  $stringlength = strlen($place['PlaceType']['seo_name']);
	  $newID = $stringlength.$place['PlaceType']['id'];
	  $className = ucfirst($place['PlaceType']['singlename']);
	 
	  /* Field Select Language Wise End */
      $this->Html->addCrumb(__('World'), array('plugin'=>'information','controller' => 'siteactions', 'action' => 'world','language' => $currentLng)) ;
	  if($passCountryName == ''){
		  $this->Html->addCrumb(__('All'), array('plugin'=>'information','controller' => 'siteactions', 'action' => 'sitemap','language' => $currentLng)) ;
	  }else{
		  $this->Html->addCrumb($passCountryName, array('plugin'=>'information','controller' => 'siteactions', 'action' => 'sitemap','language' => $currentLng,'?' => array('country' => $queryCountry))) ;
	  }
      $breadcumpArray = array_reverse($breadcumpArray);
	  //debug($breadcumpArray);exit;
	  foreach($breadcumpArray as $breadcumb){
			//debug($breadcumb);exit;
			 $stringlength = strlen($breadcumb['PlaceType']['seo_name']);
			$newID = $stringlength.$breadcumb['PlaceType']['id'];
			if($breadcumb['hasChild'] == true){
				$this->Html->addCrumb($breadcumb['PlaceType']['name'],array('plugin'=>'information','controller' => 'siteactions','action'=>'subcategories','country'=>$queryCountry,'category'=>$breadcumb['PlaceType']['seo_name'],'id'=> $newID,'language'=>$currentLng,'page'=>1,'ext' => 'asp') ,array('alt' =>$breadcumb['PlaceType']['name']));
			}else{
				$this->Html->addCrumb($breadcumb['PlaceType']['name'],array('plugin'=>'information','controller' => 'siteactions','action'=>'categories','country'=>$queryCountry,'category'=>$breadcumb['PlaceType']['seo_name'],'id'=> $newID,'language'=>$currentLng,'page'=>1,'ext' => 'asp') ,array('alt' =>$breadcumb['PlaceType']['name']));
			}
			
		  
	  }
	  if($currentLng == 'bn' && !empty($place[$className]['bn_name'])){
		$name = $place[$className]['bn_name'];
		}else{
			$name = $place[$className]['name'];
		}
	  
	  $this->Html->addCrumb($title_for_layout,  '' , array('class' => 'active'));
	  
	  
	  ?>

<script type="text/javascript">
var map;
function initMap() {
	var myLatLng = {lat: <?php echo $place['Point']['lat']; ?>, lng: <?php echo $place['Point']['lng']; ?>};
	map = new google.maps.Map(document.getElementById('map'), {
	  center: myLatLng,
	  zoom: 17
	});
	var marker = new google.maps.Marker({
	  position: myLatLng,
	  map: map,
	  title: '<?php echo $name; ?>'
	});
}

</script>
<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByuSWnZVwYdM3glA1chO-NuY1z6qz-zBQ&callback=initMap"  type="text/javascript"></script>-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyByuSWnZVwYdM3glA1chO-NuY1z6qz-zBQ&libraries=places&callback=initMap" async defer></script>

<div class="container">
<div class="row placeview">
<div class="col-md-8">
			<?php echo '<div class="row"><div class="col-md-12">'; ?>
			<div class="col-md-12 zeropadding posttitleblock">
			<div class="col-sm-1 col-xs-2 col-md-1 zeropadding hidden-xs">
			<div class="viewcaticon">
			<?php
			if(!empty($place[$className]['image'])){
			echo $this->Html->image('places/logo/small/'.$place[$className]['image']);
			}else{
			$icon = $place['PlaceType']['icon'];
			echo "<i class='$icon'></i>";
			}
			?>
			</div>
			</div>
			<div class="col-sm-11 col-xs-12 col-md-11 zeropadding">
			<?php 
			
			if($place['Point']['place_type_id'] == 102){
			$placeName = $name.__(' distance and direction in map');
			$placeAddress = $place['Point']['address'];
			}else if($place['Point']['place_type_id'] == 103){
			$placeName = $name.__(' distance and direction in map');
			$placeAddress = $place['Point']['address'];
			}else if($place['PlaceType']['singlename'] == 'institute'){
			$placeName = $name.__(' distance and direction in map');
			$placeAddress = $place['Point']['address'];
			}else if($place['PlaceType']['singlename'] == 'place'){
			$placeName = $name.__(' distance and direction in map');
			$placeAddress = $place['Point']['address'];
			}else if($place['PlaceType']['singlename'] == 'stadium'){
			$placeName = $name.__(' distance and direction in map');
			$placeAddress = $place['Point']['address'];
			}else if($place['PlaceType']['singlename'] == 'hospital'){
			$placeName = $name.__(' distance and direction in map');
			$placeAddress = $place['Hospital']['address'];
			}else{
			$placeName = $name;
			$placeAddress = $place['BdThanas']['name'].', '.$place['BdDivision']['name'].','.$place['Country']['name'].' ';
			}
			
			//echo '<div class="col-sm-12 col-md-12 col-xs-12 zeropadding"><h1>'.$placeName.'</h1></div>'; 
			echo '<h2>'.$placeName.'</h2>'; 
			echo '<div class="col-sm-12 col-md-12 col-xs-12 zeropadding"><p>'.$placeAddress.'</p></div></div>'; 
			
			?>
			
			</div>
			</div>
			</div>
			<div class="row">
			<div class="col-md-12">
			<div class="col-md-12">
			<div class="row" id="social-block- zeropadding">
			<div class="col-md-12 col-sm-12 col-xs-12 zeropadding">
			<div class="fb-like" data-href="<?php echo 'http://www.infomap24.com/'.$this->params->url;?>" data-width="300" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true" style="float:left;"></div>
			</div>
			
			</div>
			</div>
			<?php 
			if(!empty($place[$className]['facilitydata']) || !empty($place[$className]['extrafacilitydata'])){
			echo '<div class="row">';
				echo '<div class="col-md-12">';
				echo '<div class="panel panel-info">';
				echo '<div class="panel-heading">Features of '.$name.'</div>';
				echo '<div class="panel-body">';
				
					if(!empty($place[$className]['facilitydata'])){
						echo '<div class="col-md-12 lower"><b>Life Style</b></div>';
						echo '<div class="col-md-12">';
							echo $place[$className]['facilitydata'];
						echo '</div>';
					}
					if(!empty($place[$className]['extrafacilitydata'])){
						echo '<div class="col-md-12 lower"><b>Features</b></div>';
						echo '<div class="col-md-12">';
							echo $place[$className]['extrafacilitydata'];
						echo '</div>';
					}
				echo '</div></div>';
				echo '</div>';
				
			echo '</div>';
			}
			?>
			<?php 
			echo '<div class="row">';
				echo '<br/><div class="col-md-12">';
				echo '<div class="panel panel-info" style="margin-top:0px;">';
				echo '<div class="panel-heading">';
				echo __('%s in Map',$name);
				echo '</div>';
				echo '<div class="panel-body">';
				echo '<div id="map" style="width: auto; height: 400px"></div>';
				echo '</div>';
				echo '</div>';
				echo '</div>';
				
			echo '</div>';
			echo $this->element('content-section-ten');
			?>
			
		</div>
		
		</div>	
	
</div>
<div class="col-md-4">
			
</div>
<div class="col-md-12">
	<?php
			echo $this->element('nearby-items', array('nearbies' => $nearbies,'place' => $place,'className' => $className));

	?>

</div>
</div>
</div>

