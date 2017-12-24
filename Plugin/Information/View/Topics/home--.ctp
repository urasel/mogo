<div class="bannercontainer bannermargin" style="display:none"></div>
<div class="container setupper" role="main">
<div class="homepagecontianer">
	<div class="row">
		<div class="col-md-12 mostimportant">
		<?php echo $this->Session->flash(); echo $this->Session->flash('auth'); ?>
		</div>
	</div>
	<div class="row notificationblock">
	<div class="col-md-12 searchnewsblock">
	<div class="row">
		<div class="col-md-7 col-sm-7 col-xs-6" style="margin-top:60px;">
		<div class="row">
		<div class="col-md-12">
		<p><h1 class="bannerhead"><?php echo __('Find Your Nearest !!');?></h1></p>
		</div>
		</div>
		<div class="row">
		<div class="col-md-12 mostimportant">
		<?php //echo $this->Form->create('Siteaction',array('name' =>'searchform','class' =>'navbartwoform','action'=>'searchitem')); ?>
		<?php 
		$currentLng = $this->Session->read('Config.language');
		echo $this->Form->create('Siteaction',array('name' =>'searchform','class' =>'navbartwoform','url'=> array('plugin'=>'information','controller' => 'siteactions','action'=>'searchitem','language' => $currentLng))); ?>
				
				<div class="searchformblock">
					<div class="form-group col-md-11 col-xs-11 nopadding navbartwoforminput">
				
						<?php 
						echo $this->Form->input('searchname',array('label'=>false,'class'=>"form-control searchcontent", 'id'=>"searchcontent1",'data-toggle'=>"tooltip", 'data-placement'=>"top",'title'=> __("Type What You Want to Search, Fro language change press Ctrl+g and type Bangla"),'placeholder'=> __("I'm looking for...")));
						echo $this->Form->unlockField('Siteaction.place_id');
						echo $this->Form->input('place_id', array('type'=>'hidden','class'=>'placeid','placeholder'=>__('Location'))); 
						?>
					</div> 
					<div class="form-group col-md-1 col-xs-1 nopadding">
					<button type="submit" class="btn btn-default search">
					
					&nbsp;
					</button>
					</div>
				</div>
		<?php echo $this->Form->end(); 
		//$decodeData = json_decode($bloodnews);
		//debug($decodeData);
		?>
		</div>
		</div>
		
		</div>
		<div class="col-md-1 col-sm-1"></div>
		<div class="col-md-4 col-sm-4 col-xs-6">
		<div class="col-md-12 statusblock">
		<?php
		$decodeData = json_decode($bloodnews);
		//debug($decodeData);
		//debug($bloodnews);exit;
		if(isset($bloodnews)){
		echo '<div class="row topstatus">';
		echo '<div class="col-md-12">';
		echo '<ul>';
		foreach($decodeData as $bnews):
		echo '<li>';
		echo '<i class="fa fa-tint"></i>';
		$linkText = '<span class="title">'.$bnews->BloodGroup->name.__(' Blood Needed').'</span>';
		
		$alt = $bnews->BloodGroup->name.__(' Blood Needed');
		echo $this->Html->link($linkText, array('plugin'=>'information','controller'=>'blood_news','action'=>'view','id'=> $bnews->BloodNews->id,'ext' => 'asp'),array('escape'=>false,'alt' =>$alt));
		
		echo '<p class="details">'.__('Contact Info').':'.$bnews->User->firstname.','.$bnews->BloodNews->mobile;
		$currentLng = $this->Session->read('Config.language');
		
		if($currentLng == 'bn'){
			$requireddate = $bnews->BloodNews->required_date;
			$requireddate = $this->Language->bangladate(date('d F Y',strtotime($requireddate)));
		}else{
			$requireddate = $bnews->BloodNews->required_date;
			$requireddate = date('d F Y',strtotime($requireddate));
		}
		
		echo '<br/>'.__('Date').':  '.$requireddate.'</p>';
		echo '</li>';
		
		endforeach;
		echo '<li>';
		echo '<div class="row actionbutton">';
		echo '<div class="col-md-6">';
		echo $this->Html->link(__('Add New'), array('plugin'=>'information','controller'=>'blood_news','action'=>'add','params'=>'add','ext' => 'asp'),array('escape'=>false,'alt' => '','class' =>'buttonblack'));
		echo '</div>';
		echo '<div class="col-md-6">';
		echo $this->Html->link(__('View All'), array('plugin'=>'information','controller'=>'blood_news','action'=>'listing','params'=>'all_blood_informations','ext' => 'asp'),array('escape'=>false,'alt' => '','class' =>'buttonblack'));
		echo '</div>';
		echo '</div>';
		echo '</li>';
		
		echo '</ul>';
		echo '</div>';
		echo '</div>';
		}
		?>
		</div>
		</div>
		</div>
	</div>
	</div>
		
	
	<div class="row sectionblock">
	<div class="col-md-12">
	<div class="col-md-9">
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
		<div class="row">
			<div class="col-md-12 sectionblock fronttop">
					<div class="row">
					<div class="col-md-12">
					<h4 class='block_header borderbottom'><?php echo __($featuredTitle)?></h4>
					</div>
					</div>
			<div class="row">
			<?php
			//debug($posts['HomePost']);
			//$datetime1 = new DateTime('2 Jan 2008');
			//$datetime2 = new DateTime('5 July 2012');
			//$interval = $datetime1->diff($datetime2);
			
			//echo $interval->format('%y years %m months and %d days');
			
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
			
			echo '<div class="col-md-4 col-sm-6 popular_article">';
					//debug($visitData);
					//debug($topics);
					echo '<div class="row">';
					$postSeo = $topics['point_seoname'];
					echo "<div class='col-md-12 $postSeo'>";
						echo "<div class='nearbyimageblockcontainer $postSeo'>";
							echo "<div class='nearbyimageblock $postSeo view view-first'>";
								$imglink = $topics['class_image'];
								$fileExistPath = WWW_ROOT.'img'.DS.$imglink;
								if(!empty($imglink) && file_exists($fileExistPath)){
								echo $this->Html->image($imglink, array('url' => array('controller'=>'siteactions','action'=>$actionName,'category'=>$topics['placetype_seoname'],'point'=> $topics['point_seoname'],'language'=>$currentLng,'id'=> $newID,'ext' => 'asp'),'class' =>'snapimageimg img-responsive lazy','data-original' => $imglink,'alt' =>$placename.':'.$shortDescription));
								}else{
								echo $this->Html->image('default.png', array('url' => array('controller'=>'siteactions','action'=>$actionName,'category'=>$topics['placetype_seoname'],'point'=> $topics['point_seoname'],'language'=>$currentLng,'id'=> $newID,'ext' => 'asp'),'class' =>'snapimageimg img-responsive','alt' =>$placename.':'.$shortDescription));
								}
							echo '<div class="mask">';
							$topicIcon = $topics['placetype_icon'];
								echo $this->Html->link("<i class='$topicIcon' aria-hidden='true'></i>
", array('controller'=>'siteactions','action'=>$actionName,'category'=>$topics['placetype_seoname'],'point'=> $topics['point_seoname'],'language'=>$currentLng,'id'=> $newID,'ext' => 'asp'),array('alt' =>$placename,'class' =>'info '.$topics['point_seoname'],'escape' => false));
							echo '</div>';
							echo '</div>';
								echo '<div class="row">';
									echo '<div class="col-md-12">';
									echo $this->Html->link(mb_substr($placename,0,55), array('controller'=>'siteactions','action'=>$actionName,'category'=>$topics['placetype_seoname'],'point'=> $topics['point_seoname'],'language'=>$currentLng,'id'=> $newID,'ext' => 'asp'),array('alt' =>$placename,'class' =>'topiclink '.$topics['point_seoname']));
									if(!empty($shortDescription)){
										echo '<p class="topicshorts">'.mb_substr($shortDescription,0,80).'</p>';
									}
									echo '<div class="row"><div class="col-md-6 col-sm-6 col-xs-6"><p class="topicshorts">'.$visitData[$topics['pointid']].' views</p></div><div class="col-md-6 col-sm-6 col-xs-6"><p class="topicshorts" style="float:right;">'.$this->Language->datediff($publishBefore).'</p></div></div>';
									//echo $this->Html->link(__('Details'), array('controller'=>'siteactions','action'=>$actionName,'category'=>$topics['placetype_seoname'],'point'=> $topics['point_seoname'],'language'=>$currentLng,'id'=> $newID,'ext' => 'asp'),array('class'=>'detailbutton','alt' =>$placename));
									
									echo '</div>';
								echo '</div>';
						echo '</div>';
					echo '</div>';
					echo '</div>';
					
			echo '</div>';
			$visitSetCounter++;
			}
			?>
			</div>
			<div class="row">
			<div class="col-md-12">
			<div class="fb-comments" data-href="http://www.infomap24.com<?php echo $_SERVER[ 'REQUEST_URI' ];?>" data-width="100%" data-numposts="5" data-colorscheme="light"></div>
			</div>
			</div>
			</div>
		</div>
			<?php
		}
	}
	?>
	</div>
	<div class="col-md-3">
	<?php
		
				echo '<div class="row">';
					echo '<div class="col-md-12 homerightcat">';
						echo '<h4>'.__('Browse Categories').'</h4>';

						echo '<ul class="browse_cat">';
						foreach($categories as $ptype){
							$icon = $ptype['PlaceType']['icon'];
							$name = $ptype['PlaceType']['name'];
							$stringlength = strlen($ptype['PlaceType']['seo_name']);
							$newID = $stringlength.$ptype['PlaceType']['id'];
							echo "<li class=''>";
							if(in_array($ptype['PlaceType']['id'],$parentCats)){
								echo $this->Html->link("<i class='$icon'></i>".$name, array('plugin'=>'information','controller' => 'siteactions','action'=>'subcategories','category'=>$ptype['PlaceType']['seo_name'],'id'=> $newID,'language'=>$currentLng,'ext' => 'asp'),array('escape'=>false,'alt' =>$ptype['PlaceType']['name']));
							}else{
								echo $this->Html->link("<i class='$icon'></i>".$name, array('plugin'=>'information','controller' => 'siteactions','action'=>'categories','category'=>$ptype['PlaceType']['seo_name'],'id'=> $newID,'language'=>$currentLng,'page'=>1,'ext' => 'asp'),array('escape'=>false,'alt' =>$ptype['PlaceType']['name']));
							
							}
							echo '</li>';
							
							
							//echo $this->Html->link("<i class='$icon'></i>".$name, array('plugin'=>'information','controller' => 'siteactions','action'=>'categories','category'=>$ptype['PlaceType']['seo_name'],'language' => $currentLng,'id'=> $newID,'page'=>1,'ext' => 'asp'),array('escape'=>false,'alt' =>$name));
							
						}
						echo '</ul>';

					echo '</div>';
				echo '</div>';
		

?>
	</div>
</div>
</div>


</div>
</div>
