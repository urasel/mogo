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
		
		
		
		//debug($place);exit;
		if(isset($place['Country']['seo_name']) && !empty($place['Country']['seo_name'])){
			$countryname = $place['Country']['seo_name'];
		}else{
			$countryname = '';
		}
		$controller = $place['PlaceType']['singlename'];
		$modelName = ucfirst($controller);
		
				if($currentLng == 'bn'){
					$languageID = 2;
				}else{
					$languageID = 1;
				}
				if($modelName == 'Location'){
					$placename = $place[$modelName]['name'].' details facts';
				}else if($modelName == 'TopicData'){
					if($currentLng == 'bn' && !empty($place[$modelName]['bn_name'])){
						$placename = $place[$modelName]['bn_name'];
						$shortContent = '';
					}else if($currentLng == 'en' && empty($place[$modelName]['bn_name'])){
						$placename = $place[$modelName]['name'];
						$shortContent = '';
					}else if($currentLng == 'en' && empty($place[$modelName]['name'])){
						$placename = $place[$modelName]['bn_name'];
						$shortContent = '';
					}else{
						$placename = $place[$modelName]['name'];
						$shortContent = '';
					}
				}else{
						if($currentLng == 'bn' && !empty($place[$modelName]['bn_name'])){
						$placename = $place[$modelName]['bn_name'];	
						}else{
						$placename = $place[$modelName]['name'];
						}
				}
				
		if($place['PlaceType']['singlename'] == 'topicData'){
			$address = '';
		}else if($place['PlaceType']['singlename'] == 'motorcycle'){
			$address = '';
		}else if($place['PlaceType']['singlename'] == 'animal'){
			$address = '';
		}else if($place['PlaceType']['singlename'] == 'continent'){
			$address = '';
		}else if($place['PlaceType']['singlename'] == 'recipe'){
			$address = '';
		}else if($place['PlaceType']['singlename'] == 'babyName'){
			$address = $place[$modelName]['meaning'];
		}else{
			if($currentLng == 'bn' && !empty($place[$modelName]['bn_address'])){
				$address = $place[$modelName]['bn_address'];	
			}else{
				$address = $place[$modelName]['address'];
			}
		}
		if(in_array($modelName,array('BabyName'))){
			$stringlength = strlen($place[$modelName]['seo_name']);
			$newID = $stringlength.$place[$modelName]['id'];
		}else if(in_array($modelName,array('TopicData'))){
			$stringlength = strlen($place['Point']['seo_name']);
			$newID = $stringlength.$place['Point']['id'];
		}else{
			$stringlength = strlen($place[$modelName]['seo_name']);
			$newID = $stringlength.$place[$modelName]['id'];
		}
		
		echo '<div class="blog_txt">';
		if($place['PlaceType']['singlename'] == 'topicData'){
			echo '<div class="row">';
			echo '<div class="col-md-3">';
				if(!empty($place[$modelName]['image'])){
					$imglink = "topics/medium/".$place[$modelName]['image'];
					echo $this->Html->image($imglink,array('id'=>'preview','class'=>'img-responsive'));
				}else{
					$icon = $category['pl']['icon'];
					echo "<i class='fontsitemap $icon'></i>";
				}
			echo '</div>';
			echo '<div class="col-md-9">';
				echo $this->Html->link('<h1><span>'.$placename.'</span></h1>', array('controller'=>'siteactions','action'=>'topic','category'=>$place['PlaceType']['seo_name'],'point'=> $place['Point']['seo_name'],'language'=>$currentLng,'id'=> $place[$modelName]['point_id'],'ext' => 'asp'),array('alt' =>$placename,'escape'=>false));
				echo '<p>'.mb_substr($shortContent,0,120).'..</p>';
			echo '</div>';
			echo '</div>';
			
		}else if($place['PlaceType']['singlename'] == 'continent'){
		echo $this->Html->link('<h1>'.$placename.'</h1>', array('controller'=>'siteactions','action'=>'countries','category'=>$place['Continent']['seo_name'],'point'=> $place[$modelName]['seo_name'],'language'=>$currentLng,'id'=> $place[$modelName]['point_id'],'ext' => 'asp'),array('alt' =>$placename,'escape'=>false,'class' => 'infositelink'));
		}else if($modelName == 'Location'){
		echo $this->Html->link('<h1>'.$placename.'</h1>', array('controller'=>'siteactions','action'=>'infos','category'=>$place['PlaceType']['seo_name'],'country'=>$countryname,'point'=> $place[$modelName]['seo_name'],'language'=>$currentLng,'id'=> $newID,'ext' => 'asp'),array('alt' =>$placename,'escape'=>false,'class' => 'infositelink'));
		}else if(in_array($modelName,array('BabyName'))){
			$genderId = $place[$modelName]['sex_id'];
			if($genderId == 1){
				$genderIcon = '<i class="fa fa-male" aria-hidden="true"></i>';
			}else{
				$genderIcon = '<i class="fa fa-female" aria-hidden="true"></i>';
			}
		echo $this->Html->link('<h1>'.$genderIcon.' '.$placename.'</h1>', array('controller'=>'siteactions','action'=>'bucket','itemgroup'=>$modelName,'category'=>$place['PlaceType']['seo_name'],'point'=> $place[$modelName]['seo_name'],'language'=>$currentLng,'id'=> $newID,'ext' => 'asp'),array('alt' =>$placename,'escape'=>false,'class' => 'infositelink'));
		}else if(in_array($modelName,array('Animal'))){
		echo $this->Html->link('<h1>'.$placename.'</h1>', array('controller'=>'siteactions','action'=>'infos','category'=>$place['PlaceType']['seo_name'],'point'=> $place[$modelName]['seo_name'],'language'=>$currentLng,'id'=> $newID,'ext' => 'asp'),array('alt' =>$placename,'escape'=>false,'class' => 'infositelink'));
		}else{
		echo $this->Html->link('<h1>'.$placename.'</h1>', array('controller'=>'siteactions','action'=>'infos','category'=>$place['PlaceType']['seo_name'],'country'=>$countryname,'point'=> $place[$modelName]['seo_name'],'language'=>$currentLng,'id'=> $newID,'ext' => 'asp'),array('alt' =>$placename,'escape'=>false,'class' => 'infositelink'));
		}
		
		echo '</div>';
		echo '<p>';
		
		if(!empty($address)){
			echo $address;
		}
		
		echo '</p>';
		
		
		
		
		
		
		
		
		
		
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