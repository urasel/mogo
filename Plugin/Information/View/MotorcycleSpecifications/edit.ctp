<?php
$this->viewVars['title_for_layout'] = __d('information', 'Motorcycle Specifications');
$this->extend('/Common/admin_edit');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Motorcycle Specifications'), array('action' => 'index'));

if ($this->action == 'admin_edit') {
	$this->Html->addCrumb($this->request->data['MotorcycleSpecification']['id'], '/' . $this->request->url);
	$this->viewVars['title_for_layout'] = __d('information', 'Motorcycle Specifications') . ': ' . $this->request->data['MotorcycleSpecification']['id'];
} else {
	$this->Html->addCrumb(__d('croogo', 'Add'), '/' . $this->request->url);
}

$this->append('form-start', $this->Form->create('MotorcycleSpecification'));

$this->append('tab-heading');
	echo $this->Croogo->adminTab(__d('information', 'Motorcycle Specification'), '#motorcycle-specification');
	echo $this->Croogo->adminTabs();
$this->end();

$this->append('tab-content');

	echo $this->Html->tabStart('motorcycle-specification');

		echo $this->Form->input('id');

		echo $this->Form->input('motorcycle_id', array(
			'label' =>  __d('information', 'Motorcycle'),
		));
		echo $this->Form->input('bike_category', array(
			'label' =>  __d('information', 'Bike Category'),
		));
		echo $this->Form->input('bike_origin', array(
			'label' =>  __d('information', 'Bike Origin'),
		));
		echo $this->Form->input('assemble', array(
			'label' =>  __d('information', 'Assemble'),
		));
		echo $this->Form->input('engine_type', array(
			'label' =>  __d('information', 'Engine Type'),
		));
		echo $this->Form->input('engine_displacement', array(
			'label' =>  __d('information', 'Engine Displacement'),
		));
		echo $this->Form->input('engine_maxpower', array(
			'label' =>  __d('information', 'Engine Maxpower'),
		));
		echo $this->Form->input('engine_maxtorque', array(
			'label' =>  __d('information', 'Engine Maxtorque'),
		));
		echo $this->Form->input('engine_topspeed', array(
			'label' =>  __d('information', 'Engine Topspeed'),
		));
		echo $this->Form->input('engine_mileage', array(
			'label' =>  __d('information', 'Engine Mileage'),
		));
		echo $this->Form->input('engine_bore', array(
			'label' =>  __d('information', 'Engine Bore'),
		));
		echo $this->Form->input('engine_strocke', array(
			'label' =>  __d('information', 'Engine Strocke'),
		));
		echo $this->Form->input('valves_per_cylinder', array(
			'label' =>  __d('information', 'Valves Per Cylinder'),
		));
		echo $this->Form->input('fuel_delivery_system', array(
			'label' =>  __d('information', 'Fuel Delivery System'),
		));
		echo $this->Form->input('fuel_type', array(
			'label' =>  __d('information', 'Fuel Type'),
		));
		echo $this->Form->input('engine_ignition', array(
			'label' =>  __d('information', 'Engine Ignition'),
		));
		echo $this->Form->input('engine_spark_plugs', array(
			'label' =>  __d('information', 'Engine Spark Plugs'),
		));
		echo $this->Form->input('cooling_system', array(
			'label' =>  __d('information', 'Cooling System'),
		));
		echo $this->Form->input('gearbox_type', array(
			'label' =>  __d('information', 'Gearbox Type'),
		));
		echo $this->Form->input('no_of_gear', array(
			'label' =>  __d('information', 'No Of Gear'),
		));
		echo $this->Form->input('transmission_type', array(
			'label' =>  __d('information', 'Transmission Type'),
		));
		echo $this->Form->input('starting_method', array(
			'label' =>  __d('information', 'Starting Method'),
		));
		echo $this->Form->input('oil_grade', array(
			'label' =>  __d('information', 'Oil Grade'),
		));
		echo $this->Form->input('gears', array(
			'label' =>  __d('information', 'Gears'),
		));
		echo $this->Form->input('clutch', array(
			'label' =>  __d('information', 'Clutch'),
		));
		echo $this->Form->input('body_dimension', array(
			'label' =>  __d('information', 'Body Dimension'),
		));
		echo $this->Form->input('wheel_base', array(
			'label' =>  __d('information', 'Wheel Base'),
		));
		echo $this->Form->input('ground_clearance', array(
			'label' =>  __d('information', 'Ground Clearance'),
		));
		echo $this->Form->input('kerb_weight', array(
			'label' =>  __d('information', 'Kerb Weight'),
		));
		echo $this->Form->input('overall_length', array(
			'label' =>  __d('information', 'Overall Length'),
		));
		echo $this->Form->input('overall_width', array(
			'label' =>  __d('information', 'Overall Width'),
		));
		echo $this->Form->input('overall_height', array(
			'label' =>  __d('information', 'Overall Height'),
		));
		echo $this->Form->input('seat_height', array(
			'label' =>  __d('information', 'Seat Height'),
		));
		echo $this->Form->input('chassis_type', array(
			'label' =>  __d('information', 'Chassis Type'),
		));
		echo $this->Form->input('fuel_tank_capacity', array(
			'label' =>  __d('information', 'Fuel Tank Capacity'),
		));
		echo $this->Form->input('fuel_gauge', array(
			'label' =>  __d('information', 'Fuel Gauge'),
		));
		echo $this->Form->input('digital_fuel_gauge', array(
			'label' =>  __d('information', 'Digital Fuel Gauge'),
		));
		echo $this->Form->input('low_fuel_indicator', array(
			'label' =>  __d('information', 'Low Fuel Indicator'),
		));
		echo $this->Form->input('low_oil_indicator', array(
			'label' =>  __d('information', 'Low Oil Indicator'),
		));
		echo $this->Form->input('suspension_front', array(
			'label' =>  __d('information', 'Suspension Front'),
		));
		echo $this->Form->input('suspension_rear', array(
			'label' =>  __d('information', 'Suspension Rear'),
		));
		echo $this->Form->input('brake_type', array(
			'label' =>  __d('information', 'Brake Type'),
		));
		echo $this->Form->input('brake_front', array(
			'label' =>  __d('information', 'Brake Front'),
		));
		echo $this->Form->input('brake_rear', array(
			'label' =>  __d('information', 'Brake Rear'),
		));
		echo $this->Form->input('wheel_front', array(
			'label' =>  __d('information', 'Wheel Front'),
		));
		echo $this->Form->input('wheel_rear', array(
			'label' =>  __d('information', 'Wheel Rear'),
		));
		echo $this->Form->input('tyre_front', array(
			'label' =>  __d('information', 'Tyre Front'),
		));
		echo $this->Form->input('tyre_rear', array(
			'label' =>  __d('information', 'Tyre Rear'),
		));
		echo $this->Form->input('battery', array(
			'label' =>  __d('information', 'Battery'),
		));
		echo $this->Form->input('head_lamp', array(
			'label' =>  __d('information', 'Head Lamp'),
		));
		echo $this->Form->input('tail_lamp', array(
			'label' =>  __d('information', 'Tail Lamp'),
		));
		echo $this->Form->input('trun_lamp', array(
			'label' =>  __d('information', 'Trun Lamp'),
		));
		echo $this->Form->input('speedometer', array(
			'label' =>  __d('information', 'Speedometer'),
		));
		echo $this->Form->input('electric_start', array(
			'label' =>  __d('information', 'Electric Start'),
		));
		echo $this->Form->input('tachometer', array(
			'label' =>  __d('information', 'Tachometer'),
		));
		echo $this->Form->input('electric_system', array(
			'label' =>  __d('information', 'Electric System'),
		));
		echo $this->Form->input('tripmeter', array(
			'label' =>  __d('information', 'Tripmeter'),
		));
		echo $this->Form->input('features', array(
			'label' =>  __d('information', 'Features'),
		));
		echo $this->Form->input('price', array(
			'label' =>  __d('information', 'Price'),
		));
		echo $this->Form->input('oil_capacity', array(
			'label' =>  __d('information', 'Oil Capacity'),
		));
		echo $this->Form->input('color', array(
			'label' =>  __d('information', 'Color'),
		));
		echo $this->Form->input('availability', array(
			'label' =>  __d('information', 'Availability'),
		));

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
