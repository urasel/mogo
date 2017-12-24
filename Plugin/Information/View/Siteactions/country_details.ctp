<?php
		$currentLng = $this->Session->read('Config.language');
	    if($currentLng == 'bn'){
			$continentName = 'bn_name';
			$titleName = 'bn_title';
		}else{
			$continentName = 'name';
			$titleName = 'title';
		}
	  
	  $stringlength = strlen($aboutCountry['PlaceType']['seo_name']);
	  $newID = $stringlength.$aboutCountry['PlaceType']['id'];
	  $this->loadHelpers(array('Language'));
      $this->Html->addCrumb(__('Sitemap'), array('plugin'=>'information','controller' => 'siteactions', 'action' => 'sitemap')) ;
	  $this->Html->addCrumb($aboutCountry['PlaceType'][$continentName],array('plugin'=>'information','controller' => 'siteactions','action'=>'categories','category'=>$aboutCountry['PlaceType']['seo_name'],'id'=> $newID,'language'=>$currentLng,'page'=>1,'ext' => 'asp'),array('alt' =>$aboutCountry['PlaceType'][$continentName]));
	  $this->Html->addCrumb($aboutCountry['Continent'][$continentName],array('controller'=>'siteactions','action'=>'countries','category'=>$aboutCountry['Continent']['seo_name'],'point'=> $aboutCountry['Point']['seo_name'],'language'=>$currentLng,'id'=> $aboutCountry['Point']['id'],'ext' => 'asp'),array('alt' =>$aboutCountry['PlaceType'][$continentName]));
	  $this->Html->addCrumb($aboutCountry['Country'][$titleName] ,  '' , array('class' => 'active'));
	  //debug($aboutCountry);
?>

<div class="row">
	<div class="col-md-8">
		<div class="col-md-12 sectionblock">
			<?php 
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
				if($currentLng == 'bn'){
					$continentName = 'bn_name';
					$countryName = 'bn_name';
					$details = 'details';
					$continentArea = 'area';
					$continentCountries = 'countries';
					$continentPopulations = 'population';
					$title = 'bn_title';
					$antheme = 'bn_antheme';
					$antheme_writer = 'bn_writer';
					$antheme_singer = 'bn_singer';
					$capital = 'bn_name';
					$currency = 'bn_name';
					$language = 'bn_name';
				}else{
					$continentName = 'name';
					$countryName = 'name';
					$details = 'bn_details';
					$continentArea = 'area';
					$continentCountries = 'countries';
					$continentPopulations = 'population';
					$title = 'title';
					$antheme = 'antheme';
					$antheme_writer = 'writer';
					$antheme_singer = 'singer';
					$capital = 'name';
					$currency = 'name';
					$language = 'name';
				}
				
				//debug($aboutCountry);
				if(!empty($details)){
					//echo '<p>'.$details.'</p>';
				}
				$name = $aboutCountry['Country'][$countryName];
				
				echo '<div class="row">';
					echo '<div class="col-md-4">';
					echo __("Flag of %s :",$name);
					echo '</div>';
					echo '<div class="col-md-8">';
					$flag = $aboutCountry['Country']['flag'];
					echo "<i class='fontsitemap $flag flag-64'></i>";
					echo '</div>';
				echo '</div>';
				echo '<div class="row">';
					echo '<div class="col-md-4">';
					echo __("Time Zone of %s :",$name);
					echo '</div>';
					echo '<div class="col-md-8">';
					echo '<div class="row">';
					echo '<div class="col-md-12">';
						echo '<div class="row">';
						echo '<div class="col-md-6 divbackground">';
						echo __("UTC Time");
						echo '</div>';
						echo '<div class="col-md-6">';
						echo $aboutCountry['CountryTimezone']['utc'];
						echo '</div>';
						echo '</div>';
						echo '<div class="row">';
						echo '<div class="col-md-6 divbackground">';
						echo __("DST");
						echo '</div>';
						echo '<div class="col-md-6">';
						echo $aboutCountry['CountryTimezone']['dst'];
						echo '</div>';
						echo '</div>';
						echo '<div class="row">';
						echo '<div class="col-md-6 divbackground">';
						echo __("DST Period Start End");
						echo '</div>';
						echo '<div class="col-md-6">';
						echo $aboutCountry['CountryTimezone']['dst_period_start_end'];
						echo '</div>';
						echo '</div>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
				echo '</div>';
				echo '<div class="row">';
					echo '<div class="col-md-4">';
					echo __("National Antheme of %s :",$name);
					echo '</div>';
					echo '<div class="col-md-8">';
					echo '<div class="row">';
					echo '<div class="col-md-12">';
						echo $aboutCountry['CountryAntheme'][$antheme];
						echo '<div class="row">';
						echo '<div class="col-md-6 divbackground">';
						echo __("Writer of the Antheme");
						echo '</div>';
						echo '<div class="col-md-6">';
						echo $aboutCountry['CountryAntheme'][$antheme_writer];
						echo '</div>';
						echo '</div>';
						echo '<div class="row">';
						echo '<div class="col-md-6 divbackground">';
						echo __("Singer of the Antheme");
						echo '</div>';
						echo '<div class="col-md-6">';
						echo $aboutCountry['CountryAntheme'][$antheme_singer];
						echo '</div>';
						echo '</div>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
				echo '</div>';
				echo '<div class="row">';
					echo '<div class="col-md-4">';
					echo __("Calling Code of %s :",$name);
					echo '</div>';
					echo '<div class="col-md-8">';
						echo '<div class="row">';
						echo '<div class="col-md-6 divbackground">';
						echo __("Calling Code");
						echo '</div>';
						echo '<div class="col-md-6">';
						echo $aboutCountry['CountryCallingCode']['calling_code'];
						echo '</div>';
						echo '</div>';
						echo '<div class="row">';
						echo '<div class="col-md-6 divbackground">';
						echo __("Exit Prefix IDD");
						echo '</div>';
						echo '<div class="col-md-6">';
						echo $aboutCountry['CountryCallingCode']['exit_prefix_idd'];
						echo '</div>';
						echo '</div>';
						echo '<div class="row">';
						echo '<div class="col-md-6 divbackground">';
						echo __("National Prefix NDD");
						echo '</div>';
						echo '<div class="col-md-6">';
						echo $aboutCountry['CountryCallingCode']['national_prefix_ndd'];
						echo '</div>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
				echo '<div class="row">';
					echo '<div class="col-md-4">';
					echo __("Capital of %s :",$name);
					echo '</div>';
					echo '<div class="col-md-8">';
					echo $aboutCountry['CountryCapital'][$capital];
					echo '</div>';
				echo '</div>';
				echo '<div class="row">';
					echo '<div class="col-md-4">';
					echo __("Currency of %s :",$name);
					echo '</div>';
					echo '<div class="col-md-8">';
						echo '<div class="row">';
						echo '<div class="col-md-6 divbackground">';
						echo __("ISO Code");
						echo '</div>';
						echo '<div class="col-md-6">';
						echo $aboutCountry['CountryCurrency']['iso_4217'];
						echo '</div>';
						echo '</div>';
						echo '<div class="row">';
						echo '<div class="col-md-6 divbackground">';
						echo __("Curreny Name");
						echo '</div>';
						echo '<div class="col-md-6">';
						echo $aboutCountry['CountryCurrency'][$currency];
						echo '</div>';
						echo '</div>';
					
					echo '</div>';
				echo '</div>';
				echo '<div class="row">';
					echo '<div class="col-md-4">';
					echo __("Domain Extension of %s :",$name);
					echo '</div>';
					echo '<div class="col-md-8">';
					echo $aboutCountry['CountryDomain']['name'];
					echo '</div>';
				echo '</div>';
				echo '<div class="row">';
					echo '<div class="col-md-4">';
					echo __("Language of %s :",$name);
					echo '</div>';
					echo '<div class="col-md-8">';
						echo '<div class="row">';
						echo '<div class="col-md-6 divbackground">';
						echo __("Name of Language");
						echo '</div>';
						echo '<div class="col-md-6">';
						echo $aboutCountry['CountryLanguage'][$language];
						echo '</div>';
						echo '</div>';
						echo '<div class="row">';
						echo '<div class="col-md-6 divbackground">';
						echo __("Language Source");
						echo '</div>';
						echo '<div class="col-md-6">';
						echo $aboutCountry['CountryLanguage']['Source'];
						echo '</div>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
				echo '<div class="row">';
					echo '<div class="col-md-4">';
					echo __("Population of %s :",$name);
					echo '</div>';
					echo '<div class="col-md-8">';
					echo $aboutCountry['CountryDetail']['population']. ' <b>Milion</b>';
					echo '</div>';
				echo '</div>';
				echo '<div class="row">';
					echo '<div class="col-md-4">';
					echo __("Population Density in %s :",$name);
					echo '</div>';
					echo '<div class="col-md-8">';
					echo $aboutCountry['CountryDetail']['population_density_per_sq_met']. ' <b>Per Sq. Meter</b>';
					echo '</div>';
				echo '</div>';
				echo '<div class="row">';
					echo '<div class="col-md-4">';
					echo __("Infant Mortality Rate in %s :",$name);
					echo '</div>';
					echo '<div class="col-md-8">';
					echo $aboutCountry['CountryDetail']['infant_mortality'];
					echo '</div>';
				echo '</div>';
				echo '<div class="row">';
					echo '<div class="col-md-4">';
					echo __("Per capita GDP of %s :",$name);
					echo '</div>';
					echo '<div class="col-md-8">';
					echo $aboutCountry['CountryDetail']['gdp']. ' <b>USD</b>';
					echo '</div>';
				echo '</div>';
				echo '<div class="row">';
					echo '<div class="col-md-4">';
					echo __("Literacy Rate in %s :",$name);
					echo '</div>';
					echo '<div class="col-md-8">';
					echo $aboutCountry['CountryDetail']['literacy'];
					echo '</div>';
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