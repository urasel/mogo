<?php
$currentLng = $this->Session->read('Config.language');
$className = 'Motorcycle';
	if($currentLng == 'bn'){
		$languageID = 2;
		$this->loadHelpers(array('Language'));
		$publishdate = $this->Language->bangladate(date('d F Y',strtotime($place[$className]['created'])));
		$updatedate = $this->Language->bangladate(date('d F Y',strtotime($place[$className]['updated'])));
	}else{
		$languageID = 1;
		$publishdate = date('d F Y',strtotime($place[$className]['created']));
		$updatedate = date('d F Y',strtotime($place[$className]['updated']));
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
<div class="container">
	<div class="row placeview">
	<div class="col-md-8">
		<div class="col-md-12 sectionblock">
			<?php 
			//debug($place);exit;
			$title = '';
			$shortDescription = '';
			$detailDescription = '';
			//debug($place['TopicData']);
				
			if(!empty($place['Motorcycle'])){
				$title = $place['Motorcycle']['name'];
				$seo_name = $place['Motorcycle']['seo_name'];
				$metatag = $place['Motorcycle']['metatag'];
				$mileage = $place['Motorcycle']['mileage'];
				$engine = $place['Motorcycle']['engine'];
				$maximum_power = $place['Motorcycle']['maximum_power'];
				$top_speed = $place['Motorcycle']['top_speed'];
				
			}
			?>
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-5 col-sm-5 col-xs-12">
							<img src="https://auto.ndtvimg.com/bike-images/big/yamaha/fz-25/yamaha-fz-25.jpg?v=16">
						</div>
						<div class="col-md-7 col-sm-7 col-xs-12">
							<div class="row">
								<div class="col-md-12">
								<?php
								echo '<h1 class="posttitle">'.$title.'</h1>';
								echo '<p>';
								echo '<b>'.__('PUBLISHED').'</b>&nbsp;&nbsp;'.$publishdate.'&nbsp;|&nbsp;<b>'.__('UPDATED').'</b>&nbsp;&nbsp;'.$updatedate;
								echo '</p>';
								?>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
								Price: 400,000 TK.
								</div>
							</div>
						</div>
					</div>
				</div>
				
				
				<?php
				echo '<div class="row">';
					echo '<div class="col-md-12">';
							//$link = 'topics/large/'.$place[$className]['image'];
							//echo $this->Html->image($link,array('alt'=>$shortDescription,'class'=>"img-responsive"));
							echo '<h4 class="topic-short targettext">'.$shortDescription.'</h4>';
					echo '</div>';
				echo '</div>';
			
			echo '<div class="col-md-12">';
				echo '<div class="row">';
					echo '<div class="col-md-3 col-sm-6">';
						echo '<div class="row">';
							echo '<div class="col-md-12 align-middle text_header_1">';
							echo 'Engine Capacity';
							echo '</div>';
							echo '<div class="col-md-12 align-middle">';
							echo $engine;
							echo '</div>';
						echo '</div>';
					echo '</div>';
					echo '<div class="col-md-3 col-sm-6">';
						echo '<div class="row">';
							echo '<div class="col-md-12 align-middle text_header_1">';
							echo 'Max Power';
							echo '</div>';
							echo '<div class="col-md-12 align-middle">';
							echo $maximum_power;
							echo '</div>';
						echo '</div>';
					echo '</div>';
					echo '<div class="col-md-3 col-sm-6">';
						echo '<div class="row">';
							echo '<div class="col-md-12 align-middle text_header_1">';
							echo 'Mileage';
							echo '</div>';
							echo '<div class="col-md-12 align-middle">';
							echo $mileage;
							echo '</div>';
						echo '</div>';
					echo '</div>';
					echo '<div class="col-md-3 col-sm-6">';
						echo '<div class="row">';
							echo '<div class="col-md-12 align-middle text_header_1">';
							echo 'Top Speed';
							echo '</div>';
							echo '<div class="col-md-12 align-middle">';
							echo $top_speed;
							echo '</div>';
						echo '</div>';
					echo '</div>';
				
			?>
				</div>
			</div>
			<br/><br/>
			<div class="panel-group" id="accordion" style="margin-top:100px;">
			  <div class="panel panel-default">
				<div class="panel-heading">
				  <h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
					<?php echo '<h3 class="text_header_1">'.$title.' Specifications</h3>'; ?></a>
				  </h4>
				</div>
				<div id="collapse1" class="panel-collapse collapse in">
				  <div class="panel-body">
				  <?php
					echo '<div class="col-md-12">';
						echo '<div class="row">';
						foreach($place['MotorcycleSpecification'] as $k => $v){
							if($v != ''){
							echo '<div class="col-md-6 col-sm-6 col-xs-12" style="border:0px solid #333;">';
								echo '<div class="row">';
									echo '<div class="col-md-6 col-sm-6 col-xs-6"><b>';
									echo ucwords(str_replace('_',' ',$k));
									echo '</b></div>';
									echo '<div class="col-md-6 col-sm-6 col-xs-6">';
									echo ': '.$v;
									echo '</div>';
								echo '</div>';
							echo '</div>';
							}
						}
						
						echo '</div>';
					echo '</div>';
				  ?>
				  </div>
				</div>
			  </div>
			  <div class="panel panel-default">
				<div class="panel-heading">
				  <h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
					<?php echo '<h3 class="text_header_1">'.$title.' Specifications</h3>'; ?></a>
				  </h4>
				</div>
				<div id="collapse2" class="panel-collapse collapse">
				  <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
				  sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
				  minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
				  commodo consequat.</div>
				</div>
			  </div>
			  <div class="panel panel-default">
				<div class="panel-heading">
				  <h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
					<?php echo '<h3 class="text_header_1">'.$title.' Specifications</h3>'; ?></a>
				  </h4>
				</div>
				<div id="collapse3" class="panel-collapse collapse">
				  <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
				  sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
				  minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
				  commodo consequat.</div>
				</div>
			  </div>
			</div> 
			
			<?php
		
			
			
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
			if($post[$className]['image'] != ''){
			
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
					if(isset($post[$className]['image'])){
					$file = $post[$className]['image'];
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
					if(isset($nearby[$className]['image'])){
					$file = $nearby[$className]['image'];
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