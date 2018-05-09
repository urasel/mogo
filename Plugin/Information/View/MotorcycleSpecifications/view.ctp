<div class="motorcycleSpecifications view">
<h2><?php echo __('Motorcycle Specification'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Motorcycle'); ?></dt>
		<dd>
			<?php echo $this->Html->link($motorcycleSpecification['Motorcycle']['name'], array('controller' => 'motorcycles', 'action' => 'view', $motorcycleSpecification['Motorcycle']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bike Category'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['bike_category']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bike Origin'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['bike_origin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Assemble'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['assemble']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Engine Type'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['engine_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Engine Displacement'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['engine_displacement']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Engine Maxpower'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['engine_maxpower']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Engine Maxtorque'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['engine_maxtorque']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Engine Topspeed'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['engine_topspeed']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Engine Mileage'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['engine_mileage']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Engine Bore'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['engine_bore']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Engine Strocke'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['engine_strocke']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valves Per Cylinder'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['valves_per_cylinder']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fuel Delivery System'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['fuel_delivery_system']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fuel Type'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['fuel_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Engine Ignition'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['engine_ignition']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Engine Spark Plugs'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['engine_spark_plugs']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cooling System'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['cooling_system']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gearbox Type'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['gearbox_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('No Of Gear'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['no_of_gear']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transmission Type'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['transmission_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Starting Method'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['starting_method']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Oil Grade'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['oil_grade']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gears'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['gears']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Clutch'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['clutch']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Body Dimension'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['body_dimension']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Wheel Base'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['wheel_base']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ground Clearance'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['ground_clearance']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Kerb Weight'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['kerb_weight']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Overall Length'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['overall_length']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Overall Width'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['overall_width']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Overall Height'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['overall_height']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Seat Height'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['seat_height']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Chassis Type'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['chassis_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fuel Tank Capacity'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['fuel_tank_capacity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fuel Gauge'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['fuel_gauge']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Digital Fuel Gauge'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['digital_fuel_gauge']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Low Fuel Indicator'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['low_fuel_indicator']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Low Oil Indicator'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['low_oil_indicator']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Suspension Front'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['suspension_front']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Suspension Rear'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['suspension_rear']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Brake Type'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['brake_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Brake Front'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['brake_front']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Brake Rear'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['brake_rear']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Wheel Front'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['wheel_front']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Wheel Rear'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['wheel_rear']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tyre Front'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['tyre_front']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tyre Rear'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['tyre_rear']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Battery'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['battery']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Head Lamp'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['head_lamp']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tail Lamp'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['tail_lamp']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Trun Lamp'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['trun_lamp']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Speedometer'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['speedometer']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Electric Start'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['electric_start']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tachometer'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['tachometer']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Electric System'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['electric_system']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tripmeter'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['tripmeter']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Features'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['features']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Oil Capacity'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['oil_capacity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Color'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['color']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Availability'); ?></dt>
		<dd>
			<?php echo h($motorcycleSpecification['MotorcycleSpecification']['availability']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Motorcycle Specification'), array('action' => 'edit', $motorcycleSpecification['MotorcycleSpecification']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Motorcycle Specification'), array('action' => 'delete', $motorcycleSpecification['MotorcycleSpecification']['id']), array(), __('Are you sure you want to delete # %s?', $motorcycleSpecification['MotorcycleSpecification']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Motorcycle Specifications'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Motorcycle Specification'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Motorcycles'), array('controller' => 'motorcycles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Motorcycle'), array('controller' => 'motorcycles', 'action' => 'add')); ?> </li>
	</ul>
</div>
