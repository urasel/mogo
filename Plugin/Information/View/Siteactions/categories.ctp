<?php
	  //debug($entries);exit;
	  $this->loadHelpers(array('Language','Theme'));
	  $currentLng = $this->Session->read('Config.language');
      $this->Html->addCrumb(__('World'), array('plugin'=>'information','controller' => 'siteactions', 'action' => 'world','language' => $currentLng)) ;
	  if($passCountryName == '' || is_numeric($passCountryName)){
		  $this->Html->addCrumb(__('All'), array('plugin'=>'information','controller' => 'siteactions', 'action' => 'sitemap','language' => $currentLng)) ;
	  }else{
		  $this->Html->addCrumb($passCountryName, array('plugin'=>'information','controller' => 'siteactions', 'action' => 'sitemap','language' => $currentLng,'?' => array('country' => $queryCountry))) ;
	  }
	  
	  $breadcumpArray = array_reverse($breadcumpArray);
	  //debug($breadcumpArray);exit;
	  foreach($breadcumpArray as $breadcumb){
		  //debug($breadcumb);
		  if($categoryName != $breadcumb['PlaceType']['name']){
			 $stringlength = strlen($breadcumb['PlaceType']['seo_name']);
			$newID = $stringlength.$breadcumb['PlaceType']['id'];
			if($breadcumb['PlaceType']['name'] == 'Motor Bikes'){	
				$this->Html->addCrumb($breadcumb['PlaceType']['name'],array('plugin'=>'information','controller' => 'motorcycles','action'=>'motorcycles') ,array('alt' =>$breadcumb['PlaceType']['name'])); 
			}else{
				$this->Html->addCrumb($breadcumb['PlaceType']['name'],array('plugin'=>'information','controller' => 'siteactions','action'=>'subcategories','country'=>$queryCountry,'category'=>$breadcumb['PlaceType']['seo_name'],'id'=> $newID,'language'=>$currentLng,'ext' => 'asp') ,array('alt' =>$breadcumb['PlaceType']['name'])); 
			}
			
		  }else{
			$this->Html->addCrumb($breadcumb['PlaceType']['name'] ,  '' , array('class' => 'active'));  
		  }
		  
	  }
      //$this->Html->addCrumb($categoryName ,  '' , array('class' => 'active'));
	  
	  $address = '';
?>
<div class="container">
	<div class="row placeview">
		<div class="col-md-12">			
			<div class="col-md-12 posttitleblock zeropadding">
				<div class="col-sm-112 col-xs-12 col-md-12 zeropadding">
				<?php 
						echo '<h1>'.$title_for_layout.'</h1>'; 
						
				?>
				</div>
			</div>
		</div>
<?php

echo '<div class="col-md-8 leftbody">';
		echo '<div class="sortingblock">';
			echo '<div class="row">';
			echo '<div class="col-md-12">';
				$stringlength = strlen($parent_seo_name);
				$newID = $stringlength.$PlaceTypeID;
				foreach(range('A','Z') as $string){
					//echo $queryCountry.'rrrr';exit;
					if(isset($this->params['service'])){
						if(!empty($queryCountry)){
							echo $this->Html->link($string, array('plugin'=>'information','controller' => 'siteactions','action'=>'categories','country'=>$queryCountry,'category'=>$parent_seo_name,'id'=> $newID,'page'=>1,'character'=>$string,'ext' => 'asp','service' => $this->params['service']),array('alt' =>$parent_seo_name,'class' => 'sortlink'));
						}else{
							echo $this->Html->link($string, array('plugin'=>'information','controller' => 'siteactions','action'=>'categories','country'=> null,'category'=>$parent_seo_name,'id'=> $newID,'page'=>1,'character'=>$string,'ext' => 'asp','service' => $this->params['service']),array('alt' =>$parent_seo_name,'class' => 'sortlink'));
						}
					}else{
						if(!empty($queryCountry)){
							echo $this->Html->link($string, array('plugin'=>'information','controller' => 'siteactions','action'=>'categories','country'=>$queryCountry,'category'=>$parent_seo_name,'id'=> $newID,'language'=>$currentLng,'page'=>1,'character'=>$string,'ext' => 'asp'),array('alt' =>$parent_seo_name,'class' => 'sortlink'));
						}else{
							echo $this->Html->link($string, array('plugin'=>'information','controller' => 'siteactions','action'=>'categories','country'=> null,'category'=>$parent_seo_name,'id'=> $newID,'language'=>$currentLng,'page'=>1,'character'=>$string,'ext' => 'asp'),array('alt' =>$parent_seo_name,'class' => 'sortlink'));
						}
					}
					
					
				}
			echo '</div>';
			echo '</div>';
		echo '</div>';
		
		$userData = $this->Session->read('Auth.User');
		$userID = $userData['id'];
		
		echo '<div class="row">';
		echo '<div class="col-md-12">';
		foreach($entries as $place):
		//debug($place);
		$controller = $place['PlaceType']['singlename'];
		if(isset($place['Country']['seo_name']) && !empty($place['Country']['seo_name'])){
			$countryname = $place['Country']['seo_name'];
		}else{
			$countryname = '';
		}
		
		$modelName = ucfirst($controller);
		
		echo '<div class="row">';
		echo '<div class="col-md-12">';
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
						$shortContent = $place[$modelName]['bn_short_description'].' '.$place[$modelName]['bn_details'];
					}else if($currentLng == 'en' && empty($place[$modelName]['bn_name'])){
						$placename = $place[$modelName]['name'];
						$shortContent = $place[$modelName]['short_description'].' '.$place[$modelName]['details'];
					}else if($currentLng == 'en' && empty($place[$modelName]['name'])){
						$placename = $place[$modelName]['bn_name'];
						$shortContent = $place[$modelName]['bn_short_description'].' '.$place[$modelName]['bn_details'];
					}else{
						$placename = $place[$modelName]['name'];
						$shortContent = $place[$modelName]['short_description'].' '.$place[$modelName]['details'];
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
			$newID = $stringlength.$place[$modelName]['point_id'];
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
		}
		else if(in_array($modelName,array('Motorcycle'))){
		echo $this->Html->link('<h1>'.$placename.'</h1>', array('controller'=>'siteactions','action'=>'infos','category'=>$place['PlaceType']['seo_name'],'point'=> $place[$modelName]['seo_name'],'id'=> $newID,'ext' => 'asp','service'=> 'motorcycles'),array('alt' =>$placename,'escape'=>false,'class' => 'infositelink'));
		}
		
		else{
		echo $this->Html->link('<h1>'.$placename.'</h1>', array('controller'=>'siteactions','action'=>'infos','category'=>$place['PlaceType']['seo_name'],'country'=>$countryname,'point'=> $place[$modelName]['seo_name'],'language'=>$currentLng,'id'=> $newID,'ext' => 'asp'),array('alt' =>$placename,'escape'=>false,'class' => 'infositelink'));
		}
		
		echo '</div>';
		echo '<p>';
		
		if(!empty($address)){
			echo $address;
		}
		
		echo '</p>';	

		
		if(in_array($userID,array('1')) && in_array($modelName,array('BabyName'))){
			$controllerName = $place['PlaceType']['pluralname'];
			echo $this->Html->link(' [Edit]',array('admin'=>true,'controller'=>$controllerName,'action'=> 'edit',$place[$modelName]['id']));
		}else if(in_array($userID,array('1')) && in_array($modelName,array('TopicData'))){
				echo $this->Html->link(' [Edit]',array('admin'=>true,'controller'=>'points','action'=> 'topicedit',$place[$modelName]['point_id']));
		}else if(in_array($userID,array('1'))){
			echo $this->Html->link(' [Edit]',array('admin'=>true,'controller'=>'points','action'=>$controller.'edit',$place[$modelName]['point_id']));
		}else{
			
		}
		
		echo '</div>';
		echo '<div class="col-md-2">';
		echo '</div>';
		echo '</div>';
		
		endforeach;
		echo '</div>';
		echo '</div>';
	?>
	<div class="paging">
		<ul class="pagination">
		<?php
		
		
		if(isset($this->params['service'])){
			if(!empty($character)){
			$this->Paginator->options['url'] = array('plugin'=>'information','controller' => 'siteactions','action'=>'categories','category'=>$catname,'character' => $character,'id'=> $passID, 'page' => 1,'service'=>$this->params['service']);
			}else{
				$this->Paginator->options['url'] = array('plugin'=>'information','controller' => 'siteactions','action'=>'categories','category'=>$catname,'id'=> $passID, 'page' => 1,'service'=>$this->params['service']);
			}
		}else{
			if(!empty($character)){
			$this->Paginator->options['url'] = array('plugin'=>'information','controller' => 'siteactions','action'=>'categories','country'=>$queryCountry,'category'=>$catname,'language'=>$currentLng,'character' => $character,'id'=> $passID, 'page' => 1);
			}else{
				$this->Paginator->options['url'] = array('plugin'=>'information','controller' => 'siteactions','action'=>'categories','country'=>$queryCountry,'category'=>$catname,'language'=>$currentLng,'id'=> $passID, 'page' => 1);
			}
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
echo '</div>';
				
?>
<div class="row"><div class="col-md-12">&nbsp;</div></div>
</div>