<?php
$currentLng = $this->Session->read('Config.language');
?>
<!--
<div class="infocontentblock">
<div class="container">
<div class="row nino-hoverEffect">
<div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1 locationcircle">
<div style="width:85%;margin:100px auto 0px auto;">
<div id="circles-container-text"> 
              <div id="main-circle-content-text"></div>
              <div id="circle-text">
                <div class="min-circle" data-inside="min-circle">
                  <a href="imgs/1.jpg" style="display:block;width:80%;margin:30% 10%;height:40%;text-align:center;font-size:1.2em;">
                    <i class="fa fa-gavel" aria-hidden="true"></i>
                  </a>
                  <div class="content-text">
                    <p>
					
					<i class="fa fa-gavel" aria-hidden="true"></i></p>
					<h2>Police Station</h2>
                    <?php
					echo $this->Html->link('Click To View >>', array('controller'=>'siteactions','action'=>'locate','catname'=>'police-station'),array('alt' =>'Find Your Nearby Items!','class' =>''));
					?>
                  </div>
                </div>
                <div class="min-circle" data-inside="min-circle">
                  <a href="imgs/2.jpg" style="display:block;width:80%;margin:30% 10%;height:40%;text-align:center;font-size:1.2em;">
                     <i class="fa fa-car" aria-hidden="true"></i>
                  </a>
                  <div class="content-text">
                    <p>
					
					<i class="fa fa-car" aria-hidden="true"></i></p>
					<h2>Fire Service</h2>
                    <?php
					echo $this->Html->link('Click To View >>', array('controller'=>'siteactions','action'=>'locate','catname'=>'fire-services'),array('alt' =>'Find Your Nearby Items!','class' =>''));
					?>
                  </div>
                </div>
                <div class="min-circle" data-inside="min-circle">
                  <a href="imgs/3.jpg" style="display:block;width:80%;margin:30% 10%;height:40%;text-align:center;font-size:1.2em;">
                    <i class="fa fa-university" aria-hidden="true"></i>
                  </a>
                  <div class="content-text">
                    <p>
					
					<i class="fa fa-university" aria-hidden="true"></i></p>
					<h2>Holy Places</h2>
                    <?php
					echo $this->Html->link('Click To View >>', array('controller'=>'siteactions','action'=>'locate','catname'=>'holy-places'),array('alt' =>'Find Your Nearby Items!','class' =>''));
					?>
                  </div>
                </div>
                <div class="min-circle" data-inside="min-circle">
                  <a href="imgs/3.jpg" style="display:block;width:80%;margin:30% 10%;height:40%;text-align:center;font-size:1.2em;">
                    <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                  </a>
                  <div class="content-text">
                    <p>
					
					<i class="fa fa-graduation-cap" aria-hidden="true"></i></p>
					<h2>Education</h2>
                    <?php
					echo $this->Html->link('Click To View >>', array('controller'=>'siteactions','action'=>'locate','catname'=>'police-station'),array('alt' =>'Find Your Nearby Items!','class' =>''));
					?>
                  </div>
                </div>
				<div class="min-circle" data-inside="min-circle">
                  <a href="imgs/3.jpg" style="display:block;width:80%;margin:30% 10%;height:40%;text-align:center;font-size:1.2em;">
                    <i class="fa fa-fire-extinguisher" aria-hidden="true"></i>
                  </a>
                  <div class="content-text">
                    
                    <p>
					
					<i class="fa fa-fire-extinguisher" aria-hidden="true"></i></p>
					<h2>Fire Service</h2>
                    <?php
					echo $this->Html->link('Click To View >>', array('controller'=>'siteactions','action'=>'locate','catname'=>'educational'),array('alt' =>'Find Your Nearby Items!','class' =>''));
					?>
                  </div>
                </div>
				<div class="min-circle" data-inside="min-circle">
                  <a href="imgs/3.jpg" style="display:block;width:80%;margin:30% 10%;height:40%;text-align:center;font-size:1.2em;">
                    <i class="fa fa-info" aria-hidden="true"></i>
                  </a>
                  <div class="content-text">
                    <p>
					
					<i class="fa fa-info" aria-hidden="true"></i></p>
					<h2>Others</h2>
                    <?php
					echo $this->Html->link('Click To View >>', array('controller'=>'siteactions','action'=>'locate','catname'=>'fire-services'),array('alt' =>'Find Your Nearby Items!','class' =>''));
					?>
                  </div>
                </div>
                
              </div>
            </div>
</div>
</div>


</div>
</div>
</div>

-->


<div class="infocontentblock">
<div class="container">
		<div class="row nino-hoverEffect">
			<div class="col-md-12 col-sm-12">
			
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



<div class="infocontentblock">
<div class="container">
	<div class="row">
		<h2 class="nino-sectionHeading">
			Claim Your Business
		</h2>
				<div class="col-md-6">
					<div class="text-center">
						<img src="img/infothemenew/enlist-business.png" alt="">
					</div>
				</div>
				<div class="col-md-6">
					<div class="text-left">
					<p>
					<!--Enlist your business in infoMap24 to promote it wordwide. We will maketing your business information without any charges from you.-->
					Infomap24 , is your online promoter and daily reference guide where you can get information starting from education ,history , lifestyle & places to health , banking , fooding , travelling and what not
					</p>
					<span class="input-group-btn">
					<?php
						$userData = $this->Session->read('Auth.User');
						$userID = $userData['id'];
						if(empty($userID)){
						echo '<li>';
						echo $this->Html->link(__('Get Your Free Listing!'),array('plugin'=>'users','controller'=>'users','action'=>'add'),array('class'=> 'btn'));
						echo '</li>';
						}else{
						echo '<li>';
						echo $this->Html->link(__('Get Your Free Listing!'),array('plugin'=>'users','controller'=>'users','action'=>'login'),array('class'=> 'btn'));
						echo '</li>';
						}
					?>
					</span>
					</div>
				</div>
	</div>
</div>
</div>





 <!--service section start-->
<div class="infocontentblock">
        <div class="container">
            <div class="row">
			
					<h1 class="nino-sectionHeading">
						<?php echo __('Popular Categories')?>
					</h1>
				<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="cat_about ser_section">
                        <div class="icon_wrapper">
                            <?php echo $this->Html->image("images/icon1.png",array('class'=>"img-responsive"));?>
                        </div>
                        <div class="cat_img">
                            <?php echo $this->Html->image("images/icon_11.png",array('class'=>"img-responsive"));?>
                        </div>
                        <div class="cat_txt">
                            <h1>Food & Recipes</h1>
                            <p>Popular food recipes and detail making process of them</p>
							<?php
							echo $this->Html->link('Read More <i class="fa fa-long-arrow-right"></i>', array('controller'=>'siteactions','action'=>'locate'),array('alt' =>'Find Your Nearby Items!','escape'=> false,'class' =>''));
							?>
                        </div>
                    </div>
                </div>
				
				<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="cat_about ser_section">
                        <div class="icon_wrapper">
                            <?php echo $this->Html->image("images/icon1.png",array('class'=>"img-responsive"));?>
                        </div>
                        <div class="cat_img">
                            <?php echo $this->Html->image("images/icon_11.png",array('class'=>"img-responsive"));?>
                        </div>
                        <div class="cat_txt">
                            <h1>Automobiles & Motorcycles</h1>
                            <p>Motorcycles and automobiles specification and price updates</p>
                            <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
				
				<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="cat_about ser_section">
                        <div class="icon_wrapper">
                            <?php echo $this->Html->image("images/icon1.png",array('class'=>"img-responsive"));?>
                        </div>
                        <div class="cat_img">
                            <?php echo $this->Html->image("images/icon_11.png",array('class'=>"img-responsive"));?>
                        </div>
                        <div class="cat_txt">
                            <h1>Popular Article For daily Life</h1>
                            <p>Interesting articles and topics for your daily life and entertainment</p>
                            <a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
				
	</div>
</div>
</div>
    <!--service section end-->





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
		
		<div class="infocontentblock">
			<div class="container">
                    <h1 class="nino-sectionHeading">
						<!--<span class="nino-subHeading"><?php echo __($featuredTitle)?></span>-->
						<?php echo __($featuredTitle)?>
					</h1>
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
						echo '<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">';
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
										/*
										echo '<div class="date">';
											$topicIcon = $topics['placetype_icon'];
											echo "<span class='number'><i class='$topicIcon' aria-hidden='true'></i></span>";
											echo "<span class='text'></span>";
										echo '</div>';
										*/
										echo '</figure>';
									echo '</div>';
									
									/*echo '<div class="blog_comment">';
										echo '<ul>';
											echo '<li><a href="#"><i class="fa fa-comment" aria-hidden="true"></i>50</a></li>';
											echo '<li><a href="#"><i class="fa fa-thumbs-up" aria-hidden="true"></i>98</a></li>';
										echo '</ul>';
									echo '</div>';*/
									
									echo '<div class="blog_txt">';
										echo '<h1>';
										echo $this->Html->link(mb_substr($placename,0,55), array('controller'=>'siteactions','action'=>$actionName,'category'=>$topics['placetype_seoname'],'point'=> $topics['point_seoname'],'language'=>$currentLng,'id'=> $newID,'ext' => 'asp'),array('alt' =>$placename,'class' =>'topiclink '.$topics['point_seoname']));
									
										echo '</h1>';
										/*echo '<div class="blog_txt_info">';
											echo '<ul>';
												echo '<li>BY ADMIN</li>';
												echo '<li>SEPT.29,2016</li>';
											echo '</ul>';
										echo '</div>';*/
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
			<?php
		}
	}
	?>
