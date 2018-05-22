<?php
	  $stringlength = strlen($place['PlaceType']['seo_name']);
	  $newID = $stringlength.$place['PlaceType']['id'];
	  $className = ucfirst($place['PlaceType']['singlename']);
      $this->Html->addCrumb(__('Sitemap'), array('plugin'=>'information','controller' => 'siteactions','action' => 'sitemap')) ;
      $this->Html->addCrumb($place['PlaceType']['name'],array('plugin'=>'information','controller' => 'siteactions','action'=>'categories','category'=>$place['PlaceType']['seo_name'],'id'=> $newID,'page'=>1,'ext' => 'asp') ,array('alt' =>$place['PlaceType']['name']));
	  $this->Html->addCrumb($place['Point']['name'] ,  '' , array('class' => 'active'));
	  $language = $this->Session->read('Config.language');
	  $foldername = $place['PlaceType']['pluralname'];
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
			echo $place['Point']['address'];
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
				echo '<div class="col-xs-6 col-md-4 addrtitle"><i class="fa fa-tags"></i><span>'.__('Name').'</span></div>';
				echo '<div class="col-xs-6 col-md-8">'.$place[$className]['name'].'</div>';
				echo '</div>';
				echo '<div class="row">';
				echo '<div class="col-xs-6 col-md-4 addrtitle"><i class="fa fa-tags"></i><span>'.__('Place Type').'</span></div>';
				echo '<div class="col-xs-6 col-md-8">'.$place['PlaceType']['name'].'</div>';
				echo '</div>';
				echo '<div class="row">';
				echo '<div class="col-xs-6 col-md-4 addrtitle"><i class="fa fa-tags"></i><span>'.__('Scientific Name').'</span></div>';
				echo '<div class="col-xs-6 col-md-8">'.$place[$className]['modified_scientific_name'].'</div>';
				echo '</div>';
				echo '<div class="row">';
				echo '<div class="col-xs-6 col-md-4 addrtitle"><i class="fa fa-tags"></i><span>'.__('Species').'</span></div>';
				echo '<div class="col-xs-6 col-md-8">'.$place[$className]['species'].'</div>';
				echo '</div>';
				echo '<div class="row">';
				echo '<div class="col-xs-6 col-md-4 addrtitle"><i class="fa fa-tags"></i><span>'.__('Family').'</span></div>';
				echo '<div class="col-xs-6 col-md-8">'.$place[$className]['family'].'</div>';
				echo '</div>';
				echo '<div class="row">';
				echo '<div class="col-xs-6 col-md-4 addrtitle"><i class="fa fa-tags"></i><span>'.__('Genus').'</span></div>';
				echo '<div class="col-xs-6 col-md-8">'.$place[$className]['genus'].'</div>';
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
					echo '<h1>'.$place[$className]['name'].'</h1>';
					
					$placename = $place[$className]['name'];
					$placeType = $place['PlaceType']['name'];
					$family = $place[$className]['family'];
					$species = $place[$className]['species'];
					$genus = $place[$className]['genus'];
					
					echo "$placename listed in $placeType category. $placename is a member of $family Family. The species of $placename is  $species and genus is $genus.";
					
					
					echo '</div>';
					echo '</div>';
					if(!empty($place[$className]['web'])){
					echo '<div class="row">';
					echo '<div class="col-xs-12 col-md-4 col-sm-4 addrtitle"><i class="fa fa-link"></i><span>'.__('Website').'</span></div>';
					echo '<div class="col-xs-12 col-md-8 col-sm-8">: '.$place[$className]['web'].'</div>';
					echo '</div>';
					}
					if(!empty($place[$className]['phone'])){
					echo '<div class="row">';
					echo '<div class="col-xs-12 col-md-4 col-sm-4 addrtitle"><i class="fa fa-phone"></i><span>'.__('Mobile').'</span></div>';
					echo '<div class="col-xs-12 col-md-8 col-sm-8">: '.$mobile.'</div>';
					echo '</div>';
					}
					if(!empty($place[$className]['email'])){
					echo '<div class="row">';
					echo '<div class="col-xs-12 col-md-4 col-sm-4 addrtitle"><i class="fa fa-at"></i><span>'.__('Email').'</span></div>';
					echo '<div class="col-xs-12 col-md-8 col-sm-8">: '.$place[$className]['email'].'</div>';
					echo '</div>';
					}
					
					
					if(!empty($place[$className]['fax'])){
					echo '<div class="row">';
					echo '<div class="col-xs-12 col-md-4 col-sm-4 addrtitle"><i class="fa fa-fax"></i><span>Fax :</span></div>';
					echo '<div class="col-xs-12 col-md-8 col-sm-8">: '.$place[$className]['fax'].'</div>';
					echo '</div>';
					}
					if(!empty($place[$className]['hours'])){
					echo '<div class="row">';
					echo '<div class="col-xs-12 col-md-4 col-sm-4 addrtitle"><i class="fa fa-times-circle-o"></i><span>Opening Hours</span></div>';
					echo '<div class="col-xs-12 col-md-8 col-sm-8">: '.$place[$className]['hours'].'</div>';
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
			
			
			echo $this->element('content-section-ten');
			?>
			
		</div>
		
		<div class="col-md-4 col-md-pull-8">
			
		</div>
		
		<div class="col-md-4 col-md-pull-8" id="mapdiv">
		
			<?php
			
			if(isset($place[$className]['youtube']) && !empty($place[$className]['youtube'])){
			echo '<div class="panel panel-info" style="margin-top:0px;">';
			echo '<div class="panel-heading">';
			echo __('Video of %s',$place['Point']['name']);
			echo '</div>';
			echo '<div class="panel-body">';
			echo '<div id="map" style="width: auto; height:auto" class="embed-responsive embed-responsive-4by3">';
			if(isset($place[$className]['youtube'])){
			$fileTag = $place[$className]['youtube'];
				echo "<iframe class='embed-responsive-item' width='420' height='315' src='http://www.youtube.com/embed/$fileTag?autoplay=0'></iframe>"; 
			}
			echo '</div>';
			echo '</div>';
			echo '</div>';
			}
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
				echo '<div class="panel-heading" style="margin-bottom:10px;"><h3>'.__('Others %s Information',$place['PlaceType']['name']).'</h3></div>';
				
				echo '<div class="row nearPlace">';
				
				foreach($nearbies as $nearplace){
				echo '<div class="col-xs-12 col-sm-6 col-md-3 placecontianer">';
				echo '<div class="relatedblock">';
					echo '<div class="row">';
					$class = $nearplace['Point']['seo_name'];
					
					$stringlength = strlen($nearplace['Point']['seo_name']);
					$newID = $stringlength.$nearplace['Point']['id'];
					echo "<div class='col-md-12 nearbyimageblock $class'>";
					
					$placename = $nearplace[$className]['name'];
					$placeType = $nearplace['PlaceType']['name'];
					$family = $nearplace[$className]['family'];
					$species = $nearplace[$className]['species'];
					$genus = $nearplace[$className]['genus'];
					
					$metaTag = "$placename listed in $placeType category. $placename is a member of $family Family. The species of $placename is  $species and genus is $genus.";
					
					if(isset($nearplace[$className]['image'])){
					$file = $nearplace[$className]['image'];
					
					echo $this->Html->image("$foldername/photogallery/$file", array('url' => array('controller'=>'siteactions','action'=>'infos','category'=>$nearplace['PlaceType']['seo_name'],'point'=> $nearplace['Point']['seo_name'],'id'=> $newID,'ext' => 'asp'),'class' =>'nearbymap','alt' =>$metaTag));
					}else if(!empty($nearplace['Point']['map'])){
					$locationMap = $nearplace['Point']['map'];
					echo $this->Html->image("placemaps/$locationMap", array('url' => array('controller'=>'siteactions','action'=>'infos','category'=>$nearplace['PlaceType']['seo_name'],'point'=> $nearplace['Point']['seo_name'],'id'=> $newID,'ext' => 'asp'),'class' =>'nearbymap','alt' =>$metaTag));
					}else{
					echo $this->Html->link('<div class="defaultcaticon"><span><i class="inn '.$nearplace['PlaceType']['icon'].'"></i></span></div>', array('controller'=>'siteactions','action'=>'infos','category'=>$nearplace['PlaceType']['seo_name'],'point'=> $nearplace['Point']['seo_name'],'id'=> $newID,'ext' => 'asp'),array('escape'=>false,'alt' =>$metaTag));
					}
					echo '</div>';
					
					echo "<div class='col-md-12 nearbyname $class'>";
					echo $this->Html->link(substr($placename,0,30), array('controller'=>'siteactions','action'=>'infos','category'=>$nearplace['PlaceType']['seo_name'],'point'=> $nearplace['Point']['seo_name'],'id'=> $newID,'ext' => 'asp'),array('escape'=>false,'alt' =>$metaTag));
					
					echo '</div>';
					echo "<div class='col-md-12 $class'>";
					if(isset($nearplace[$className]['address']) && !empty($nearplace[$className]['address'])){
					echo '<span class="placeaddress">'.substr($nearplace[$className]['address'],0,34).'<span>';
					}else{
					echo '<span class="placeaddress">&nbsp;<span>';
					}
					echo '</div>';
					echo '</div>';
				echo '</div>';
				echo '</div>';
				}
				echo '</div>';
	
		?>
		
		</div>
	</div>	
	
</div>

