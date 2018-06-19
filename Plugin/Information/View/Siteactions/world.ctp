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
<div class="container">
<div class="row placeview">
				<div class="col-md-12 posttitleblock zeropadding">
				<div class="col-md-12">
				<?php 
						echo '<h1>'.$title_for_layout.'</h1><br/>'; 
						
				?>
				</div>
				</div>
				
				
				
				<?php
				//debug($countries);exit;
				echo '<div class="blog_about">';
					echo '<div class="col-xs-12 col-md-4 col-sm-6">';
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
				$count = 0;
				$moreflag = true;
				foreach($countries as $country){
					//debug($country);
					if($count < 5){
						echo '<div class="col-xs-12 col-md-4 col-sm-6">';
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
						$count++;
					}else{
						if($moreflag){
							echo '<div class="col-xs-12 col-md-12 col-sm-12 showmore">';
							echo '<div class=" countryflagcontainer">';
							echo '<table colspan="2" class="table innertabletd">';
							echo '<tr>';
							echo '<td width="100%" class="placename">';
							echo "<i class='fa fa-user'></i>&nbsp;More...";
							echo '</td>';
							echo '</tr>';
							echo '</table>';
							echo '</div>';
							echo '</div>';
							$moreflag = false;
						}
						echo '<div class="morecountry" style="display:none">';
						echo '<div class="col-xs-12 col-md-4 col-sm-6">';
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
						echo '</div>';
						
					}
				}
				echo '</div>';

	?>
</div>
<div class="row"><div class="col-md-12">&nbsp;</div></div>
</div>

