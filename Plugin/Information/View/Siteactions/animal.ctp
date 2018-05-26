<?php
	$currentLng = $this->Session->read('Config.language');
	if($currentLng == 'bn'){
		$languageID = 2;
		$this->loadHelpers(array('Language'));
	}else{
		$languageID = 1;
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
			<?php echo '<div class="row"><div class="col-md-12">'; ?>
			<div class="col-md-12 posttitleblock zeropadding">
			<div class="col-sm-1 col-xs-2 col-md-1 zeropadding">
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
	<div class="row">
		<?php
		//debug($nearbies);
				echo '<h2 class="nino-sectionHeading">'.__('Others %s Information',$place['PlaceType']['name']).'</h2>';
				echo '<div class="nearPlace">';
				$actionName = 'infos';
				foreach($nearbies as $nearplace){
				//debug($nearby);
				$placename = $nearplace[$className]['name'];
				$stringlength = strlen($nearplace[$className]['seo_name']);
				$newID = $stringlength.$nearplace[$className]['id'];
				
				
				$placename = $nearplace[$className]['name'];
				$placeType = $nearplace['PlaceType']['name'];
				$family = $nearplace[$className]['family'];
				$species = $nearplace[$className]['species'];
				$genus = $nearplace[$className]['genus'];
				$formatAlt = $nearplace['PlaceType']['name'].' '.$placename.' '.__('Details');
				$metaTag = "$placename listed in $placeType category. $placename is a member of $family Family. The species of $placename is  $species and genus is $genus.";
				$shortDescription = "$placename listed in $placeType category. $placename is a member of $family Family. The species of $placename is  $species and genus is $genus.";
				$postSeo = $nearplace[$className]['seo_name'];
				
				//debug($nearplace);
				
				echo '<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">';
					echo '<div class="blog_about">';
						//echo '<div class="about-border"> <i class="fa fa-tablet aligncenter"></i></div>';
						
							echo "<div class='blog_img $postSeo'>";
								echo '<figure>';
								$imglink = $nearplace[$className]['image'];
								if($className == 'TopicData'){
									$fileExistPath = WWW_ROOT.'img'.DS.'topics'.'medium'.DS.$imglink;
								}else{
									$foldername = $nearplace['PlaceType']['pluralname'];
									$fileExistPath = WWW_ROOT.'img'.DS.$foldername.DS.'photogallery'.DS.$imglink;
								}
								
								if(!empty($imglink) && file_exists($fileExistPath)){
									if($className == 'TopicData'){
										echo $this->Html->image('default.png', array('url' => array('controller'=>'siteactions','action'=>'topic','category'=>$nearplace['PlaceType']['seo_name'],'point'=> $postSeo,'language'=>$currentLng,'id'=> $nearplace[$className]['point_id'],'ext' => 'asp'),'alt' =>$metaTag,'class' => 'img-responsive','data-echo' => SITEIMAGE."topics/medium/$imglink"));
										
									}else{
										echo $this->Html->image('default.png', array('url' => array('controller'=>'siteactions','action'=>$actionName,'category'=>$nearplace['PlaceType']['seo_name'],'point'=> $postSeo,'language'=>$currentLng,'id'=> $newID,'ext' => 'asp'),'class' =>'img-responsive','alt' =>$metaTag,'data-echo' => SITEIMAGE."$foldername/photogallery/$imglink"));
										
									}
									
									
								}else{
									if($className == 'TopicData'){
										echo $this->Html->image('default.png', array('url' => array('controller'=>'siteactions','action'=>'topic','category'=>$nearplace['PlaceType']['seo_name'],'point'=> $postSeo,'language'=>$currentLng,'id'=> $nearplace[$className]['point_id'],'ext' => 'asp'),'alt' =>$metaTag,'class' => 'img-responsive','data-echo' => SITEIMAGE.'default.png'));
									}else{
										echo $this->Html->image('default.png', array('url' => array('controller'=>'siteactions','action'=>$actionName,'category'=>$nearplace['PlaceType']['seo_name'],'point'=> $postSeo,'language'=>$currentLng,'id'=> $newID,'ext' => 'asp'),'class' =>'img-responsive','alt' =>$metaTag,'data-echo' => SITEIMAGE.'default.png'));
									}
								}
								
								echo '<div class="date">';
									$topicIcon = $nearplace['PlaceType']['icon'];
									//echo "<span class='number'><i class='$topicIcon' aria-hidden='true'></i></span>";
									echo "<span class='text'></span>";
								echo '</div>';
								echo '</figure>';
							echo '</div>';
							
							
							
							echo '<div class="blog_txt">';
								echo '<h1>';
								
								echo $this->Html->link(mb_substr($placename,0,55), array('controller'=>'siteactions','action'=>'bucket','itemgroup'=>$className,'category'=>$nearplace['PlaceType']['seo_name'],'point'=> $nearplace[$className]['seo_name'],'language'=>$currentLng,'id'=> $newID,'ext' => 'asp'),array('alt' =>$formatAlt,'escape'=>false));
								
								echo '</h1>';
								/*
								echo '<div class="blog_comment">';
									echo '<ul>';
										echo '<li><a href="#"><i class="fa fa-comment" aria-hidden="true"></i>50</a></li>';
										echo '<li><a href="#"><i class="fa fa-thumbs-up" aria-hidden="true"></i>98</a></li>';
									echo '</ul>';
								echo '</div>';
								*/
								echo '<div class="blog_txt_info">';
									echo '<ul>';
										echo '<li>BY ADMIN</li>';
										echo '<li>SEPT.29,2016</li>';
									echo '</ul>';
								echo '</div>';
								if(!empty($shortDescription)){
									//echo '<p class="articleDesc">'.mb_substr($shortDescription,0,80).'</p>';
								}
								//echo '<a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>';
							echo '</div>';
							
							
					echo '</div>';
				echo '</div>';	
				
				}
				echo '</div>';
				
		?>
		
	</div>	
		
		
	</div>	
	
</div>

