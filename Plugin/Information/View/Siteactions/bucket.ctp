<?php
$currentLng = $this->Session->read('Config.language');
	if($currentLng == 'bn'){
		$languageID = 2;
		$this->loadHelpers(array('Language'));
		$publishdate = $this->Language->bangladate(date('d F Y',strtotime($place[$modelName]['created'])));
		$updatedate = $this->Language->bangladate(date('d F Y',strtotime($place[$modelName]['updated'])));
	}else{
		$languageID = 1;
		$publishdate = date('d F Y',strtotime($place[$modelName]['created']));
		$updatedate = date('d F Y',strtotime($place[$modelName]['updated']));
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
	  $this->Html->addCrumb($place[$modelName]['name'] ,  '' , array('class' => 'active'));
?>
<style>
.placenamecontainer{
	background: url("http://localhost/skybazarcake2/img/check.png") no-repeat scroll left top rgba(0, 0, 0, 0);
}
</style>
<div class="container">
	<div class="row placeview">
	<div class="col-md-8">
		<div class="sectionblock">
			<?php 
			//debug($place);
			$title = '';
			$shortDescription = '';
			$detailDescription = '';
			
			echo '<div class="row">';
				echo '<div class="col-md-12">';
						?>
						<div class="col-md-12 posttitleblock zeropadding">
						<?php 
							echo '<h1>'.$place['PlaceType']['name'].' '.$place[$modelName]['name'].' '.__('Details').'</h1><br/>';
								
						?>
						</div>
						<?php
						
						echo '<p>';
						echo '<b>'.__('PUBLISHED').'</b>&nbsp;&nbsp;'.$publishdate.'&nbsp;|&nbsp;<b>'.__('UPDATED').'</b>&nbsp;&nbsp;'.$updatedate;
						echo '</p>';
				?>
				</div>
				</div>
				
				
				<?php
			echo '<div class="row">';
				echo '<div class="col-md-12">';
				
				?>
				<table class="table table-bordered"> 
				<tbody> 
				<tr> 
				<th scope="row">Gender</th> 
				<td><?php echo $place['Sex']['name']; ?></td> 
				</tr>
				<tr> 
				<th scope="row">Category</th> 
				<td><?php echo $place['PlaceType']['name']; ?></td> 
				</tr>
				<tr> 
				<th scope="row">Meaning</th> 
				<td><?php echo $place[$modelName]['meaning']; ?></td> 
				</tr>
				<tr> 
				<th scope="row">Tags</th> 
				<td><?php echo $place[$modelName]['tags']; ?></td> 
				</tr>
				<tr> 
				<th scope="row">Origin</th> 
				<td><?php echo $place[$modelName]['origin']; ?></td> 
				</tr>
				</tbody> 
				</table>
				<?php
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
		
			
	echo '</div>';
echo '</div>';
	
	?>

<div class="row">
		<?php
		//debug($nearbies);
				echo '<h2 class="nino-sectionHeading">'.__('Others %s Information',$place['PlaceType']['name']).'</h2>';
				echo '<div class="nearPlace">';
				foreach($nearbies as $nearby){
				//debug($nearby);
				$placename = $nearby[$modelName]['name'];
				$stringlength = strlen($nearby[$modelName]['seo_name']);
				$newID = $stringlength.$nearby[$modelName]['id'];
				$formatAlt = $nearby['PlaceType']['name'].' '.$placename.' '.__('Details');
				$shortDescription = '';
				
				//debug($nearby);
				
				echo '<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">';
					echo '<div class="blog_about">';
						//echo '<div class="about-border"> <i class="fa fa-tablet aligncenter"></i></div>';
						/*
							echo "<div class='blog_img $postSeo'>";
								echo '<figure>';
								$imglink = $nearplace[$className]['image'];
								if($className == 'TopicData'){
									$fileExistPath = WWW_ROOT.'img'.DS.'topics'.'medium'.DS.$imglink;
								}else{
									$foldername = $nearplace['PlaceType']['pluralname'];
									$fileExistPath = WWW_ROOT.'img'.DS.$foldername.DS.'photogallery'.DS.$imglink;
								}
								
								if(!empty($imglink) && file_exists($fileExistPath)){
									if($className == 'TopicData'){
										echo $this->Html->image('default.png', array('url' => array('controller'=>'siteactions','action'=>'topic','category'=>$nearplace['PlaceType']['seo_name'],'point'=> $postSeo,'language'=>$currentLng,'id'=> $nearplace[$className]['point_id'],'ext' => 'asp'),'alt' =>$metaTag,'class' => 'img-responsive','data-echo' => SITEIMAGE."topics/medium/$imglink"));
										
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
							*/
							
							
							echo '<div class="blog_txt">';
								echo '<h1>';
								
								echo $this->Html->link(mb_substr($placename,0,55), array('controller'=>'siteactions','action'=>'bucket','itemgroup'=>$modelName,'category'=>$nearby['PlaceType']['seo_name'],'point'=> $nearby[$modelName]['seo_name'],'language'=>$currentLng,'id'=> $newID,'ext' => 'asp'),array('alt' =>$formatAlt,'escape'=>false));
								
								echo '</h1>';
								/*
								echo '<div class="blog_comment">';
									echo '<ul>';
										echo '<li><a href="#"><i class="fa fa-comment" aria-hidden="true"></i>50</a></li>';
										echo '<li><a href="#"><i class="fa fa-thumbs-up" aria-hidden="true"></i>98</a></li>';
									echo '</ul>';
								echo '</div>';
								*/
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
				
				}
				echo '</div>';
				
		?>
		
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