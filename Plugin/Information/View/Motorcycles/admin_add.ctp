<?php
$this->viewVars['title_for_layout'] = __d('information', 'Motorcycles');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Motorcycles'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->request->data['Motorcycle']['name'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = __d('information', 'Motorcycles') . ': ' . $this->request->data['Motorcycle']['name'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

$this->append('form-start', $this->Form->create('Motorcycle'));

$this->append('tab-heading');
	echo $this->Croogo->adminTab(__d('information', 'Motorcycle'), '#motorcycle');
	echo $this->Croogo->adminTab(__d('information', 'Motorcycle Details'), '#motorcycle-specification');
	echo $this->Croogo->adminTab(__d('information', 'Motorcycle Image'), '#motorcycle-gallery');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');

	echo $this->Html->tabStart('motorcycle');

		echo $this->Form->input('id');

		echo $this->Form->input('name', array(
			'label' =>  __d('information', 'Name'),
		));
		echo $this->Form->input('seo_name', array(
			'label' =>  __d('information', 'Seo Name'),
		));
		echo $this->Form->input('point_id', array(
			'label' =>  __d('information', 'Point'),
		));
		echo $this->Form->input('place_type_id', array(
			'label' =>  __d('information', 'Place Type'),
		));
		echo $this->Form->input('engine', array(
			'label' =>  __d('information', 'Engine'),
		));
		echo $this->Form->input('maximum_power', array(
			'label' =>  __d('information', 'Maximum Power'),
		));
		echo $this->Form->input('maximum_torque', array(
			'label' =>  __d('information', 'Maximum Torque'),
		));
		echo $this->Form->input('top_speed', array(
			'label' =>  __d('information', 'Top Speed'),
		));
		echo $this->Form->input('mileage', array(
			'label' =>  __d('information', 'Mileage'),
		));
		echo $this->Form->input('curb_weight', array(
			'label' =>  __d('information', 'Curb Weight'),
		));
		echo $this->Form->input('remarks', array(
			'label' =>  __d('information', 'Remarks'),
		));
		echo $this->Form->input('isactive', array(
			'label' =>  __d('information', 'Isactive'),
		));

	echo $this->Html->tabEnd();
	
	echo $this->Html->tabStart('motorcycle-specification');
		

		echo $this->Form->input('MotorcycleSpecification.id');

		echo $this->Form->input('MotorcycleSpecification.motorcycle_id', array(
			'label' =>  __d('information', 'Motorcycle'),
		));
		echo $this->Form->input('MotorcycleSpecification.bike_category', array(
			'label' =>  __d('information', 'Bike Category'),
		));
		echo $this->Form->input('MotorcycleSpecification.bike_origin', array(
			'label' =>  __d('information', 'Bike Origin'),
		));
		echo $this->Form->input('MotorcycleSpecification.assemble', array(
			'label' =>  __d('information', 'Assemble'),
		));
		echo $this->Form->input('MotorcycleSpecification.engine_type', array(
			'label' =>  __d('information', 'Engine Type'),
		));
		echo $this->Form->input('MotorcycleSpecification.engine_displacement', array(
			'label' =>  __d('information', 'Engine Displacement'),
		));
		echo $this->Form->input('MotorcycleSpecification.engine_maxpower', array(
			'label' =>  __d('information', 'Engine Maxpower'),
		));
		echo $this->Form->input('MotorcycleSpecification.engine_maxtorque', array(
			'label' =>  __d('information', 'Engine Maxtorque'),
		));
		echo $this->Form->input('MotorcycleSpecification.engine_topspeed', array(
			'label' =>  __d('information', 'Engine Topspeed'),
		));
		echo $this->Form->input('MotorcycleSpecification.engine_mileage', array(
			'label' =>  __d('information', 'Engine Mileage'),
		));
		echo $this->Form->input('MotorcycleSpecification.engine_bore', array(
			'label' =>  __d('information', 'Engine Bore'),
		));
		echo $this->Form->input('MotorcycleSpecification.engine_strocke', array(
			'label' =>  __d('information', 'Engine Strocke'),
		));
		echo $this->Form->input('MotorcycleSpecification.valves_per_cylinder', array(
			'label' =>  __d('information', 'Valves Per Cylinder'),
		));
		echo $this->Form->input('MotorcycleSpecification.fuel_delivery_system', array(
			'label' =>  __d('information', 'Fuel Delivery System'),
		));
		echo $this->Form->input('MotorcycleSpecification.fuel_type', array(
			'label' =>  __d('information', 'Fuel Type'),
		));
		echo $this->Form->input('MotorcycleSpecification.engine_ignition', array(
			'label' =>  __d('information', 'Engine Ignition'),
		));
		echo $this->Form->input('MotorcycleSpecification.engine_spark_plugs', array(
			'label' =>  __d('information', 'Engine Spark Plugs'),
		));
		echo $this->Form->input('MotorcycleSpecification.cooling_system', array(
			'label' =>  __d('information', 'Cooling System'),
		));
		echo $this->Form->input('MotorcycleSpecification.gearbox_type', array(
			'label' =>  __d('information', 'Gearbox Type'),
		));
		echo $this->Form->input('MotorcycleSpecification.no_of_gear', array(
			'label' =>  __d('information', 'No Of Gear'),
		));
		echo $this->Form->input('MotorcycleSpecification.transmission_type', array(
			'label' =>  __d('information', 'Transmission Type'),
		));
		echo $this->Form->input('MotorcycleSpecification.starting_method', array(
			'label' =>  __d('information', 'Starting Method'),
		));
		echo $this->Form->input('MotorcycleSpecification.oil_grade', array(
			'label' =>  __d('information', 'Oil Grade'),
		));
		echo $this->Form->input('MotorcycleSpecification.gears', array(
			'label' =>  __d('information', 'Gears'),
		));
		echo $this->Form->input('MotorcycleSpecification.clutch', array(
			'label' =>  __d('information', 'Clutch'),
		));
		echo $this->Form->input('MotorcycleSpecification.body_dimension', array(
			'label' =>  __d('information', 'Body Dimension'),
		));
		echo $this->Form->input('MotorcycleSpecification.wheel_base', array(
			'label' =>  __d('information', 'Wheel Base'),
		));
		echo $this->Form->input('MotorcycleSpecification.ground_clearance', array(
			'label' =>  __d('information', 'Ground Clearance'),
		));
		echo $this->Form->input('MotorcycleSpecification.kerb_weight', array(
			'label' =>  __d('information', 'Kerb Weight'),
		));
		echo $this->Form->input('MotorcycleSpecification.overall_length', array(
			'label' =>  __d('information', 'Overall Length'),
		));
		echo $this->Form->input('MotorcycleSpecification.overall_width', array(
			'label' =>  __d('information', 'Overall Width'),
		));
		echo $this->Form->input('MotorcycleSpecification.overall_height', array(
			'label' =>  __d('information', 'Overall Height'),
		));
		echo $this->Form->input('MotorcycleSpecification.seat_height', array(
			'label' =>  __d('information', 'Seat Height'),
		));
		echo $this->Form->input('MotorcycleSpecification.chassis_type', array(
			'label' =>  __d('information', 'Chassis Type'),
		));
		echo $this->Form->input('MotorcycleSpecification.fuel_tank_capacity', array(
			'label' =>  __d('information', 'Fuel Tank Capacity'),
		));
		echo $this->Form->input('MotorcycleSpecification.fuel_gauge', array(
			'label' =>  __d('information', 'Fuel Gauge'),
		));
		echo $this->Form->input('MotorcycleSpecification.digital_fuel_gauge', array(
			'label' =>  __d('information', 'Digital Fuel Gauge'),
		));
		echo $this->Form->input('MotorcycleSpecification.low_fuel_indicator', array(
			'label' =>  __d('information', 'Low Fuel Indicator'),
		));
		echo $this->Form->input('MotorcycleSpecification.low_oil_indicator', array(
			'label' =>  __d('information', 'Low Oil Indicator'),
		));
		echo $this->Form->input('MotorcycleSpecification.suspension_front', array(
			'label' =>  __d('information', 'Suspension Front'),
		));
		echo $this->Form->input('MotorcycleSpecification.suspension_rear', array(
			'label' =>  __d('information', 'Suspension Rear'),
		));
		echo $this->Form->input('MotorcycleSpecification.brake_type', array(
			'label' =>  __d('information', 'Brake Type'),
		));
		echo $this->Form->input('MotorcycleSpecification.brake_front', array(
			'label' =>  __d('information', 'Brake Front'),
		));
		echo $this->Form->input('MotorcycleSpecification.brake_rear', array(
			'label' =>  __d('information', 'Brake Rear'),
		));
		echo $this->Form->input('MotorcycleSpecification.wheel_front', array(
			'label' =>  __d('information', 'Wheel Front'),
		));
		echo $this->Form->input('MotorcycleSpecification.wheel_rear', array(
			'label' =>  __d('information', 'Wheel Rear'),
		));
		echo $this->Form->input('MotorcycleSpecification.tyre_front', array(
			'label' =>  __d('information', 'Tyre Front'),
		));
		echo $this->Form->input('MotorcycleSpecification.tyre_rear', array(
			'label' =>  __d('information', 'Tyre Rear'),
		));
		echo $this->Form->input('MotorcycleSpecification.battery', array(
			'label' =>  __d('information', 'Battery'),
		));
		echo $this->Form->input('MotorcycleSpecification.head_lamp', array(
			'label' =>  __d('information', 'Head Lamp'),
		));
		echo $this->Form->input('MotorcycleSpecification.tail_lamp', array(
			'label' =>  __d('information', 'Tail Lamp'),
		));
		echo $this->Form->input('MotorcycleSpecification.trun_lamp', array(
			'label' =>  __d('information', 'Trun Lamp'),
		));
		echo $this->Form->input('MotorcycleSpecification.speedometer', array(
			'label' =>  __d('information', 'Speedometer'),
		));
		echo $this->Form->input('MotorcycleSpecification.electric_start', array(
			'label' =>  __d('information', 'Electric Start'),
		));
		echo $this->Form->input('MotorcycleSpecification.tachometer', array(
			'label' =>  __d('information', 'Tachometer'),
		));
		echo $this->Form->input('MotorcycleSpecification.electric_system', array(
			'label' =>  __d('information', 'Electric System'),
		));
		echo $this->Form->input('MotorcycleSpecification.tripmeter', array(
			'label' =>  __d('information', 'Tripmeter'),
		));
		echo $this->Form->input('MotorcycleSpecification.features', array(
			'label' =>  __d('information', 'Features'),
		));
		echo $this->Form->input('MotorcycleSpecification.price', array(
			'label' =>  __d('information', 'Price'),
		));
		echo $this->Form->input('MotorcycleSpecification.oil_capacity', array(
			'label' =>  __d('information', 'Oil Capacity'),
		));
		echo $this->Form->input('MotorcycleSpecification.color', array(
			'label' =>  __d('information', 'Color'),
		));
		echo $this->Form->input('MotorcycleSpecification.availability', array(
			'label' =>  __d('information', 'Availability'),
		));

	echo $this->Html->tabEnd();
	
	echo $this->Html->tabStart('motorcycle-gallery');
		echo '<div class="accomodationmore">';
			echo '<div class="imageContainer">';
			echo '<div class="addMoreBlock">';
				echo $this->Form->input('position', array(
					'label' =>  __d('information', 'Position'),
					'name' => 'data[postimage][position][]',
					'options' => array('Featured'=>'Featured','Others'=>'Others'),
				));
				echo $this->Form->input('name', array(
					'label' =>  __d('information', 'Name'),
					'name' => 'data[postimage][name][]',
				));
				echo $this->Form->input('source', array(
					'label' =>  __d('information', 'Source'),
					'name' => 'data[postimage][source][]',
				));
			//debug($this->data);
				$dataClass = 'TransportRoute';
				echo $this->Form->input('image', array('type'=>'file','label'=>'Add Image','name' =>"data[postimage][images][]", 'accept'=>"image/*"));
				echo $this->Form->button('Remove',array('type'=>'button','class' => 'blocremoveBtn btn-danger pull-right'));
				?>
				<script>
				$('.blocremoveBtn').click(function(){
					$(this).parent('div').remove();
				});
				</script>
				<?php
			echo '</div>';
			echo '</div>';
		
		
		echo '</div>';
		echo '<p><a id="add_row" class="addmorebtn btn btn-success pull-left">Add More</a></p>';
		
		?>
		<script>
		$('.addmorebtn').click(function(){
			
			var moreData = $('.imageContainer').html();
			$('.accomodationmore').append(moreData);
		});
		</script>
		<?php
	echo $this->Html->tabEnd();

	echo $this->Croogo->adminTabs();

$this->end();

$this->append('panels');
	echo $this->Html->beginBox(__d('croogo', 'Publishing')) .
		$this->Form->button(__d('croogo', 'Apply'), array('name' => 'apply')) .
		$this->Form->button(__d('croogo', 'Save'), array('button' => 'primary')) .
		$this->Form->button(__d('croogo', 'Save & New'), array('button' => 'success', 'name' => 'save_and_new')) .
		$this->Html->link(__d('croogo', 'Cancel'), array('action' => 'index'), array('button' => 'danger'));
	echo $this->Html->endBox();

	echo $this->Croogo->adminBoxes();
$this->end();

$this->append('form-end', $this->Form->end());
