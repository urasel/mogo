<div class="blog_section med_toppadder100 med_bottompadder100">
	<div class="container">
		<div class="row">
			<div class="blog_category_main_wrapper">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			
			
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
	
	
	<!--category wrapper start-->
    <div class="category_wrapper">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="cat_about">
                        <div class="icon_wrapper">
							<?php echo $this->Html->image("images/icon1.png",array('class'=>"img-responsive"));?>
                        </div>
                        <div class="cat_img">
							<?php echo $this->Html->image("images/icon_11.png",array('class'=>"img-responsive"));?>
                        </div>
                        <div class="cat_txt">
                            <h1>Heart Surgery</h1>
                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin at the good health for you.</p>
                            <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="cat_about">
                        <div class="icon_wrapper">
                            <img src="/images/icon2.png" alt="img" class="img-responsive">
                        </div>
                        <div class="cat_img">
                            <img src="/images/icon_2.png" alt="img" class="img-responsive">
                        </div>
                        <div class="cat_txt">
                            <h1>Emergency Care</h1>
                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin at the good health for you.</p>
                            <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="cat_about">
                        <div class="icon_wrapper">
                            <img src="/images/icon3.png" alt="img" class="img-responsive">
                        </div>
                        <div class="cat_img cat_img_3">
                            <img src="/images/icon_3.png" alt="img" class="img-responsive">
                        </div>
                        <div class="cat_txt">
                            <h1>Dental Care</h1>
                            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin at the good health for you.</p>
                            <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!--category wrapper end-->
	
	

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
		
		<div class="blog_wrapper med_toppadder100 med_bottompadder90">
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
						echo '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">';
							echo '<div class="blog_about">';
								$postSeo = $topics['point_seoname'];
								//echo '<div class="about-border"> <i class="fa fa-tablet aligncenter"></i></div>';
									echo '<div class="blog_img">';
										echo '<figure>';
										$imglink = $topics['class_image'];
										$fileExistPath = WWW_ROOT.'img'.DS.$imglink;
										if(!empty($imglink) && file_exists($fileExistPath)){
											echo $this->Html->image('default.png', array('url' => array('controller'=>'siteactions','action'=>$actionName,'category'=>$topics['placetype_seoname'],'point'=> $topics['point_seoname'],'language'=>$currentLng,'id'=> $newID,'ext' => 'asp'),'data-original' => $imglink,'alt' =>$placename.':'.$shortDescription,'data-echo' => SITEIMAGE.$imglink,'class' => 'img-responsive'));
										}else{
											echo $this->Html->image('default.png', array('url' => array('controller'=>'siteactions','action'=>$actionName,'category'=>$topics['placetype_seoname'],'point'=> $topics['point_seoname'],'language'=>$currentLng,'id'=> $newID,'ext' => 'asp'),'alt' =>$placename.':'.$shortDescription, 'data-echo' => 'default.png','class' => 'img-responsive'));
										}
										
										echo '<div class="date">';
											$topicIcon = $topics['placetype_icon'];
											echo "<span class='number'><i class='$topicIcon' aria-hidden='true'></i></span>";
											echo "<span class='text'></span>";
										echo '</div>';
										echo '</figure>';
									echo '</div>';
									
									echo '<div class="blog_comment">';
										echo '<ul>';
											echo '<li><a href="#"><i class="fa fa-comment" aria-hidden="true"></i>50</a></li>';
											echo '<li><a href="#"><i class="fa fa-thumbs-up" aria-hidden="true"></i>98</a></li>';
										echo '</ul>';
									echo '</div>';
									
									echo '<div class="blog_txt">';
										echo '<h1>';
										echo $this->Html->link(mb_substr($placename,0,55), array('controller'=>'siteactions','action'=>$actionName,'category'=>$topics['placetype_seoname'],'point'=> $topics['point_seoname'],'language'=>$currentLng,'id'=> $newID,'ext' => 'asp'),array('alt' =>$placename,'class' =>'topiclink '.$topics['point_seoname']));
									
										echo '</h1>';
										echo '<div class="blog_txt_info">';
											echo '<ul>';
												echo '<li>BY ADMIN</li>';
												echo '<li>SEPT.29,2016</li>';
											echo '</ul>';
										echo '</div>';
										if(!empty($shortDescription)){
											echo '<p class="articleDesc">'.mb_substr($shortDescription,0,80).'</p>';
										}
										//echo '<a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>';
									echo '</div>';
									
									
							echo '</div>';
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
	
			   
			</div>
			
			</div>
		</div>
	</div>
</div> 
</div> 
