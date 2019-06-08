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
										echo $this->Html->link('<h4>{{post.placename}}</h4>', array('controller'=>'siteactions','action'=>'infos','category'=>"{{post.place_type_seo_name}}",'point'=> "{{post.point_seo_name}}",'id'=> "{{post.newID}}",'ext' => 'asp','service'=> 'motorcycles'),array('alt' =>"{{post.placename}}",'escape'=>false,'class' => 'infositelink'));
										
									?>
									<div class="metadata_block">
										
										<div class="add_metadata">
											<span><b>Max Power:</b> </span> {{post.point_param1}}
										</div>
										<div class="metadata">
											<span><b>Top Speed:</b> </span> {{post.point_param2}}
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
										echo $this->Html->link('<h4>{{post.placename}}</h4>', array('controller'=>'siteactions','action'=>'infos','category'=>"{{post.place_type_seo_name}}",'point'=> "{{post.point_seo_name}}",'language'=>$currentLng,'id'=> "{{post.newID}}",'ext' => 'asp'),array('alt' =>"{{post.placename}}",'escape'=>false,'class' => 'infositelink'));
	
									?>
									<div class="metadata_block">
										<div class="metadata">
											<span><b>Category:</b> </span> {{post.place_type_name}}
										</div>
										<div class="add_metadata">
											<span><b>Address:</b> </span> {{post.address}}
										</div>
										
									</div>
								</div>
							</div>
						</div>
					</div>
			
					
					
					<div ng-if="post.place_type_singlename == 'topicData'">
					
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
										echo $this->Html->link('<h4>{{post.placename}}</h4>', array('controller'=>'siteactions','action'=>'infos','category'=>"{{post.place_type_seo_name}}",'point'=> "{{post.point_seo_name}}",'language'=>$currentLng,'id'=> "{{post.newID}}",'ext' => 'asp'),array('alt' =>"{{post.placename}}",'escape'=>false,'class' => 'infositelink'));
	
									?>
									<div class="metadata_block">
										<div class="metadata">
											<span><b>Topic Category:</b> </span> {{post.place_type_name}}
										</div>
										<div class="add_metadata">
											<span><b>Writer:</b> </span> {{post.address}}
										</div>
										
									</div>
								</div>
							</div>
						</div>
						
					</div>
					
					<div ng-if="post.place_type_singlename == 'continent'">
						
					</div>
					<div ng-if="post.place_type_singlename == 'yellowPage'">
					
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
										echo $this->Html->link('<h4>{{post.placename}}</h4>', array('controller'=>'siteactions','action'=>'infos','category'=>"{{post.place_type_seo_name}}",'point'=> "{{post.point_seo_name}}",'language'=>$currentLng,'id'=> "{{post.newID}}",'ext' => 'asp'),array('alt' =>"{{post.placename}}",'escape'=>false,'class' => 'infositelink'));
	
									?>
									<div class="metadata_block">
										<div class="metadata">
											<span><b>Category:</b> </span> {{post.place_type_name}}
										</div>
										<div class="add_metadata">
											<span><b>Address:</b> </span> {{post.address}}
										</div>
										
									</div>
								</div>
							</div>
						</div>
						
					</div>
					<div ng-if="post.place_type_singlename == 'babyName'">
						
					</div>
					<div ng-if="post.place_type_singlename == 'animal'">
					
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
										echo $this->Html->link('<h4>{{post.placename}}</h4>', array('controller'=>'siteactions','action'=>'infos','category'=>"{{post.place_type_seo_name}}",'point'=> "{{post.point_seo_name}}",'language'=>$currentLng,'id'=> "{{post.newID}}",'ext' => 'asp'),array('alt' =>"{{post.placename}}",'escape'=>false,'class' => 'infositelink'));
	
									?>
									<div class="metadata_block">
										<div class="metadata">
											<span><b>Family:</b> </span> {{post.point_param1}}
										</div>
										<div class="add_metadata">
											<span><b>Species:</b> </span> {{post.point_param2}}
										</div>
										
									</div>
								</div>
							</div>
						</div>
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
										echo $this->Html->link('<h4>{{post.placename}}</h4>', array('controller'=>'siteactions','action'=>'infos','category'=>"{{post.place_type_seo_name}}",'point'=> "{{post.point_seo_name}}",'language'=>$currentLng,'id'=> "{{post.newID}}",'ext' => 'asp'),array('alt' =>"{{post.placename}}",'escape'=>false,'class' => 'infositelink'));
	
									?>
									
									<div class="metadata_block">
										<div class="metadata">
											<span><b>Mobile:</b> </span> {{post.point_param1}}
										</div>
										<div class="add_metadata">
											<span><b>Address:</b> </span> {{post.point_param2}}
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
										echo $this->Html->link('<h4>{{post.placename}}</h4>', array('controller'=>'siteactions','action'=>'infos','category'=>"{{post.place_type_seo_name}}",'point'=> "{{post.point_seo_name}}",'language'=>$currentLng,'id'=> "{{post.newID}}",'ext' => 'asp'),array('alt' =>"{{post.placename}}",'escape'=>false,'class' => 'infositelink'));
	
									?>
									<div class="metadata_block">
										<div class="metadata">
											<span><b>Elevation ft:</b> </span> {{post.point_param1}}
										</div>
										<div class="add_metadata">
											<span><b>GPS code:</b> </span> {{post.point_param2}}
										</div>
										
									</div>
								</div>
							</div>
						</div>
					</div>
					<div ng-if="post.place_type_singlename == 'stadium'">
					
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
										echo $this->Html->link('<h4>{{post.placename}}</h4>', array('controller'=>'siteactions','action'=>'infos','category'=>"{{post.place_type_seo_name}}",'point'=> "{{post.point_seo_name}}",'language'=>$currentLng,'id'=> "{{post.newID}}",'ext' => 'asp'),array('alt' =>"{{post.placename}}",'escape'=>false,'class' => 'infositelink'));
	
									?>
									<div class="metadata_block">
										<div class="metadata">
											<span><b>Capacity:</b> </span> {{post.point_param1}}
										</div>
										<div class="add_metadata">
											<span><b>Built On:</b> </span> {{post.point_param2}}
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
										echo $this->Html->link('<h4>{{post.placename}}</h4>', array('controller'=>'siteactions','action'=>'infos','category'=>"{{post.place_type_seo_name}}",'point'=> "{{post.point_seo_name}}",'language'=>$currentLng,'id'=> "{{post.newID}}",'ext' => 'asp'),array('alt' =>"{{post.placename}}",'escape'=>false,'class' => 'infositelink'));
	
									?>
									<div class="metadata_block">
										<div class="metadata">
											<span><b>EIIN Number:</b> </span> {{post.point_param1}}
										</div>
										<div class="add_metadata">
											<span><b>Level:</b> </span> {{post.point_param2}}
										</div>
										
									</div>
								</div>
							</div>
						</div>
					</div>
					<div ng-if="post.place_type_singlename == 'hospital'">
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
										echo $this->Html->link('<h4>{{post.placename}}</h4>', array('controller'=>'siteactions','action'=>'infos','category'=>"{{post.place_type_seo_name}}",'point'=> "{{post.point_seo_name}}",'language'=>$currentLng,'id'=> "{{post.newID}}",'ext' => 'asp'),array('alt' =>"{{post.placename}}",'escape'=>false,'class' => 'infositelink'));
	
									?>
									<div class="metadata_block">
										<div class="metadata">
											<span><b>EIIN Number:</b> </span> {{post.point_param1}}
										</div>
										<div class="add_metadata">
											<span><b>Address:</b> </span> {{post.point_param2}}
										</div>
										
									</div>
								</div>
							</div>
						</div>
					</div>
					<div ng-if="post.place_type_singlename == 'recipe'">
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
										echo $this->Html->link('<h4>{{post.placename}}</h4>', array('controller'=>'siteactions','action'=>'infos','category'=>"{{post.place_type_seo_name}}",'point'=> "{{post.point_seo_name}}",'language'=>$currentLng,'id'=> "{{post.newID}}",'ext' => 'asp'),array('alt' =>"{{post.placename}}",'escape'=>false,'class' => 'infositelink'));
	
									?>
									<div class="metadata_block">
										<div class="metadata">
											
										</div>
										<div class="add_metadata">
											
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
