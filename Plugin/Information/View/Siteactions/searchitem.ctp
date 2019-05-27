<?php
	  $currentLng = $this->Session->read('Config.language');
	  $this->Html->addCrumb(__('Sitemap'), array('plugin'=>'information','controller' => 'siteactions','action' => 'sitemap')) ;
      $this->Html->addCrumb(__('Search Result'),  '', array('class' => 'active')) ;
?>
<div class="container">
		<div class="row placeview">
		<div class="col-md-12 posttitleblock zeropadding">
		<div class="col-md-12">
		<?php 
				echo '<h1>'.$title_for_layout.'</h1>'; 
				
		?>
		</div>
		</div>
<div class="col-md-8">
		<p class="searchName hidden"><?php echo $searchName;?></p>
		<p class="fieldName hidden"><?php echo $fieldName;?></p>
		<p class="searchStringParams hidden"><?php echo $searchStringParams;?></p>
		
		<div  ng-app='searchapp' ng-controller='fetchCtrlSearch'>
			<div infinite-scroll="getPosts()">
			
				<div class="post" ng-repeat="post in posts track by $index">
				
					<!--{{post.place_type_singlename}}-->
					<div ng-if="post.place_type_singlename == 'motorcycle'">
						<div class="row">
							<div class="col-md-12">
								<div class="itemblock_image">
									<?php
										if(!"{{post.imglink}}"){
											$imglink = "{{post.place_type_singlename}}/small/{{post.imglink}}";
											echo $this->Html->image($imglink,array('id'=>'preview','class'=>'img-responsive'));
										}else{
											$imglink = "icon.png";
											echo $this->Html->image($imglink,array('id'=>'preview','class'=>'img-responsive'));
										}
									?>
								</div>
								<div class="itemblock_details">
								
									<?php
										echo $this->Html->link('<h4>{{post.placename}}</h4>', array('controller'=>'siteactions','action'=>'infos','category'=>"{{post.place_type_seo_name}}",'point'=> "{{post.class_seo_name}}",'id'=> "{{post.newID}}",'ext' => 'asp','service'=> 'motorcycles'),array('alt' =>"{{post.placename}}",'escape'=>false,'class' => 'infositelink'));
										
									?>
									<div class="metadata_block">
										<div class="metadata">
											<span><b>Mileage:</b> </span> {{post.mileage}}
										</div>
										<div class="add_metadata">
											<span><b>Max Power:</b> </span> {{post.maximum_power}}
										</div>
										
									</div>
								</div>
							</div>
						</div>
					</div>
			
					
					<div class="itemblock" ng-if="'{{post.place_type_singlename}}' == 'topicData'">
						<div class="row">
								<div class="col-md-2 col-xs-4">
									<?php
										if(!"{{post.imglink}}"){
											$imglink = "motorcycles/small/{{post.imglink}}";
											echo $this->Html->image($imglink,array('id'=>'preview','class'=>'img-responsive'));
										}else{
											$imglink = "motorcycles/default.jpg";
											echo $this->Html->image($imglink,array('id'=>'preview','class'=>'img-responsive'));
										}
									?>
								</div>
								<div class="col-md-10 col-xs-8">
									<?php
										echo $this->Html->link('<h1>{{post.placename}}</h1>', array('controller'=>'siteactions','action'=>'infos','category'=>"{{post.place_type_seo_name}}",'point'=> "{{post.class_seo_name}}",'id'=> "{{post.newID}}",'ext' => 'asp','service'=> 'motorcycles'),array('alt' =>"{{post.placename}}",'escape'=>false,'class' => 'infositelink'));
									?>
								</div>
						</div>
					</div>
					
					<div ng-if="post.place_type_singlename == 'continent'">
						
					</div>
					<div ng-if="post.place_type_singlename == 'babyName'">
						
					</div>
					<div ng-if="post.place_type_singlename == 'animal'">
						{{post.place_type_singlename}}
					</div>
					<div ng-if="post.place_type_singlename == 'place'">
					
						<div class="row">
							<div class="col-md-12">
								<div class="itemblock_image">
									<?php
										if(!"{{post.imglink}}"){
											$imglink = "{{post.place_type_singlename}}/small/{{post.imglink}}";
											echo $this->Html->image($imglink,array('id'=>'preview','class'=>'img-responsive'));
										}else{
											$imglink = "icon.png";
											echo $this->Html->image($imglink,array('id'=>'preview','class'=>'img-responsive'));
										}
									?>
								</div>
								<div class="itemblock_details">
								
									<?php
										echo $this->Html->link('<h4>{{post.placename}}</h4>', array('controller'=>'siteactions','action'=>'infos','category'=>"{{post.place_type_seo_name}}",'country'=>"{{post.countrySeoName}}",'point'=> "{{post.class_seo_name}}",'language'=>$currentLng,'id'=> "{{post.newID}}",'ext' => 'asp'),array('alt' =>"{{post.placename}}",'escape'=>false,'class' => 'infositelink'));
	
									?>
									<div class="metadata_block">
										<div class="metadata">
											<span><b>Mobile:</b> </span> {{post.mobile}}
										</div>
										<div class="add_metadata">
											<span><b>Address:</b> </span> {{post.address}}
										</div>
										
									</div>
								</div>
							</div>
						</div>
					</div>
					<div ng-if="post.place_type_singlename == 'airport'">
					
						<div class="row">
							<div class="col-md-12">
								<div class="itemblock_image">
									<?php
										if(!"{{post.imglink}}"){
											$imglink = "{{post.place_type_singlename}}/small/{{post.imglink}}";
											echo $this->Html->image($imglink,array('id'=>'preview','class'=>'img-responsive'));
										}else{
											$imglink = "icon.png";
											echo $this->Html->image($imglink,array('id'=>'preview','class'=>'img-responsive'));
										}
									?>
								</div>
								<div class="itemblock_details">
								
									<?php
										echo $this->Html->link('<h4>{{post.placename}}</h4>', array('controller'=>'siteactions','action'=>'infos','category'=>"{{post.place_type_seo_name}}",'country'=>"{{post.countrySeoName}}",'point'=> "{{post.class_seo_name}}",'language'=>$currentLng,'id'=> "{{post.newID}}",'ext' => 'asp'),array('alt' =>"{{post.placename}}",'escape'=>false,'class' => 'infositelink'));
	
									?>
									<div class="metadata_block">
										<div class="metadata">
											<span><b>Elevation ft:</b> </span> {{post.elevation_ft}}
										</div>
										<div class="add_metadata">
											<span><b>GPS code:</b> </span> {{post.gps_code}}
											&nbsp;&nbsp;<span><b>IATA code:</b> </span> {{post.iata_code}}
										</div>
										
									</div>
								</div>
							</div>
						</div>
					</div>
					<div ng-if="post.place_type_singlename == 'location'">
					
						<div class="row">
							<div class="col-md-12">
								<div class="itemblock_image">
									<?php
										if(!"{{post.imglink}}"){
											$imglink = "{{post.place_type_singlename}}/small/{{post.imglink}}";
											echo $this->Html->image($imglink,array('id'=>'preview','class'=>'img-responsive'));
										}else{
											$imglink = "icon.png";
											echo $this->Html->image($imglink,array('id'=>'preview','class'=>'img-responsive'));
										}
									?>
								</div>
								<div class="itemblock_details">
								
									<?php
										echo $this->Html->link('<h4>{{post.placename}}</h4>', array('controller'=>'siteactions','action'=>'infos','category'=>"{{post.place_type_seo_name}}",'country'=>"{{post.{{post.countrySeoName}}}}",'point'=> "{{post.class_seo_name}}",'language'=>$currentLng,'id'=> "{{post.newID}}",'ext' => 'asp'),array('alt' =>"{{post.placename}}",'escape'=>false,'class' => 'infositelink'));
	
									?>
									<div class="metadata_block">
										<div class="metadata">
											<span><b>Address:</b> </span> {{post.address}}
										</div>
										<div class="add_metadata">
										</div>
										
									</div>
								</div>
							</div>
						</div>
					</div>
					<div ng-if="post.place_type_singlename == 'institute'">
						<div class="row">
							<div class="col-md-12">
								<div class="itemblock_image">
									<?php
										if(!"{{post.imglink}}"){
											$imglink = "{{post.place_type_singlename}}/small/{{post.imglink}}";
											echo $this->Html->image($imglink,array('id'=>'preview','class'=>'img-responsive'));
										}else{
											$imglink = "icon.png";
											echo $this->Html->image($imglink,array('id'=>'preview','class'=>'img-responsive'));
										}
									?>
								</div>
								<div class="itemblock_details">
								
									<?php
										echo $this->Html->link('<h4>{{post.placename}}</h4>', array('controller'=>'siteactions','action'=>'infos','category'=>"{{post.place_type_seo_name}}",'country'=>"{{post.countrySeoName}}",'point'=> "{{post.class_seo_name}}",'language'=>$currentLng,'id'=> "{{post.newID}}",'ext' => 'asp'),array('alt' =>"{{post.placename}}",'escape'=>false,'class' => 'infositelink'));
	
									?>
									<div class="metadata_block">
										<div class="metadata">
											<span><b>EIN Number:</b> </span> {{post.eiin_no}}
										</div>
										<div class="add_metadata">
											<span><b>Address:</b> </span> {{post.address}}
										</div>
										
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div ng-else>
						
					</div>
				
				</div>
				<div ng-show='loading' class='loader'></div>
			</div>
		</div>

<?php

	$language = $this->Session->read('Config.language');
	//echo '<div class="panel panel-info" style="margin-top:0px;">';
		echo '<div class="table-responsive searchrow">';
		if(count($places) > 0){
		
		foreach($places as $place):
		//debug($place);exit;
		if(isset($place['Country']['seo_name']) && !empty($place['Country']['seo_name'])){
			$countryname = $place['Country']['seo_name'];
		}else{
			$countryname = '';
		}
		$modelName = 'Point';
		
				if($currentLng == 'bn'){
					$languageID = 2;
				}else{
					$languageID = 1;
				}
				if($modelName == 'Location'){
					$placename = $place[$modelName]['name'].' details facts';
				}else if($modelName == 'TopicData'){
					if($currentLng == 'bn' && !empty($place[$modelName]['bn_name'])){
						$placename = $place[$modelName]['bn_name'];
						$shortContent = '';
					}else if($currentLng == 'en' && empty($place[$modelName]['bn_name'])){
						$placename = $place[$modelName]['name'];
						$shortContent = '';
					}else if($currentLng == 'en' && empty($place[$modelName]['name'])){
						$placename = $place[$modelName]['bn_name'];
						$shortContent = '';
					}else{
						$placename = $place[$modelName]['name'];
						$shortContent = '';
					}
				}else{
						if($currentLng == 'bn' && !empty($place[$modelName]['bn_name'])){
						$placename = $place[$modelName]['bn_name'];	
						}else{
						$placename = $place[$modelName]['name'];
						}
				}
				
		if($place['PlaceType']['singlename'] == 'topicData'){
			$address = '';
		}else if($place['PlaceType']['singlename'] == 'motorcycle'){
			$address = '';
		}else if($place['PlaceType']['singlename'] == 'animal'){
			$address = '';
		}else if($place['PlaceType']['singlename'] == 'continent'){
			$address = '';
		}else if($place['PlaceType']['singlename'] == 'recipe'){
			$address = '';
		}else if($place['PlaceType']['singlename'] == 'babyName'){
			$address = $place[$modelName]['meaning'];
		}else{
			if($currentLng == 'bn' && !empty($place[$modelName]['bn_address'])){
				$address = $place[$modelName]['bn_address'];	
			}else{
				$address = $place[$modelName]['address'];
			}
		}
		if(in_array($modelName,array('BabyName'))){
			$stringlength = strlen($place[$modelName]['seo_name']);
			$newID = $stringlength.$place[$modelName]['id'];
		}else if(in_array($modelName,array('TopicData'))){
			$stringlength = strlen($place['Point']['seo_name']);
			$newID = $stringlength.$place['Point']['id'];
		}else{
			$stringlength = strlen($place[$modelName]['seo_name']);
			$newID = $stringlength.$place[$modelName]['id'];
		}
		
		echo '<div class="blog_txt">';
		if($place['PlaceType']['singlename'] == 'topicData'){
			echo '<div class="row">';
			echo '<div class="col-md-3">';
				if(!empty($place[$modelName]['image'])){
					$imglink = "topics/medium/".$place[$modelName]['image'];
					echo $this->Html->image($imglink,array('id'=>'preview','class'=>'img-responsive'));
				}else{
					$icon = $category['pl']['icon'];
					echo "<i class='fontsitemap $icon'></i>";
				}
			echo '</div>';
			echo '<div class="col-md-9">';
				echo $this->Html->link('<h1><span>'.$placename.'</span></h1>', array('controller'=>'siteactions','action'=>'topic','category'=>$place['PlaceType']['seo_name'],'point'=> $place['Point']['seo_name'],'language'=>$currentLng,'id'=> $place[$modelName]['point_id'],'ext' => 'asp'),array('alt' =>$placename,'escape'=>false));
				echo '<p>'.mb_substr($shortContent,0,120).'..</p>';
			echo '</div>';
			echo '</div>';
			
		}else if($place['PlaceType']['singlename'] == 'continent'){
		echo $this->Html->link('<h1>'.$placename.'</h1>', array('controller'=>'siteactions','action'=>'countries','category'=>$place['Continent']['seo_name'],'point'=> $place[$modelName]['seo_name'],'language'=>$currentLng,'id'=> $place[$modelName]['point_id'],'ext' => 'asp'),array('alt' =>$placename,'escape'=>false,'class' => 'infositelink'));
		}else if($modelName == 'Location'){
		echo $this->Html->link('<h1>'.$placename.'</h1>', array('controller'=>'siteactions','action'=>'infos','category'=>$place['PlaceType']['seo_name'],'country'=>$countryname,'point'=> $place[$modelName]['seo_name'],'language'=>$currentLng,'id'=> $newID,'ext' => 'asp'),array('alt' =>$placename,'escape'=>false,'class' => 'infositelink'));
		}else if(in_array($modelName,array('BabyName'))){
			$genderId = $place[$modelName]['sex_id'];
			if($genderId == 1){
				$genderIcon = '<i class="fa fa-male" aria-hidden="true"></i>';
			}else{
				$genderIcon = '<i class="fa fa-female" aria-hidden="true"></i>';
			}
		echo $this->Html->link('<h1>'.$genderIcon.' '.$placename.'</h1>', array('controller'=>'siteactions','action'=>'bucket','itemgroup'=>$modelName,'category'=>$place['PlaceType']['seo_name'],'point'=> $place[$modelName]['seo_name'],'language'=>$currentLng,'id'=> $newID,'ext' => 'asp'),array('alt' =>$placename,'escape'=>false,'class' => 'infositelink'));
		}else if(in_array($modelName,array('Animal'))){
		echo $this->Html->link('<h1>'.$placename.'</h1>', array('controller'=>'siteactions','action'=>'infos','category'=>$place['PlaceType']['seo_name'],'point'=> $place[$modelName]['seo_name'],'language'=>$currentLng,'id'=> $newID,'ext' => 'asp'),array('alt' =>$placename,'escape'=>false,'class' => 'infositelink'));
		}else{
		echo $this->Html->link('<h1>'.$placename.'</h1>', array('controller'=>'siteactions','action'=>'infos','category'=>$place['PlaceType']['seo_name'],'country'=>$countryname,'point'=> $place[$modelName]['seo_name'],'language'=>$currentLng,'id'=> $newID,'ext' => 'asp'),array('alt' =>$placename,'escape'=>false,'class' => 'infositelink'));
		}
		
		echo '</div>';
		echo '<p>';
		
		if(!empty($address)){
			echo $address;
		}
		
		echo '</p>';
		
		
		
		
		
		
		
		endforeach;
		}else{
		echo '<p>No Item Found</p>';
		}
		echo '</div>';
		if(isset($matchTerm)){
			$matchTerm = $matchTerm;
		}else{
			$matchTerm = '';
		}

	echo '</div>';
	echo '<div class="col-md-4">';
	
	echo '</div>';
				
?>
</div>
</div>
