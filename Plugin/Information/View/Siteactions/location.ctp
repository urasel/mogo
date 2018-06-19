<?php
	  $stringlength = strlen($place['PlaceType']['seo_name']);
	  $newID = $stringlength.$place['PlaceType']['id'];
	  $className = ucfirst($place['PlaceType']['singlename']);
	  $currentLng = $this->Session->read('Config.language');
	  
		if($language == 'bn' && !empty($place[$className]['bn_name'])){
			$name = $place[$className]['bn_name'];
			$title = $place[$className]['bn_name'];
		}else{
			$name = $place[$className]['name'];
			$title = $place[$className]['name'];
		}
		if($language == 'bn' && !empty($place[$className]['bn_address'])){
			$address = $place[$className]['bn_address'];
		}else{
			$address = $place[$className]['address'];
		}
	  
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
	  $this->Html->addCrumb($place['Point']['name'].' details fact' ,  '' , array('class' => 'active'));
	  $language = $this->Session->read('Config.language');
	  //debug($place);
?>

<div class="container">
		<div class="row placeview">
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
		<style>
		#map img{
			width:100%;
		}
		</style>
		<div class="col-md-8">
		<div class="left_part">
			<div class="row">
				<div class="col-sm-12 col-xs-12 col-md-12">
				<div class="viewcaticon">
				<?php
				if(!empty($place[$className]['logo'])){
				echo $this->Html->image('institutes/logo/small/'.$place[$className]['logo']);
				}else{
				$icon = $place['PlaceType']['icon'];
				echo "<i class='$icon'></i>";
				}
				?>
				</div>
				</div>
				<div class="col-sm-12 col-xs-12 col-md-12 posttitleblock">
					<?php
					$userData = $this->Session->read('Auth.User');
					//debug($userData);
					if(isset($userData['Role']['alias']) && $userData['Role']['alias'] == 'admin'){
						$adminLink = $this->Html->link('Edit',array('admin'=>true,'plugin' =>'information','controller' =>'points','action' => $place['PlaceType']['singlename'].'edit',$place['Point']['id']),array('target' => '_blank'));
					}else{
						$adminLink = '';
					}
					
					echo '<h1>'.$title.'<span class="admin_edit_link">'.$adminLink.'</span></h1>'; 
					?>
					<?php 
					if(!empty($address)){
						echo '<div class="col-sm-12 col-md-12 col-xs-12 zeropadding"><p>'.$address.'</p></div>'; 
					}else{
						echo '<div class="col-sm-12 col-md-12 col-xs-12 zeropadding"><p>'.$place['BdThanas']['name'].', '.$place['BdDivision']['name'].','.$place['Country']['name'].' '.'</p></div>'; 
					}
					?>
				
				</div>
			</div>
			<?php 
			echo $this->element('social_info_part');
			$imageClass = $className.'Image';
			echo $this->element('image_slider',array('title'=> $title,'className' => $className,'place' => $place,'imagefolder' => 'locations'));
			 
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
				echo '<div class="col-xs-12 col-md-4 addrtitle"><i class="fa fa-taxi"></i><span>'.__('Address').'</span></div>';
				echo '<div class="col-xs-12 col-md-8"><b>'.__('Postal Address').':</b><br/>';
				echo '<h2 style="font-size:18px">'.$place[$className]['name'].'</h2>';
				echo $address.$place['Country']['name'];
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
				$placeName = $place['Point']['name'];
				$country = $place['Country']['name'];
				echo "Welcome to the $placeName information page. You can view here the full area map of $placeName. $placeName lies in $address  $country and its geographical coordinates are $latDegree, $lngDegree";
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
		</div>
		
		<div class="col-md-4">
			<?php
			echo $this->element('points-right-part', array('title' => $title,'nearbies' => $nearbies,'place' => $place,'className' => $className));

			?>
			
		</div>
		
	</div>	
	
</div>
<?php
		echo $this->element('nearby-items', array('nearbies' => $nearbies,'place' => $place,'className' => $className));

?>

