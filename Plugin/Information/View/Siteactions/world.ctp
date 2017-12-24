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
	  
	  $this->Html->addCrumb(__('Browse') ,  '' , array('class' => 'active'));
	 
	  
	  //debug($aboutContinent);
?>
<div class="row">
	<div class="col-md-12">
		<div class="col-md-12 sectionblock">
			<?php 
			echo '<div class="row">';
				echo '<div class="col-md-12">';
						echo '<h1 class="posttitle">'.$title_for_layout.'</h1>';
						
				?>
				</div>
				</div>
				
				
				
				<?php
				//debug($countries);exit;
				echo '<div class="row">';
				echo '<div class="col-md-4">';
				echo '<div class=" countryflagcontainer">';
				echo '<table class="table innertabletd">';
				echo '<tr>';
				echo '<td width="10%" class="placename">';
				echo "<i class='fa fa-globe'></i>";
				echo '</td>';
				echo '<td width="90%" class="categorytitle">';
				echo $this->Html->link(__('All'), array('plugin'=>'information','controller' => 'siteactions', 'action' => 'sitemap','language' => $currentLng));
							
				echo '</td>';
				echo '</tr>';
				echo '</table>';
				echo '</div>';
				echo '</div>';
				
				foreach($countries as $country){
					//debug($country);
					echo '<div class="col-md-4">';
					echo '<div class=" countryflagcontainer">';
					echo '<table class="table innertabletd">';
					echo '<tr>';
					echo '<td width="10%" class="placename">';
					$flag = $country['Country']['flag'];
					echo "<i class='fontsitemap $flag flag-16'></i>";
					echo '</td>';
					echo '<td width="90%" class="categorytitle">';
					$stringlength = strlen($country['Country']['seo_title']);
					$newID = $stringlength.$country['Country']['id'];
					echo $this->Html->link($country['Country']['name'], array('plugin'=>'information','controller' => 'siteactions', 'action' => 'sitemap','language' => $currentLng,'?' => array('country' => $country['Country']['seo_name'])),array('alt' =>$country['Country']['name']));
								
					echo '</td>';
					echo '</tr>';
					echo '</table>';
					echo '</div>';
					echo '</div>';
				}
				echo '</div>';
	echo '</div>';
	echo '</div>';
	
echo '</div>';
	
	?>
