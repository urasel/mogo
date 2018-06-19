<?php
	$currentLng = $this->Session->read('Config.language');
	if($currentLng == 'bn'){
		$languageID = 2;
		$this->loadHelpers(array('Language'));
	}else{
		$languageID = 1;
	}
		$className = 'Point';
	
		if($currentLng == 'bn' && !empty($place[$className]['bn_name'])){
			$title = $place[$className]['bn_name'];
		}else{
			$title = $place[$className]['name'];
		}
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
						echo '<div class="col-sm-12 col-md-12 col-xs-12 zeropadding"><p>'.$place['Country']['name'].' '.'</p></div>'; 
					}
					?>
				
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
		</div>
		
		<div class="col-md-4" id="mapdiv">
		
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
			<div id="canvas" style="display:none;"><p>Canvas:</p></div>
			<div style="width:200px; float:left; display:none;" id="image"></div>
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

		</div>
	
		
		
	</div>	
	<?php
			echo $this->element('nearby-items', array('nearbies' => $nearbies,'place' => $place,'className' => $className));

	?>


