<?php
$currentLng = $this->Session->read('Config.language');
$className = 'Motorcycle';
	if($currentLng == 'bn'){
		$languageID = 2;
		$this->loadHelpers(array('Language'));
		$publishdate = $this->Language->bangladate(date('d F Y',strtotime($place[$className]['created'])));
		$updatedate = $this->Language->bangladate(date('d F Y',strtotime($place[$className]['updated'])));
	}else{
		$languageID = 1;
		$publishdate = date('d F Y',strtotime($place[$className]['created']));
		$updatedate = date('d F Y',strtotime($place[$className]['updated']));
	}
//debug($place);
	  $stringlength = strlen($place['PlaceType']['seo_name']);
	  $newID = $stringlength.$place['PlaceType']['id'];
	  $language = $this->Session->read('Config.language');
      $className = ucfirst($place['PlaceType']['singlename']);
	  $this->Html->addCrumb(__('World'), array('plugin'=>'information','controller' => 'siteactions', 'action' => 'world','language' => $currentLng)) ;
	  if($passCountryName == '' || is_numeric($passCountryName)){
		  $this->Html->addCrumb(__('All'), array('plugin'=>'information','controller' => 'siteactions', 'action' => 'sitemap','language' => $currentLng)) ;
	  }else{
		  $this->Html->addCrumb($passCountryName, array('plugin'=>'information','controller' => 'siteactions', 'action' => 'sitemap','language' => $currentLng,'?' => array('country' => $queryCountry))) ;
	  }
	  $this->Html->addCrumb('Motor Bikes',array('plugin'=>'information','controller' => 'motorcycles','action'=>'motorcycles') ,array('alt' => 'Motor Bikes')); 
      $this->Html->addCrumb($place['PlaceType']['name'],array('plugin'=>'information','controller' => 'siteactions','action'=>'categories','category'=>$place['PlaceType']['seo_name'],'id'=> $newID,'page'=>1,'ext' => 'asp','service'=> 'motorcycles') ,array('alt' =>$place['PlaceType']['name']));
	  $this->Html->addCrumb($place['Point']['name'] ,  '' , array('class' => 'active'));
	  
	
?>
<style>
.placenamecontainer{
	background: url("http://localhost/skybazarcake2/img/check.png") no-repeat scroll left top rgba(0, 0, 0, 0);
}
</style>
<div class="container">
	<div class="row placeview">
	<div class="col-md-9">
			<?php 
			//debug($place);exit;
			$title = '';
			$shortDescription = '';
			$detailDescription = '';
			//debug($place['TopicData']);
				
			if(!empty($place['Motorcycle'])){
				$title = $place['Motorcycle']['name'];
				$seo_name = $place['Motorcycle']['seo_name'];
				$metatag = $place['Motorcycle']['metatag'];
				$mileage = $place['Motorcycle']['mileage'];
				$engine = $place['Motorcycle']['engine'];
				$maximum_power = $place['Motorcycle']['maximum_power'];
				$top_speed = $place['Motorcycle']['top_speed'];
				
			}
			?>
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-5 col-sm-5 col-xs-12">
							<img src="https://auto.ndtvimg.com/bike-images/big/yamaha/fz-25/yamaha-fz-25.jpg?v=16">
						</div>
						<div class="col-md-7 col-sm-7 col-xs-12">
							<div class="row">
								<div class="col-md-12">
								<?php
								echo '<h1 class="posttitle">'.$title.'</h1>';
								echo '<p>';
								echo '<b>'.__('PUBLISHED').'</b>&nbsp;&nbsp;'.$publishdate.'&nbsp;|&nbsp;<b>'.__('UPDATED').'</b>&nbsp;&nbsp;'.$updatedate;
								echo '</p>';
								?>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
								Price: 400,000 TK.
								</div>
							</div>
						</div>
					</div>
				</div>
				
				
				<?php
				echo '<div class="row">';
					echo '<div class="col-md-12">';
							//$link = 'topics/large/'.$place[$className]['image'];
							//echo $this->Html->image($link,array('alt'=>$shortDescription,'class'=>"img-responsive"));
							echo '<h4 class="topic-short targettext">'.$shortDescription.'</h4>';
					echo '</div>';
				echo '</div>';
			
			echo '<div class="col-md-12">';
				echo '<div class="row">';
					echo '<div class="col-md-3 col-sm-6">';
						echo '<div class="row">';
							echo '<div class="col-md-12 align-middle text_header_1">';
							echo 'Engine Capacity';
							echo '</div>';
							echo '<div class="col-md-12 align-middle">';
							echo $engine;
							echo '</div>';
						echo '</div>';
					echo '</div>';
					echo '<div class="col-md-3 col-sm-6">';
						echo '<div class="row">';
							echo '<div class="col-md-12 align-middle text_header_1">';
							echo 'Max Power';
							echo '</div>';
							echo '<div class="col-md-12 align-middle">';
							echo $maximum_power;
							echo '</div>';
						echo '</div>';
					echo '</div>';
					echo '<div class="col-md-3 col-sm-6">';
						echo '<div class="row">';
							echo '<div class="col-md-12 align-middle text_header_1">';
							echo 'Mileage';
							echo '</div>';
							echo '<div class="col-md-12 align-middle">';
							echo $mileage;
							echo '</div>';
						echo '</div>';
					echo '</div>';
					echo '<div class="col-md-3 col-sm-6">';
						echo '<div class="row">';
							echo '<div class="col-md-12 align-middle text_header_1">';
							echo 'Top Speed';
							echo '</div>';
							echo '<div class="col-md-12 align-middle">';
							echo $top_speed;
							echo '</div>';
						echo '</div>';
					echo '</div>';
				
			?>
				</div>
			</div>
			<br/><br/>
			<div class="panel-group" id="accordion" style="margin-top:100px;">
			  <div class="panel panel-default">
				<div class="panel-heading">
				  <h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
					<?php echo $title.' Body Dimensions'; ?></a>
				  </h4>
				</div>
				<div id="collapse1" class="panel-collapse collapse in">
				  <div class="panel-body">
				  <?php
					echo '<div class="col-md-12">';
						
						echo '<ul>';
						//debug($place['MotorcycleSpecification']);
							if(!empty($place['MotorcycleSpecification']['overall_length'])){
								echo '<li><span>Length</span><span>'.$place['MotorcycleSpecification']['overall_length'].'</span></li>';
							}
							if(!empty($place['MotorcycleSpecification']['overall_width'])){
								echo '<li><span>Width</span><span>'.$place['MotorcycleSpecification']['overall_width'].'</span></li>';
							}
							if(!empty($place['MotorcycleSpecification']['overall_height'])){
								echo '<li><span>Height</span><span>'.$place['MotorcycleSpecification']['overall_height'].'</span></li>';
							}
							if(!empty($place['MotorcycleSpecification']['wheel_base'])){
								echo '<li><span>Wheel base</span><span>'.$place['MotorcycleSpecification']['wheel_base'].'</span></li>';
							}
							if(!empty($place['MotorcycleSpecification']['ground_clearance'])){
								echo '<li><span>Ground clearance</span><span>'.$place['MotorcycleSpecification']['ground_clearance'].'</span></li>';
							}
							if(!empty($place['MotorcycleSpecification']['seat_height'])){
								echo '<li><span>Seat Height</span><span>'.$place['MotorcycleSpecification']['seat_height'].'</span></li>';
							}
							if(!empty($place['MotorcycleSpecification']['kerb_weight'])){
								echo '<li><span>Kerb Weight</span><span>'.$place['MotorcycleSpecification']['kerb_weight'].'</span></li>';
							}
							if(!empty($place['MotorcycleSpecification']['fuel_tank_capacity'])){
								echo '<li><span>Fuel Tank Capacity</span><span>'.$place['MotorcycleSpecification']['fuel_tank_capacity'].'</span></li>';
							}
							
						echo '</ul>';
					echo '</div>';
				  ?>
				  </div>
				</div>
			  </div>
			  
			  <div class="panel panel-default">
				<div class="panel-heading">
				  <h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
					<?php echo $title.' Engine'; ?></a>
				  </h4>
				</div>
				<div id="collapse2" class="panel-collapse collapse">
				  <div class="panel-body">
				  <?php
					echo '<ul>';
						//debug($place['MotorcycleSpecification']);
						if(!empty($place['MotorcycleSpecification']['engine_type'])){
							echo '<li><span>Type</span><span>'.$place['MotorcycleSpecification']['engine_type'].'</span></li>';
						}
						if(!empty($place['MotorcycleSpecification']['engine_displacement'])){
							echo '<li><span>Displacement</span><span>'.$place['MotorcycleSpecification']['engine_displacement'].'</span></li>';
						}
						if(!empty($place['MotorcycleSpecification']['engine_maxpower'])){
							echo '<li><span>Max net power</span><span>'.$place['MotorcycleSpecification']['engine_maxpower'].'</span></li>';
						}
						if(!empty($place['MotorcycleSpecification']['engine_maxtorque'])){
							echo '<li><span>Max net torque</span><span>'.$place['MotorcycleSpecification']['engine_maxtorque'].'</span></li>';
						}
						if(!empty($place['MotorcycleSpecification'][''])){
							echo '<li><span>Valve System</span><span>'.$place['MotorcycleSpecification'][''].'</span></li>';
						}
						if(!empty($place['MotorcycleSpecification']['fuel_delivery_system'])){
							echo '<li><span>Fuel Delivery System</span><span>'.$place['MotorcycleSpecification']['fuel_delivery_system'].'</span></li>';
						}
						if(!empty($place['MotorcycleSpecification']['engine_bore'])){
							echo '<li><span>Bore</span><span>'.$place['MotorcycleSpecification']['engine_bore'].'</span></li>';
						}
						if(!empty($place['MotorcycleSpecification']['engine_strocke'])){
							echo '<li><span>Stroke</span><span>'.$place['MotorcycleSpecification']['engine_strocke'].'</span></li>';
						}
						if(!empty($place['MotorcycleSpecification']['cooling_system'])){
							echo '<li><span>Cooling System</span><span>'.$place['MotorcycleSpecification']['cooling_system'].'</span></li>';
						}
						if(!empty($place['MotorcycleSpecification']['engine_ignition'])){
							echo '<li><span>Ignition</span><span>'.$place['MotorcycleSpecification']['engine_ignition'].'</span></li>';
						}
						if(!empty($place['MotorcycleSpecification']['starting_method'])){
							echo '<li><span>Starting Method</span><span>'.$place['MotorcycleSpecification']['starting_method'].'</span></li>';
						}
						
					echo '</ul>';
				  ?>
				  </div>
				</div>
			  </div>
			  <div class="panel panel-default">
				<div class="panel-heading">
				  <h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
					<?php echo $title.' Transmission'; ?></a>
				  </h4>
				</div>
				<div id="collapse3" class="panel-collapse collapse">
				  <div class="panel-body">
				  <?php
					echo '<ul>';
						if(!empty($place['MotorcycleSpecification']['number_of_gear'])){
							echo '<li><span>Number of Gears</span><span>'.$place['MotorcycleSpecification']['number_of_gear'].'</span></li>';
						}
						if(!empty($place['MotorcycleSpecification']['gearbox_type'])){
							echo '<li><span>Gear Box Type</span><span>'.$place['MotorcycleSpecification']['gearbox_type'].'</span></li>';
						}
						if(!empty($place['MotorcycleSpecification']['engine_topspeed'])){
							echo '<li><span>Max Speed</span><span>'.$place['MotorcycleSpecification']['engine_topspeed'].'</span></li>';
						}
						
					echo '</ul>';
				  ?>
				  </div>
				</div>
			  </div>
			  <div class="panel panel-default">
				<div class="panel-heading">
				  <h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
					<?php echo $title.' Tyres & Brakes'; ?></a>
				  </h4>
				</div>
				<div id="collapse4" class="panel-collapse collapse">
				  <div class="panel-body">
				  <?php
					echo '<ul>';
						if(!empty($place['MotorcycleSpecification']['tyre_front'])){
							echo '<li><span>Tyre size (front)</span><span>'.$place['MotorcycleSpecification']['tyre_front'].'</span></li>';
						}
						if(!empty($place['MotorcycleSpecification']['tyre_rear'])){
							echo '<li><span>Tyre size (Rear)</span><span>'.$place['MotorcycleSpecification']['tyre_rear'].'</span></li>';
						}
						if(!empty($place['MotorcycleSpecification']['brake_type'])){
							echo '<li><span>Brake Type</span><span>'.$place['MotorcycleSpecification']['brake_type'].'</span></li>';
						}
						if(!empty($place['MotorcycleSpecification']['brake_front'])){
							echo '<li><span>Brake Type & Size (Front)</span><span>'.$place['MotorcycleSpecification']['brake_front'].'</span></li>';
						}
						if(!empty($place['MotorcycleSpecification']['brake_rear'])){
							echo '<li><span>Brake Type & Size (Rear)</span><span>'.$place['MotorcycleSpecification']['brake_rear'].'</span></li>';
						}
						
					echo '</ul>';
				  ?>
				  </div>
				</div>
			  </div>
			  <div class="panel panel-default">
				<div class="panel-heading">
				  <h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
					<?php echo $title.' Frame & Suspension'; ?></a>
				  </h4>
				</div>
				<div id="collapse5" class="panel-collapse collapse">
				  <div class="panel-body">
				  <?php
					echo '<ul>';
						if(!empty($place['MotorcycleSpecification'][''])){
							echo '<li><span>Frame type</span><span>'.$place['MotorcycleSpecification'][''].'</span></li>';
						}
						if(!empty($place['MotorcycleSpecification']['suspension_front'])){
							echo '<li><span>Front</span><span>'.$place['MotorcycleSpecification']['suspension_front'].'</span></li>';
						}
						if(!empty($place['MotorcycleSpecification']['suspension_rear'])){
							echo '<li><span>Rear</span><span>'.$place['MotorcycleSpecification']['suspension_rear'].'</span></li>';
						}
						
						
					echo '</ul>';
				  ?>
				  </div>
				</div>
			  </div>
			  <div class="panel panel-default">
				<div class="panel-heading">
				  <h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapse6">
					<?php echo $title.' Electricals'; ?></a>
				  </h4>
				</div>
				<div id="collapse6" class="panel-collapse collapse">
				  <div class="panel-body">
				  <?php
					echo '<ul>';
						if(!empty($place['MotorcycleSpecification']['battery'])){
							echo '<li><span>Battery</span><span>'.$place['MotorcycleSpecification']['battery'].'</span></li>';
						}
						if(!empty($place['MotorcycleSpecification']['head_lamp'])){
							echo '<li><span>Head lamp</span><span>'.$place['MotorcycleSpecification']['head_lamp'].'</span></li>';
						}
						if(!empty($place['MotorcycleSpecification']['tail_lamp'])){
							echo '<li><span>Tail lamp</span><span>'.$place['MotorcycleSpecification']['tail_lamp'].'</span></li>';
						}
						if(!empty($place['MotorcycleSpecification']['trun_lamp'])){
							echo '<li><span>Turn lamp</span><span>'.$place['MotorcycleSpecification']['trun_lamp'].'</span></li>';
						}
						if(!empty($place['MotorcycleSpecification']['electric_start'])){
							echo '<li><span>Electircal Start</span><span>'.$place['MotorcycleSpecification']['electric_start'].'</span></li>';
						}
						
						
					echo '</ul>';
				  ?>
				  </div>
				</div>
			  </div>
			  
			</div> 
			
			<?php
		
			
			
			echo '<div class="row targettext">';
					echo '<div class="col-md-12">';
					echo '<div class="topicdetails targettext" >'.$detailDescription.'</div>';
					echo '</div>';
					
			echo '</div>';
		?>
			<div class="row">
			<div class="col-md-12">
			<div class="fb-comments" data-href="http://www.infomap24.com<?php echo $_SERVER[ 'REQUEST_URI' ];?>" data-width="100%" data-numposts="5" data-colorscheme="light"></div>
			</div>
			</div>
		<?php
	echo '</div>';
	echo '<div class="col-md-3">';
			echo 'Top '. $place['PlaceType']['name'].' Bikes';
			//debug($topRelatedItems);
			foreach($topRelatedItems as $post){
				$placename = $post['Motorcycle']['name'];
			echo '<div class="col-md-12 recentposts">';
					echo '<div class="row">';
					echo '<div class="col-md-4 col-sm-4 col-xs-4">';
					if(isset($post['Motorcycle']['image'])){
					$file = $post['Motorcycle']['image'];
					echo $this->Html->image("motorcycles/medium/$file",array('url'=> array('controller'=>'siteactions','action'=>'topic','category'=>$post['Motorcycle']['seo_name'],'point'=> $post['Point']['seo_name'],'id'=> $post['Point']['id'],'ext' => 'asp')),array('alt'=>"$placename napshot"));
					}else{
					echo $this->Html->link('<div class="defaultcaticon"><span><i class="inn '.$place['Motorcycle']['name'].'"></i></span></div>', array('controller'=>'siteactions','action'=>'topic','category'=>$post['Motorcycle']['seo_name'],'point'=> $post['Point']['seo_name'],'id'=> $post['Point']['id'],'ext' => 'asp'),array('escape'=>false,'alt' =>$placename));
					
					}
					echo '</div>';
					
					echo '<div class="col-md-8 col-sm-8 col-xs-8">';
					echo $this->Html->link(mb_substr($post['Motorcycle']['name'],0,54).'..',array('controller'=>'siteactions','action'=>'topic','category'=>$post['Motorcycle']['seo_name'],'point'=> $post['Motorcycle']['seo_name'],'id'=> $post['Motorcycle']['id'],'ext' => 'asp'),array('class'=>'placename','alt'=>"$placename"));
					echo '</div>';
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