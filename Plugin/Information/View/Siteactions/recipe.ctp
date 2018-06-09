<?php
$currentLng = $this->Session->read('Config.language');
$className = 'Recipe';
	if($currentLng == 'bn'){
		$languageID = 2;
		$this->loadHelpers(array('Language'));
		$publishdate = $this->Language->bangladate(date('d F Y',strtotime($place['Point']['created'])));
		$updatedate = $this->Language->bangladate(date('d F Y',strtotime($place['Point']['updated'])));
	}else{
		$languageID = 1;
		$publishdate = date('d F Y',strtotime($place['Point']['created']));
		$updatedate = date('d F Y',strtotime($place['Point']['updated']));
	}
//debug($place);
	  $stringlength = strlen($place['PlaceType']['seo_name']);
	  $newID = $stringlength.$place['PlaceType']['id'];
	  $language = $this->Session->read('Config.language');
      $className = ucfirst($place['PlaceType']['singlename']);
      $this->Html->addCrumb(__('Sitemap'), array('plugin'=>'information','controller' => 'siteactions','action' => 'sitemap')) ;
      $this->Html->addCrumb($place['PlaceType']['name'],array('plugin'=>'information','controller' => 'siteactions','action'=>'categories','category'=>$place['PlaceType']['seo_name'],'id'=> $newID,'page'=>1,'ext' => 'asp') ,array('alt' =>$place['PlaceType']['name']));
	  $this->Html->addCrumb($place['Point']['name'] ,  '' , array('class' => 'active'));
	  
	  
		$title = '';
		$shortDescription = '';
		$detailDescription = '';
		debug($place);exit;
			
			$title = $place[$className]['title'];
			$shortDescription = $place[$className]['short_note'];
			$ingredients = $place[$className]['ingredients'];
			$instructions = $place[$className]['instructions'];
			$recipe_notes = $place[$className]['recipe_notes'];
		
?>
<style>
.placenamecontainer{
	background: url("http://localhost/skybazarcake2/img/check.png") no-repeat scroll left top rgba(0, 0, 0, 0);
}
</style>

<!--service section start-->
<div class="med_toppadder100">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="blog_about">
					<div class="blog_img blog_post_img">
						<figure>
							<?php
								$link = 'recipes/large/'.$place[$className]['image'];
								echo $this->Html->image($link,array('alt'=>$shortDescription,'class'=>"img-responsive"));
							?>
							<img src="images/blog_bg_1.jpg" alt="img" class="img-responsive">
						</figure>
					</div>
					<div class="blog_comment">
						<ul>
							<li><a href="#"><i class="fa fa-comment" aria-hidden="true"></i>50</a>
							</li>
							<li><a href="#"><i class="fa fa-thumbs-up" aria-hidden="true"></i>98</a>
							</li>
						</ul>
					</div>
					<div class="blog_txt">
						<h1><a href="#">Very popular during</a></h1>
						<div class="blog_txt_info">
							<ul>
								<li>BY ADMIN</li>
								<li>SEPT.29,2016</li>
							</ul>
						</div>
						<p>Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat consequat auctor.</p>
						<p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora.</p>
						<a href="#">Read More <i class="fa fa-long-arrow-right"></i></a>
					</div>
				</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="team_heading_wrapper med_bottompadder40">
					<h1 class="med_bottompadder20"><?php echo $title;?></h1>
				</div>
			</div>
			
			
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="abt_txt abt_txt_resp">
				
					<h2><?php echo $shortDescription;?></h2>
					<p class="med_toppadder20"><?php echo $ingredients;?></p>
					<p class="med_toppadder20"><?php echo $instructions;?></p>
					<p class="med_toppadder20"><?php echo $recipe_notes;?></p>
				</div>
			</div>
			
			 
		</div>
</div>
</div>
    <!--service section end-->

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
					//debug($place[$className]);
					if($nearby[$className][1]['language_id'] == $languageID && !empty($nearby[$className][1]['name'])){
						$placename = $nearby[$className][1]['name'];
					}else if($nearby[$className][0]['language_id'] == $languageID && !empty($nearby[$className][0]['name'])){
						$placename = $nearby[$className][0]['name'];
					}else if(!empty($nearby[$className][0]['name'])){
						$placename = $nearby[$className][0]['name'];
					}else if(!empty($nearby[$className][1]['name'])){
						$placename = $nearby[$className][1]['name'];
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