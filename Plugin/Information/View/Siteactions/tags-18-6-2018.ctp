<?php
	  //debug($entries);exit;
	  $this->loadHelpers(array('Language'));
	  $currentLng = $this->Session->read('Config.language');
	  $this->Html->addCrumb(__('World'), array('plugin'=>'information','controller' => 'siteactions', 'action' => 'world','language' => $currentLng)) ;
	  if($passCountryName == ''){
		  $this->Html->addCrumb(__('All'), array('plugin'=>'information','controller' => 'siteactions', 'action' => 'sitemap','language' => $currentLng)) ;
	  }else{
		  $this->Html->addCrumb($passCountryName, array('plugin'=>'information','controller' => 'siteactions', 'action' => 'sitemap','language' => $currentLng,'?' => array('country' => $queryCountry))) ;
	  }
      $this->Html->addCrumb($title_for_layout ,  '' , array('class' => 'active'));
	  $currentLng = $this->Session->read('Config.language');
	  //debug($this->Session);
?>
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
		$userData = $this->Session->read('Auth.User');
		$userID = $userData['id'];
		
		echo '<div class="table-responsive">';
		echo "<table class='table'>";
		echo "<tbody id='posts-list'>";
		foreach($entries as $place):
		//debug($place);
		$controller = $place['PlaceType']['singlename'];
		$modelName = ucfirst($controller);
		echo '<tr class="post-item">';
		echo '<td>';
		echo '<div class="row">';
		echo '<div class="col-md-10">';
				if($currentLng == 'bn'){
					$languageID = 2;
				}else{
					$languageID = 1;
				}
				if($modelName == 'Location'){
					$placename = $place[$modelName]['name'].' details facts';
				}else{
						if($currentLng == 'bn' && !empty($place[$modelName]['bn_name'])){
						$placename = $place[$modelName]['bn_name'];	
						}else{
						$placename = $place[$modelName]['name'];
						}
				}
		if($place['PlaceType']['singlename'] == 'topic'){
			$address = '';
		}else if($place['PlaceType']['singlename'] == 'animal'){
			$address = '';
		}else if($place['PlaceType']['singlename'] == 'continent'){
			$address = '';
		}else{
			if($currentLng == 'bn' && !empty($place[$modelName]['bn_address'])){
				$address = $place[$modelName]['bn_address'];	
			}else{
				$address = $place[$modelName]['address'];
			}
		}
		
		$stringlength = strlen($place[$modelName]['seo_name']);
		$newID = $stringlength.$place[$modelName]['point_id'];
		if($place['PlaceType']['singlename'] == 'topic'){
		echo $this->Html->link('<h5>'.$placename.'</h5>', array('controller'=>'siteactions','action'=>'topic','category'=>$place['PlaceType']['seo_name'],'point'=> $place[$modelName]['seo_name'],'language'=>$currentLng,'id'=> $place[$modelName]['point_id'],'ext' => 'asp'),array('alt' =>$placename,'escape'=>false));
		}else if($place['PlaceType']['singlename'] == 'continent'){
		echo $this->Html->link('<h5>'.$placename.'</h5>', array('controller'=>'siteactions','action'=>'countries','category'=>$place['Continent']['seo_name'],'point'=> $place[$modelName]['seo_name'],'language'=>$currentLng,'id'=> $place[$modelName]['point_id'],'ext' => 'asp'),array('alt' =>$placename,'escape'=>false));
		}else if($modelName == 'Location'){
		echo $this->Html->link('<h5>'.$placename.'</h5>', array('controller'=>'siteactions','action'=>'infos','category'=>$place['PlaceType']['seo_name'],'point'=> $place[$modelName]['seo_name'],'language'=>$currentLng,'id'=> $newID,'ext' => 'asp'),array('alt' =>$placename,'escape'=>false));
		}else{
		echo $this->Html->link('<h5>'.$placename.'</h5>', array('controller'=>'siteactions','action'=>'infos','category'=>$place['PlaceType']['seo_name'],'point'=> $place[$modelName]['seo_name'],'language'=>$currentLng,'id'=> $newID,'ext' => 'asp'),array('alt' =>$placename,'escape'=>false));
		}
		echo '<p>';
		
		if(!empty($address)){
			echo $address;
		}
		
		echo '</p>';			
		if(in_array($userID,array('1'))){
		echo $this->Html->link(' [Edit]',array('controller'=>'points','action'=>$controller.'edit',$place[$modelName]['point_id']));
		}
		echo '</div>';
		echo '<div class="col-md-2">';
		echo '</div>';
		echo '</div>';
		echo '</td>';
		echo '</tr>';
		endforeach;
		echo '</tbody>';
		echo '</table>';
		echo '</div>';
	?>
	<div class="paging">
		<ul class="pagination">
		<?php
		//debug($passcountry);
		if (!empty($passcountry) && empty($passdivision) && empty($passdistrict) && empty($passthana)) {
			$this->Paginator->options['url'] = array('plugin'=>'information','controller' => 'siteactions','action'=>'tags','language'=>$currentLng,'institutetype'=> $passtype,'country'=> $passcountry,'page' => 1,'seotitle' => $passseotitle,'id'=> $slugid,'ext' => 'asp' );
		}else if (!empty($passdivision) && empty($passdistrict) && empty($passthana)) {
			$this->Paginator->options['url'] = array('plugin'=>'information','controller' => 'siteactions','action'=>'tags','language'=>$currentLng,'institutetype'=> $passtype,'country'=> $passcountry,'division'=> $passdivision,'page' => 1,'seotitle' => $passseotitle,'id'=> $slugid,'ext' => 'asp' );
		}else if (!empty($passdistrict) && empty($passthana)) {
			$this->Paginator->options['url'] = array('plugin'=>'information','controller' => 'siteactions','action'=>'tags','language'=>$currentLng,'institutetype'=> $passtype,'country'=> $passcountry,'division'=> $passdivision,'district'=> $passdistrict,'page' => 1,'seotitle' => $passseotitle,'id'=> $slugid,'ext' => 'asp' );
		}else{
			$this->Paginator->options['url'] = array('plugin'=>'information','controller' => 'siteactions','action'=>'tags','language'=>$currentLng,'institutetype'=> $passtype,'country'=> $passcountry,'division'=> $passdivision,'district'=> $passdistrict,'thana'=>$passthana,'page' => 1,'seotitle' => $passseotitle,'id'=> $slugid,'ext' => 'asp' );
		}
		echo $this->Paginator->prev(__('&laquo;'), array('tag' => 'li', 'escape' => false), '<a href="#">&laquo;</a>', array('class' => 'prev disabled', 'tag' => 'li', 'escape' => false));
		echo $this->Paginator->numbers(array('separator' => '','modulus'=>'4','tag' => 'li', 'currentLink' => true, 'currentClass' => 'active', 'currentTag' => 'a'));
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