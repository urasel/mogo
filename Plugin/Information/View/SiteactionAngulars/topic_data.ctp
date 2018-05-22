<?php
$this->loadHelpers(array('Language','Theme'));
$currentLng = $this->Session->read('Config.language');
	if($currentLng == 'bn'){
		$languageID = 2;
		$publishdate = $this->Language->bangladate(date('d F Y',strtotime($place['TopicData']['created'])));
		$updatedate = $this->Language->bangladate(date('d F Y',strtotime($place['TopicData']['updated'])));
	}else{
		$languageID = 1;
		$publishdate = date('d F Y',strtotime($place['TopicData']['created']));
		$updatedate = date('d F Y',strtotime($place['TopicData']['updated']));
	}
//debug($place);
	  $stringlength = strlen($place['PlaceType']['seo_name']);
	  $newID = $stringlength.$place['PlaceType']['id'];
	  $language = $this->Session->read('Config.language');
      $className = ucfirst($place['PlaceType']['singlename']);
	  $this->Html->addCrumb(__('Sitemap'), array('plugin'=>'information','controller' => 'siteactions','action' => 'sitemap')) ;
	  $breadcumpArray = array_reverse($breadcumpArray);
	  //debug($breadcumpArray);exit;
	  foreach($breadcumpArray as $breadcumb){
			//debug($breadcumb);exit;
			 $stringlength = strlen($breadcumb['PlaceType']['seo_name']);
			$newID = $stringlength.$breadcumb['PlaceType']['id'];
			if($breadcumb['hasChild'] == true){
				$this->Html->addCrumb($breadcumb['PlaceType']['name'],array('plugin'=>'information','controller' => 'siteactions','action'=>'subcategories','category'=>$breadcumb['PlaceType']['seo_name'],'id'=> $newID,'language'=>$currentLng,'ext' => 'asp') ,array('alt' =>$breadcumb['PlaceType']['name']));
			}else{
				$this->Html->addCrumb($breadcumb['PlaceType']['name'],array('plugin'=>'information','controller' => 'siteactions','action'=>'categories','category'=>$breadcumb['PlaceType']['seo_name'],'id'=> $newID,'page'=>1,'ext' => 'asp') ,array('alt' =>$breadcumb['PlaceType']['name']));
			}
			 
		  
	  }
	  $this->Html->addCrumb($title_for_layout ,  '' , array('class' => 'active'));
?>
<div class="row">
	<div class="col-md-8">
		<div class="col-md-12 sectionblock">
			<?php 
			//debug($place);
			$title = '';
			$shortDescription = '';
			$detailDescription = '';
			//debug($place['TopicData']);
			
			echo '<div class="row">';
				echo '<div class="col-md-12">';
						echo '<h1 class="posttitle">'.$title.'</h1>';
						echo '<p>';
						echo '&nbsp;&nbsp;<b>'.__('PUBLISHED').'</b>&nbsp;&nbsp;'.$publishdate.'&nbsp;|&nbsp;<b>'.__('UPDATED').'</b>&nbsp;&nbsp;'.$updatedate;
						echo '</p>';
				?>
				</div>
				</div>
				<div class="col-md-12">
				<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-12">
					<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12" id="writer-block">
					<div class="writer-container">
						<div class="col-md-2  col-sm-2 col-xs-2" id="writer-img">
						<?php
						if(!empty($place['User']['firstname']) && !empty($place['User']['lastname'])){
							$userName = $place['User']['firstname'].' '.$place['User']['lastname'];
						}else{
							$userName = 'InfoMap24';
						}
						if(empty($place['User']['image'])){
						echo '<i class="fa fa-user writericon"></i>';
						}else{
						$imglink = 'users/small/'.$place['User']['image'];
						echo $this->Html->image($imglink,array('alt'=>'','class'=>'writerprofileimg'));
						}
						?>
						</div>
						<div class="col-md-10  col-sm-10 col-xs-10 " class="writer-name">
						<span><?php echo $userName;?></span>
						</div>
					</div>
					</div>
					</div>
				</div>
				<div class="col-md-8 col-sm-8 col-xs-12">
					<div class="row">
					<div class="col-md-12 col-sm-12  col-xs-12 " id="social-block">
					
					<div class="fb-like" data-href="<?php echo 'http://www.infomap24.com/'.$this->params->url;?>" data-width="300" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
					<div class="zoominbutton"></div>
					<div class="zoomoutbutton"></div>
					</div>
				</div>
				
				</div>
				</div>
				</div>
				
				
				<?php
			echo '<div class="row">';
				echo '<div class="col-md-12">';
						$link = 'topics/large/'.$place['Point']['image'];
						echo $this->Html->image($link,array('alt'=>$short_description,'class'=>"img-responsive"));
						echo '<h4 class="topic-short targettext">'.$short_description.'</h4>';
				echo '</div>';
			echo '</div>';
			
			echo '<div class="row targettext">';
					echo '<div class="col-md-12">';
					echo '<div class="topicdetails targettext" >'.$details.'</div>';
					echo '</div>';
					
			echo '</div>';
		?>
			<div class="row">
			<div class="col-md-12">
			<div class="fb-comments" data-href="http://www.infomap24.com<?php echo $_SERVER[ 'REQUEST_URI' ];?>" data-width="100%" data-numposts="5" data-colorscheme="light"></div>
			</div>
			</div>
		<?php
	echo '</div>';
	echo '</div>';
	echo '<div class="col-md-4">';
			echo '<div class="col-md-12 sectionblock recentsection">';
			//debug($recentposts);
			foreach($recentposts as $post){
			if($post['TopicData']['image'] != ''){
			
			echo '<div class="col-md-12 recentposts">';
					echo '<div class="row">';
					echo '<div class="col-md-4 col-sm-4 col-xs-4">';
					
					if($currentLng == 'bn' && !empty($post[$className]['bn_name'])){
						$placename = $post[$className]['bn_name'];
						$shortContent = $post[$className]['bn_short_description'].' '.$post[$className]['bn_details'];
					}else if($currentLng == 'en' && empty($post[$className]['bn_name'])){
						$placename = $post[$className]['name'];
						$shortContent = $post[$className]['short_description'].' '.$post[$className]['details'];
					}else if($currentLng == 'en' && empty($post[$className]['name'])){
						$placename = $post[$className]['bn_name'];
						$shortContent = $post[$className]['bn_short_description'].' '.$post[$className]['bn_details'];
					}else{
						$placename = $post[$className]['name'];
						$shortContent = $post[$className]['short_description'].' '.$post[$className]['details'];
					}
					
					$placeSeoName = $post['PlaceType']['seo_name'];
					$pointSeoName = $post[$className]['seo_name'];
					if(isset($post['TopicData']['image'])){
					$file = $post['TopicData']['image'];
					echo $this->Html->image("topics/medium/$file",array('url'=> array('controller'=>'siteactions','action'=>'TopicData','category'=>$post['PlaceType']['seo_name'],'point'=> $pointSeoName,'id'=> $post[$className]['point_id'],'ext' => 'asp')),array('alt'=>"$placename napshot"));
					}else{
					echo $this->Html->link('<div class="defaultcaticon"><span><i class="inn '.$post['PlaceType']['icon'].'"></i></span></div>', array('controller'=>'siteactions','action'=>'TopicData','category'=>$post['PlaceType']['seo_name'],'point'=> $pointSeoName,'id'=> $post['Point']['id'],'ext' => 'asp'),array('escape'=>false,'alt' =>$placename));
					
					}
					echo '</div>';
					
					echo '<div class="col-md-8 col-sm-8 col-xs-8">';
					echo $this->Html->link(mb_substr($placename,0,54).'..',array('controller'=>'siteactions','action'=>'topic','category'=>$place['PlaceType']['seo_name'],'point'=> $pointSeoName,'language'=>$currentLng,'id'=> $place[$className]['point_id'],'ext' => 'asp'),array('class'=>'placename','alt'=>"$placename"));
					
					echo '</div>';
				echo '</div>';
			echo '</div>';
			}
			
			}
			echo '</div>';
			
	echo '</div>';
echo '</div>';
	echo $this->element('nearby-items', array('nearbies' => $nearbies,'place' => $place,'className' => $className));
	?>	
<script>
    $(".zoominbutton").click(function() {
        var fontSize = parseInt($('.targettext').css("font-size"));
        fontSize = fontSize + 1 + "px"; // Set increase font size by change number.
        $('.targettext').css({'font-size':fontSize});
        // www.cakephpexample zoomin jquery example
    });
    $(".zoomoutbutton").click(function() {
        var fontSize = parseInt($('.targettext').css("font-size"));
        fontSize = fontSize - 1 + "px"; // Set decrease font size by change number.
        $('.targettext').css({'font-size':fontSize});
        // www.cakephpexample zoomout jquery example
    });
</script>