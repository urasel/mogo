<?php
	echo '<div class="panel panel-info" style="margin-top:0px;">';
	echo '<div class="panel-heading"><h4 class="panel-title">';
	echo __('%s in Map',$title);
	echo '</h4></div>';
	echo '<div class="panel-body">';
	echo '<div id="map" style="width: auto; height:auto">';
	$className = 'Point';
	$currentLng = $this->Session->read('Config.language');
	$lat = $place[$className]['lat'];
	$lng = $place[$className]['lng'];
	$icon = 'mm_20_blue.png';
	$slug = $place['Point']['seo_name'];
	$stringlength = strlen($place['Point']['seo_name']);
	$newID = $stringlength.$place['Point']['id'];
	$filePath = WWW_ROOT.'img'.DS.'placemaps/'.$place['Point']['map'];
	//debug(file_exists($filePath));exit;
	/*
	if(!empty($place['Point']['map']) && file_exists($filePath)){
		$mapsize = filesize($filePath);
		if($mapsize > 6000){
			$link = 'placemaps/'.$place['Point']['map'];
			echo $this->Html->image($link);
		}else{
			$iconPath = 'http://www.infomap24.com/indicator32.png';
			$url = "http://maps.googleapis.com/maps/api/staticmap?center=$lat,$lng&zoom=14&size=400x300&markers=icon:$iconPath|$lat,$lng&style=feature:administrative|element:labels.text.fill|color:#ff0000&style=feature:landscape|element:all|color:#f2f2f2&style=feature:poi|element:all|visibility:off&style=feature:road|element:all|saturation:-100|lightness:45&style=feature:road.highway|element:all|visibility:simplified&style=feature:road.arterial|element:labels.icon|visibility:off&style=feature:transit|element:all|visibility:off&style=feature:water|element:all|color:#46bcec|visibility:on&sensor=false";
			echo $this->Html->image($url);
			$this->requestAction(array('plugin'=>'information','controller' =>'siteactions','action' =>'savemapimage','id'=>$newID,'lat' =>$lat,'lng'=>$lng,'icon' =>$icon,'slug' => $slug));
		}
		
	}else{
		$iconPath = 'http://www.infomap24.com/indicator32.png';
		$url = "http://maps.googleapis.com/maps/api/staticmap?center=$lat,$lng&zoom=14&size=400x300&markers=icon:$iconPath|$lat,$lng&style=feature:administrative|element:labels.text.fill|color:#ff0000&style=feature:landscape|element:all|color:#f2f2f2&style=feature:poi|element:all|visibility:off&style=feature:road|element:all|saturation:-100|lightness:45&style=feature:road.highway|element:all|visibility:simplified&style=feature:road.arterial|element:labels.icon|visibility:off&style=feature:transit|element:all|visibility:off&style=feature:water|element:all|color:#46bcec|visibility:on&sensor=false";
		echo $this->Html->image($url);
		$this->requestAction(array('plugin'=>'information','controller' =>'siteactions','action' =>'savemapimage','id'=>$newID,'lat' =>$lat,'lng'=>$lng,'icon' =>$icon,'slug' => $slug));
	}
	
	*/
	
	$iconPath = 'http://www.infomap24.com/indicator32.png';
	$url = "http://maps.googleapis.com/maps/api/staticmap?center=$lat,$lng&zoom=14&size=400x300&markers=icon:$iconPath|$lat,$lng&style=feature:administrative|element:labels.text.fill|color:#ff0000&style=feature:landscape|element:all|color:#f2f2f2&style=feature:poi|element:all|visibility:off&style=feature:road|element:all|saturation:-100|lightness:45&style=feature:road.highway|element:all|visibility:simplified&style=feature:road.arterial|element:labels.icon|visibility:off&style=feature:transit|element:all|visibility:off&style=feature:water|element:all|color:#46bcec|visibility:on&sensor=false";
	echo $this->Html->image($url);
	
	
	
	echo '<div class="row  margintop10px">';
	echo '<div class="col-md-6 col-sm-6 col-xs-6">';
	echo $this->Html->link(__('<i class="fa fa-map" aria-hidden="true"></i>
View Map'), array('plugin'=>'information','controller'=>'siteactions','action'=>'map','category'=>$place['PlaceType']['seo_name'],'point'=> $place['Point']['seo_name'],'language' =>$currentLng,'id'=> $newID,'ext' => 'asp'),array('escape'=>false,'alt' =>$title,'class'=>'viewplacemap','target' => '_blank'));
	echo '</div>';
	echo '<div class="col-md-6 col-sm-6 col-xs-6 text-right">';
	echo $this->Html->link(__('<i class="fa fa-map-signs" aria-hidden="true"></i>
Direction'), array('plugin'=>'information','controller'=>'siteactions','action'=>'mappath','point'=> $place['Point']['seo_name'],'class'=>$place['PlaceType']['singlename'],'language' =>$currentLng,'id'=> $newID,'ext' => 'asp'),array('escape'=>false,'alt' =>$title,'class'=>'viewplacedirection','target' => '_blank'));
	echo '</div>';
	echo '</div>';
	
	echo '</div>';
	echo '</div>';
	echo '</div>';
?>