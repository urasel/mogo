<?php
$currentLng = $this->Session->read('Config.language');
	if($currentLng == 'bn'){
		$languageID = 2;
		$this->loadHelpers(array('Language'));
		$publishdate = $this->Language->bangladate(date('d F Y',strtotime($place['Topic']['created'])));
		$updatedate = $this->Language->bangladate(date('d F Y',strtotime($place['Topic']['updated'])));
	}else{
		$languageID = 1;
		$publishdate = date('d F Y',strtotime($place['Topic']['created']));
		$updatedate = date('d F Y',strtotime($place['Topic']['updated']));
	}
//debug($place);
	  $stringlength = strlen($place['PlaceType']['seo_name']);
	  $newID = $stringlength.$place['PlaceType']['id'];
	  $language = $this->Session->read('Config.language');
      $className = ucfirst($place['PlaceType']['singlename']);
      $this->Html->addCrumb(__('Sitemap'), array('plugin'=>'information','controller' => 'siteactions','action' => 'sitemap')) ;
      $this->Html->addCrumb($place['PlaceType']['name'],array('plugin'=>'information','controller' => 'siteactions','action'=>'categories','category'=>$place['PlaceType']['seo_name'],'id'=> $newID,'page'=>1,'ext' => 'asp') ,array('alt' =>$place['PlaceType']['name']));
	  $this->Html->addCrumb($place['Point']['name'] ,  '' , array('class' => 'active'));
?>
<style>
.placenamecontainer{
	background: url("http://localhost/skybazarcake2/img/check.png") no-repeat scroll left top rgba(0, 0, 0, 0);
}
</style>
<div class="row">
	<div class="col-md-8">
		<div class="col-md-12 sectionblock">
			<?php 
			//debug($place);
			$title = '';
			$shortDescription = '';
			$detailDescription = '';
			//debug($place['TopicData']);
			if($place['TopicData'][1]['language_id'] == $languageID && !empty($place['TopicData'][1]['name'])){
				
				$title = $place['TopicData'][1]['name'];
				$shortDescription = $place['TopicData'][1]['short_description'];
				$detailDescription = $place['TopicData'][1]['details'];
				
			}else if($place['TopicData'][0]['language_id'] == $languageID && !empty($place['TopicData'][0]['name'])){
				$title = $place['TopicData'][0]['name'];
				$shortDescription = $place['TopicData'][0]['short_description'];
				$detailDescription = $place['TopicData'][0]['details'];
				
			}else if(!empty($place['TopicData'][0]['name'])){
				$title = $place['TopicData'][0]['name'];
				$shortDescription = $place['TopicData'][0]['short_description'];
				$detailDescription = $place['TopicData'][0]['details'];
				
			}else if(!empty($place['TopicData'][1]['name'])){
				$title = $place['TopicData'][1]['name'];
				$shortDescription = $place['TopicData'][1]['short_description'];
				$detailDescription = $place['TopicData'][1]['details'];
				
			}
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
						<div class="col-md-10  col-sm-10 col-xs-10" class="writer-name">
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
						$link = 'topics/large/'.$place['Topic']['image'];
						echo $this->Html->image($link,array('alt'=>$shortDescription,'class'=>"img-responsive"));
						echo '<h4 class="topic-short targettext">'.$shortDescription.'</h4>';
				echo '</div>';
			echo '</div>';
			
			echo '<div class="row targettext">';
					echo '<div class="col-md-12">';
					echo '<div class="topicdetails targettext" >'.$detailDescription.'</div>';
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
			if($post['Topic']['image'] != ''){
			
			echo '<div class="col-md-12 recentposts">';
					echo '<div class="row">';
					echo '<div class="col-md-4 col-sm-4 col-xs-4">';
					if($post['TopicData'][1]['language_id'] == $languageID && !empty($post['TopicData'][1]['name'])){
						$placename = $post['TopicData'][1]['name'];
					}else if($post['TopicData'][0]['language_id'] == $languageID && !empty($post['TopicData'][0]['name'])){
						$placename = $post['TopicData'][0]['name'];
					}else if(!empty($post['TopicData'][0]['name'])){
						$placename = $post['TopicData'][0]['name'];
					}else if(!empty($post['TopicData'][1]['name'])){
						$placename = $post['TopicData'][1]['name'];
					}
					
					$placeSeoName = $post['PlaceType']['seo_name'];
					$pointSeoName = $post['Point']['seo_name'];
					if(isset($post['Topic']['image'])){
					$file = $post['Topic']['image'];
					echo $this->Html->image("topics/medium/$file",array('url'=> array('controller'=>'siteactions','action'=>'topic','category'=>$post['PlaceType']['seo_name'],'point'=> $post['Point']['seo_name'],'id'=> $post['Point']['id'],'ext' => 'asp')),array('alt'=>"$placename napshot"));
					}else{
					echo $this->Html->link('<div class="defaultcaticon"><span><i class="inn '.$post['PlaceType']['icon'].'"></i></span></div>', array('controller'=>'siteactions','action'=>'topic','category'=>$post['PlaceType']['seo_name'],'point'=> $post['Point']['seo_name'],'id'=> $post['Point']['id'],'ext' => 'asp'),array('escape'=>false,'alt' =>$placename));
					
					}
					echo '</div>';
					
					echo '<div class="col-md-8 col-sm-8 col-xs-8">';
					echo $this->Html->link(mb_substr($placename,0,54).'..',array('controller'=>'siteactions','action'=>'topic','category'=>$post['PlaceType']['seo_name'],'point'=> $post['Point']['seo_name'],'id'=> $post['Point']['id'],'ext' => 'asp'),array('class'=>'placename','alt'=>"$placename"));
					echo '</div>';
				echo '</div>';
			echo '</div>';
			}
			
			}
			echo '</div>';
			
	echo '</div>';
echo '</div>';
	
	?>
<div class="row top-buffer">
	<div class="col-md-12">
		<div class="col-md-12 sectionblock otherblock">
		<?php
		//debug($nearbies);
				echo '<h3>'.__('Other').' '.$place['PlaceType']['name'].__(' Informations').'</h3>';
				echo '<div class="row nearPlace">';
				foreach($nearbies as $nearby){
				//debug($nearby);
				echo '<div class="col-xs-12 col-sm-6 col-md-3 placecontianer">';
				echo '<div class="relatedblock">';
					echo '<div class="row">';
					echo '<div class="col-md-12">';
					//debug($place['TopicData']);
					if($nearby['TopicData'][1]['language_id'] == $languageID && !empty($nearby['TopicData'][1]['name'])){
						$placename = $nearby['TopicData'][1]['name'];
					}else if($nearby['TopicData'][0]['language_id'] == $languageID && !empty($nearby['TopicData'][0]['name'])){
						$placename = $nearby['TopicData'][0]['name'];
					}else if(!empty($nearby['TopicData'][0]['name'])){
						$placename = $nearby['TopicData'][0]['name'];
					}else if(!empty($nearby['TopicData'][1]['name'])){
						$placename = $nearby['TopicData'][1]['name'];
					}
					
					$placeSeoName = $nearby['PlaceType']['seo_name'];
					$pointSeoName = $nearby['Point']['seo_name'];
					if(isset($nearby['Topic']['image'])){
					$file = $nearby['Topic']['image'];
					echo $this->Html->image("topics/medium/$file",array('url'=> array('controller'=>'siteactions','action'=>'topic','category'=>$nearby['PlaceType']['seo_name'],'point'=> $nearby['Point']['seo_name'],'id'=> $nearby['Point']['id'],'ext' => 'asp')),array('alt'=>"$placename napshot"));
					}else{
					echo $this->Html->link('<div class="defaultcaticon"><span><i class="inn '.$nearby['PlaceType']['icon'].'"></i></span></div>', array('controller'=>'siteactions','action'=>'topic','category'=>$nearby['PlaceType']['seo_name'],'point'=> $nearby['Point']['seo_name'],'id'=> $nearby['Point']['id'],'ext' => 'asp'),array('escape'=>false,'alt' =>$placename));
					
					}
					echo '</div>';
					echo '<div class="col-md-12">';
					echo $this->Html->link(mb_substr($placename,0,24).'..',array('controller'=>'siteactions','action'=>'topic','category'=>$nearby['PlaceType']['seo_name'],'point'=> $nearby['Point']['seo_name'],'id'=> $nearby['Point']['id'],'ext' => 'asp'),array('class'=>'placename','alt'=>"$placename"));
					echo '</div>';
					echo '</div>';
				echo '</div>';
				echo '</div>';
				
				//debug($nearby);
				}
				echo '</div>';
				
		?>
		
	</div>
</div>	
</div>	
<script>
$(document).ready(function(){
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
});

</script>