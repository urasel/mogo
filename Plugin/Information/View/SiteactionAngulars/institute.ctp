<?php
	  $stringlength = strlen($place['PlaceType']['seo_name']);
	  $newID = $stringlength.$place['PlaceType']['id'];
	  $className = ucfirst($place['PlaceType']['singlename']);
	  $currentLng = $this->Session->read('Config.language');
	  
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
				$this->Html->addCrumb($breadcumb['PlaceType']['name'],array('plugin'=>'information','controller' => 'siteactions','action'=>'subcategories','country'=>$queryCountry,'category'=>$breadcumb['PlaceType']['seo_name'],'id'=> $newID,'language'=>$currentLng,'page'=>1,'ext' => 'asp') ,array('alt' =>$breadcumb['PlaceType']['name']));
			}else{
				$this->Html->addCrumb($breadcumb['PlaceType']['name'],array('plugin'=>'information','controller' => 'siteactions','action'=>'categories','country'=>$queryCountry,'category'=>$breadcumb['PlaceType']['seo_name'],'id'=> $newID,'language'=>$currentLng,'page'=>1,'ext' => 'asp') ,array('alt' =>$breadcumb['PlaceType']['name']));
			}
			
		  
	  }
      //$this->Html->addCrumb($place['PlaceType']['name'],array('plugin'=>'information','controller' => 'siteactions','action'=>'categories','category'=>$place['PlaceType']['seo_name'],'id'=> $newID,'page'=>1,'ext' => 'asp') ,array('alt' =>$place['PlaceType']['name']));
	  
			/*****************************Related Slug Block Start**************************************/
				foreach($place['PlaceTypeSlug'] as $slug){
						$slugsArray = explode(',',$slug['params']);
						//debug($slug);
						
						if(in_array('JUNIOR_SCHOOL',$slugsArray) && !empty($place['Country']['name'])){
							$this->Html->addCrumb(__($slug['title'],$place['Country']['name']), array('controller'=>'siteactions','action'=>'tags','language'=>$currentLng,'institutetype'=>'junior-school','country'=>$place['Country']['seo_name'],'seotitle'=>__($slug['seo_title'],$place['Country']['seo_name']),'page' => 1,'id'=> $slug['id'],'ext' => 'asp'),array('alt' =>'','escape'=>false));
						}
						if(in_array('JUNIOR_SCHOOL',$slugsArray) && !empty($place['BdDivision']['name'])){
							$this->Html->addCrumb(__($slug['title'],$place['BdDivision']['name']), array('controller'=>'siteactions','action'=>'tags','language'=>$currentLng,'institutetype'=>'junior-school','country'=>$place['Country']['seo_name'],'division'=>$place['BdDivision']['seo_name'],'seotitle'=>__($slug['seo_title'],$place['BdDivision']['seo_name']),'page' => 1,'id'=> $slug['id'],'ext' => 'asp'),array('alt' =>'','escape'=>false));
						}
						if(in_array('JUNIOR_SCHOOL',$slugsArray) && !empty($place['BdDistrict']['name'])){
							$this->Html->addCrumb(__($slug['title'],$place['BdDistrict']['name']), array('controller'=>'siteactions','action'=>'tags','language'=>$currentLng,'institutetype'=>'junior-school','country'=>$place['Country']['seo_name'],'division'=>$place['BdDivision']['seo_name'],'district'=>$place['BdDistrict']['seo_name'],'seotitle'=>__($slug['seo_title'],$place['BdDistrict']['seo_name']),'page' => 1,'id'=> $slug['id'],'ext' => 'asp'),array('alt' =>'','escape'=>false));
						}
						if(in_array('JUNIOR_SCHOOL',$slugsArray) && !empty($place['BdThanas']['name'])){
							$this->Html->addCrumb(__($slug['title'],$place['BdThanas']['name']), array('controller'=>'siteactions','action'=>'tags','language'=>$currentLng,'institutetype'=>'junior-school','country'=>$place['Country']['seo_name'],'division'=>$place['BdDivision']['seo_name'],'district'=>$place['BdDistrict']['seo_name'],'thana'=>$place['BdThanas']['seo_name'],'seotitle'=>__($slug['seo_title'],$place['BdThanas']['seo_name']),'page' => 1,'id'=> $slug['id'],'ext' => 'asp'),array('alt' =>'','escape'=>false));
						}
						
						
						if(in_array('SECONDARY_SCHOOL',$slugsArray) && !empty($place['Country']['name'])){
							$this->Html->addCrumb(__($slug['title'],$place['Country']['name']), array('controller'=>'siteactions','action'=>'tags','language'=>$currentLng,'institutetype'=>'secondary-school','country'=>$place['Country']['seo_name'],'seotitle'=>__($slug['seo_title'],$place['Country']['seo_name']),'page' => 1,'id'=> $slug['id'],'ext' => 'asp'),array('alt' =>'','escape'=>false));
						}
						if(in_array('SECONDARY_SCHOOL',$slugsArray) && !empty($place['BdDivision']['name'])){
							$this->Html->addCrumb(__($slug['title'],$place['BdDivision']['name']), array('controller'=>'siteactions','action'=>'tags','language'=>$currentLng,'institutetype'=>'secondary-school','country'=>$place['Country']['seo_name'],'division'=>$place['BdDivision']['seo_name'],'seotitle'=>__($slug['seo_title'],$place['BdDivision']['seo_name']),'page' => 1,'id'=> $slug['id'],'ext' => 'asp'),array('alt' =>'','escape'=>false));
						}
						if(in_array('SECONDARY_SCHOOL',$slugsArray) && !empty($place['BdDistrict']['name'])){
							$this->Html->addCrumb(__($slug['title'],$place['BdDistrict']['name']), array('controller'=>'siteactions','action'=>'tags','language'=>$currentLng,'institutetype'=>'secondary-school','country'=>$place['Country']['seo_name'],'division'=>$place['BdDivision']['seo_name'],'district'=>$place['BdDistrict']['seo_name'],'seotitle'=>__($slug['seo_title'],$place['BdDistrict']['seo_name']),'page' => 1,'id'=> $slug['id'],'ext' => 'asp'),array('alt' =>'','escape'=>false));
						}
						if(in_array('SECONDARY_SCHOOL',$slugsArray) && !empty($place['BdThanas']['name'])){
							$this->Html->addCrumb(__($slug['title'],$place['BdThanas']['name']), array('controller'=>'siteactions','action'=>'tags','language'=>$currentLng,'institutetype'=>'secondary-school','country'=>$place['Country']['seo_name'],'division'=>$place['BdDivision']['seo_name'],'district'=>$place['BdDistrict']['seo_name'],'thana'=>$place['BdThanas']['seo_name'],'seotitle'=>__($slug['seo_title'],$place['BdThanas']['seo_name']),'page' => 1,'id'=> $slug['id'],'ext' => 'asp'),array('alt' =>'','escape'=>false));
						}
						
						if(in_array('MADRASAH',$slugsArray) && !empty($place['Country']['name'])){
							$this->Html->addCrumb(__($slug['title'],$place['Country']['name']), array('controller'=>'siteactions','action'=>'tags','language'=>$currentLng,'institutetype'=>'madrasah','country'=>$place['Country']['seo_name'],'seotitle'=>__($slug['seo_title'],$place['Country']['seo_name']),'page' => 1,'id'=> $slug['id'],'ext' => 'asp'),array('alt' =>'','escape'=>false));
						}
						if(in_array('MADRASAH',$slugsArray) && !empty($place['BdDivision']['name'])){
							$this->Html->addCrumb(__($slug['title'],$place['BdDivision']['name']), array('controller'=>'siteactions','action'=>'tags','language'=>$currentLng,'institutetype'=>'madrasah','country'=>$place['Country']['seo_name'],'division'=>$place['BdDivision']['seo_name'],'seotitle'=>__($slug['seo_title'],$place['BdDivision']['seo_name']),'page' => 1,'id'=> $slug['id'],'ext' => 'asp'),array('alt' =>'','escape'=>false));
						}
						if(in_array('MADRASAH',$slugsArray) && !empty($place['BdDistrict']['name'])){
							$this->Html->addCrumb(__($slug['title'],$place['BdDistrict']['name']), array('controller'=>'siteactions','action'=>'tags','language'=>$currentLng,'institutetype'=>'madrasah','country'=>$place['Country']['seo_name'],'division'=>$place['BdDivision']['seo_name'],'district'=>$place['BdDistrict']['seo_name'],'seotitle'=>__($slug['seo_title'],$place['BdDistrict']['seo_name']),'page' => 1,'id'=> $slug['id'],'ext' => 'asp'),array('alt' =>'','escape'=>false));
						}
						if(in_array('MADRASAH',$slugsArray) && !empty($place['BdThanas']['name'])){
							$this->Html->addCrumb(__($slug['title'],$place['BdThanas']['name']), array('controller'=>'siteactions','action'=>'tags','language'=>$currentLng,'institutetype'=>'madrasah','country'=>$place['Country']['seo_name'],'division'=>$place['BdDivision']['seo_name'],'district'=>$place['BdDistrict']['seo_name'],'thana'=>$place['BdThanas']['seo_name'],'seotitle'=>__($slug['seo_title'],$place['BdThanas']['seo_name']),'page' => 1,'id'=> $slug['id'],'ext' => 'asp'),array('alt' =>'','escape'=>false));
						}
						
						
						if(in_array('INTERMEDIATE_COLLEGE',$slugsArray) && !empty($place['Country']['name'])){
							$this->Html->addCrumb(__($slug['title'],$place['Country']['name']), array('controller'=>'siteactions','action'=>'tags','language'=>$currentLng,'institutetype'=>'intermediate-college','country'=>$place['Country']['seo_name'],'seotitle'=>__($slug['seo_title'],$place['Country']['seo_name']),'page' => 1,'id'=> $slug['id'],'ext' => 'asp'));
						}
						if(in_array('INTERMEDIATE_COLLEGE',$slugsArray) && !empty($place['BdDivision']['name'])){
							$this->Html->addCrumb(__($slug['title'],$place['BdDivision']['name']), array('controller'=>'siteactions','action'=>'tags','language'=>$currentLng,'institutetype'=>'intermediate-college','country'=>$place['Country']['seo_name'],'division'=>$place['BdDivision']['seo_name'],'seotitle'=>__($slug['seo_title'],$place['BdDivision']['seo_name']),'page' => 1,'id'=> $slug['id'],'ext' => 'asp'));
						}
						if(in_array('INTERMEDIATE_COLLEGE',$slugsArray) && !empty($place['BdDistrict']['name'])){
							$this->Html->addCrumb(__($slug['title'],$place['BdDistrict']['name']), array('controller'=>'siteactions','action'=>'tags','language'=>$currentLng,'institutetype'=>'intermediate-college','country'=>$place['Country']['seo_name'],'division'=>$place['BdDivision']['seo_name'],'district'=>$place['BdDistrict']['seo_name'],'seotitle'=>__($slug['seo_title'],$place['BdDistrict']['seo_name']),'page' => 1,'id'=> $slug['id'],'ext' => 'asp'));
						}
						if(in_array('INTERMEDIATE_COLLEGE',$slugsArray) && !empty($place['BdThanas']['name'])){
							$this->Html->addCrumb(__($slug['title'],$place['BdThanas']['name']), array('controller'=>'siteactions','action'=>'tags','language'=>$currentLng,'institutetype'=>'intermediate-college','country'=>$place['Country']['seo_name'],'division'=>$place['BdDivision']['seo_name'],'district'=>$place['BdDistrict']['seo_name'],'thana'=>$place['BdThanas']['seo_name'],'seotitle'=>__($slug['seo_title'],$place['BdThanas']['seo_name']),'page' => 1,'id'=> $slug['id'],'ext' => 'asp'));
						}
						
						
					}
			/*****************************Related Slug Block End**************************************/	
	  
	  $this->Html->addCrumb($title ,  '' , array('class' => 'active'));
	  $language = $this->Session->read('Config.language');
	  //debug($place);
?>

<section>
<div class="container">
<div class="row placeview">
<?php
	if($language == 'bn'){
		$this->loadHelpers(array('Language'));
		$lat = $this->Language->banglanumber($place[$className]['lat']);
		$lng = $this->Language->banglanumber($place[$className]['lng']);
		$mobile = $this->Language->banglanumber($place[$className]['mobile']);
		$phone = $this->Language->banglanumber($place[$className]['phone']);
	}else{
		$lat = $place[$className]['lat'];
		$lng = $place[$className]['lng'];
		$mobile = $place[$className]['mobile'];
		$phone = $place[$className]['phone'];
	}

?>
	
		<style>
		#map img{
			width:100%;
		}
		</style>
		<div class="col-md-8">
			<?php echo '<div class="row"><div class="col-md-12">'; ?>
			<div class="col-md-12 posttitleblock">
			<div class="col-sm-1 col-xs-2 col-md-1" style="padding:0px;">
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
			<div class="col-sm-11 col-xs-10 col-md-11">
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
			$stringlength = strlen($place['Country']['seo_title']);
			$newID = $stringlength.$place['Country']['id'];
			echo '<div class="col-sm-12 col-md-12 col-xs-12 zeropadding"><p>'.$place['BdThanas']['name'].', '.$place['BdDivision']['name'].','.$this->Html->link($place['Country']['name'], array('plugin'=>'information','controller' => 'siteactions','action'=>'country_details','category'=>$place['Country']['seo_name'],'title'=>$place['Country']['seo_title'],'id'=> $newID,'language'=>$currentLng,'ext' => 'asp'),array('alt' =>$place['Country']['name'])).' '.'</p></div>';
			echo '</div>'; 
			?>
			
			</div>
			</div>
			</div>
			<?php 
			echo $this->element('social_info_part');
			$imageClass = $className.'Image';
			echo $this->element('image_slider',array('title'=> $title,'className' => $className,'place' => $place,'imagefolder' => 'institutes'));
			 
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
			echo '<div class="row textcontent">';
				echo '<div class="col-md-12">';
				if(!empty($details)){
					echo '<div class="panel panel-info">';
					echo '<div class="panel-heading">'.__("Details of %s",$title).'</div>';
					echo '<div class="panel-body aboutPlace">';
					echo $details;
					echo '</div>';
					echo '</div>';
				}
				echo '<div class="panel panel-info">';
				echo '<div class="panel-heading">'.__('General information of %s',$title).'</div>';
				echo '<div class="panel-body aboutPlace">';
				echo '<p>';
				echo '<div class="row">';
				echo '<div class="col-xs-12 col-md-12">';
				echo '<h3>'.$title.'</h3>';
				/*Meta Description*/
				echo $metadescription;
				echo '</div>';
				echo '</div>';
				if(!empty($place[$className]['level'])){
				echo '<div class="row">';
				echo '<div class="col-xs-6 col-md-4 addrtitle"><i class="fa fa-hand-o-right"></i><span>'.__('Institute Level').'</span></div>';
				echo '<div class="col-xs-6 col-md-8">'.$place[$className]['level'].'</div>';
				echo '</div>';
				}
				if(!empty($place[$className]['eiin_no'])){
				echo '<div class="row">';
				echo '<div class="col-xs-6 col-md-4 addrtitle"><i class="fa fa-hand-o-right"></i><span>'.__('Institute EIIN Number').'</span></div>';
				echo '<div class="col-xs-6 col-md-8">'.$place[$className]['eiin_no'].'</div>';
				echo '</div>';
				}
				//if(!empty($place[$className]['web'])){
				echo '<div class="row">';
				echo '<div class="col-xs-12 col-md-4 col-sm-4 addrtitle"><i class="fa fa-link"></i><span>'.__('Website').'</span></div>';
				echo '<div class="col-xs-12 col-md-8 col-sm-8"><span class="topicseperator">:</span> '.$place[$className]['web'].'</div>';
				echo '</div>';
				//}
				//if(!empty($place[$className]['phone'])){
				echo '<div class="row">';
				echo '<div class="col-xs-12 col-md-4 col-sm-4 addrtitle"><i class="fa fa-phone"></i><span>'.__('Mobile').'</span></div>';
				echo '<div class="col-xs-12 col-md-8 col-sm-8"><span class="topicseperator">:</span> '.$mobile.'</div>';
				echo '</div>';
				echo '<div class="row">';
				echo '<div class="col-xs-12 col-md-4 col-sm-4 addrtitle"><i class="fa fa-phone"></i><span>'.__('Phone').'</span></div>';
				echo '<div class="col-xs-12 col-md-8 col-sm-8"><span class="topicseperator">:</span> '.$phone.'</div>';
				echo '</div>';
				//}
				//if(!empty($place[$className]['email'])){
				echo '<div class="row">';
				echo '<div class="col-xs-12 col-md-4 col-sm-4 addrtitle"><i class="fa fa-at"></i><span>'.__('Email').'</span></div>';
				echo '<div class="col-xs-12 col-md-8 col-sm-8"><span class="topicseperator">:</span> '.$place[$className]['email'].'</div>';
				echo '</div>';
				//}
				
				
				if(!empty($place[$className]['fax'])){
				echo '<div class="row">';
				echo '<div class="col-xs-12 col-md-4 col-sm-4 addrtitle"><i class="fa fa-fax"></i><span>Fax :</span></div>';
				echo '<div class="col-xs-12 col-md-8 col-sm-8"><span class="topicseperator">:</span> '.$place[$className]['fax'].'</div>';
				echo '</div>';
				}
				
				if(!empty($place[$className]['hours'])){
				echo '<div class="row">';
				echo '<div class="col-xs-12 col-md-4 col-sm-4 addrtitle"><i class="fa fa-times-circle-o"></i><span>Opening Hours</span></div>';
				$opening_hours = json_decode($place[$className]['hours'],true);
				$this->loadHelpers(array('MyHtml'));
				//debug($opening_hours);
				echo '<div class="col-xs-12 col-md-8 col-sm-8"><span class="topicseperator">:</span> '.$this->MyHtml->opening_hours_table($opening_hours, '', false).'</div>';
				echo '</div>';
				}
				echo '</p>';
				echo '</div>';
				echo '</div>';
				
				
				echo '</div>';
			echo '</div>';
			echo '<div class="row">';
				//debug($place);
				echo '<div class="col-md-12">';
				echo '<div class="panel panel-info">';
				echo '<div class="panel-heading">'.__('Location Details of %s',$title).'</div>';
				echo '<div class="panel-body aboutPlace">';
				echo '<div class="row">';
				echo '<div class="col-xs-6 col-md-4 addrtitle"><i class="fa fa-dot-circle-o"></i><span>'.__('Country').'</span></div>';
				$stringlength = strlen($place['Country']['seo_title']);
				$newID = $stringlength.$place['Country']['id'];
				echo '<div class="col-xs-6 col-md-8">'.$this->Html->link($place['Country']['name'], array('plugin'=>'information','controller' => 'siteactions','action'=>'country_details','category'=>$place['Country']['seo_name'],'title'=>$place['Country']['seo_title'],'id'=> $newID,'language'=>$currentLng,'ext' => 'asp'),array('alt' =>$place['Country']['name'])).'</div>';
				echo '</div>';
				echo '<div class="row">';
				echo '<div class="col-xs-6 col-md-4 addrtitle"><i class="fa fa-dot-circle-o"></i><span>'.__('Division').'</span></div>';
				echo '<div class="col-xs-6 col-md-8">'.$place['BdDistrict']['name'].'</div>';
				echo '</div>';
				echo '<div class="row">';
				echo '<div class="col-xs-6 col-md-4 addrtitle"><i class="fa fa-dot-circle-o"></i><span>'.__('District').'</span></div>';
				echo '<div class="col-xs-6 col-md-8">'.$place['BdDivision']['name'].'</div>';
				echo '</div>';
				echo '<div class="row">';
				echo '<div class="col-xs-6 col-md-4 addrtitle"><i class="fa fa-dot-circle-o"></i><span>'.__('Thana').'</span></div>';
				echo '<div class="col-xs-6 col-md-8">'.$place['BdThanas']['name'].'</div>';
				echo '</div>';
				echo '<div class="row">';
				echo '<div class="col-xs-6 col-md-4 addrtitle"><i class="fa fa-tags"></i><span>'.__('Place Type').'</span></div>';
				echo '<div class="col-xs-6 col-md-8">'.$place['PlaceType']['name'].'</div>';
				echo '</div>';
				echo '<div class="row">';
				echo '<div class="col-xs-12 col-md-4 addrtitle"><i class="fa fa-taxi"></i><span>'.__('Address').'</span></div>';
				echo '<div class="col-xs-12 col-md-8"><b>'.__('Postal Address').':</b><br/>';
				echo '<h2 style="font-size:18px">'.$title.'</h2>';
				echo $place[$className]['address'].'<br/>'.$place['BdThanas']['name'].','.$place['BdDistrict']['name'].','.$place['BdDivision']['name'].','.$place['Country']['name'];
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
			
			
			$stringlength = strlen($place['Point']['seo_name']);
			$newID = $stringlength.$place['Point']['id'];
			$paramdata = 'a='.$place['PlaceType']['singlename'].'&b='.$place['Point']['seo_name'].'&c='.$newID;
			echo $this->element('content-section-ten',array('paramdata' => $paramdata));
			
			?>
		</div>
		
		
		<div class="col-md-4">
			<?php
			echo $this->element('points-right-part', array('title' => $title,'nearbies' => $nearbies,'place' => $place,'className' => $className));

			?>
			
		</div>
		
		
	</div>	
</div>
</section><!--/#nino-testimonial-->
<?php
		echo $this->element('nearby-items', array('nearbies' => $nearbies,'place' => $place,'className' => $className));

?>
