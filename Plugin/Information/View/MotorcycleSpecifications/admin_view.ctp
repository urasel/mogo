<?php

$this->extend('/Common/admin_view');
$this->viewVars['title_for_layout'] = sprintf('%s: %s', __d('croogo', 'Motorcycle Specifications'), h($motorcycleSpecification['MotorcycleSpecification']['id']));

$this->Html
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Motorcycle Specifications'), array('action' => 'index'));

if (isset($motorcycleSpecification['MotorcycleSpecification']['id'])):
	$this->Html->addCrumb($motorcycleSpecification['MotorcycleSpecification']['id'], '/' . $this->request->url);
endif;

$this->set('title', __d('croogo', 'Motorcycle Specification'));

$this->append('actions');
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Motorcycle Specification'), array(
		'action' => 'edit',
		$motorcycleSpecification['MotorcycleSpecification']['id'],
	), array(
		'button' => 'default',
	));
	echo $this->Croogo->adminAction(__d('croogo', 'Delete Motorcycle Specification'), array(
		'action' => 'delete', $motorcycleSpecification['MotorcycleSpecification']['id'],
	), array(
		'method' => 'post',
		'button' => 'danger',
		'escapeTitle' => true,
		'escape' => false,
	),
	__d('croogo', 'Are you sure you want to delete # %s?', $motorcycleSpecification['MotorcycleSpecification']['id'])
	);
	echo $this->Croogo->adminAction(__d('croogo', 'List Motorcycle Specifications'), array('action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Motorcycle Specification'), array('action' => 'add'), array('button' => 'success'));
	echo $this->Croogo->adminAction(__d('croogo', 'List Motorcycles'), array('controller' => 'motorcycles', 'action' => 'index'));
	echo $this->Croogo->adminAction(__d('croogo', 'New Motorcycle'), array('controller' => 'motorcycles', 'action' => 'add'));
$this->end();

$this->append('main');
?>
<div class="motorcycleSpecifications view">
	<dl class="inline">
		<dt><?php echo __d('croogo', 'Id'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Motorcycle'); ?></dt>
		<dd>
			<?php echo $this->Html->link($motorcycleSpecification['Motorcycle']['name'], array('controller' => 'motorcycles', 'action' => 'view', $motorcycleSpecification['Motorcycle']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bike Category'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['bike_category']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Bike Origin'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['bike_origin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Assemble'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['assemble']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Engine Type'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['engine_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Engine Displacement'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['engine_displacement']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Engine Maxpower'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['engine_maxpower']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Engine Maxtorque'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['engine_maxtorque']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Engine Topspeed'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['engine_topspeed']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Engine Mileage'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['engine_mileage']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Engine Bore'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['engine_bore']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Engine Strocke'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['engine_strocke']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Valves Per Cylinder'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['valves_per_cylinder']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Fuel Delivery System'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['fuel_delivery_system']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Fuel Type'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['fuel_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Engine Ignition'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['engine_ignition']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Engine Spark Plugs'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['engine_spark_plugs']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Cooling System'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['cooling_system']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Gearbox Type'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['gearbox_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'No Of Gear'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['no_of_gear']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Transmission Type'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['transmission_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Starting Method'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['starting_method']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Oil Grade'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['oil_grade']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Gears'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['gears']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Clutch'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['clutch']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Body Dimension'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['body_dimension']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Wheel Base'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['wheel_base']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Ground Clearance'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['ground_clearance']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Kerb Weight'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['kerb_weight']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Overall Length'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['overall_length']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Overall Width'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['overall_width']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Overall Height'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['overall_height']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Seat Height'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['seat_height']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Chassis Type'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['chassis_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Fuel Tank Capacity'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['fuel_tank_capacity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Fuel Gauge'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['fuel_gauge']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Digital Fuel Gauge'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['digital_fuel_gauge']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Low Fuel Indicator'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['low_fuel_indicator']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Low Oil Indicator'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['low_oil_indicator']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Suspension Front'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['suspension_front']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Suspension Rear'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['suspension_rear']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Brake Type'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['brake_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Brake Front'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['brake_front']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Brake Rear'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['brake_rear']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Wheel Front'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['wheel_front']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Wheel Rear'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['wheel_rear']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Tyre Front'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['tyre_front']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Tyre Rear'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['tyre_rear']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Battery'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['battery']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Head Lamp'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['head_lamp']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Tail Lamp'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['tail_lamp']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Trun Lamp'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['trun_lamp']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Speedometer'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['speedometer']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Electric Start'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['electric_start']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Tachometer'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['tachometer']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Electric System'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['electric_system']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Tripmeter'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['tripmeter']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Features'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['features']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Price'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Oil Capacity'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['oil_capacity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Color'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['color']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('croogo', 'Availability'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['availability']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php $this->end(); ?>