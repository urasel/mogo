<?php
		$currentLng = $this->Session->read('Config.language');
	    if($currentLng == 'bn'){
			$continentName = 'bn_name';
			$countryName = 'bn_name';
			$details = 'bn_details';
			$continentArea = 'area';
			$continentCountries = 'countries';
			$continentPopulations = 'population';
			$title = 'bn_title';
		}else{
			$continentName = 'name';
			$countryName = 'name';
			$details = 'details';
			$continentArea = 'area';
			$continentCountries = 'countries';
			$continentPopulations = 'population';
			$title = 'title';
		}
	  
	  $stringlength = strlen($aboutContinent['PlaceType']['seo_name']);
	  $newID = $stringlength.$aboutContinent['PlaceType']['id'];
	  $this->loadHelpers(array('Language'));
      $this->Html->addCrumb(__('Sitemap'), array('plugin'=>'information','controller' => 'siteactions', 'action' => 'sitemap')) ;
	  $this->Html->addCrumb($aboutContinent['PlaceType'][$continentName],array('plugin'=>'information','controller' => 'siteactions','action'=>'categories','category'=>$aboutContinent['PlaceType']['seo_name'],'id'=> $newID,'language'=>$currentLng,'page'=>1,'ext' => 'asp'),array('alt' =>$aboutContinent['PlaceType'][$continentName]));
	  $this->Html->addCrumb($aboutContinent['Continent'][$continentName] ,  '' , array('class' => 'active'));
	  
	  
	  //debug($aboutContinent);
?>

<div class="row">
	<div class="col-md-8">
		<div class="col-md-12 sectionblock">
			<?php 
			echo '<div class="row">';
				echo '<div class="col-md-12">';
						echo '<h1 class="posttitle">'.$title_for_layout.'</h1>';
						
				?>
				</div>
				</div>
				
				
				
				<?php
				//debug($aboutContinent);
				echo '<p>'.$aboutContinent['Continent'][$details].'</p>';
				$name = $aboutContinent['Continent'][$continentName];
				echo "<h2>Countries in $name Continent</h2>";
				foreach($aboutContinent['Country'] as $country){
					//debug($country);
					echo '<div class="col-md-6">';
					echo '<div class=" countryflagcontainer">';
					echo '<table class="table innertabletd">';
					echo '<tr>';
					echo '<td width="10%" class="placename">';
					$flag = $country['flag'];
					echo "<i class='fontsitemap $flag flag-16'></i>";
					echo '</td>';
					echo '<td width="70%" class="categorytitle">';
					$stringlength = strlen($country['seo_title']);
					$newID = $stringlength.$country['id'];
					echo $this->Html->link($country[$countryName], array('plugin'=>'information','controller' => 'siteactions','action'=>'country_details','category'=>$country['seo_name'],'title'=>$country['seo_title'],'id'=> $newID,'language'=>$currentLng,'ext' => 'asp'),array('alt' =>$country[$countryName]));
								
					echo '</td>';
					echo '<td width="10%" class="placename">';
					echo '</td>';
					echo '</tr>';
					echo '</table>';
					echo '</div>';
					echo '</div>';
				}
		
	echo '</div>';
	echo '</div>';
	
echo '</div>';
	
	?>

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