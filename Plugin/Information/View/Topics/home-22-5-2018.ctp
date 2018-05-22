	<!-- Story About Us
    ================================================== -->
	<section id="nino-story">
		<div class="container">
			<div class="sectionContent">
				<div class="row nino-hoverEffect">
					<div class="col-md-12 col-sm-12">
					<?php
					$currentLng = $this->Session->read('Config.language');
					echo $this->Html->link('Find Your Nearby Items!', array('controller'=>'siteactions','action'=>'locate'),array('alt' =>'Find Your Nearby Items!','class' =>'noticebutton '));
					?>
							<?php 
								$currentLng = $this->Session->read('Config.language');
								echo $this->Form->create('Siteaction',array('name' =>'searchform','class' =>'navbartwoform','url'=> array('plugin'=>'information','controller' => 'siteactions','action'=>'searchitem','language' => $currentLng))); ?>
										
										<div class="searchformblock">
											<div class="form-group nopadding navbartwoforminput">
										
												<?php 
												echo $this->Form->input('searchname',array('label'=>false,'class'=>"form-control searchcontent", 'id'=>"searchcontent1",'data-toggle'=>"tooltip", 'data-placement'=>"top",'title'=> __("Type What You Want to Search, For language change press Ctrl+g and type Bangla"),'placeholder'=> __("I'm looking for...")));
												echo $this->Form->unlockField('Siteaction.place_id');
												echo $this->Form->input('place_id', array('type'=>'hidden','class'=>'placeid','placeholder'=>__('Location'))); 
												?>
												<button type="submit" class="btn btn-default" id="searchbtnhome">
												<i class="fa fa-search aligncenter"></i>
												</button>
											</div> 
											
										</div>
								<?php echo $this->Form->end(); 
								?>
					</div>
					
				</div>
			</div>
		</div>		
		
		
	</section><!--/#nino-story-->
	
	
	<!-- Claim Your Business
    ================================================== -->
	
	
	<section id="nino-whatWeDo">
    	<div class="container">
    		<h2 class="nino-sectionHeading">
				Claim Your Business
			</h2>
			<div class="sectionContent">
				<div class="row">
					<div class="col-md-6">
						<div class="text-center">
							<img src="img/infothemenew/enlist-business.png" alt="">
						</div>
					</div>
					<div class="col-md-6">
						<div class="text-left">
						<p>
						Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it
						</p>
						<span class="input-group-btn">
							<a class="btn" href="#">Get Your Free Listing!</a>
						</span>
						<div class="smallbold">or call +880 1716282229</div>
						</div>
					</div>
				</div>
			</div>
    	</div>
    </section><!--/#nino-whatWeDo-->
	
	
	<!-- Claim Your Business
    ================================================== -->
	
	<!--
	<section id="nino-whatWeDo">
    	<div class="container">
    		<h2 class="nino-sectionHeading">
				Advertise With Us
			</h2>
			<div class="sectionContent">
				<div class="row">
					<div class="col-md-6">
						<div class="text-center">
							<img src="img/infothemenew/enlist-business.png" alt="">
						</div>
					</div>
					<div class="col-md-6">
						<div class="text-left">
						<p>
						Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it
						</p>
						<span class="input-group-btn">
							<a class="btn" href="#">Get Started!</a>
						</span>
						<div class="smallbold">or call +880 1716282229</div>
						</div>
					</div>
				</div>
			</div>
    	</div>
    </section><!--/#nino-whatWeDo-->
	


    <!-- Latest Blog
    ================================================== -->
	<?php
	
	$visitSetCounter = 0;
	//debug($visitData);
	
	foreach($homeCategoryDetails as $posts){
		if(count($posts['HomePost']) > 0){
			//debug($posts);
			if($currentLng == 'bn' && !empty($posts['HomeCategory']['bn_title'])){
				$featuredTitle = $posts['HomeCategory']['bn_title'];
			}else{
				$featuredTitle = $posts['HomeCategory']['title'];
			}
			
			?>
		
		<section id="nino-latestBlog">
			<div class="container">
                    <h2 class="nino-sectionHeading">
						<!--<span class="nino-subHeading"><?php echo __($featuredTitle)?></span>-->
						<?php echo __($featuredTitle)?>
					</h2>
				<div class="sectionContent">
					<div class="row">
					
					<?php
					foreach($posts['HomePost'] as $topics){
					$publishBefore = $this->Language->datediff($topics['pointcreated']);
						//debug($topics);
					if($currentLng == 'bn' && !empty($topics['class_bntitle'])){
						$placename = $topics['class_bntitle'];
					}else{
						$placename = $topics['class_title'];
					}
					if($currentLng == 'bn' && !empty($topics['class_bn_details'])){
						$shortDescription = $topics['class_bn_details'];
					}else{
						$shortDescription = $topics['class_details'];
					}
					if($topics['placetype_pluralname'] == 'topics'){
						$actionName = 'topic';
						$newID = $topics['pointid'];
						
					}else{
						$actionName = 'infos';
						$stringlength = strlen($topics['point_seoname']);
						$newID = $stringlength.$topics['pointid'];
					}
					
					//debug($interval);
						echo '<div class="col-md-4 col-sm-4">';
							echo '<article>';
								$postSeo = $topics['point_seoname'];
								//echo '<div class="about-border"> <i class="fa fa-tablet aligncenter"></i></div>';
									echo '<div class="articleThumb">';
										$imglink = $topics['class_image'];
										$fileExistPath = WWW_ROOT.'img'.DS.$imglink;
										if(!empty($imglink) && file_exists($fileExistPath)){
											echo $this->Html->image('default.png', array('url' => array('controller'=>'siteactions','action'=>$actionName,'category'=>$topics['placetype_seoname'],'point'=> $topics['point_seoname'],'language'=>$currentLng,'id'=> $newID,'ext' => 'asp'),'data-original' => $imglink,'alt' =>$placename.':'.$shortDescription,'data-echo' => SITEIMAGE.$imglink));
										}else{
											echo $this->Html->image('default.png', array('url' => array('controller'=>'siteactions','action'=>$actionName,'category'=>$topics['placetype_seoname'],'point'=> $topics['point_seoname'],'language'=>$currentLng,'id'=> $newID,'ext' => 'asp'),'alt' =>$placename.':'.$shortDescription, 'data-echo' => 'default.png'));
										}
										
										echo '<div class="date">';
											$topicIcon = $topics['placetype_icon'];
											echo "<span class='number'><i class='$topicIcon' aria-hidden='true'></i></span>";
											echo "<span class='text'></span>";
										echo '</div>';
									echo '</div>';
									
									echo '<h3 class="articleTitle">';
									echo $this->Html->link(mb_substr($placename,0,55), array('controller'=>'siteactions','action'=>$actionName,'category'=>$topics['placetype_seoname'],'point'=> $topics['point_seoname'],'language'=>$currentLng,'id'=> $newID,'ext' => 'asp'),array('alt' =>$placename,'class' =>'topiclink '.$topics['point_seoname']));
									echo '</h3>';
									if(!empty($shortDescription)){
										echo '<p class="articleDesc">'.mb_substr($shortDescription,0,80).'</p>';
									}
									echo '<div class="articleMeta">';
										echo '<a href="#"><i class="mdi mdi-eye nino-icon"></i> 995</a>';
										echo '<a href="#"><i class="mdi mdi-comment-multiple-outline nino-icon"></i> 42</a>';
									echo '</div>';
									
							echo '</article>';
							echo '</div>';	
								
						
					$visitSetCounter++;
					}
					?>
					</div>
				</div>
			</div>
		</section>
			<?php
		}
	}
	?>
	
	
	
    <!-- Testimonial
    ================================================== -->
    <section class="nino-testimonial">
    	<div class="container">
    		<div class="nino-testimonialSlider">
				<ul>
					<li>
						<div layout="row">
							<div class="nino-symbol fsr">
								<i class="mdi mdi-comment-multiple-outline nino-icon"></i>
							</div>
							<div>
								<p class="quote">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation."</p>
								<span class="name">Jon Doe</span>
							</div>
						</div>
					</li>
					<li>
						<div layout="row">
							<div class="nino-symbol fsr">
								<i class="mdi mdi-wechat nino-icon"></i>	
							</div>
							<div>
								<p class="quote">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation."</p>
								<span class="name">Jon Doe</span>
							</div>
						</div>
					</li>
					<li>
						<div layout="row">
							<div class="nino-symbol fsr">
								<i class="mdi mdi-message-text-outline nino-icon"></i>
							</div>
							<div>
								<p class="quote">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation."</p>
								<span class="name">Jon Doe</span>
							</div>
						</div>
					</li>
				</ul>
			</div>
    	</div>
    </section><!--/#nino-testimonial-->
	