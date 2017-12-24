
    <!--/SLIDER SECTION -->
	<?php echo $this->element('infotheme/slider'); ?>
	<!-- end slider-wrapper -->  
         
   
	
	<section id="features" class="feature-wrapper">
    	<div class="container">
			<div data-scroll-reveal="enter from the bottom after 0.3s" class="feature-img">
				<div class="col-md-12 mostimportant">
				<?php 
				$currentLng = $this->Session->read('Config.language');
				echo $this->Form->create('Siteaction',array('name' =>'searchform','class' =>'navbartwoform','url'=> array('plugin'=>'information','controller' => 'siteactions','action'=>'searchitem','language' => $currentLng))); ?>
						
						<div class="searchformblock">
							<div class="form-group col-md-12 col-xs-12 nopadding navbartwoforminput">
						
								<?php 
								echo $this->Form->input('searchname',array('label'=>false,'class'=>"form-control searchcontent", 'id'=>"searchcontent1",'data-toggle'=>"tooltip", 'data-placement'=>"top",'title'=> __("Type What You Want to Search, Fro language change press Ctrl+g and type Bangla"),'placeholder'=> __("I'm looking for...")));
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
			<div class="row">
				
			</div>
		<div data-scroll-reveal="enter from the bottom after 0.3s" class="title text-center" data-scroll-reveal-id="2" data-scroll-reveal-initialized="true" data-scroll-reveal-complete="true">
			<h2>Why Us ?</h2>
			<p>Infomap24 , is your online promoter and daily reference guide where you can get information starting from education ,history , lifestyle & places to health , banking , fooding , travelling and what not</p>
			<hr>
		</div>
			<!--
			<div data-scroll-reveal="enter from the bottom after 0.4s" class="feature-img">
					<img class="img-responsive" src="img/demos/home_01.png" alt=""> 
            </div>
			-->
        	<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12" data-scroll-reveal="enter from the bottom after 0.2s">
            	<div class="widget">
                	<h3> Business Benifits by Informa24</h3>
                    <p>Multiply your leads and secure top visibility for you and your listings with Featured Ads on INFOMAP24.</p>
                    <div id="accordion-second" class="clearfix">
                        <div class="accordion" id="accordion2">
                          <div class="accordion-group">
                            <div class="accordion-heading">
                              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                                <em class="fa fa-plus icon-fixed-width"></em>Target based on your location
                              </a>
                            </div>
                            <div id="collapseOne" class="accordion-body collapse">
                              <div class="accordion-inner">
                                Choose the zip codes you want to advertise in
                              </div>
                            </div>
                          </div>
                          <div class="accordion-group">
                            <div class="accordion-heading">
                              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                                <em class="fa fa-plus icon-fixed-width"></em>Customize your advertisement.
                              </a>
                            </div>
                            <div id="collapseTwo" class="accordion-body collapse">
                              <div class="accordion-inner">
                                We give you the tools to create your ad in seconds.
                              </div>
                            </div>
                          </div>
                          <div class="accordion-group">
                            <div class="accordion-heading">
                              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
                                <em class="fa fa-plus icon-fixed-width"></em>Advertise to potential customers.
                              </a>
                            </div>
                            <div id="collapseThree" class="accordion-body collapse">
                              <div class="accordion-inner">
                                We make sure your ad is shown to the prospects that matter.
                              </div>
                            </div>
                          </div>
                          
                        </div><!-- end accordion -->
                    </div><!-- end accordion first -->
                </div><!-- end widget -->
            </div><!-- end col-lg-6 -->
            
        	<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12" data-scroll-reveal="enter from the bottom after 0.4s">
            	<div class="widget">
                	<h3>LATEST NEWS</h3>
                    <div id="owl-blog" class="owl-carousel">
                        <div class="blog-carousel">
                            <div class="entry">
                                <img src="img/atlas/infomapnew.png" alt="" class="img-responsive">
                                <div class="magnifier">
                                    <div class="buttons">
                                        <a class="st" rel="bookmark" href="blog-single-sidebar.html"><i class="fa fa-link"></i></a>
                                    </div><!-- end buttons -->
                                </div><!-- end magnifier -->
                            </div><!-- end entry -->
                            <div class="blog-carousel-header">
                                <h3><a title="" href="#">INFOMAP24 Launch new website</a></h3>
                                <div class="blog-carousel-meta">
                                    <span><i class="fa fa-calendar"></i> June 29, 2017</span>
                                    <span><i class="fa fa-eye"></i> <a href="#">384 Views</a></span>
                                </div><!-- end blog-carousel-meta -->
                            </div><!-- end blog-carousel-header -->
                           
                        </div><!-- end blog-carousel -->
                            
                    </div><!-- end owl-blog -->
                </div><!-- end widget -->
			</div><!-- end col-lg-6 -->
		</div><!-- end container -->
    </section><!-- end grey-wrapper -->
	
    <?php
	$currentLng = $this->Session->read('Config.language');
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
		
		<section id="about" class="about-wrapper">
        <div class="container">
                    <div data-scroll-reveal="enter from the bottom after 0.2s" class="title text-center">
                        <h2><?php echo __($featuredTitle)?></h2>
                        <p>ETIAM DIGNISSIM LEO VESTIBULUM VOLUTPAT MORB</p>
                        <hr>
                    </div><!-- end title -->
			<div class="row text-center">
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
					echo '<div class="masonry_wrapper" data-scroll-reveal="enter from the bottom after 0.2s">';
					echo '<div class="item entry item-h2 photography print isotope-item">';
						$postSeo = $topics['point_seoname'];
						//echo '<div class="about-border"> <i class="fa fa-tablet aligncenter"></i></div>';
					
							$imglink = $topics['class_image'];
							$fileExistPath = WWW_ROOT.'img'.DS.$imglink;
							if(!empty($imglink) && file_exists($fileExistPath)){
								echo $this->Html->image($imglink, array('url' => array('controller'=>'siteactions','action'=>$actionName,'category'=>$topics['placetype_seoname'],'point'=> $topics['point_seoname'],'language'=>$currentLng,'id'=> $newID,'ext' => 'asp'),'class' =>'img-responsive','data-original' => $imglink,'alt' =>$placename.':'.$shortDescription));
							}else{
								echo $this->Html->image('default.png', array('url' => array('controller'=>'siteactions','action'=>$actionName,'category'=>$topics['placetype_seoname'],'point'=> $topics['point_seoname'],'language'=>$currentLng,'id'=> $newID,'ext' => 'asp'),'class' =>'img-responsive','alt' =>$placename.':'.$shortDescription));
							}
							
							echo '<h3 class="content-link">';
							echo $this->Html->link(mb_substr($placename,0,55), array('controller'=>'siteactions','action'=>$actionName,'category'=>$topics['placetype_seoname'],'point'=> $topics['point_seoname'],'language'=>$currentLng,'id'=> $newID,'ext' => 'asp'),array('alt' =>$placename,'class' =>'topiclink '.$topics['point_seoname']));
							echo '</h3>';
							if(!empty($shortDescription)){
								echo '<p>'.mb_substr($shortDescription,0,80).'</p>';
							}
							
							echo '<div class="hovereffect">';
							$topicIcon = $topics['placetype_icon'];
                                //echo '<a data-gal="prettyPhoto[product-gallery]" rel="bookmark" href="demos/work_01.jpg"><span class="icon"><i class="fa fa-plus"></i></span></a>';
								echo $this->Html->link("<span class='icon'><i class='$topicIcon' aria-hidden='true'></i></span>
", array('controller'=>'siteactions','action'=>$actionName,'category'=>$topics['placetype_seoname'],'point'=> $topics['point_seoname'],'language'=>$currentLng,'id'=> $newID,'ext' => 'asp'),array('alt' =>$placename,'class' =>'info '.$topics['point_seoname'],'escape' => false));
							
							echo '<h3 class="content-link">';
							echo $this->Html->link(mb_substr($placename,0,55), array('controller'=>'siteactions','action'=>$actionName,'category'=>$topics['placetype_seoname'],'point'=> $topics['point_seoname'],'language'=>$currentLng,'id'=> $newID,'ext' => 'asp'),array('alt' =>$placename,'class' =>'topiclink '.$topics['point_seoname']));
							echo '</h3>';
							echo '</div>';
							
					echo '</div>';
					echo '</div>';	
						
						echo '<div class="clearfix"></div>';
						
					
				echo '</div>';
				
			$visitSetCounter++;
			}
			?>
			</div>
			
			</div>
		</section>
			<?php
		}
	}
	?>
    
    <!--POPULAR CATEGORIES SECTION  -->    
    <section id="pricing" class="dark-wrapper" data-scroll-reveal="enter from the bottom after 0.2s">
        <div class="container">
                        <div class="title text-center">
                            <h2>Popular Categories</h2>
                        </div><!-- end title -->
            <div class="row">
                    
					<?php
					foreach($categories as $ptype){
							$icon = $ptype['PlaceType']['icon'];
							$name = $ptype['PlaceType']['name'];
							$stringlength = strlen($ptype['PlaceType']['seo_name']);
							$newID = $stringlength.$ptype['PlaceType']['id'];
							echo '<div data-scroll-reveal="enter from the bottom after 0.3s" class="col-lg-3 col-md-3 col-sm-6 col-xs-12">';
							echo '<div class="category-box">';
							if(in_array($ptype['PlaceType']['id'],$parentCats)){
								echo "<div class='service-border'><i class='$icon alignleft'></i></div>";
								echo $this->Html->link("<h3>".$name."</h3>", array('plugin'=>'information','controller' => 'siteactions','action'=>'subcategories','category'=>$ptype['PlaceType']['seo_name'],'id'=> $newID,'language'=>$currentLng,'ext' => 'asp'),array('escape'=>false,'alt' =>$ptype['PlaceType']['name']));
							}else{
								echo "<div class='service-border'><i class='$icon alignleft'></i></div>";
								echo $this->Html->link("<h3>".$name."</h3>", array('plugin'=>'information','controller' => 'siteactions','action'=>'categories','category'=>$ptype['PlaceType']['seo_name'],'id'=> $newID,'language'=>$currentLng,'page'=>1,'ext' => 'asp'),array('escape'=>false,'alt' =>$ptype['PlaceType']['name']));
							
							}
							echo '</div>';
							echo '</div>';
							
							
							//echo $this->Html->link("<i class='$icon'></i>".$name, array('plugin'=>'information','controller' => 'siteactions','action'=>'categories','category'=>$ptype['PlaceType']['seo_name'],'language' => $currentLng,'id'=> $newID,'page'=>1,'ext' => 'asp'),array('escape'=>false,'alt' =>$name));
							
					}
					?>
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- End Popular Category --> 
       
    <!--/ SERVICE SECTION -->   
    <section id="services" class="white-wrapper" data-scroll-reveal="enter from the bottom after 0.2s">
        <div class="container">
            <div class="title text-center">
                <h2>Services we offer</h2>
                <p>INFOMAP24 IS A PLATFORM TO PROMOTE YOUR BUSINESS AND TO PROVIDE YOU THE LATEST INFORMATION OF YOUR NEEDS. 
				WE ARE HERE TO INCREASE YOUR BUSINESS AND TO ADVERTISE YOUR BUSINESS AS YOUR PARTNER</p>
                <hr>
            </div><!-- end title -->
        
            <div class="row">
                <div data-scroll-reveal="enter from the bottom after 0.3s" class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
                    <div class="service-box">
                        <div class="service-border"><i class="fa fa-lightbulb-o alignleft"></i></div>
                        <h3>Social Media MARKETING</h3>
                        <p>We help our client for paid advertising on social platforms like Facebook & Instagram. These platforms require new strategies, technologies and methods to drive success.</p>
                    </div>
                </div>
            
                <div data-scroll-reveal="enter from the bottom after 0.6s" class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
                    <div class="service-box">
                        <div class="service-border"><i class="fa fa-laptop alignleft"></i></div>
                        <h3>SMS Marketing</h3>
                        <p>Text messaging is the most used feature on mobile devices today. We text more than we call or email.</p>
                    </div>
                </div>
            
                <div data-scroll-reveal="enter from the bottom after 0.9s" class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
                    <div class="service-box">
                        <div class="service-border"><i class="fa fa-headphones alignleft"></i></div>
                        <h3>Paid Search</h3>
                        <p>Paid search is the centerpiece of today’s digital campaigns. It is a complicated channel that requires enterprise technology and a team of established (PPC) experts.</p>
                    </div>
                </div>
            </div> <!-- end row 1 -->
        
            <div class="row">
                <div data-scroll-reveal="enter from the bottom after 1.2s" class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
                    <div class="service-box">
                        <div class="service-border"><i class="fa fa-mobile alignleft"></i></div>
                        <h3>Others MARKETING</h3>
                        <p>Advertise on News Paper, TV, Video Channel and Radio</p>
                    </div>
                </div>
            
                <div data-scroll-reveal="enter from the bottom after 1.5s" class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
                    <div class="service-box">
                        <div class="service-border"><i class="fa fa-shopping-cart alignleft"></i></div>
                        <h3>BUSINESS CONSULTATION</h3>
                        <p>We are here to support you to build or increase your current or new business.</p>
                    </div>
                </div>
            
                <div data-scroll-reveal="enter from the bottom after 1.8s" class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
                    <div class="service-box">
                        <div class="service-border"><i class="fa fa-gears alignleft"></i></div>
                        <h3>ADVERTISING MEDIA DEVELOPMENT</h3>
                        <p>We help you to develop Adverting content like Banner, Fastune and Videos</p>
                    </div>
                </div>
            </div> <!-- end row 2 -->
                   
    <!-- TESTIMONIAL SECTION -->     
			<!--
            <div class="testimonial text-center">
                <h2 class="three" data-scroll-reveal="enter from the bottom after 0.2s">And What They Say</h2>
            </div><!-- end title -->
            <!--
            <div id="testimonial" class="owl-carousel owl-theme text-center">
                <div class="testimonial"  data-scroll-reveal="enter from the bottom after 0.3s">
                    <p>Quisque est enim lacinia lobortis da viverra interdum, quam. In sagittis, eros faucibus ullamcorper nibh dolor</p>
                    <h1> DANIEL Smith </h1>
                </div>
                <div class="testimonial">
                    <p>A dsfadsfads In sagittis, eros faucibus ullamcorper nibh dolor</p>
                    <h1> DANIEL Smith </h1>
                </div>
                <div class="testimonial">
                    <p>Quisque est enim lacinia lobortis da viverra interdum, quam. In sagittis, eros faucibus ullamcorper nibh dolor</p>
                    <h1> DANIEL Smith </h1>
                </div>
            </div><!-- end #testimonial -->
            <!--
            <div class="customNavigation">
                <a class="btn prev"><i class="fa fa-angle-left fa-2x"></i></a>
                <a class="btn next"><i class="fa fa-angle-right fa-2x"></i></a>
            </div><!-- end customnav -->
			
       </div> <!-- end container -->
    </section><!-- Service and Testimonial End --> 
    
    
    
    <!--/ FEATURE SECTION -->  
    <section id="featured_parallax" class="parallax" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="20">
        <div class="overlay">
            <div class="container">
                <div class="featured-box" data-effect="slide-bottom">
                    <h3>A Leading Platform to Promote your Business</h3>
                    <img class="img-respnsive" src="img/demos/banner.png" alt="">
                </div>
            </div><!-- end container -->
        </div><!-- end overlay -->
    </section><!--/ Featured Parallex -->  
      
    <!--/ CONTACT AND MAP SECTION -->  
   <section id="contact" class="contact-wrapper">
        
        <div class="container">
            <div class="title text-center">
                <div class="clearfix"></div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="contact-box" data-scroll-reveal="enter from the bottom after 0.6s">
                        <a title="" href="mailto:info@infomap24.com?Subject=I%20Want%20to%20Know" target="_top"><i class="fa fa-envelope-o aligncenter"></i></a>
                        <h2>INFO@INFOMAP24.COM</h2>
                    </div>
                </div>
        
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="contact-box" data-scroll-reveal="enter from the bottom after 0.6s">
                        <a title="" href="#"><i class="fa fa-map-marker aligncenter"></i></a>
                        <h2>HOUSE 23, SECTOR 1 UTTARA DHAKA </h2>
                    </div>
                </div>
        
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="contact-box"  data-scroll-reveal="enter from the bottom after 0.6s">
                         <a title="" href="skype:live:infomap24?chat"><i class="fa fa-skype aligncenter"></i></a>
                        <h2>INFOMAP24</h2>
                    </div>
                </div>
            </div> <!-- end title -->
        </div><!-- end container -->
        
    </section><!--/ Contact End -->  