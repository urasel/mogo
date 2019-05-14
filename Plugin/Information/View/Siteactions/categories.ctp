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
			echo '<div class="col-md-12 sortingblockContainer">';
				$stringlength = strlen($parent_seo_name);
				$newID = $stringlength.$PlaceTypeID;
				foreach(range('A','Z') as $string){
					//echo $queryCountry.'rrrr';exit;
					$altText = $parent_seo_name. ' Name Start with '.$string;
					if(isset($this->params['service'])){
						if(!empty($queryCountry)){
							echo $this->Html->link($string, array('plugin'=>'information','controller' => 'siteactions','action'=>'categories','country'=>$queryCountry,'category'=>$parent_seo_name,'id'=> $newID,'page'=>1,'character'=>$string,'ext' => 'asp'),array('alt' =>$altText,'class' => 'sortlink'));
						}else{
							echo $this->Html->link($string, array('plugin'=>'information','controller' => 'siteactions','action'=>'categories','country'=> null,'category'=>$parent_seo_name,'id'=> $newID,'page'=>1,'character'=>$string,'ext' => 'asp'),array('alt' =>$altText,'class' => 'sortlink'));
						}
					}else{
						if(!empty($queryCountry)){
							echo $this->Html->link($string, array('plugin'=>'information','controller' => 'siteactions','action'=>'categories','country'=>$queryCountry,'category'=>$parent_seo_name,'id'=> $newID,'language'=>$currentLng,'page'=>1,'character'=>$string,'ext' => 'asp'),array('alt' =>$altText,'class' => 'sortlink'));
						}else{
							echo $this->Html->link($string, array('plugin'=>'information','controller' => 'siteactions','action'=>'categories','country'=> null,'category'=>$parent_seo_name,'id'=> $newID,'language'=>$currentLng,'page'=>1,'character'=>$string,'ext' => 'asp'),array('alt' =>$altText,'class' => 'sortlink'));
						}
					}
					
					
				}
			echo '</div>';
			echo '</div>';
		echo '</div>';
		
		$userData = $this->Session->read('Auth.User');
		$userID = $userData['id'];
		//debug($this->params);
		$id = $id;
		$singleName = $singleName;
		$childs = $childs;
		$character = $character;
		$queryCountry = $queryCountry;
		$countryId = $countryId;
		?>
		
	<div  ng-app='myapp' ng-controller='fetchCtrl' ng-init="init('<?php echo $id;?>','<?php echo $singleName;?>','<?php print_r($childs);?>','<?php echo $character;?>','<?php echo $queryCountry;?>','<?php echo $countryId;?>')">
		<div class="container" infinite-scroll="getPosts()">

			<div class="post" ng-repeat='post in posts'>
				<h1 ng-bind='post.title'></h1>
				<p ng-bind='post.shortcontent'></p>
				<a ng-href="{{ post.link }}" class="more" target="_blank">More</a>
			</div>

			<div ng-show='loading' class='loading'>Loading...</div>
		</div>
	</div>
	<?php
	echo '</div>';
	echo '<div class="col-md-4">';
	
	echo '</div>';
echo '</div>';
				
?>
<div class="row"><div class="col-md-12">&nbsp;</div></div>
</div>