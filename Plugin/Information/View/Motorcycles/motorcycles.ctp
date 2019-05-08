<style>
[class^="flaticon-"]::before, [class*=" flaticon-"]::before, [class^="flaticon-"]::after, [class*=" flaticon-"]::after{
		font-size:16px !important;
	
}
</style>

<?php
	  $currentLng = $this->Session->read('Config.language');
      $this->Html->addCrumb(__('World'), array('plugin'=>'information','controller' => 'siteactions', 'action' => 'world','language' => $currentLng)) ;
	  
	  $breadcumpArray = array_reverse($breadcumpArray);
	  foreach($breadcumpArray as $breadcumb){
		  //debug($breadcumb);
		  if($categoryName != $breadcumb['PlaceType']['name']){
			 $stringlength = strlen($breadcumb['PlaceType']['seo_name']);
			$newID = $stringlength.$breadcumb['PlaceType']['id'];
			$this->Html->addCrumb($breadcumb['PlaceType']['name'],array('plugin'=>'information','controller' => 'siteactions','action'=>'subcategories','category'=>$breadcumb['PlaceType']['seo_name'],'id'=> $newID,'language'=>$currentLng,'ext' => 'asp') ,array('alt' =>$breadcumb['PlaceType']['name'])); 
		  }else{
			$this->Html->addCrumb($breadcumb['PlaceType']['name'] ,  '' , array('class' => 'active'));  
		  }
	   }
	  $this->loadHelpers(array('Language','Theme'));
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
		if(count($categories) > 0){
			//debug($categories);
			echo '<div class="row">';
			foreach($categories as $category):
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
			
			if(in_array($category['pl']['id'],$parentCats)){
				if(!empty($queryCountry)){
					echo $this->Html->link(mb_substr($category['pl']['name'],0,28), array('plugin'=>'information','controller' => 'siteactions','action'=>'subcategories','country'=>$queryCountry,'category'=>$category['pl']['seo_name'],'id'=> $newID,'ext' => 'asp','service'=>'motorcycles'),array('alt' =>$category['pl']['name'],'class' => 'categorypagecat'));
				}else{
					echo $this->Html->link(mb_substr($category['pl']['name'],0,28), array('plugin'=>'information','controller' => 'siteactions','action'=>'subcategories','category'=>$category['pl']['seo_name'],'id'=> $newID,'ext' => 'asp','service'=>'motorcycles'),array('alt' =>$category['pl']['name'],'class' => 'categorypagecat'));
				}
				
			}else{
				if(!empty($queryCountry)){
					echo $this->Html->link(mb_substr($category['pl']['name'],0,28), array('plugin'=>'information','controller' => 'siteactions','action'=>'categories','country'=>$queryCountry,'category'=>$category['pl']['seo_name'],'id'=> $newID,'page'=>1,'ext' => 'asp','service'=> 'motorcycles'),array('alt' =>$category['pl']['name'],'class' => 'categorypagecat'));
				}else{
					echo $this->Html->link(mb_substr($category['pl']['name'],0,28), array('plugin'=>'information','controller' => 'siteactions','action'=>'categories','category'=>$category['pl']['seo_name'],'id'=> $newID,'page'=>1,'ext' => 'asp','service'=> 'motorcycles'),array('alt' =>$category['pl']['name'],'class' => 'categorypagecat'));
				}
				
			}
						
			echo '</td>';
			echo '</tr>';
			echo '</table>';
			echo '</div>';
			echo '</div>';
			//}
			endforeach;
			echo '</div>';
		}
		
	echo '</div>';
	echo '</div>';
	
	
?>
<div class="row"><div class="col-md-12">&nbsp;</div></div>
</div>

