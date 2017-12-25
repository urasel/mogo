	<style>
	[class^="flaticon-"]::before, [class*=" flaticon-"]::before, [class^="flaticon-"]::after, [class*=" flaticon-"]::after{
			font-size:16px !important;
		
	}
	</style>
	<?php
		$currentLng = $this->Session->read('Config.language');
		  $this->Html->addCrumb(__('World'), array('plugin'=>'information','controller' => 'siteactions', 'action' => 'world','language' => $currentLng)) ; 
		  if($passCountryName == ''){
			  $this->Html->addCrumb(__('All'),  '' , array('class' => 'active'));
		  }else{
			  $this->Html->addCrumb($passCountryName,  '' , array('class' => 'active'));
		  }
		  
		  
		  $this->loadHelpers(array('Language'));
		  
	 ?>
<section>
<div class="container">
	<div class="row placeview">
	<?php
		echo '<div class="col-md-12">';
		echo '<h2>'.$title_for_layout.'</h2>'; 
			//debug($categories);
			echo '<div class="row">';
			foreach($categories as $category):
			//debug($category);
			//debug($parentCats);
			//if($category[0]['total'] > 0){
			echo '<div class="col-md-6">';
			echo '<div class=" catitemtotal">';
			echo '<table class="table innertabletd">';
			echo '<tr>';
			echo '<td width="10%" class="placename">';
			$icon = $category['pl']['icon'];
			echo "<i class='fontsitemap $icon'></i>";
			echo '</td>';
			echo '<td width="70%" class="categorytitle">';
			$stringlength = strlen($category['pl']['seo_name']);
			$newID = $stringlength.$category['pl']['id'];
			$mixedItemArray = array('continents','baby_names','articles','animals');
			//debug($category);exit;
			if(in_array($category['pl']['id'],$parentCats)){
				if($queryCountry == 'all' || in_array($category['pl']['seo_name'],$mixedItemArray)){
					echo $this->Html->link($category['pl']['name'], array('plugin'=>'information','controller' => 'siteactions','action'=>'subcategories','category'=>$category['pl']['seo_name'],'country'=>$queryCountry,'id'=> $newID,'language'=>$currentLng,'ext' => 'asp'),array('alt' =>$category['pl']['name']));
				}else{
					echo $this->Html->link($category['pl']['name'], array('plugin'=>'information','controller' => 'siteactions','action'=>'subcategories','category'=>$category['pl']['seo_name'],'country'=>$queryCountry,'id'=> $newID,'language'=>$currentLng,'ext' => 'asp'),array('alt' =>$category['pl']['name']));
				}
			}else{
				if($queryCountry == 'all' || in_array($category['pl']['seo_name'],$mixedItemArray)){
					echo $this->Html->link($category['pl']['name'], array('plugin'=>'information','controller' => 'siteactions','action'=>'categories','category'=>$category['pl']['seo_name'],'country'=>$queryCountry,'id'=> $newID,'language'=>$currentLng,'page'=>1,'ext' => 'asp'),array('alt' =>$category['pl']['name']));
				}else{
					echo $this->Html->link($category['pl']['name'], array('plugin'=>'information','controller' => 'siteactions','action'=>'categories','category'=>$category['pl']['seo_name'],'country'=>$queryCountry,'id'=> $newID,'language'=>$currentLng,'page'=>1,'ext' => 'asp'),array('alt' =>$category['pl']['name']));
				}
				
			
			}
						
			echo '</td>';
			echo '<td width="10%" class="categorytotal">';
			
			if($currentLng == 'bn'){
				//$totalEntry = $this->Language->banglanumber($category[0]['total']);
			}else{
				//$totalEntry = $category[0]['total'];
			}
			//echo '['.$totalEntry.']';
			echo '</td>';
			echo '<td width="10%" class="placename">';
			echo '</td>';
			echo '</tr>';
			echo '</table>';
			echo '</div>';
			echo '</div>';
			//}
			endforeach;
			echo '</div>';
		echo '</div>';
		echo '<div class="row"><div class="col-md-12">&nbsp;</div></div>';
		
	?>
	</div>
	</div>
</section>