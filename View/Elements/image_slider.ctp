<?php
$imageClass = $className.'Image';
if(is_array($place[$imageClass]) && sizeof($place[$imageClass]) > 0){
	echo '<div class="row">';
	echo '<div class="col-md-12">';
	echo '<div class="panel panel-info">';
	echo '<div class="panel-heading">'.__('Pictures of %s',$title).'</div>';
	echo '<div class="panel-body" style="padding:0 15px">';
	echo '<div class="row">';
	$totalImage = sizeof($place[$imageClass]);
	$placename = $place[$className]['name'];
	if($totalImage > 1){
	echo '<div id="slideShowDiv">';
	echo $this->element('jssorplaceslider',array("placeimage" => $place[$imageClass],'placename' => $placename,'foldername' =>'institutes'));
	echo '</div>';
	echo '<div id="singleImageDiv">';
	$imglink = SITEIMAGE."$imagefolder/photogallery/".$place[$imageClass][0]['file'];
	echo $this->Html->image('default.png',array('data-echo' => $imglink,'alt'=>"$placename Snapshot"));
	echo '</div>';
	}else{
	$imglink = SITEIMAGE."$imagefolder/photogallery/".$place[$imageClass][0]['file'];
	echo $this->Html->image('default.png',array('data-echo' => $imglink,'alt'=>"$placename Snapshot",'class' =>'img-responsive'));
	}
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
}
			
?>