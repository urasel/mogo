<?php
	  $stringlength = strlen($place['PlaceType']['seo_name']);
	  $newID = $stringlength.$place['PlaceType']['id'];
	  $className = ucfirst($place['PlaceType']['singlename']);
	  $currentLng = $this->Session->read('Config.language');
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
				$this->Html->addCrumb($breadcumb['PlaceType']['name'],array('plugin'=>'information','controller' => 'siteactions','action'=>'subcategories','category'=>$breadcumb['PlaceType']['seo_name'],'id'=> $newID,'language'=>$currentLng,'ext' => 'asp') ,array('alt' =>$breadcumb['PlaceType']['name']));
			}else{
				$this->Html->addCrumb($breadcumb['PlaceType']['name'],array('plugin'=>'information','controller' => 'siteactions','action'=>'categories','category'=>$breadcumb['PlaceType']['seo_name'],'id'=> $newID,'page'=>1,'ext' => 'asp') ,array('alt' =>$breadcumb['PlaceType']['name']));
			}
			 
		  
	  }
      //$this->Html->addCrumb($place['PlaceType']['name'],array('plugin'=>'information','controller' => 'siteactions','action'=>'categories','category'=>$place['PlaceType']['seo_name'],'id'=> $newID,'page'=>1,'ext' => 'asp') ,array('alt' =>$place['PlaceType']['name']));
	  $this->Html->addCrumb($place['Point']['name'].'' ,  '' , array('class' => 'active'));
	  $language = $this->Session->read('Config.language');
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
		$lat = $place[$className]['lat'];
		$lng = $place[$className]['lng'];
		$mobile = '';
	}
	//debug($place);exit;
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
			
			$icon = $place['PlaceType']['icon'];
			echo "<i class='$icon'></i>";
			
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
			if(!empty($place[$className]['address'])){
				$address = $place[$className]['address'];
			}else{
				if(!empty($place[$className]['area1'])){
				$area1 = $place[$className]['area1'].', ';
				}else{
				$area1 = '';
				}
				if(!empty($place[$className]['area2'])){
				$area2 = $place[$className]['area2'].', ';
				}else{
				$area2 = '';
				}
				if(!empty($place[$className]['area3'])){
				$area3 = $place[$className]['area3'].', ';
				}else{
				$area3 = '';
				}
				$address = $area3.$area2.$area1;
			}
			
			echo '<div class="col-sm-12 col-md-12 col-xs-12 zeropadding"><p>'.$address.' '.'</p></div></div>'; ?>
			
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
				$folderName = $place['PlaceType']['pluralname'];
				$totalImage = sizeof($place[$imageClass]);
				$placename = $place[$className]['name'];
				if($totalImage > 1){
				echo '<div id="slideShowDiv">';
				echo $this->element('jssorplaceslider',array("placeimage" => $place[$imageClass],'placename' => $placename,'foldername' =>'locations'));
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
				echo '<div class="col-xs-6 col-md-4 addrtitle"><i class="fa fa-tags"></i><span>'.__('Business Category').'</span></div>';
				echo '<div class="col-xs-6 col-md-8">'.$place['PlaceType']['name'].'</div>';
				echo '</div>';
				echo '<div class="row">';
				echo '<div class="col-xs-12 col-md-4 addrtitle"><i class="fa fa-taxi"></i><span>'.__('Address').'</span></div>';
				echo '<div class="col-xs-12 col-md-8"><b>'.__('Postal Address').':</b><br/>';
				echo '<h2 class="seoh2title" style="font-size:18px">'.$place[$className]['name'].'</h2>';
				echo $address;
				echo '</div>';
				echo '</div>';
				echo '<div class="row">';
				echo '<div class="col-xs-6 col-md-4 addrtitle"><i class="fa fa-location-arrow"></i><span>'.__('Latitute').'</span></div>';
				echo '<div class="col-xs-6 col-md-8">'.$lat.'</div>';
				echo '</div>';
				echo '<div class="row">';
				echo '<div class="col-xs-6 col-md-4 addrtitle"><i class="fa fa-location-arrow"></i><span>'.__('Longitute').'</span></div>';
				echo '<div class="col-xs-6 col-md-8">'.$lng.'</div>';
				echo '</div>';
				
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
				if(!empty($latDegree) && !empty($lngDegree)){
					 $geoDetails = "and its geographical coordinates are $latDegree, $lngDegree";
				}else{
					 $geoDetails = "";
				}
				
				if(!empty($place[$className]['contact_person'])){
				echo '<div class="row">';
				echo '<div class="col-xs-12 col-md-4 col-sm-4 addrtitle"><i class="fa fa-user"></i><span>'.__('Contract Person').'</span></div>';
				echo '<div class="col-xs-12 col-md-8 col-sm-8"><span class="topicseperator">:</span> '.$place[$className]['contact_person'].'</div>';
				echo '</div>';
				}
				if(!empty($place[$className]['website'])){
				echo '<div class="row">';
				echo '<div class="col-xs-12 col-md-4 col-sm-4 addrtitle"><i class="fa fa-globe"></i><span>'.__('Website').'</span></div>';
				echo '<div class="col-xs-12 col-md-8 col-sm-8"><span class="topicseperator">:</span> '.$place[$className]['website'].'</div>';
				echo '</div>';
				}
				if(!empty($place[$className]['phone'])){
				echo '<div class="row">';
				echo '<div class="col-xs-12 col-md-4 col-sm-4 addrtitle"><i class="fa fa-phone"></i><span>'.__('Phone').'</span></div>';
				echo '<div class="col-xs-12 col-md-8 col-sm-8"><span class="topicseperator">:</span> '.$place[$className]['phone'].'</div>';
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
				
				$placeName = $place['Point']['name'];
				$country = $place['Country']['name'];
				echo "Welcome to the $placeName information page. You can view here the general details of $placeName. $placeName located at $address";
				echo '</div>';
				echo '</div>';
			
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

