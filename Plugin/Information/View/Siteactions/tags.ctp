<?php
	  //debug($entries);exit;
	  $this->loadHelpers(array('Language'));
	  $currentLng = $this->Session->read('Config.language');
	  $this->Html->addCrumb(__('World'), array('plugin'=>'information','controller' => 'siteactions', 'action' => 'world','language' => $currentLng)) ;
	  if($passCountryName == ''){
		  $this->Html->addCrumb(__('All'), array('plugin'=>'information','controller' => 'siteactions', 'action' => 'sitemap','language' => $currentLng)) ;
	  }else{
		  $this->Html->addCrumb($passCountryName, array('plugin'=>'information','controller' => 'siteactions', 'action' => 'sitemap','language' => $currentLng,'?' => array('country' => $queryCountry))) ;
	  }
	  
      $this->Html->addCrumb($title_for_layout ,  '' , array('class' => 'active'));
	  $currentLng = $this->Session->read('Config.language');
	  //debug($this->Session);
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
			<p class="currentLng hidden"><?php echo $currentLng;?></p>
			<p class="passtype hidden"><?php echo $passtype;?></p>
			<p class="passseotitle hidden"><?php echo $passseotitle;?></p>
			<p class="country hidden"><?php echo $country;?></p>
			<p class="passcountry hidden"><?php echo $passcountry;?></p>
			<p class="division hidden"><?php echo $division;?></p>
			<p class="passdivision hidden"><?php echo $passdivision;?></p>
			<p class="district hidden"><?php echo $district;?></p>
			<p class="passdistrict hidden"><?php echo $passdistrict;?></p>
			<p class="thana hidden"><?php echo $thana;?></p>
			<p class="passthana hidden"><?php echo $passthana;?></p>
			<p class="slugid hidden"><?php echo $slugid;?></p>
			<p class="singleName hidden"><?php echo $singleName;?></p>
			<p class="className hidden"><?php echo $className;?></p>
			<p class="placeTypeID hidden"><?php echo $placeTypeID;?></p>
			<p class="contentTitle hidden"><?php echo $contentTitle;?></p>
			<p class="loadModelName hidden"><?php echo $loadModelName;?></p>
			<p class="params hidden"><?php echo $params ;?></p>
			<p class="queryCountry hidden"><?php echo $queryCountry ;?></p>
			
			<div class="col-md-8 leftbody">
			<?php
					$userData = $this->Session->read('Auth.User');
					$userID = $userData['id'];
					
					
					?>
					<div  ng-app='tagapp' ng-controller='fetchCtrlTag'>
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
					
			</div>
			<div class="col-md-4">
			</div>

		</div>
</div>