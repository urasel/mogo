<?php
	  $stringlength = strlen($place['PlaceType']['seo_name']);
	  $newID = $stringlength.$place['PlaceType']['id'];
	  $currentLng = $this->Session->read('Config.language');
	  $className = ucfirst($place['PlaceType']['singlename']);
	  /* Field Select Language Wise Start */
		if($currentLng == 'bn' && !empty($place[$className]['bn_name'])){
			$title = $place[$className]['bn_name'];
		}else{
			$title = $place[$className]['name'];
		}
		if($currentLng == 'bn' && !empty($place[$className]['bn_address'])){
			$address = $place[$className]['bn_address'];
		}else{
			$address = $place[$className]['address'];
		}
		if($currentLng == 'bn' && !empty($place[$className]['bn_details'])){
			$details = $place[$className]['bn_details'];
		}else{
			$details = $place[$className]['details'];
		}
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
				$this->Html->addCrumb($breadcumb['PlaceType']['name'],array('plugin'=>'information','controller' => 'siteactions','action'=>'subcategories','country'=>$queryCountry,'category'=>$breadcumb['PlaceType']['seo_name'],'id'=> $newID,'language'=>$currentLng,'ext' => 'asp') ,array('alt' =>$breadcumb['PlaceType']['name']));
			}else{
				$this->Html->addCrumb($breadcumb['PlaceType']['name'],array('plugin'=>'information','controller' => 'siteactions','action'=>'categories','country'=>$queryCountry,'category'=>$breadcumb['PlaceType']['seo_name'],'id'=> $newID,'page'=>1,'ext' => 'asp') ,array('alt' =>$breadcumb['PlaceType']['name']));
			}
			 
		  
	  }
      //$this->Html->addCrumb($place['PlaceType']['name'],array('plugin'=>'information','controller' => 'siteactions','action'=>'categories','category'=>$place['PlaceType']['seo_name'],'id'=> $newID,'page'=>1,'ext' => 'asp') ,array('alt' =>$place['PlaceType']['name']));
	  
			/*****************************Related Slug Block Start**************************************/
			//debug($place['PlaceTypeSlug']);
			//debug($place);
				foreach($place['PlaceTypeSlug'] as $slug){
						$slugsArray = explode(',',$slug['params']);
						//debug($slug);
						
						if(in_array('country_id',$slugsArray) && !empty($place['Country']['name'])){
							$this->Html->addCrumb(__($slug['title'],$place['Country']['name']), array('controller'=>'siteactions','action'=>'tags','language'=>$currentLng,'institutetype'=>'stadium','country'=>$place['Country']['seo_name'],'seotitle'=>__($slug['seo_title'],$place['Country']['seo_name']),'page' => 1,'id'=> $slug['id'],'ext' => 'asp'),array('alt' =>'','escape'=>false));
						}
						if(in_array('capacity',$slugsArray)){
							$this->Html->addCrumb(__('Stadium of %s whose Capacity is Greater Than %s',$place['Country']['name'],5000), array('controller'=>'siteactions','action'=>'tags','language'=>$currentLng,'institutetype'=>'stadium-capacity-greater-than-5000','country'=>$place['Country']['seo_name'],'division'=>5000,'seotitle'=>__($slug['seo_title'].__('-capacity-greater-than-%s'),$place['Country']['seo_name'],5000),'page' => 1,'id'=> $slug['id'],'ext' => 'asp'),array('alt' =>'','escape'=>false));
							
							$this->Html->addCrumb(__('Stadium of %s whose Capacity is Greater Than %s',$place['Country']['name'],50000), array('controller'=>'siteactions','action'=>'tags','language'=>$currentLng,'institutetype'=>'stadium-capacity-greater-than-50000','country'=>$place['Country']['seo_name'],'division'=>50000,'seotitle'=>__($slug['seo_title'].__('-capacity-greater-than-%s'),$place['Country']['seo_name'],50000),'page' => 1,'id'=> $slug['id'],'ext' => 'asp'),array('alt' =>'','escape'=>false));
							
							$this->Html->addCrumb(__('Stadium of %s whose Capacity is Greater Than %s',$place['Country']['name'],70000), array('controller'=>'siteactions','action'=>'tags','language'=>$currentLng,'institutetype'=>'stadium-capacity-greater-than-70000','country'=>$place['Country']['seo_name'],'division'=>70000,'seotitle'=>__($slug['seo_title'].__('-capacity-greater-than-%s'),$place['Country']['seo_name'],70000),'page' => 1,'id'=> $slug['id'],'ext' => 'asp'),array('alt' =>'','escape'=>false));
						}
					
						
					}
			/*****************************Related Slug Block End**************************************/	
	  
	  $this->Html->addCrumb($place['Point']['name'] ,  '' , array('class' => 'active'));
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
	//debug($place);
	$foldername = $place['PlaceType']['pluralname'];
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
					echo $this->Html->image("$foldername/logo/small/".$place[$className]['logo']);
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
			echo $this->element('image_slider',array('title'=> $title,'className' => $className,'place' => $place,'imagefolder' => 'airports'));
			
			 
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
				//debug($place);
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
				
				if(!empty($place[$className]['tenant_or_use'])){
				echo '<div class="row">';
				echo '<div class="col-xs-6 col-md-4 addrtitle"><i class="fa fa-hand-o-right"></i><span>'.__('Stadium Uses For').'</span></div>';
				echo '<div class="col-xs-6 col-md-8">'.$place[$className]['tenant_or_use'].'</div>';
				echo '</div>';
				}
				if(!empty($place[$className]['capacity'])){
				echo '<div class="row">';
				echo '<div class="col-xs-6 col-md-4 addrtitle"><i class="fa fa-hand-o-right"></i><span>'.__('Stadium Capacity').'</span></div>';
				echo '<div class="col-xs-6 col-md-8">'.$place[$className]['capacity'].'</div>';
				echo '</div>';
				}
				if(!empty($place[$className]['builton'])){
				echo '<div class="row">';
				echo '<div class="col-xs-6 col-md-4 addrtitle"><i class="fa fa-hand-o-right"></i><span>'.__('Stadium Built On').'</span></div>';
				echo '<div class="col-xs-6 col-md-8">'.$place[$className]['builton'].'</div>';
				echo '</div>';
				}
				if(!empty($place[$className]['seats'])){
				echo '<div class="row">';
				echo '<div class="col-xs-6 col-md-4 addrtitle"><i class="fa fa-hand-o-right"></i><span>'.__('Stadium Total Seat').'</span></div>';
				echo '<div class="col-xs-6 col-md-8">'.$place[$className]['seats'].'</div>';
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
				
				$latDegree = $this->Language->degreelat($place['Point']['lat']);
				$lngDegree = $this->Language->degreelng($place['Point']['lng']);
				
				$placename = $place[$className]['name'];
				$tenant_or_use = $place[$className]['tenant_or_use'];
				$placeType = $place['PlaceType']['name'];
				$capacity = $place[$className]['capacity'];
				$seats = $place[$className]['seats'];
				$builton = $place[$className]['builton'];
				$location = $place[$className]['city'];
				$country = $place['Country']['name'];
				
				echo "$placename : $placename is a $placeType listed in $placeType category, it uses for $tenant_or_use. $placename build on ' $builton ' and total capacity is $capacity where the total sits are ' $seats '. $placename is a $placeType of $location, $country and its geographical coordinates are $latDegree, $lngDegree";
				
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

