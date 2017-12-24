<section id="nino-latestBlog">
<div class="container">
<?php

echo '<h2 class="nino-sectionHeading">'.__('Others %s Information',$place['PlaceType']['name']).'</h2>';

//debug($nearbies);		
				$currentLng = $this->Session->read('Config.language');		
				echo '<div class="sectionContent">';
					echo '<div class="row">';
						foreach($nearbies as $nearplace){
							//debug($nearplace);
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
							
							echo "<div class='col-md-4 col-sm-4 popular_article $class'>";
								echo '<article>';
							
											echo "<div class='articleThumb $postSeo'>";
												$imglink = $nearplace[$className]['image'];
												if($className == 'TopicData'){
													$fileExistPath = WWW_ROOT.'img'.DS.'topics'.'medium'.DS.$imglink;
												}else{
													$foldername = $nearplace['PlaceType']['pluralname'];
													$fileExistPath = WWW_ROOT.'img'.DS.$foldername.DS.'photogallery'.DS.$imglink;
												}
												
												if(!empty($imglink) && file_exists($fileExistPath)){
													if($className == 'TopicData'){
														
														echo $this->Html->image('default.png', array('url' => array('controller'=>'siteactions','action'=>'topic','category'=>$nearplace['PlaceType']['seo_name'],'point'=> $postSeo,'language'=>$currentLng,'id'=> $nearplace[$className]['point_id'],'ext' => 'asp'),'alt' =>$metaTag,'class' => 'nearbymap','data-echo' => "topics/medium/$imglink"));
													}else{
														
															echo $this->Html->image('default.png', array('url' => array('controller'=>'siteactions','action'=>'infos','category'=>$nearplace['PlaceType']['seo_name'],'point'=> $postSeo,'id'=> $newID,'ext' => 'asp'),'class' =>'nearbymap','alt' =>$metaTag,'data-echo' => "$foldername/photogallery/$file"));
														
													}
												}else{
													if($className == 'TopicData'){
														echo $this->Html->image('default.png', array('url' => array('controller'=>'siteactions','action'=>'topic','category'=>$nearplace['PlaceType']['seo_name'],'point'=> $postSeo,'language'=>$currentLng,'id'=> $nearplace[$className]['point_id'],'ext' => 'asp'),'alt' =>$metaTag,'class' => 'nearbymap','data-echo' => ''));
													}else{
														echo $this->Html->image('default.png', array('url' => array('controller'=>'siteactions','action'=>'infos','category'=>$nearplace['PlaceType']['seo_name'],'point'=> $postSeo,'id'=> $newID,'ext' => 'asp'),'class' =>'nearbymap','alt' =>$metaTag,'data-echo' => ''));
													}
													
												}
												
												echo '<div class="date">';
													$topicIcon = $nearplace['PlaceType']['icon'];
													echo "<span class='number'><i class='$topicIcon' aria-hidden='true'></i></span>";
													echo "<span class='text'></span>";
												echo '</div>';
											echo '</div>';
											
											echo '<h3 class="articleTitle">';
												if($className == 'TopicData'){
													echo $this->Html->link(mb_substr($nearplacename,0,55), array('controller'=>'siteactions','action'=>'topic','category'=>$nearplace['PlaceType']['seo_name'],'point'=> $postSeo,'language'=>$currentLng,'id'=> $nearplace[$className]['point_id'],'ext' => 'asp'),array('alt' =>$nearplacename,'class' =>'topiclink '.$postSeo));
												}else{
													echo $this->Html->link(mb_substr($nearplacename,0,55), array('controller'=>'siteactions','action'=>$actionName,'category'=>$nearplace['PlaceType']['seo_name'],'point'=> $postSeo,'language'=>$currentLng,'id'=> $newID,'ext' => 'asp'),array('alt' =>$nearplacename,'class' =>'topiclink '.$postSeo));
												}
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
											
								//debug($visitData);
								
						}
					echo '</div>';
				echo '</div>';
?>
</div>
</section>