<?php
	  $this->loadHelpers(array('Language'));
      $this->Html->addCrumb(__('Sitemap'), array('plugin'=>'information','controller' => 'siteactions', 'action' => 'sitemap')) ;
      $this->Html->addCrumb($entries[0]['PlaceType']['name'] ,  '' , array('class' => 'active'));
	  $currentLng = $this->Session->read('Config.language');
?>
<?php
echo '<h1>'.$title_for_layout.'</h1>';
echo '<div class="row"><div class="col-md-8">';
	//echo '<div class="panel panel-info" style="margin-top:0px;">';
		//echo '<div class="panel-body">';
		echo '<div class="table-responsive">';
		echo "<table class='table table-bordered'>";
		echo "<tbody id='posts-list'>";
		if(count($places) > 0){
		foreach($places as $place):
		//debug($place);
		echo '<tr class="post-item">';
		echo '<td>';
		echo '<div class="table-responsive">';
		echo '<table class="table innertabletd">';
		echo '<tr>';
		echo '<td rowspan="2"><div class="searchiconblock">';
		echo "<i class='".$place['PlaceType']['icon']."'></i>";
		echo '</div></td>';
		echo '<td width="90%" class="placename">';
		$language = $this->Session->read('Config.language');
		$stringlength = strlen($place['Point']['seo_name']);
		$newID = $stringlength.$place['Point']['id'];
		echo $this->Html->link($place['Point']['name'], array('controller'=>'points','action'=>'view','language'=>$language,'category'=>$place['PlaceType']['seo_name'],'point'=> $place['Point']['seo_name'],'id'=> $newID,'ext' => 'asp'),array('alt' =>$place['Point']['name']));
		echo '</td>';
		echo '<td rowspan="2" width="9%">';
		echo '</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td class="placeaddress">';
		echo $place['BdThanas']['name'].', '.$place['BdDistrict']['name'].', '.$place['BdDivision']['name'];
		echo '</td>';
		echo '</tr>';
		echo '</table>';
		echo '</div>';
		echo '</td>';
		echo '</tr>';
		endforeach;
		}else{
		echo '<tr class="post-item">';
		echo '<td>';
		echo '<p>No Item Found</p>';
		echo '</td>';
		echo '</tr>';
		}
		echo '</tbody>';
		echo '</table>';
		echo '</div>';
		//echo '</div>';
	//echo '</div>';
	?>
	<?php
	echo '</div>';
	echo '<div class="col-md-4">';
	
	echo '</div>';
echo '</div>';
				
?>
