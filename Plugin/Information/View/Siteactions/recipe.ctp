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
	  $imageTable = $className.'Image';
	  
	  $stringlength = strlen($place['PlaceType']['seo_name']);
	  $newID = $stringlength.$place['PlaceType']['id'];
	  $className = ucfirst($place['PlaceType']['singlename']);
      $this->Html->addCrumb(__('World'), array('plugin'=>'information','controller' => 'siteactions', 'action' => 'world','language' => $currentLng)) ;
	  if($passCountryName == ''){
		  $this->Html->addCrumb(__('All'), array('plugin'=>'information','controller' => 'siteactions', 'action' => 'sitemap','language' => $currentLng)) ;
	  }else{
		  $this->Html->addCrumb($passCountryName, array('plugin'=>'information','controller' => 'siteactions', 'action' => 'sitemap','language' => $currentLng,'?' => array('country' => $queryCountry))) ;
	  }
      $breadcumpArray = array_reverse($breadcumpArray);
	  //debug($breadcumpArray);exit;
	  foreach($breadcumpArray as $breadcumb){
			//debug($breadcumb);exit;
			 $stringlength = strlen($breadcumb['PlaceType']['seo_name']);
			$newID = $stringlength.$breadcumb['PlaceType']['id'];
			if($breadcumb['hasChild'] == true){
				$this->Html->addCrumb($breadcumb['PlaceType']['name'],array('plugin'=>'information','controller' => 'siteactions','action'=>'subcategories','country'=>$queryCountry,'category'=>$breadcumb['PlaceType']['seo_name'],'id'=> $newID,'language'=>$currentLng,'page'=>1,'ext' => 'asp') ,array('alt' =>$breadcumb['PlaceType']['name']));
			}else{
				$this->Html->addCrumb($breadcumb['PlaceType']['name'],array('plugin'=>'information','controller' => 'siteactions','action'=>'categories','country'=>$queryCountry,'category'=>$breadcumb['PlaceType']['seo_name'],'id'=> $newID,'language'=>$currentLng,'page'=>1,'ext' => 'asp') ,array('alt' =>$breadcumb['PlaceType']['name']));
			}
			 
		  
	  }
	  
	  $this->Html->addCrumb($place['Point']['name'] ,  '' , array('class' => 'active'));
	  $userName = $place['User']['firstname'].' '.$place['User']['lastname'];
	  
		$title = '';
		$shortDescription = '';
		$detailDescription = '';
		//debug($place);exit;
			
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
						<?php if(isset($place[$imageTable][0]['file'])){ ?>
						<figure>
							<?php
								$feature_image = $place[$imageTable][0]['file'];
								$link = SITEIMAGE."recipes/large/".$feature_image;
								//echo $this->Html->image($link,array('alt'=>$shortDescription,'class'=>"img-responsive"));
								echo $this->Html->image('default.png',array('data-echo' => $link,'alt'=>"$shortDescription",'class' =>'img-responsive'));
							?>
						</figure>
						<?php } ?>
					</div>
					
					<div class="blog_comment">
						<ul>
							<li><a href="#"><i class="fa fa-share" aria-hidden="true"></i>
							<span data-open-share-count="facebook,pinterest,reddit" data-open-share-count-url="http://www.digitalsurgeons.com"></span>
							</a>
							</li>
							<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
							</li>
							<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
							</li>
							<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="blog_txt col-lg-8 col-md-8 col-sm-12 col-xs-12">
							<div class="topposition">
								<div class="col-md-12 zeropadding">			
									<div class="col-md-12 posttitleblock zeropadding">
										<div class="col-sm-112 col-xs-12 col-md-12 zeropadding">
										<?php 
												echo '<h1>'.$title.'</h1>'; 
												
										?>
										</div>
										<div class="blog_txt_info">
											<ul>
												<li>BY <?php echo $userName;?></li>
												<li><?php echo $publishdate; ?></li>
											</ul>
										</div>
									</div>
								</div>
								
								
								
								<div class="articlebody">
									<?php if(!empty($shortDescription)){ ?>
									<div class="med_toppadder20">
										<h2><?php echo $shortDescription;?></h2>
									</div>
									<?php } ?>
									<?php if(!empty($ingredients)){ ?>
									<div class="med_toppadder20">
										<h2>Ingredients:</h2>
										<p><?php echo $ingredients;?></p>
									</div>
									<?php } ?>
									<?php if(!empty($instructions)){ ?>
									<div class="med_toppadder20">
										<h2>Instructions:</h2>
										<p><?php echo $instructions;?></p>
									</div>
									<?php } ?>
									<?php if(!empty($recipe_notes)){ ?>
									<div class="med_toppadder20">
										<h2>Recipe Notes:</h2>
										<p><?php echo $recipe_notes;?></p>
									</div>
									<?php } ?>
									
									<p class="reference-txt">ফিচার ইমেজ- Steemit</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-8 col-sm-12 col-xs-12">
						</div>
						
					</div>
			</div>
			
			 
		</div>
</div>
</div>
    <!--service section end-->
	
<?php
		echo $this->element('nearby-items', array('nearbies' => $nearbies,'place' => $place,'className' => $className));

?>
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