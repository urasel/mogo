<?php
	  //debug($entries);exit;
	  $this->loadHelpers(array('Language','Theme'));
	  $currentLng = $this->Session->read('Config.language');
      $this->Html->addCrumb(__('World'), array('plugin'=>'information','controller' => 'siteactions', 'action' => 'world','language' => $currentLng)) ;
	  if($passCountryName == '' || is_numeric($passCountryName)){
		  $this->Html->addCrumb(__('All'), array('plugin'=>'information','controller' => 'siteactions', 'action' => 'sitemap','language' => $currentLng)) ;
	  }else{
		  $this->Html->addCrumb($passCountryName, array('plugin'=>'information','controller' => 'siteactions', 'action' => 'sitemap','language' => $currentLng,'?' => array('country' => $queryCountry))) ;
	  }
	  
	  $breadcumpArray = array_reverse($breadcumpArray);
	  //debug($breadcumpArray);exit;
	  foreach($breadcumpArray as $breadcumb){
		  //debug($breadcumb);
		  if($categoryName != $breadcumb['PlaceType']['name']){
			 $stringlength = strlen($breadcumb['PlaceType']['seo_name']);
			$newID = $stringlength.$breadcumb['PlaceType']['id'];
			if($breadcumb['PlaceType']['name'] == 'Motor Bikes'){	
				$this->Html->addCrumb($breadcumb['PlaceType']['name'],array('plugin'=>'information','controller' => 'motorcycles','action'=>'motorcycles') ,array('alt' =>$breadcumb['PlaceType']['name'])); 
			}else{
				$this->Html->addCrumb($breadcumb['PlaceType']['name'],array('plugin'=>'information','controller' => 'siteactions','action'=>'subcategories','country'=>$queryCountry,'category'=>$breadcumb['PlaceType']['seo_name'],'id'=> $newID,'language'=>$currentLng,'ext' => 'asp') ,array('alt' =>$breadcumb['PlaceType']['name'])); 
			}
			
		  }else{
			$this->Html->addCrumb($breadcumb['PlaceType']['name'] ,  '' , array('class' => 'active'));  
		  }
		  
	  }
      //$this->Html->addCrumb($categoryName ,  '' , array('class' => 'active'));
	  
	  $address = '';
?>
<div class="container">
	
		<div class="row">
			<div class="col-md-12">			
				<div class="col-md-12 posttitleblock zeropadding">
					<div class="col-sm-112 col-xs-12 col-md-12 zeropadding">
					<?php 
							echo '<h1>'.$title_for_layout.'</h1>'; 
							
					?>
					</div>
				</div>
			</div>
		</div>

		<div class="row placeview">
			<div class="col-md-8 leftbody">
				<div class="sortingblock">
					<div class="row">
					<div class="col-md-12 sortingblockContainer">
					<?php
						$stringlength = strlen($parent_seo_name);
						$newID = $stringlength.$PlaceTypeID;
						foreach(range('A','Z') as $string){
							//echo $queryCountry.'rrrr';exit;
							$altText = $parent_seo_name. ' Name Start with '.$string;
							if(isset($this->params['service'])){
								if(!empty($queryCountry)){
									echo $this->Html->link($string, array('plugin'=>'information','controller' => 'siteactions','action'=>'categories','country'=>$queryCountry,'category'=>$parent_seo_name,'id'=> $newID,'page'=>1,'character'=>$string,'ext' => 'asp'),array('alt' =>$altText,'class' => 'sortlink'));
								}else{
									echo $this->Html->link($string, array('plugin'=>'information','controller' => 'siteactions','action'=>'categories','country'=> null,'category'=>$parent_seo_name,'id'=> $newID,'page'=>1,'character'=>$string,'ext' => 'asp'),array('alt' =>$altText,'class' => 'sortlink'));
								}
							}else{
								if(!empty($queryCountry)){
									echo $this->Html->link($string, array('plugin'=>'information','controller' => 'siteactions','action'=>'categories','country'=>$queryCountry,'category'=>$parent_seo_name,'id'=> $newID,'language'=>$currentLng,'page'=>1,'character'=>$string,'ext' => 'asp'),array('alt' =>$altText,'class' => 'sortlink'));
								}else{
									echo $this->Html->link($string, array('plugin'=>'information','controller' => 'siteactions','action'=>'categories','country'=> null,'category'=>$parent_seo_name,'id'=> $newID,'language'=>$currentLng,'page'=>1,'character'=>$string,'ext' => 'asp'),array('alt' =>$altText,'class' => 'sortlink'));
								}
							}
							
							
						}
					echo '</div>';
					echo '</div>';
				echo '</div>';
				
				$userData = $this->Session->read('Auth.User');
				$userID = $userData['id'];
				//debug($this->params);
				$id = $id;
				$singleName = $singleName;
				$childs = $childs;
				$character = $character;
				$queryCountry = $queryCountry;
				$countryId = $countryId;
				
				
				echo '<div class="row">';
				echo '<div class="col-md-12">';
				
				//debug($this->params);
				?>
				<p class="id hidden"><?php echo $id;?></p>
				<p class="singleName hidden"><?php echo $singleName;?></p>
				<p class="childs hidden"><?php echo implode(", ", $childs );?></p>
				<p class="character hidden"><?php echo $character;?></p>
				<p class="queryCountry hidden"><?php echo $queryCountry;?></p>
				<p class="countryId hidden"><?php echo $countryId;?></p>
			
				<div  ng-app='myapp' ng-controller='fetchCtrl'>
					<div class="container" infinite-scroll="getPosts()">
					
						<div class="post" ng-repeat="post in posts track by $index">
							
							<!--{{post.place_type_singlename}}-->
							<div ng-if="post.place_type_singlename == 'motorcycle'">
								<div class="row">
									<div class="col-md-12 zeropadding">
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
									<div class="col-md-12 zeropadding">
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
									<div class="col-md-12 zeropadding">
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
									<div class="col-md-12 zeropadding">
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
									<div class="col-md-12 zeropadding">
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
						<div ng-show='loading' class='loading'>Loading...</div>
					</div>
				</div>
				<?php
				echo '</div>';
				echo '</div>';
			?>
			

			</div>
			<div class="col-md-4">
			
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">&nbsp;</div>
		</div>
</div>