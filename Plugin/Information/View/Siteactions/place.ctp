<?php
	$className = 'Place';
	$currentLng = $this->Session->read('Config.language');
	$language = $this->Session->read('Config.language');
	if($language == 'bn'){
		$this->loadHelpers(array('Language'));
		$lat = $this->Language->banglanumber($place['Point']['lat']);
		$lng = $this->Language->banglanumber($place['Point']['lng']);
		$mobile = $this->Language->banglanumber($place[$className]['mobile']);
	}else{
		$lat = $place['Point']['lat'];
		$lng = $place['Point']['lng'];
		$mobile = $place[$className]['mobile'];
	}
	
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

	  $stringlength = strlen($place['PlaceType']['seo_name']);
	  $newID = $stringlength.$place['PlaceType']['id'];
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
				$this->Html->addCrumb($breadcumb['PlaceType']['name'],array('plugin'=>'information','controller' => 'siteactions','action'=>'subcategories','country'=>$queryCountry,'category'=>$breadcumb['PlaceType']['seo_name'],'id'=> $newID,'language'=>$currentLng,'page'=>1,'ext' => 'asp') ,array('alt' =>$breadcumb['PlaceType']['name']));
			}else{
				$this->Html->addCrumb($breadcumb['PlaceType']['name'],array('plugin'=>'information','controller' => 'siteactions','action'=>'categories','country'=>$queryCountry,'category'=>$breadcumb['PlaceType']['seo_name'],'id'=> $newID,'language'=>$currentLng,'page'=>1,'ext' => 'asp') ,array('alt' =>$breadcumb['PlaceType']['name']));
			}
			 
		  
	  }
      //$this->Html->addCrumb($place['PlaceType']['name'],array('plugin'=>'information','controller' => 'siteactions','action'=>'categories','category'=>$place['PlaceType']['seo_name'],'id'=> $newID,'page'=>1,'ext' => 'asp') ,array('alt' =>$place['PlaceType']['name']));
	  
			/*****************************Related Slug Block Start**************************************/
			//debug($place);
			//debug($place['PlaceTypeSlug']);
				foreach($place['PlaceTypeSlug'] as $slug){
						$slugsArray = explode(',',$slug['params']);
						//debug($slug);
						
						if(in_array('place_type_id',$slugsArray) && !empty($place['Country']['name'])){
							$this->Html->addCrumb(__($slug['title'],$place['Country']['name']), array('controller'=>'siteactions','action'=>'tags','language'=>$currentLng,'institutetype'=>$place['PlaceType']['seo_name'],'country'=>$place['Country']['seo_name'],'seotitle'=>__($slug['seo_title'],$place['Country']['seo_name']),'page' => 1,'id'=> $slug['id'],'ext' => 'asp'),array('alt' =>'','escape'=>false));
						}
						if(in_array('place_type_id',$slugsArray) && !empty($place['BdDivision']['name'])){
							$this->Html->addCrumb(__($slug['title'],$place['BdDivision']['name']), array('controller'=>'siteactions','action'=>'tags','language'=>$currentLng,'institutetype'=>$place['PlaceType']['seo_name'],'country'=>$place['Country']['seo_name'],'division'=>$place['BdDivision']['seo_name'],'seotitle'=>__($slug['seo_title'],$place['BdDivision']['seo_name']),'page' => 1,'id'=> $slug['id'],'ext' => 'asp'),array('alt' =>'','escape'=>false));
						}
						if(in_array('place_type_id',$slugsArray) && !empty($place['BdDistrict']['name'])){
							$this->Html->addCrumb(__($slug['title'],$place['BdDistrict']['name']), array('controller'=>'siteactions','action'=>'tags','language'=>$currentLng,'institutetype'=>$place['PlaceType']['seo_name'],'country'=>$place['Country']['seo_name'],'division'=>$place['BdDivision']['seo_name'],'district'=>$place['BdDistrict']['seo_name'],'seotitle'=>__($slug['seo_title'],$place['BdDistrict']['seo_name']),'page' => 1,'id'=> $slug['id'],'ext' => 'asp'),array('alt' =>'','escape'=>false));
						}
						if(in_array('place_type_id',$slugsArray) && !empty($place['BdThanas']['name'])){
							$this->Html->addCrumb(__($slug['title'],$place['BdThanas']['name']), array('controller'=>'siteactions','action'=>'tags','language'=>$currentLng,'institutetype'=>$place['PlaceType']['seo_name'],'country'=>$place['Country']['seo_name'],'division'=>$place['BdDivision']['seo_name'],'district'=>$place['BdDistrict']['seo_name'],'thana'=>$place['BdThanas']['seo_name'],'seotitle'=>__($slug['seo_title'],$place['BdThanas']['seo_name']),'page' => 1,'id'=> $slug['id'],'ext' => 'asp'),array('alt' =>'','escape'=>false));
						}
						
						
						
						
					}
			/*****************************Related Slug Block End**************************************/
	  
	  $this->Html->addCrumb($title ,  '' , array('class' => 'active'));
	  $language = $this->Session->read('Config.language');
	  //debug($place);
?>

<div class="container">
		<div class="row placeview">
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
				echo $this->Html->image("places/logo/small/".$place[$className]['logo']);
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
					
					echo '<h2>'.$title.'<span class="admin_edit_link">'.$adminLink.'</span></h2>'; 
					?>
					<?php 
					if(!empty($address)){
						echo '<div class="col-sm-12 col-md-12 col-xs-12 zeropadding"><p>'.$address.'</p></div>'; 
					}else{
						echo '<div class="col-sm-12 col-md-12 col-xs-12 zeropadding"><p>'.$place['Country']['name'].' '.'</p></div>'; 
					}
					?>
				
				</div>
			</div>
			<?php 
			
			$imageClass = $className.'Image';
			echo $this->element('image_slider',array('title'=> $title,'className' => $className,'place' => $place,'imagefolder' => 'places'));
			echo $this->element('social_info_part');
			 
			if(!empty($place[$className]['facilitydata']) || !empty($place[$className]['extrafacilitydata'])){
			echo '<div class="row">';
				echo '<div class="col-md-12">';
				echo '<div class="panel panel-info">';
				echo '<div class="panel-heading">Features of '.$title.'</div>';
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
				echo '<div class="panel-heading"><h4 class="panel-title">'.__('Location Details of %s',$title).'</h4></div>';
				echo '<div class="panel-body aboutPlace">';
				echo '<div class="row">';
				echo '<div class="col-xs-6 col-md-4 addrtitle"><i class="fa fa-tags"></i><span>'.__('Place Type').'</span></div>';
				echo '<div class="col-xs-6 col-md-8">'.$place['PlaceType']['name'].'</div>';
				echo '</div>';
				echo '<div class="row">';
				echo '<div class="col-xs-12 col-md-4 addrtitle"><i class="fa fa-taxi"></i><span>'.__('Address').'</span></div>';
				echo '<div class="col-xs-12 col-md-8"><b>'.__('Postal Address').':</b><br/>';
				echo '<h2 style="font-size:18px">'.$title.'</h2>';
				echo $address.'<br/>'.$place['BdThanas']['name'].','.$place['BdDistrict']['name'].','.$place['BdDivision']['name'].','.$place['Country']['name'];
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
				echo '<div class="panel-heading"><h4 class="panel-title">'.__('General information of %s',$title).'</h4></div>';
				echo '<div class="panel-body aboutPlace">';
				echo '<p>';
				echo '<div class="row">';
				echo '<div class="col-xs-12 col-md-12">';
				echo '<h3>'.$title.'</h3>';
				echo '</div>';
				echo '</div>';
				//if(!empty($place[$className]['web'])){
				echo '<div class="row">';
				echo '<div class="col-xs-6 col-md-4 addrtitle"><i class="fa fa-link"></i><span>'.__('Website').'</span></div>';
				echo '<div class="col-xs-6 col-md-8"><span class="topicseperator">:</span> '.$place[$className]['web'].'</div>';
				echo '</div>';
				//}
				//if(!empty($place[$className]['phone'])){
				echo '<div class="row">';
				echo '<div class="col-xs-6 col-md-4 addrtitle"><i class="fa fa-phone"></i><span>'.__('Mobile').'</span></div>';
				echo '<div class="col-xs-6 col-md-8"><span class="topicseperator">:</span> '.$mobile.'</div>';
				echo '</div>';
				//}
				//if(!empty($place[$className]['email'])){
				echo '<div class="row">';
				echo '<div class="col-xs-6 col-md-4 addrtitle"><i class="fa fa-at"></i><span>'.__('Email').'</span></div>';
				echo '<div class="col-xs-6 col-md-8"><span class="topicseperator">:</span> '.$place[$className]['email'].'</div>';
				echo '</div>';
				//}
				
				
				if(!empty($place[$className]['fax'])){
				echo '<div class="row">';
				echo '<div class="col-xs-6 col-md-4 addrtitle"><i class="fa fa-fax"></i><span>Fax :</span></div>';
				echo '<div class="col-xs-6 col-md-8"><span class="topicseperator">:</span> '.$place[$className]['fax'].'</div>';
				echo '</div>';
				}
				if(!empty($place[$className]['hours'])){
				echo '<div class="row">';
				echo '<div class="col-xs-6 col-md-4 addrtitle"><i class="fa fa-times-circle-o"></i><span>Opening Hours</span></div>';
				$opening_hours = json_decode($place[$className]['hours'],true);
				$this->loadHelpers(array('MyHtml'));
				echo '<div class="col-xs-6 col-md-8"><span class="topicseperator">:</span> '.$this->MyHtml->opening_hours_table($opening_hours, '', false).'</div>';
				echo '</div>';
				}
				if($place['PlaceType']['id'] == 17 && !empty($place[$className]['how_to_go'])){
					echo '<div class="panel panel-info">';
					echo '<div class="panel-heading"><h4 class="panel-title">'.__("How to go %s",$title).'</h4></div>';
					echo '<div class="panel-body aboutPlace">';
					echo $place[$className]['how_to_go'];
					echo '</div>';
					echo '</div>';
				}
				if($place['PlaceType']['id'] == 17 && !empty($place[$className]['where_to_stay'])){
					echo '<div class="panel panel-info">';
					echo '<div class="panel-heading"><h4 class="panel-title">'.__("Where to stay at %s",$title).'</h4></div>';
					echo '<div class="panel-body aboutPlace">';
					echo $place[$className]['where_to_stay'];
					echo '</div>';
					echo '</div>';
				}
				if($place['PlaceType']['id'] == 17 && !empty($place[$className]['travel_tips'])){
					echo '<div class="panel panel-info">';
					echo '<div class="panel-heading"><h4 class="panel-title">'.__("Travel tips of %s",$title).'</h4></div>';
					echo '<div class="panel-body aboutPlace">';
					echo $place[$className]['travel_tips'];
					echo '</div>';
					echo '</div>';
				}
				if($place['PlaceType']['id'] == 17 && !empty($place[$className]['where_to_eat'])){
					echo '<div class="panel panel-info">';
					echo '<div class="panel-heading"><h4 class="panel-title">'.__("Where to eat at %s",$title).'</h4></div>';
					echo '<div class="panel-body aboutPlace">';
					echo $place[$className]['where_to_eat'];
					echo '</div>';
					echo '</div>';
				}
				echo '</p>';
				echo '</div>';
				echo '</div>';
				if(!empty($details)){
					echo '<div class="panel panel-info">';
					echo '<div class="panel-heading"><h4 class="panel-title">'.__("Details of %s",$title).'</h4></div>';
					echo '<div class="panel-body aboutPlace">';
					echo $details;
					echo '</div>';
					echo '</div>';
				}
				if(!empty($place[$className]['history'])){
				echo '<div class="panel panel-info">';
				echo '<div class="panel-heading">History of '.$title.'</div>';
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
			//debug($place);exit;
			$userdata = $place['User'];
			echo $this->element('content-section-ten',array('paramdata' => $paramdata, 'userdata' => $userdata));
			
			
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


