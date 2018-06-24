<section id="nino-latestBlog">
<div class="container">
<?php
echo '<h2 class="nino-sectionHeading">'.__('Others %s Information',$place['PlaceType']['name']).'</h2>';
//debug($nearbies);exit;		
				$currentLng = $this->Session->read('Config.language');		
				echo '<div class="sectionContent">';
					echo '<div class="row">';
					
						foreach($nearbies as $nearplace){
							//debug($nearplace);
							if($currentLng == 'bn'){
								$userName = $nearplace['User']['bn_name'];
								$this->loadHelpers(array('Language'));
								$created = $this->Language->bangladate(date('d F Y',strtotime($nearplace['Point']['created'])));
							}else{
								$userName = $nearplace['User']['name'];
								$created = date('d F Y',strtotime($nearplace['Point']['created']));
							}
							if($className == 'TopicData'){
								$class = $nearplace[$className]['seo_name'];
								$publishBefore = $this->Language->datediff($nearplace[$className]['created']);
								$stringlength = strlen($nearplace[$className]['seo_name']);
								$newID = $stringlength.$nearplace[$className]['point_id'];
								$metaTag = '';
								$placeType = $nearplace['PlaceType']['name'];
								
								if($currentLng == 'bn' && !empty($nearplace[$className]['bn_name'])){
									$placename = $nearplace[$className]['bn_name'];
									$shortContent = $nearplace[$className]['bn_short_description'].' '.$nearplace[$className]['bn_details'];
									$nearplacename = $nearplace[$className]['bn_name'];
								}else if($currentLng == 'en' && empty($nearplace[$className]['bn_name'])){
									$nearplacename = $nearplace[$className]['name'];
									$shortContent = $nearplace[$className]['short_description'].' '.$nearplace[$className]['details'];
								}else if($currentLng == 'en' && empty($nearplace[$className]['name'])){
									$nearplacename = $nearplace[$className]['bn_name'];
									$shortContent = $nearplace[$className]['bn_short_description'].' '.$nearplace[$className]['bn_details'];
								}else{
									$nearplacename = $nearplace[$className]['name'];
									$shortContent = $nearplace[$className]['short_description'].' '.$nearplace[$className]['details'];
								}
								
								
							}else if($className == 'Recipe'){
								$class = $nearplace[$className]['seo_name'];
								$publishBefore = $this->Language->datediff($nearplace['Point']['created']);
								$stringlength = strlen($nearplace[$className]['seo_name']);
								$newID = $stringlength.$nearplace[$className]['point_id'];
								$metaTag = '';
								$placeType = $nearplace['PlaceType']['name'];
								
									$placename = $nearplace[$className]['title'];
									$shortContent = $nearplace[$className]['short_note'];
									$nearplacename = $nearplace[$className]['title'];
								
								
							}else{
								$class = $nearplace['Point']['seo_name'];
								$publishBefore = $this->Language->datediff($nearplace['Point']['created']);
								$stringlength = strlen($nearplace['Point']['seo_name']);
								$newID = $stringlength.$nearplace['Point']['id'];
								$metaTag = '';
								$nearplacename = $nearplace[$className]['name'];
								$nearplaceType = $nearplace['PlaceType']['name'];
							}
							
							
							
							if($className == 'Stadium'){
								$postSeo = $nearplace['Point']['seo_name'];
								$shortDescription = @$nearplace['Point']['address'];
								$actionName = 'infos';
								$countryname = $nearplace['Country']['seo_name'];
								$tenant_or_use = $nearplace[$className]['tenant_or_use'];
								$capacity = $nearplace[$className]['capacity'];
								$seats = $nearplace[$className]['seats'];
								$builton = $nearplace[$className]['builton'];
								$location = $nearplace[$className]['city'];
								$country = $nearplace['Country']['name'];
								$latDegree = $this->Language->degreelat($nearplace['Point']['lat']);
								$lngDegree = $this->Language->degreelng($nearplace['Point']['lng']);
								$metaTag = "$nearplacename : $nearplacename is a $nearplaceType listed in $nearplaceType category, it uses for $tenant_or_use. $nearplacename build on ' $builton ' and total capacity is $capacity where the total sits are ' $seats '<br/>. $nearplacename is a $nearplaceType of $location, $country and its geographical coordinates are $latDegree, $lngDegree";
								$totalvisit = $nearplace['Point']['totalvisit'];
									
							}else if($className == 'TopicData'){
								if(isset($nearplace['Country'])){
									$countryname = $nearplace['Country']['seo_name'];
								}else{
									$countryname = '';
								}
								$postSeo = $nearplace[$className]['seo_name'];
								$shortDescription = '';
								$actionName = 'infos';
								$metaTag = "$nearplacename";
								$totalvisit = '';
							}else if($className == 'Airport'){
								$postSeo = $nearplace['Point']['seo_name'];
								$shortDescription = @$nearplace['Point']['address'];
								$actionName = 'infos';
								$countryname = $nearplace['Country']['seo_name'];
								$airportType = $nearplace['AirportType']['name'];
								$iata = $nearplace[$className]['iata_code'];
								$ident = $nearplace[$className]['ident'];
								$location = $nearplace[$className]['municipality'];
								$country = $nearplace['Country']['name'];
								$metaTag = "$nearplacename : $nearplacename is a $airportType listed in $nearplaceType category. The International Air Transport Association number of $nearplacename is ' $iata ' and the local code of $nearplacename is ' $ident '. $nearplacename is a $airportType of $location, $country.";
								$totalvisit = $nearplace['Point']['totalvisit'];
								
							}else if($className == 'Hospital'){
								$countryname = $nearplace['Country']['seo_name'];
								$metaTag = $nearplace[$className]['metatag'];
								$postSeo = $nearplace['Point']['seo_name'];
								$shortDescription = @$nearplace['Point']['address'];
								$actionName = 'infos';
								$totalvisit = $nearplace['Point']['totalvisit'];
								
							}else if($className == 'Recipe'){
								$countryname = '';
								$metaTag = $nearplace[$className]['metatag'];
								$postSeo = $nearplace['Point']['seo_name'];
								$shortDescription = @$nearplace['Point']['address'];
								$actionName = 'infos';
								$totalvisit = $nearplace['Point']['totalvisit'];
								
							}else if($className == 'Animal'){
								$countryname = '';
								$metaTag = $nearplace[$className]['metatag'];
								$postSeo = $nearplace['Point']['seo_name'];
								$shortDescription = @$nearplace['Point']['address'];
								$actionName = 'infos';
								$totalvisit = $nearplace['Point']['totalvisit'];
								
							}else if($className == 'YellowPage'){
								$totalvisit = $nearplace['Point']['totalvisit'];
								$postSeo = $nearplace['Point']['seo_name'];
								$shortDescription = @$nearplace['Point']['address'];
								$actionName = 'infos';
								
								if(isset($nearplace['Country'])){
									$countryname = $nearplace['Country']['seo_name'];
								}else{
									$countryname = '';
								}
								if(isset($nearplace['Point']['lat']) && !empty($nearplace['Point']['lat']) && isset($nearplace['Point']['lng']) && !empty($nearplace['Point']['lng'])){
									$latDegree = $this->Language->degreelat($nearplace['Point']['lat']);
									$lngDegree = $this->Language->degreelng($nearplace['Point']['lng']);
									$latLngTag = $nearplacename."'s geographical coordinates are $latDegree, $lngDegree";
								}else{
									$latLngTag = '';
								}
								if(!empty($country)){
									$countryTag = $nearplacename." is a $nearplaceType of $location, $country";
								}else{
									$countryTag = '';
								}
								
								$metaTag = "$nearplacename : $nearplacename is a $nearplaceType listed in $nearplaceType category. ".$countryTag.' '.$latLngTag;
								
							}else{
								$totalvisit = $nearplace['Point']['totalvisit'];
								$postSeo = $nearplace['Point']['seo_name'];
								$shortDescription = @$nearplace['Point']['address'];
								$actionName = 'infos';
								$countryname = $nearplace['Country']['seo_name'];
								if(isset($nearplace['Point']['lat']) && !empty($nearplace['Point']['lat']) && isset($nearplace['Point']['lng']) && !empty($nearplace['Point']['lng'])){
									$latDegree = $this->Language->degreelat($nearplace['Point']['lat']);
									$lngDegree = $this->Language->degreelng($nearplace['Point']['lng']);
									$latLngTag = $nearplacename."'s geographical coordinates are $latDegree, $lngDegree";
								}else{
									$latLngTag = '';
								}
								if(!empty($country)){
									$countryTag = $nearplacename." is a $nearplaceType of $location, $country";
								}else{
									$countryTag = '';
								}
								
								$metaTag = "$nearplacename : $nearplacename is a $nearplaceType listed in $nearplaceType category. ".$countryTag.' '.$latLngTag;
								
							}
						//debug($nearplace);exit;
						echo '<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 minheightblock">';
							echo '<div class="blog_about">';
							
								//echo '<div class="about-border"> <i class="fa fa-tablet aligncenter"></i></div>';
									echo "<div class='blog_img $postSeo'>";
										echo '<figure>';
										if($className == 'Recipe'){
											$imglink = $nearplace['RecipeImage'][0]['file'];
										}else{
											$imglink = $nearplace[$className]['image'];
										}
										
										if($className == 'TopicData'){
											$fileExistPath = WWW_ROOT.'img'.DS.'topics'.DS.'medium'.DS.$imglink;
										}else if($className == 'Recipe'){
											$foldername = $nearplace['PlaceType']['pluralname'];
											$fileExistPath = WWW_ROOT.'img'.DS.$foldername.DS.'medium'.DS.$imglink;
										}else{
											$foldername = $nearplace['PlaceType']['pluralname'];
											$fileExistPath = WWW_ROOT.'img'.DS.$foldername.DS.'photogallery'.DS.$imglink;
										}
										
										if(!empty($imglink) && file_exists($fileExistPath)){
											if($className == 'TopicData'){
												echo $this->Html->image('default.png', array('url' => array('controller'=>'siteactions','action'=>'topic','category'=>$nearplace['PlaceType']['seo_name'],'point'=> $postSeo,'language'=>$currentLng,'id'=> $nearplace[$className]['point_id'],'ext' => 'asp'),'alt' =>$metaTag,'class' => 'img-responsive','data-echo' => SITEIMAGE."topics/medium/$imglink"));
												
											}else if($className == 'Recipe'){
												echo $this->Html->image('default.png', array('url' => array('controller'=>'siteactions','action'=>$actionName,'category'=>$nearplace['PlaceType']['seo_name'],'point'=> $postSeo,'language'=>$currentLng,'id'=> $newID,'ext' => 'asp'),'class' =>'img-responsive','alt' =>$metaTag,'data-echo' => SITEIMAGE."$foldername/medium/$imglink"));
												
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
									
									echo '<div class="blog_comment">';
										echo '<ul>';
											$totalView = $nearplace['Point']['totalvisit'];
											echo "<li><a href='#'><i class='fa fa-eye' aria-hidden='true'></i>".$totalView."</a></li>";
											echo '<li><a href="#"><i class="fa fa-share-square" aria-hidden="true"></i>98</a></li>';
										echo '</ul>';
									echo '</div>';
									
									echo '<div class="blog_txt">';
										echo '<h1>';
										if($className == 'TopicData'){
											echo $this->Html->link(mb_substr($nearplacename,0,55), array('controller'=>'siteactions','action'=>'topic','category'=>$nearplace['PlaceType']['seo_name'],'point'=> $postSeo,'language'=>$currentLng,'id'=> $nearplace[$className]['point_id'],'ext' => 'asp'),array('alt' =>$nearplacename,'class' =>$postSeo));
										}else{
											echo $this->Html->link(mb_substr($nearplacename,0,55), array('controller'=>'siteactions','action'=>$actionName,'category'=>$nearplace['PlaceType']['seo_name'],'point'=> $postSeo,'language'=>$currentLng,'id'=> $newID,'ext' => 'asp'),array('alt' =>$nearplacename,'class' =>$postSeo));
										}
										
										echo '</h1>';
										echo '<div class="blog_txt_info">';
											echo '<ul>';
												echo '<li>BY '.$userName.'</li>';
												echo '<li>'.$created.'</li>';
											echo '</ul>';
										echo '</div>';
										if(!empty($shortDescription)){
											echo '<p class="articleDesc">'.mb_substr($shortDescription,0,80).'</p>';
										}
										//echo '<a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>';
									echo '</div>';
									
							echo '</div>';
						echo '</div>';	
											
								//debug($visitData);
								
						}
					echo '</div>';
				echo '</div>';
?>
</div>
</section>