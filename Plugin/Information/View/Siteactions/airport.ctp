<?php
	  $stringlength = strlen($place['PlaceType']['seo_name']);
	  $newID = $stringlength.$place['PlaceType']['id'];
	  $currentLng = $this->Session->read('Config.language');
	  $className = ucfirst($place['PlaceType']['singlename']);
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
				$this->Html->addCrumb($breadcumb['PlaceType']['name'],array('plugin'=>'information','controller' => 'siteactions','action'=>'subcategories','country'=>$queryCountry,'category'=>$breadcumb['PlaceType']['seo_name'],'id'=> $newID,'language'=>$currentLng,'ext' => 'asp') ,array('alt' =>$breadcumb['PlaceType']['name']));
			}else{
				$this->Html->addCrumb($breadcumb['PlaceType']['name'],array('plugin'=>'information','controller' => 'siteactions','action'=>'categories','country'=>$queryCountry,'category'=>$breadcumb['PlaceType']['seo_name'],'id'=> $newID,'page'=>1,'ext' => 'asp') ,array('alt' =>$breadcumb['PlaceType']['name']));
			}
			 
		  
	  }
     
			/*****************************Related Slug Block Start**************************************/
				foreach($place['PlaceTypeSlug'] as $slug){
						$slugsArray = explode(',',$slug['params']);
						//debug($slug);
						
						if(in_array('place_type_id',$slugsArray) && !empty($place['Country']['name'])){
							$this->Html->addCrumb(__($slug['title'],$place['Country']['name']), array('controller'=>'siteactions','action'=>'tags','language'=>$currentLng,'institutetype'=>$place['Point']['seo_name'],'country'=>$place['Country']['seo_name'],'seotitle'=>__($slug['seo_title'],$place['Country']['seo_name']),'page' => 1,'id'=> $slug['id'],'ext' => 'asp'),array('alt' =>'','escape'=>false));
						}
						if(in_array('place_type_id',$slugsArray) && !empty($place['BdDivision']['name'])){
							$this->Html->addCrumb(__($slug['title'],$place['BdDivision']['name']), array('controller'=>'siteactions','action'=>'tags','language'=>$currentLng,'institutetype'=>$place['Point']['seo_name'],'country'=>$place['Country']['seo_name'],'division'=>$place['BdDivision']['seo_name'],'seotitle'=>__($slug['seo_title'],$place['BdDivision']['seo_name']),'page' => 1,'id'=> $slug['id'],'ext' => 'asp'),array('alt' =>'','escape'=>false));
						}
						if(in_array('place_type_id',$slugsArray) && !empty($place['BdDistrict']['name'])){
							$this->Html->addCrumb(__($slug['title'],$place['BdDistrict']['name']), array('controller'=>'siteactions','action'=>'tags','language'=>$currentLng,'institutetype'=>$place['Point']['seo_name'],'country'=>$place['Country']['seo_name'],'division'=>$place['BdDivision']['seo_name'],'district'=>$place['BdDistrict']['seo_name'],'seotitle'=>__($slug['seo_title'],$place['BdDistrict']['seo_name']),'page' => 1,'id'=> $slug['id'],'ext' => 'asp'),array('alt' =>'','escape'=>false));
						}
						if(in_array('place_type_id',$slugsArray) && !empty($place['BdThanas']['name'])){
							$this->Html->addCrumb(__($slug['title'],$place['BdThanas']['name']), array('controller'=>'siteactions','action'=>'tags','language'=>$currentLng,'institutetype'=>$place['Point']['seo_name'],'country'=>$place['Country']['seo_name'],'division'=>$place['BdDivision']['seo_name'],'district'=>$place['BdDistrict']['seo_name'],'thana'=>$place['BdThanas']['seo_name'],'seotitle'=>__($slug['seo_title'],$place['BdThanas']['seo_name']),'page' => 1,'id'=> $slug['id'],'ext' => 'asp'),array('alt' =>'','escape'=>false));
						}
						
						
						if(in_array('heliport',$slugsArray) && !empty($place['Country']['name'])){
							$this->Html->addCrumb(__($slug['title'],$place['Country']['name']), array('controller'=>'siteactions','action'=>'tags','language'=>$currentLng,'institutetype'=>'heliports','country'=>$place['Country']['seo_name'],'seotitle'=>__($slug['seo_title'],$place['Country']['seo_name']),'page' => 1,'id'=> $slug['id'],'ext' => 'asp'),array('alt' =>'','escape'=>false));
						}
						if(in_array('heliport',$slugsArray) && !empty($place['BdDivision']['name'])){
							$this->Html->addCrumb(__($slug['title'],$place['BdDivision']['name']), array('controller'=>'siteactions','action'=>'tags','language'=>$currentLng,'institutetype'=>'heliports','country'=>$place['Country']['seo_name'],'division'=>$place['BdDivision']['seo_name'],'seotitle'=>__($slug['seo_title'],$place['BdDivision']['seo_name']),'page' => 1,'id'=> $slug['id'],'ext' => 'asp'),array('alt' =>'','escape'=>false));
						}
						if(in_array('heliport',$slugsArray) && !empty($place['BdDistrict']['name'])){
							$this->Html->addCrumb(__($slug['title'],$place['BdDistrict']['name']), array('controller'=>'siteactions','action'=>'tags','language'=>$currentLng,'institutetype'=>'heliports','country'=>$place['Country']['seo_name'],'division'=>$place['BdDivision']['seo_name'],'district'=>$place['BdDistrict']['seo_name'],'seotitle'=>__($slug['seo_title'],$place['BdDistrict']['seo_name']),'page' => 1,'id'=> $slug['id'],'ext' => 'asp'),array('alt' =>'','escape'=>false));
						}
						if(in_array('heliport',$slugsArray) && !empty($place['BdThanas']['name'])){
							$this->Html->addCrumb(__($slug['title'],$place['BdThanas']['name']), array('controller'=>'siteactions','action'=>'tags','language'=>$currentLng,'institutetype'=>'heliports','country'=>$place['Country']['seo_name'],'division'=>$place['BdDivision']['seo_name'],'district'=>$place['BdDistrict']['seo_name'],'thana'=>$place['BdThanas']['seo_name'],'seotitle'=>__($slug['seo_title'],$place['BdThanas']['seo_name']),'page' => 1,'id'=> $slug['id'],'ext' => 'asp'),array('alt' =>'','escape'=>false));
						}
						
						if(in_array('sea_plane_base',$slugsArray) && !empty($place['Country']['name'])){
							$this->Html->addCrumb(__($slug['title'],$place['Country']['name']), array('controller'=>'siteactions','action'=>'tags','language'=>$currentLng,'institutetype'=>'sea_plane_base','country'=>$place['Country']['seo_name'],'seotitle'=>__($slug['seo_title'],$place['Country']['seo_name']),'page' => 1,'id'=> $slug['id'],'ext' => 'asp'),array('alt' =>'','escape'=>false));
						}
						if(in_array('sea_plane_base',$slugsArray) && !empty($place['BdDivision']['name'])){
							$this->Html->addCrumb(__($slug['title'],$place['BdDivision']['name']), array('controller'=>'siteactions','action'=>'tags','language'=>$currentLng,'institutetype'=>'sea_plane_base','country'=>$place['Country']['seo_name'],'division'=>$place['BdDivision']['seo_name'],'seotitle'=>__($slug['seo_title'],$place['BdDivision']['seo_name']),'page' => 1,'id'=> $slug['id'],'ext' => 'asp'),array('alt' =>'','escape'=>false));
						}
						if(in_array('sea_plane_base',$slugsArray) && !empty($place['BdDistrict']['name'])){
							$this->Html->addCrumb(__($slug['title'],$place['BdDistrict']['name']), array('controller'=>'siteactions','action'=>'tags','language'=>$currentLng,'institutetype'=>'sea_plane_base','country'=>$place['Country']['seo_name'],'division'=>$place['BdDivision']['seo_name'],'district'=>$place['BdDistrict']['seo_name'],'seotitle'=>__($slug['seo_title'],$place['BdDistrict']['seo_name']),'page' => 1,'id'=> $slug['id'],'ext' => 'asp'),array('alt' =>'','escape'=>false));
						}
						if(in_array('sea_plane_base',$slugsArray) && !empty($place['BdThanas']['name'])){
							$this->Html->addCrumb(__($slug['title'],$place['BdThanas']['name']), array('controller'=>'siteactions','action'=>'tags','language'=>$currentLng,'institutetype'=>'sea_plane_base','country'=>$place['Country']['seo_name'],'division'=>$place['BdDivision']['seo_name'],'district'=>$place['BdDistrict']['seo_name'],'thana'=>$place['BdThanas']['seo_name'],'seotitle'=>__($slug['seo_title'],$place['BdThanas']['seo_name']),'page' => 1,'id'=> $slug['id'],'ext' => 'asp'),array('alt' =>'','escape'=>false));
						}
						
						if(in_array('largest_airport',$slugsArray) && !empty($place['Country']['name'])){
							$this->Html->addCrumb(__($slug['title'],$place['Country']['name']), array('controller'=>'siteactions','action'=>'tags','language'=>$currentLng,'institutetype'=>'largest_airport','country'=>$place['Country']['seo_name'],'seotitle'=>__($slug['seo_title'],$place['Country']['seo_name']),'page' => 1,'id'=> $slug['id'],'ext' => 'asp'),array('alt' =>'','escape'=>false));
						}
						if(in_array('largest_airport',$slugsArray) && !empty($place['BdDivision']['name'])){
							$this->Html->addCrumb(__($slug['title'],$place['BdDivision']['name']), array('controller'=>'siteactions','action'=>'tags','language'=>$currentLng,'institutetype'=>'largest_airport','country'=>$place['Country']['seo_name'],'division'=>$place['BdDivision']['seo_name'],'seotitle'=>__($slug['seo_title'],$place['BdDivision']['seo_name']),'page' => 1,'id'=> $slug['id'],'ext' => 'asp'),array('alt' =>'','escape'=>false));
						}
						if(in_array('largest_airport',$slugsArray) && !empty($place['BdDistrict']['name'])){
							$this->Html->addCrumb(__($slug['title'],$place['BdDistrict']['name']), array('controller'=>'siteactions','action'=>'tags','language'=>$currentLng,'institutetype'=>'largest_airport','country'=>$place['Country']['seo_name'],'division'=>$place['BdDivision']['seo_name'],'district'=>$place['BdDistrict']['seo_name'],'seotitle'=>__($slug['seo_title'],$place['BdDistrict']['seo_name']),'page' => 1,'id'=> $slug['id'],'ext' => 'asp'),array('alt' =>'','escape'=>false));
						}
						if(in_array('largest_airport',$slugsArray) && !empty($place['BdThanas']['name'])){
							$this->Html->addCrumb(__($slug['title'],$place['BdThanas']['name']), array('controller'=>'siteactions','action'=>'tags','language'=>$currentLng,'institutetype'=>'largest_airport','country'=>$place['Country']['seo_name'],'division'=>$place['BdDivision']['seo_name'],'district'=>$place['BdDistrict']['seo_name'],'thana'=>$place['BdThanas']['seo_name'],'seotitle'=>__($slug['seo_title'],$place['BdThanas']['seo_name']),'page' => 1,'id'=> $slug['id'],'ext' => 'asp'),array('alt' =>'','escape'=>false));
						}
						
						
						
						
						
					}
			/*****************************Related Slug Block End**************************************/
			
	  $this->Html->addCrumb($place['Point']['name'] ,  '' , array('class' => 'active'));
	  $language = $this->Session->read('Config.language');
	  $foldername = $place['PlaceType']['pluralname'];
	  //debug($place);
	  
?>

<div class="place view">
<?php
	if($language == 'bn'){
		$this->loadHelpers(array('Language'));
		$lat = $this->Language->banglanumber($place[$className]['lat']);
		$lng = $this->Language->banglanumber($place[$className]['lng']);
		$mobile = '';
	}else{
		$lat = $place['Point']['lat'];
		$lng = $place['Point']['lng'];
		$mobile = '';
	}
?>
	<div class="row placeview">
		<style>
		#map img{
			width:100%;
		}
		</style>
		<div class="col-md-8 col-md-push-4">
			<?php echo '<div class="row"><div class="col-md-12">'; ?>
			<div class="col-md-12 posttitleblock">
			<div class="col-sm-1 col-xs-2 col-md-1" style="padding:0px;">
			<div class="viewcaticon">
			<?php
			if(!empty($place[$className]['logo'])){
			echo $this->Html->image("$foldername/logo/small/".$place[$className]['logo']);
			}else{
			$icon = $place['PlaceType']['icon'];
			echo "<i class='$icon'></i>";
			}
			?>
			</div>
			</div>
			<div class="col-sm-11 col-xs-10 col-md-11">
			<?php
			$userData = $this->Session->read('Auth.User');
			//debug($userData);
			if(isset($userData['Role']['alias']) && $userData['Role']['alias'] == 'admin'){
				$adminLink = $this->Html->link('Edit',array('admin'=>true,'plugin' =>'information','controller' =>'points','action' => $place['PlaceType']['singlename'].'edit',$place['Point']['id']),array('target' => '_blank'));
			}else{
				$adminLink = '';
			}
			
			echo '<div class="col-sm-12 col-md-12 col-xs-12 zeropadding"><h1 class="posttitle">'.$place['Point']['name'].'<span class="admin_edit_link">'.$adminLink.'</span></h1></div>'; 
			?>
			<?php 
			//debug($place);
			echo $place['Point']['address'];
			$stringlength = strlen($place['Country']['seo_title']);
			$newID = $stringlength.$place['Country']['id'];
			echo ', '.$this->Html->link($place['Country']['name'], array('plugin'=>'information','controller' => 'siteactions','action'=>'country_details','category'=>$place['Country']['seo_name'],'title'=>$place['Country']['seo_title'],'id'=> $newID,'language'=>$currentLng,'ext' => 'asp'),array('alt' =>$place['Country']['name']));
			//echo '<div class="col-sm-12 col-md-12 col-xs-12 zeropadding"><p>'.$place['BdThanas']['name'].', '.$place['BdDivision']['name'].','.$place['Country']['name'].' '.'</p></div>'; 
			echo '</div>';
			?>
			
			</div>
			</div>
			</div>
			<?php 
			echo $this->element('social_info_part');
			$imageClass = $className.'Image';
			if(is_array($place[$imageClass]) && sizeof($place[$imageClass]) > 0){
				echo '<div class="row">';
				echo '<div class="col-md-12">';
				echo '<div class="panel panel-info">';
				echo '<div class="panel-heading">'.__('Pictures of %s',$place[$className]['name']).'</div>';
				echo '<div class="panel-body" style="padding:0 15px">';
				echo '<div class="row">';
				$totalImage = sizeof($place[$imageClass]);
				$placename = $place[$className]['name'];
				$folderName = $place['PlaceType']['pluralname'];
				if($totalImage > 1){
				echo '<div id="slideShowDiv">';
				echo $this->element('jssorplaceslider',array("placeimage" => $place[$imageClass],'placename' => $placename,'foldername' =>$folderName));
				echo '</div>';
				echo '<div id="singleImageDiv">';
				$imglink = "$folderName/photogallery/".$place[$imageClass][0]['file'];
				echo $this->Html->image($imglink,array('alt'=>"$placename Snapshot"));
				echo '</div>';
				}else{
				$imglink = "$folderName/photogallery/".$place[$imageClass][0]['file'];
				echo $this->Html->image($imglink,array('alt'=>"$placename Snapshot",'class' =>'img-responsive'));
				}
				echo '</div>';
				echo '</div>';
				echo '</div>';
				echo '</div>';
				echo '</div>';
			}
			
			 
			if(!empty($place[$className]['facilitydata']) || !empty($place[$className]['extrafacilitydata'])){
			echo '<div class="row">';
				echo '<div class="col-md-12">';
				echo '<div class="panel panel-info">';
				echo '<div class="panel-heading">Features of '.$place['Point']['name'].'</div>';
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
				echo '<div class="col-md-12">';
				echo '<div class="panel panel-info">';
				echo '<div class="panel-heading">'.__('Location Details of %s',$place['Point']['name']).'</div>';
				echo '<div class="panel-body aboutPlace">';
				echo '<div class="row">';
				echo '<div class="col-xs-6 col-md-4 addrtitle"><i class="fa fa-tags"></i><span>'.__('Place Type').'</span></div>';
				echo '<div class="col-xs-6 col-md-8">'.$place['PlaceType']['name'].'</div>';
				echo '</div>';
				echo '<div class="row">';
				echo '<div class="col-xs-6 col-md-4 addrtitle"><i class="fa fa-tags"></i><span>'.__('Country').'</span></div>';
				$stringlength = strlen($place['Country']['seo_title']);
				$newID = $stringlength.$place['Country']['id'];
				echo '<div class="col-xs-6 col-md-8">'.$this->Html->link($place['Country']['name'], array('plugin'=>'information','controller' => 'siteactions','action'=>'country_details','category'=>$place['Country']['seo_name'],'title'=>$place['Country']['seo_title'],'id'=> $newID,'language'=>$currentLng,'ext' => 'asp'),array('alt' =>$place['Country']['name'])).'</div>';
				echo '</div>';
				echo '<div class="row">';
				echo '<div class="col-xs-12 col-md-4 addrtitle"><i class="fa fa-taxi"></i><span>'.__('Address').'</span></div>';
				echo '<div class="col-xs-12 col-md-8"><b>'.__('Postal Address').':</b><br/>';
				echo '<h2 style="font-size:18px">'.$place[$className]['name'].'</h2>';
				echo $place['Point']['address'];
				//echo $place[$className]['address'].'<br/>'.$place['BdThanas']['name'].','.$place['BdDistrict']['name'].','.$place['BdDivision']['name'].','.$place['Country']['name'];
				echo '</div>';
				echo '</div>';
				echo '<div class="row">';
				echo '<div class="col-xs-6 col-md-4 addrtitle"><i class="fa fa-dot-circle-o"></i><span>'.__('Latitute').'</span></div>';
				echo '<div class="col-xs-6 col-md-8">'.$lat.'</div>';
				echo '</div>';
				echo '<div class="row">';
				echo '<div class="col-xs-6 col-md-4 addrtitle"><i class="fa fa-dot-circle-o"></i><span>'.__('Longitute').'</span></div>';
				echo '<div class="col-xs-6 col-md-8">'.$lng.'</div>';
				echo '</div>';
				//debug($place[$className]);
				if(!empty($place[$className]['scheduled_service'])){
				echo '<div class="row">';
				echo '<div class="col-xs-6 col-md-4 addrtitle"><i class="fa fa-hand-o-right"></i><span>'.__('Scheduled Service').'</span></div>';
				echo '<div class="col-xs-6 col-md-8">'.($place[$className]['scheduled_service'] == true ?'Yes':'No').'</div>';
				echo '</div>';
				}
				if(!empty($place[$className]['gps_code'])){
				echo '<div class="row">';
				echo '<div class="col-xs-6 col-md-4 addrtitle"><i class="fa fa-hand-o-right"></i><span>'.__('GPS Code').'</span></div>';
				echo '<div class="col-xs-6 col-md-8">'.$place[$className]['gps_code'].'</div>';
				echo '</div>';
				}
				if(!empty($place[$className]['elevation_ft'])){
				echo '<div class="row">';
				echo '<div class="col-xs-6 col-md-4 addrtitle"><i class="fa fa-hand-o-right"></i><span>'.__('Elevation Ft').'</span></div>';
				echo '<div class="col-xs-6 col-md-8">'.$place[$className]['elevation_ft'].'</div>';
				echo '</div>';
				}
				if(!empty($place[$className]['iata_code'])){
				echo '<div class="row">';
				echo '<div class="col-xs-6 col-md-4 addrtitle"><i class="fa fa-hand-o-right"></i><span>'.__('IATA Code').'</span></div>';
				echo '<div class="col-xs-6 col-md-8">'.$place[$className]['iata_code'].'</div>';
				echo '</div>';
				}
				if(!empty($place[$className]['local_code'])){
				echo '<div class="row">';
				echo '<div class="col-xs-6 col-md-4 addrtitle"><i class="fa fa-hand-o-right"></i><span>'.__('IATA Code').'</span></div>';
				echo '<div class="col-xs-6 col-md-8">'.$place[$className]['local_code'].'</div>';
				echo '</div>';
				}
				echo '</div>';
				echo '</div>';
				
				echo '</div>';
			echo '</div>';
			
			echo '<div class="row">';
				echo '<div class="col-md-12">';
				echo '<div class="panel panel-info">';
				echo '<div class="panel-heading">'.__('General information of %s',$place['Point']['name']).'</div>';
				echo '<div class="panel-body aboutPlace">';
				echo '<p>';
				echo '<div class="row">';
				echo '<div class="col-xs-12 col-md-12">';
				echo '<h3>'.$place[$className]['name'].'</h3>';
				
				$latDegree = $this->Language->degreelat($place[$className]['lat']);
				$lngDegree = $this->Language->degreelng($place[$className]['lng']);
				
				$placename = $place[$className]['name'];
				$placeType = $place['PlaceType']['name'];
				$airportType = $place['AirportType']['name'];
				$iata = $place[$className]['iata_code'];
				$ident = $place[$className]['ident'];
				$location = $place[$className]['municipality'];
				$country = $place['Country']['name'];
				
				//echo "$placename : $placename is a $airportType listed in $placeType category. The International Air Transport Association number of $placename is ' $iata ' and the local code of $placename is ' $ident '. $placename is a $airportType of $location, $country and its geographical coordinates are $latDegree, $lngDegree";
				
				echo $metadescription;
				echo '</div>';
				echo '</div>';
				if(!empty($place[$className]['web'])){
				echo '<div class="row">';
				echo '<div class="col-xs-12 col-md-4 col-sm-4 addrtitle"><i class="fa fa-link"></i><span>'.__('Website').'</span></div>';
				echo '<div class="col-xs-12 col-md-8 col-sm-8"><span class="topicseperator">:</span> '.$place[$className]['web'].'</div>';
				echo '</div>';
				}
				if(!empty($place[$className]['phone'])){
				echo '<div class="row">';
				echo '<div class="col-xs-12 col-md-4 col-sm-4 addrtitle"><i class="fa fa-phone"></i><span>'.__('Mobile').'</span></div>';
				echo '<div class="col-xs-12 col-md-8 col-sm-8"><span class="topicseperator">:</span> '.$mobile.'</div>';
				echo '</div>';
				}
				if(!empty($place[$className]['email'])){
				echo '<div class="row">';
				echo '<div class="col-xs-12 col-md-4 col-sm-4 addrtitle"><i class="fa fa-at"></i><span>'.__('Email').'</span></div>';
				echo '<div class="col-xs-12 col-md-8 col-sm-8"><span class="topicseperator">:</span> '.$place[$className]['email'].'</div>';
				echo '</div>';
				}
				
				
				if(!empty($place[$className]['fax'])){
				echo '<div class="row">';
				echo '<div class="col-xs-12 col-md-4 col-sm-4 addrtitle"><i class="fa fa-fax"></i><span>Fax :</span></div>';
				echo '<div class="col-xs-12 col-md-8 col-sm-8"><span class="topicseperator">:</span> '.$place[$className]['fax'].'</div>';
				echo '</div>';
				}
				if(!empty($place[$className]['hours'])){
				echo '<div class="row">';
				echo '<div class="col-xs-12 col-md-4 col-sm-4 addrtitle"><i class="fa fa-times-circle-o"></i><span>Opening Hours</span></div>';
				echo '<div class="col-xs-12 col-md-8 col-sm-8"><span class="topicseperator">:</span> '.$place[$className]['hours'].'</div>';
				echo '</div>';
				}
				echo '</p>';
				echo '</div>';
				echo '</div>';
				if(!empty($place[$className]['details'])){
				echo '<div class="panel panel-info">';
				echo '<div class="panel-heading">Details of '.$place['Point']['name'].'</div>';
				echo '<div class="panel-body aboutPlace">';
				echo $place[$className]['details'];
				echo '</div>';
				echo '</div>';
				}
				if(!empty($place[$className]['history'])){
				echo '<div class="panel panel-info">';
				echo '<div class="panel-heading">History of '.$place['Point']['name'].'</div>';
				echo '<div class="panel-body aboutPlace">';
				echo $place[$className]['history'];
				echo '</div>';
				echo '</div>';
				}
				echo '</div>';
			echo '</div>';
			$stringlength = strlen($place['Point']['seo_name']);
			$newID = $stringlength.$place['Point']['id'];
			$paramdata = 'a='.$place['PlaceType']['singlename'].'&b='.$place['Point']['seo_name'].'&c='.$newID;
			echo $this->element('content-section-ten',array('paramdata' => $paramdata));
			
			
			?>
			
		</div>
		
		<div class="col-md-4 col-md-pull-8">
			
		</div>
		
		<div class="col-md-4 col-md-pull-8" id="mapdiv">
		
			<?php
			$title = $place['Point']['name'];
			echo $this->element('parts/viewmap', array('title' => $title,'place'=>$place,'className' => $className));
			
			?>
		</div>
		<div id="canvas" style="display:none;"><p>Canvas:</p></div>
		<div style="width:200px; float:left; display:none;" id="image"></div>
		<div class="col-md-4 col-md-pull-8">
			<?php
			echo '';
			echo '<div class="panel panel-info" style="margin-top:0px;">';
			echo '<div class="panel-heading">'.__('Reviews of %s',$place['Point']['name']).' </div>';
			echo '<div class="panel-body">';
			echo '<div style="width: auto; max-height: 300px">'.__('Yet No Review').'</div>';
			echo '</div>';
			echo '</div>';
			
			?>
		</div>
		<div class="col-md-12">
		<?php
				echo $this->element('nearby-items', array('nearbies' => $nearbies,'place' => $place,'className' => $className));
	
		?>
		
		</div>
	</div>	
	
</div>

