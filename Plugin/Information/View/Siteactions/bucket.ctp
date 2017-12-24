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

<div class="row">
	<div class="col-md-8">
		<div class="col-md-12 sectionblock">
			<?php 
			//debug($place);
			$title = '';
			$shortDescription = '';
			$detailDescription = '';
			
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
						<div class="col-md-12  col-sm-12 col-xs-12" id="writer-img">
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
						<div class="col-md-10  col-sm-10 col-xs-10 zeropadding" class="writer-name">
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
				echo '<h1>'.$place['PlaceType']['name'].' '.$place[$modelName]['name'].' '.__('Details').'</h1>';
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
<div class="row top-buffer">
	<div class="col-md-12">
		<div class="col-md-12 sectionblock otherblock">
		<?php
		//debug($nearbies);
				echo '<h3>'.__('Other').' '.$place['PlaceType']['name'].__(' Informations').'</h3>';
				echo '<div class="row nearPlace">';
				foreach($nearbies as $nearby){
				//debug($nearby);
				$placename = $nearby[$modelName]['name'];
				$stringlength = strlen($nearby[$modelName]['seo_name']);
				$newID = $stringlength.$nearby[$modelName]['id'];
				$formatAlt = $nearby['PlaceType']['name'].' '.$placename.' '.__('Details');
				echo '<div class="col-xs-12 col-sm-6 col-md-3 contenttitle">';
					//echo $this->Html->link($nearby[$modelName]['name'],array('controller'=>'siteactions','action'=>$modelName,'category'=>$nearby['PlaceType']['seo_name'],$modelName=> $nearby[$modelName]['seo_name'],'id'=> $nearby[$modelName]['id'],'ext' => 'asp'),array('class'=>'placename','alt'=>$nearby[$modelName]['name']));
					echo $this->Html->link('<h5>'.$placename.'</h5>', array('controller'=>'siteactions','action'=>'bucket','itemgroup'=>$modelName,'category'=>$nearby['PlaceType']['seo_name'],'point'=> $nearby[$modelName]['seo_name'],'language'=>$currentLng,'id'=> $newID,'ext' => 'asp'),array('alt' =>$formatAlt,'escape'=>false));
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