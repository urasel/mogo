<?php
$this->viewVars['title_for_layout'] = __d('information', 'Motorcycle Specifications');
$this->extend('/Common/admin_index');

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('information', 'Motorcycle Specifications'), array('action' => 'index'));

$this->set('tableClass', 'table table-striped');

$this->append('table-heading');
	$tableHeaders = $this->Html->tableHeaders(array(
		$this->Paginator->sort('id'),
		$this->Paginator->sort('motorcycle_id'),
		$this->Paginator->sort('bike_category'),
		$this->Paginator->sort('bike_origin'),
		$this->Paginator->sort('assemble'),
		$this->Paginator->sort('engine_type'),
		$this->Paginator->sort('engine_displacement'),
		$this->Paginator->sort('engine_maxpower'),
		$this->Paginator->sort('engine_maxtorque'),
		$this->Paginator->sort('engine_topspeed'),
		$this->Paginator->sort('engine_mileage'),
		$this->Paginator->sort('engine_bore'),
		$this->Paginator->sort('engine_strocke'),
		$this->Paginator->sort('valves_per_cylinder'),
		$this->Paginator->sort('fuel_delivery_system'),
		$this->Paginator->sort('fuel_type'),
		$this->Paginator->sort('engine_ignition'),
		$this->Paginator->sort('engine_spark_plugs'),
		$this->Paginator->sort('cooling_system'),
		$this->Paginator->sort('gearbox_type'),
		$this->Paginator->sort('no_of_gear'),
		$this->Paginator->sort('transmission_type'),
		$this->Paginator->sort('starting_method'),
		$this->Paginator->sort('oil_grade'),
		$this->Paginator->sort('gears'),
		$this->Paginator->sort('clutch'),
		$this->Paginator->sort('body_dimension'),
		$this->Paginator->sort('wheel_base'),
		$this->Paginator->sort('ground_clearance'),
		$this->Paginator->sort('kerb_weight'),
		$this->Paginator->sort('overall_length'),
		$this->Paginator->sort('overall_width'),
		$this->Paginator->sort('overall_height'),
		$this->Paginator->sort('seat_height'),
		$this->Paginator->sort('chassis_type'),
		$this->Paginator->sort('fuel_tank_capacity'),
		$this->Paginator->sort('fuel_gauge'),
		$this->Paginator->sort('digital_fuel_gauge'),
		$this->Paginator->sort('low_fuel_indicator'),
		$this->Paginator->sort('low_oil_indicator'),
		$this->Paginator->sort('suspension_front'),
		$this->Paginator->sort('suspension_rear'),
		$this->Paginator->sort('brake_type'),
		$this->Paginator->sort('brake_front'),
		$this->Paginator->sort('brake_rear'),
		$this->Paginator->sort('wheel_front'),
		$this->Paginator->sort('wheel_rear'),
		$this->Paginator->sort('tyre_front'),
		$this->Paginator->sort('tyre_rear'),
		$this->Paginator->sort('battery'),
		$this->Paginator->sort('head_lamp'),
		$this->Paginator->sort('tail_lamp'),
		$this->Paginator->sort('trun_lamp'),
		$this->Paginator->sort('speedometer'),
		$this->Paginator->sort('electric_start'),
		$this->Paginator->sort('tachometer'),
		$this->Paginator->sort('electric_system'),
		$this->Paginator->sort('tripmeter'),
		$this->Paginator->sort('features'),
		$this->Paginator->sort('price'),
		$this->Paginator->sort('oil_capacity'),
		$this->Paginator->sort('color'),
		$this->Paginator->sort('availability'),
		array(__d('croogo', 'Actions') => array('class' => 'actions')),
	));
	echo $this->Html->tag('thead', $tableHeaders);
$this->end();

$this->append('table-body');
	$rows = array();
	foreach ($motorcycleSpecifications as $motorcycleSpecification):
		$row = array();
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['id']);
		$row[] = $this->Html->link($motorcycleSpecification['Motorcycle']['name'], array(
			'controller' => 'motorcycles',
		'action' => 'view',
			$motorcycleSpecification['Motorcycle']['id'],
	));
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['bike_category']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['bike_origin']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['assemble']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['engine_type']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['engine_displacement']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['engine_maxpower']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['engine_maxtorque']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['engine_topspeed']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['engine_mileage']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['engine_bore']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['engine_strocke']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['valves_per_cylinder']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['fuel_delivery_system']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['fuel_type']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['engine_ignition']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['engine_spark_plugs']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['cooling_system']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['gearbox_type']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['no_of_gear']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['transmission_type']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['starting_method']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['oil_grade']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['gears']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['clutch']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['body_dimension']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['wheel_base']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['ground_clearance']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['kerb_weight']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['overall_length']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['overall_width']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['overall_height']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['seat_height']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['chassis_type']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['fuel_tank_capacity']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['fuel_gauge']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['digital_fuel_gauge']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['low_fuel_indicator']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['low_oil_indicator']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['suspension_front']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['suspension_rear']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['brake_type']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['brake_front']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['brake_rear']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['wheel_front']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['wheel_rear']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['tyre_front']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['tyre_rear']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['battery']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['head_lamp']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['tail_lamp']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['trun_lamp']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['speedometer']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['electric_start']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['tachometer']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['electric_system']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['tripmeter']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['features']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['price']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['oil_capacity']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['color']);
		$row[] = h($motorcycleSpecification['MotorcycleSpecification']['availability']);
		$actions = array($this->Croogo->adminRowActions($motorcycleSpecification['MotorcycleSpecification']['id']));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'view', $motorcycleSpecification['MotorcycleSpecification']['id']
	), array(
			'icon' => 'eye-open',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'edit',
			$motorcycleSpecification['MotorcycleSpecification']['id'],
		), array(
			'icon' => 'pencil',
		));
		$actions[] = $this->Croogo->adminRowAction('', array(
			'action' => 'delete',
			$motorcycleSpecification['MotorcycleSpecification']['id'],
		), array(
			'icon' => 'trash',
			'escape' => true,
		),
		__d('croogo', 'Are you sure you want to delete # %s?', $motorcycleSpecification['MotorcycleSpecification']['id'])
		);
		$row[] = $this->Html->div('item-actions', implode(' ', $actions));
		$rows[] = $this->Html->tableCells($row);
	endforeach;
	echo $this->Html->tag('tbody', implode('', $rows));
$this->end();
