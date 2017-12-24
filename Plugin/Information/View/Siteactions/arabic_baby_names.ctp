<?php
	$className = 'BabyName';
	$language = $this->Session->read('Config.language');
	$currentLng = $this->Session->read('Config.language');
	
	if($language == 'bn' && !empty($place[$className]['bn_name'])){
		$name = $place[$className]['bn_name'];
	}else{
		$name = $place[$className]['name'];
	}

	  $stringlength = strlen($place['PlaceType']['seo_name']);
	  $newID = $stringlength.$place['PlaceType']['id'];
	  $className = ucfirst($place['PlaceType']['singlename']);
      $this->Html->addCrumb(__('Sitemap'), array('plugin'=>'information','controller' => 'siteactions','action' => 'sitemap')) ;
      $this->Html->addCrumb($place['PlaceType']['name'],array('plugin'=>'information','controller' => 'siteactions','action'=>'categories','category'=>$place['PlaceType']['seo_name'],'id'=> $newID,'page'=>1,'ext' => 'asp') ,array('alt' =>$place['PlaceType']['name']));
			/*****************************Related Slug Block Start**************************************/
			//debug($place['PlaceTypeSlug']);
			if(isset($place['PlaceTypeSlug'])){
				foreach($place['PlaceTypeSlug'] as $slug){
					$slugsArray = explode(',',$slug['params']);
					//debug($slug);
					
					if(in_array('post_office_id',$slugsArray) && !empty($place['Country']['name'])){
						$this->Html->addCrumb(__($slug['title'],$place['Country']['name']), array('controller'=>'siteactions','action'=>'tags','language'=>$currentLng,'institutetype'=>'post-offices','country'=>$place['Country']['seo_name'],'seotitle'=>__($slug['seo_title'],$place['Country']['seo_name']),'page' => 1,'id'=> $slug['id'],'ext' => 'asp'),array('alt' =>'','escape'=>false));
					}
					if(in_array('post_office_id',$slugsArray) && !empty($place['BdDivision']['name'])){
						$this->Html->addCrumb(__($slug['title'],$place['BdDivision']['name']), array('controller'=>'siteactions','action'=>'tags','language'=>$currentLng,'institutetype'=>'post-offices','country'=>$place['Country']['seo_name'],'division'=>$place['BdDivision']['seo_name'],'seotitle'=>__($slug['seo_title'],$place['BdDivision']['seo_name']),'page' => 1,'id'=> $slug['id'],'ext' => 'asp'),array('alt' =>'','escape'=>false));
					}
					if(in_array('post_office_id',$slugsArray) && !empty($place['BdDistrict']['name'])){
						$this->Html->addCrumb(__($slug['title'],$place['BdDistrict']['name']), array('controller'=>'siteactions','action'=>'tags','language'=>$currentLng,'institutetype'=>'post-offices','country'=>$place['Country']['seo_name'],'division'=>$place['BdDivision']['seo_name'],'district'=>$place['BdDistrict']['seo_name'],'seotitle'=>__($slug['seo_title'],$place['BdDistrict']['seo_name']),'page' => 1,'id'=> $slug['id'],'ext' => 'asp'),array('alt' =>'','escape'=>false));
					}
					if(in_array('post_office_id',$slugsArray) && !empty($place['BdThanas']['name'])){
						$this->Html->addCrumb(__($slug['title'],$place['BdThanas']['name']), array('controller'=>'siteactions','action'=>'tags','language'=>$currentLng,'institutetype'=>'post-offices','country'=>$place['Country']['seo_name'],'division'=>$place['BdDivision']['seo_name'],'district'=>$place['BdDistrict']['seo_name'],'thana'=>$place['BdThanas']['seo_name'],'seotitle'=>__($slug['seo_title'],$place['BdThanas']['seo_name']),'page' => 1,'id'=> $slug['id'],'ext' => 'asp'),array('alt' =>'','escape'=>false));
					}
					
					
					
					
				}
			}
				
			/*****************************Related Slug Block End**************************************/	
	  
	  $this->Html->addCrumb($name ,  '' , array('class' => 'active'));
	  
	  //debug($place);
?>

<div class="place view">

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
			if(!empty($place[$className]['image'])){
			echo $this->Html->image('postcodes/logo/small/'.$place[$className]['image']);
			}else{
			$icon = $place['PlaceType']['icon'];
			echo "<i class='$icon'></i>";
			}
			?>
			</div>
			</div>
			<div class="col-sm-11 col-xs-10 col-md-11">
			<?php echo '<div class="col-sm-12 col-md-12 col-xs-12 zeropadding"><h1 class="posttitle">'.$name.'</h1></div>'; ?>
			<?php 
			echo '<div class="col-sm-12 col-md-12 col-xs-12 zeropadding"><p>'.$place['BdThanas']['name'].', '.$place['BdDivision']['name'].','.$place['Country']['name'].' '.'</p></div></div>'; ?>
			
			</div>
			</div>
			</div>
			
			<?php 
			echo $this->element('social_info_part');
			echo '<div class="row">';
				echo '<div class="col-md-12">';
				echo '<div class="panel panel-info">';
				echo '<div class="panel-heading">'.__('Location Details of %s',$title).'</div>';
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
				echo '<div class="panel-heading">'.__('General information of %s',$title).'</div>';
				echo '<div class="panel-body aboutPlace">';
				echo '<p>';
				echo '<div class="row">';
				echo '<div class="col-xs-12 col-md-12">';
				echo '<h3>'.$title.'</h3>';
				echo '</div>';
				echo '</div>';
				//if(!empty($place[$className]['web'])){
				echo '<div class="row">';
				echo '<div class="col-xs-12 col-md-4 col-sm-4 addrtitle"><i class="fa fa-link"></i><span>'.__('Website').'</span></div>';
				echo '<div class="col-xs-12 col-md-8 col-sm-8">: '.$place[$className]['web'].'</div>';
				echo '</div>';
				//}
				//if(!empty($place[$className]['phone'])){
				echo '<div class="row">';
				echo '<div class="col-xs-12 col-md-4 col-sm-4 addrtitle"><i class="fa fa-phone"></i><span>'.__('Mobile').'</span></div>';
				echo '<div class="col-xs-12 col-md-8 col-sm-8">: '.$mobile.'</div>';
				echo '</div>';
				//}
				//if(!empty($place[$className]['email'])){
				echo '<div class="row">';
				echo '<div class="col-xs-12 col-md-4 col-sm-4 addrtitle"><i class="fa fa-at"></i><span>'.__('Email').'</span></div>';
				echo '<div class="col-xs-12 col-md-8 col-sm-8">: '.$place[$className]['email'].'</div>';
				echo '</div>';
				//}
				
				
				if(!empty($place[$className]['fax'])){
				echo '<div class="row">';
				echo '<div class="col-xs-12 col-md-4 col-sm-4 addrtitle"><i class="fa fa-fax"></i><span>Fax :</span></div>';
				echo '<div class="col-xs-12 col-md-8 col-sm-8">: '.$place[$className]['fax'].'</div>';
				echo '</div>';
				}
				if(!empty($place[$className]['hours'])){
				echo '<div class="row">';
				echo '<div class="col-xs-12 col-md-4 col-sm-4 addrtitle"><i class="fa fa-times-circle-o"></i><span>Opening Hours</span></div>';
				$opening_hours = json_decode($place[$className]['hours'],true);
				$this->loadHelpers(array('MyHtml'));
				echo '<div class="col-xs-12 col-md-8 col-sm-8">: '.$this->MyHtml->opening_hours_table($opening_hours, '', false).'</div>';
				echo '</div>';
				}
				echo '</p>';
				echo '</div>';
				echo '</div>';
				if(!empty($place[$className]['details'])){
				echo '<div class="panel panel-info">';
				echo '<div class="panel-heading">Details of '.$title.'</div>';
				echo '<div class="panel-body aboutPlace">';
				echo $place[$className]['details'];
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
			echo $this->element('content-section-ten');
			
			
			?>
		</div>
		
		<div class="col-md-4 col-md-pull-8">
			
		</div>
		
		<div class="col-md-4 col-md-pull-8" id="mapdiv">
		
			<?php
			
			
			echo '<div class="panel panel-info" style="margin-top:0px;">';
			echo '<div class="panel-heading">';
			echo __('%s in Map',$title);
			echo '</div>';
			echo '<div class="panel-body">';
			echo '<div id="map" style="width: auto; height:auto">';
			$lat = $place[$className]['lat'];
			$lng = $place[$className]['lng'];
			$icon = 'mm_20_blue.png';
			$slug = $place['Point']['seo_name'];
			$stringlength = strlen($place['Point']['seo_name']);
			$newID = $stringlength.$place['Point']['id'];
			if(!empty($place['Point']['map'])){
				$link = 'placemaps/'.$place['Point']['map'];
				echo $this->Html->image($link);
			}else{
				$iconPath = 'http://www.infomap24.com/indicator32.png';
				$url = "http://maps.googleapis.com/maps/api/staticmap?center=$lat,$lng&zoom=14&size=400x300&markers=icon:$iconPath|$lat,$lng&style=feature:administrative|element:labels.text.fill|color:#ff0000&style=feature:landscape|element:all|color:#f2f2f2&style=feature:poi|element:all|visibility:off&style=feature:road|element:all|saturation:-100|lightness:45&style=feature:road.highway|element:all|visibility:simplified&style=feature:road.arterial|element:labels.icon|visibility:off&style=feature:transit|element:all|visibility:off&style=feature:water|element:all|color:#46bcec|visibility:on&sensor=false";
				echo $this->Html->image($url);
				$this->requestAction(array('plugin'=>'information','controller' =>'siteactions','action' =>'savemapimage','id'=>$newID,'lat' =>$lat,'lng'=>$lng,'icon' =>$icon,'slug' => $slug));
			}
			echo $this->Html->link(__('View Map'), array('plugin'=>'information','controller'=>'siteactions','action'=>'map','category'=>$place['PlaceType']['seo_name'],'point'=> $place['Point']['seo_name'],'id'=> $newID,'ext' => 'asp'),array('escape'=>false,'alt' =>$title));
		
			echo '</div>';
			echo '</div>';
			echo '</div>';
			
			?>
		</div>
		<div id="canvas" style="display:none;"><p>Canvas:</p></div>
		<div style="width:200px; float:left; display:none;" id="image"></div>
		<div class="col-md-4 col-md-pull-8">
			<?php
			echo '';
			echo '<div class="panel panel-info" style="margin-top:0px;">';
			echo '<div class="panel-heading">'.__('Reviews of %s',$title).' </div>';
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

