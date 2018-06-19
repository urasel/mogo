<?php
	  $currentLng = $this->Session->read('Config.language');
	  $this->Html->addCrumb(__('Sitemap'), array('plugin'=>'information','controller' => 'siteactions','action' => 'sitemap')) ;
      $this->Html->addCrumb(__('Search Result'),  '', array('class' => 'active')) ;
?>
<section>
<div class="container">
		<div class="row placeview">
		<div class="col-md-12 posttitleblock zeropadding">
		<div class="col-md-12">
		<?php 
				echo '<h1>'.$title_for_layout.'</h1>'; 
				
		?>
		</div>
		</div>
<?php
echo '<div class="col-md-8">';
	$language = $this->Session->read('Config.language');
	//echo '<div class="panel panel-info" style="margin-top:0px;">';
		echo '<div class="table-responsive searchrow">';
		echo "<table class='table'>";
		echo "<tbody id='posts-list'>";
		if(count($places) > 0){
		
		foreach($places as $place):
		//debug($place);
		/* Field Select Language Wise Start */
			if($currentLng == 'bn' && !empty($place['Point']['bn_name'])){
				$placename = $place['Point']['bn_name'];
			}else{
				$placename = $place['Point']['name'];
			}
			if($currentLng == 'bn' && !empty($place['Point']['bn_address'])){
				$address = $place['Point']['bn_address'];
			}else{
				$address = $place['Point']['address'];
			}
		 /* Field Select Language Wise End */
		echo '<tr class="post-item">';
		echo '<td>';
		echo '<div class="table-responsive searchrow">';
		echo '<table class="table innertabletd">';
		echo '<tr>';
		echo '<td rowspan="2"><div class="searchiconblock">';
		echo "<i class='".$place['PlaceType']['icon']."'></i>";
		echo '</div></td>';
		echo '<td width="90%" class="placename">';
		
		
		$stringlength = strlen($place['Point']['seo_name']);
		$newID = $stringlength.$place['Point']['id'];
		//$placename = $place['Point']['name'];
		if($place['PlaceType']['singlename'] == 'topic'){
			echo $this->Html->link($placename, array('controller'=>'points','action'=>'topic','category'=>$place['PlaceType']['seo_name'],'point'=> $place['Point']['seo_name'],'language'=>$language,'id'=> $place['Point']['id'],'ext' => 'asp'),array('alt' =>$placename,'class' => 'infositelink'));
		}else{
			echo $this->Html->link($placename, array('controller'=>'siteactions','action'=>'infos','category'=>$place['PlaceType']['seo_name'],'point'=> $place['Point']['seo_name'],'country'=>$queryCountry,'language'=>$language,'id'=> $newID,'ext' => 'asp'),array('alt' =>$placename,'class' => 'infositelink'));
		}

		
		echo '</td>';
		echo '<td rowspan="2" width="9%">';
		echo '</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td class="placeaddress">';
		//echo $place['BdThanas']['name'].', '.$place['BdDistrict']['name'].', '.$place['BdDivision']['name'];
		echo $place['Point']['address'];
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
		if(isset($matchTerm)){
			$matchTerm = $matchTerm;
		}else{
			$matchTerm = '';
		}
	//echo '</div>';
	?>
	<div class="paging">
		<ul class="pagination">
		<?php
		//if (isset($page)) {
		$this->Paginator->options['url'] = array(
		'plugin'=>'information',
		'controller' => 'siteactions',
		'action'=>'searchitem',
		'language'=>$currentLng,
		'string' => $matchTerm
		);
		//}

		echo $this->Paginator->prev(__('&laquo;'), array('tag' => 'li', 'escape' => false), '<a href="#">&laquo;</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
		echo $this->Paginator->numbers(array('separator' => '','modulus'=>'5', 'tag' => 'li', 'currentLink' => true, 'currentClass' => 'active', 'currentTag' => 'a'));
		echo $this->Paginator->next(__('&raquo;'), array('tag' => 'li', 'escape' => false), '<a href="#">&raquo;</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
		?>
		</ul> 
	</div>
	<p>
	<?php
	
	if($currentLng == 'bn'){
		echo $this->Language->banglanumber($this->Paginator->counter(array('format' => __('Showing {:start}-{:end} records out of {:count} Total'))));
	}else{
		echo $this->Paginator->counter(array(
		'format' => __('Showing {:start}-{:end} records out of {:count} Total')
		));
	}
	
	?>	
	</p>
	<?php
	echo '</div>';
	echo '<div class="col-md-4">';
	
	echo '</div>';
				
?>
</div>
</div>
</section>
