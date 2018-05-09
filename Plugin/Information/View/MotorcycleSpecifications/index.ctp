<div class="motorcycleSpecifications index">
	<h2><?php echo __('Motorcycle Specifications'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('motorcycle_id'); ?></th>
			<th><?php echo $this->Paginator->sort('bike_category'); ?></th>
			<th><?php echo $this->Paginator->sort('bike_origin'); ?></th>
			<th><?php echo $this->Paginator->sort('assemble'); ?></th>
			<th><?php echo $this->Paginator->sort('engine_type'); ?></th>
			<th><?php echo $this->Paginator->sort('engine_displacement'); ?></th>
			<th><?php echo $this->Paginator->sort('engine_maxpower'); ?></th>
			<th><?php echo $this->Paginator->sort('engine_maxtorque'); ?></th>
			<th><?php echo $this->Paginator->sort('engine_topspeed'); ?></th>
			<th><?php echo $this->Paginator->sort('engine_mileage'); ?></th>
			<th><?php echo $this->Paginator->sort('engine_bore'); ?></th>
			<th><?php echo $this->Paginator->sort('engine_strocke'); ?></th>
			<th><?php echo $this->Paginator->sort('valves_per_cylinder'); ?></th>
			<th><?php echo $this->Paginator->sort('fuel_delivery_system'); ?></th>
			<th><?php echo $this->Paginator->sort('fuel_type'); ?></th>
			<th><?php echo $this->Paginator->sort('engine_ignition'); ?></th>
			<th><?php echo $this->Paginator->sort('engine_spark_plugs'); ?></th>
			<th><?php echo $this->Paginator->sort('cooling_system'); ?></th>
			<th><?php echo $this->Paginator->sort('gearbox_type'); ?></th>
			<th><?php echo $this->Paginator->sort('no_of_gear'); ?></th>
			<th><?php echo $this->Paginator->sort('transmission_type'); ?></th>
			<th><?php echo $this->Paginator->sort('starting_method'); ?></th>
			<th><?php echo $this->Paginator->sort('oil_grade'); ?></th>
			<th><?php echo $this->Paginator->sort('gears'); ?></th>
			<th><?php echo $this->Paginator->sort('clutch'); ?></th>
			<th><?php echo $this->Paginator->sort('body_dimension'); ?></th>
			<th><?php echo $this->Paginator->sort('wheel_base'); ?></th>
			<th><?php echo $this->Paginator->sort('ground_clearance'); ?></th>
			<th><?php echo $this->Paginator->sort('kerb_weight'); ?></th>
			<th><?php echo $this->Paginator->sort('overall_length'); ?></th>
			<th><?php echo $this->Paginator->sort('overall_width'); ?></th>
			<th><?php echo $this->Paginator->sort('overall_height'); ?></th>
			<th><?php echo $this->Paginator->sort('seat_height'); ?></th>
			<th><?php echo $this->Paginator->sort('chassis_type'); ?></th>
			<th><?php echo $this->Paginator->sort('fuel_tank_capacity'); ?></th>
			<th><?php echo $this->Paginator->sort('fuel_gauge'); ?></th>
			<th><?php echo $this->Paginator->sort('digital_fuel_gauge'); ?></th>
			<th><?php echo $this->Paginator->sort('low_fuel_indicator'); ?></th>
			<th><?php echo $this->Paginator->sort('low_oil_indicator'); ?></th>
			<th><?php echo $this->Paginator->sort('suspension_front'); ?></th>
			<th><?php echo $this->Paginator->sort('suspension_rear'); ?></th>
			<th><?php echo $this->Paginator->sort('brake_type'); ?></th>
			<th><?php echo $this->Paginator->sort('brake_front'); ?></th>
			<th><?php echo $this->Paginator->sort('brake_rear'); ?></th>
			<th><?php echo $this->Paginator->sort('wheel_front'); ?></th>
			<th><?php echo $this->Paginator->sort('wheel_rear'); ?></th>
			<th><?php echo $this->Paginator->sort('tyre_front'); ?></th>
			<th><?php echo $this->Paginator->sort('tyre_rear'); ?></th>
			<th><?php echo $this->Paginator->sort('battery'); ?></th>
			<th><?php echo $this->Paginator->sort('head_lamp'); ?></th>
			<th><?php echo $this->Paginator->sort('tail_lamp'); ?></th>
			<th><?php echo $this->Paginator->sort('trun_lamp'); ?></th>
			<th><?php echo $this->Paginator->sort('speedometer'); ?></th>
			<th><?php echo $this->Paginator->sort('electric_start'); ?></th>
			<th><?php echo $this->Paginator->sort('tachometer'); ?></th>
			<th><?php echo $this->Paginator->sort('electric_system'); ?></th>
			<th><?php echo $this->Paginator->sort('tripmeter'); ?></th>
			<th><?php echo $this->Paginator->sort('features'); ?></th>
			<th><?php echo $this->Paginator->sort('price'); ?></th>
			<th><?php echo $this->Paginator->sort('oil_capacity'); ?></th>
			<th><?php echo $this->Paginator->sort('color'); ?></th>
			<th><?php echo $this->Paginator->sort('availability'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($motorcycleSpecifications as $motorcycleSpecification): ?>
	<tr>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($motorcycleSpecification['Motorcycle']['name'], array('controller' => 'motorcycles', 'action' => 'view', $motorcycleSpecification['Motorcycle']['id'])); ?>
		</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['bike_category']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['bike_origin']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['assemble']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['engine_type']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['engine_displacement']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['engine_maxpower']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['engine_maxtorque']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['engine_topspeed']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['engine_mileage']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['engine_bore']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['engine_strocke']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['valves_per_cylinder']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['fuel_delivery_system']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['fuel_type']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['engine_ignition']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['engine_spark_plugs']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['cooling_system']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['gearbox_type']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['no_of_gear']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['transmission_type']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['starting_method']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['oil_grade']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['gears']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['clutch']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['body_dimension']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['wheel_base']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['ground_clearance']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['kerb_weight']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['overall_length']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['overall_width']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['overall_height']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['seat_height']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['chassis_type']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['fuel_tank_capacity']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['fuel_gauge']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['digital_fuel_gauge']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['low_fuel_indicator']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['low_oil_indicator']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['suspension_front']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['suspension_rear']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['brake_type']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['brake_front']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['brake_rear']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['wheel_front']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['wheel_rear']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['tyre_front']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['tyre_rear']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['battery']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['head_lamp']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['tail_lamp']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['trun_lamp']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['speedometer']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['electric_start']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['tachometer']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['electric_system']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['tripmeter']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['features']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['price']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['oil_capacity']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['color']); ?>&nbsp;</td>
		<td><?php echo h($motorcycleSpecification['MotorcycleSpecification']['availability']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $motorcycleSpecification['MotorcycleSpecification']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $motorcycleSpecification['MotorcycleSpecification']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $motorcycleSpecification['MotorcycleSpecification']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $motorcycleSpecification['MotorcycleSpecification']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Motorcycle Specification'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Motorcycles'), array('controller' => 'motorcycles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Motorcycle'), array('controller' => 'motorcycles', 'action' => 'add')); ?> </li>
	</ul>
</div>
