<?php
$currentLng = $this->Session->read('Config.language');
	
//debug($place);
	  
      $this->Html->addCrumb(__('Sitemap'), array('controller' => 'pages', 'action' => 'sitemap')) ;
?>

<div class="row">
	<div class="col-md-8">
		<div class="col-md-12 sectionblock">
			<?php 
			//debug($continents);
			
			echo '<div class="row">';
				echo '<div class="col-md-12">';
						echo '<h1 class="posttitle">'.$title_for_layout.'</h1>';
						echo '<p>';
						//echo '&nbsp;&nbsp;<b>'.__('PUBLISHED').'</b>&nbsp;&nbsp;'.$publishdate.'&nbsp;|&nbsp;<b>'.__('UPDATED').'</b>&nbsp;&nbsp;'.$updatedate;
						echo '</p>';
				?>
				</div>
				</div>
				
				
				
				<?php
				echo '<div class="table-responsive">';
				echo "<table class='table table-bordered'>";
				echo "<tbody id='posts-list'>";
				if($currentLng == 'bn'){
					$continentName = 'bn_name';
					$continentArea = 'area';
					$continentCountries = 'countries';
					$continentPopulations = 'population';
					$title = 'bn_title';
				}else{
					$continentName = 'name';
					$continentArea = 'area';
					$continentCountries = 'countries';
					$continentPopulations = 'population';
					$title = 'title';
				}
				echo '<tr>';
				echo '<td>Continent Name</td><td>Area</td><td>Total Countries</td><td>Population</td>';
				echo '</tr>';
				foreach($continents as $continent){
				//debug($continent);
				echo '<tr>';
				echo '<td>'.$this->Html->link('<h5>'.$continent['Continent'][$continentName].'</h5>', array('controller'=>'siteactions','action'=>'countries','category'=>$continent['Continent']['seo_name'],'point'=> $continent['Point']['seo_name'],'language'=>$currentLng,'id'=> $continent['Point']['id'],'ext' => 'asp'),array('alt' =>$continent['Continent'][$title],'escape'=>false)).'</td>';
				echo '<td>'.$continent['Continent'][$continentArea].'</td><td>'.$continent['Continent'][$continentCountries].'</td><td>'.$continent['Continent'][$continentPopulations].'</td>';
				echo '</tr>';
				}
				echo '</tbody>';
				echo '</table>';
				echo '</div>';
		
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