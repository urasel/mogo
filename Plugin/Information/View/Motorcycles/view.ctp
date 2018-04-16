<div class="motorcycles view">
<h2><?php echo __('Motorcycle'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($motorcycle['Motorcycle']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($motorcycle['Motorcycle']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Seo Name'); ?></dt>
		<dd>
			<?php echo h($motorcycle['Motorcycle']['seo_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Point'); ?></dt>
		<dd>
			<?php echo $this->Html->link($motorcycle['Point']['name'], array('controller' => 'points', 'action' => 'view', $motorcycle['Point']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Place Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($motorcycle['PlaceType']['name'], array('controller' => 'place_types', 'action' => 'view', $motorcycle['PlaceType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Engine'); ?></dt>
		<dd>
			<?php echo h($motorcycle['Motorcycle']['engine']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Maximum Power'); ?></dt>
		<dd>
			<?php echo h($motorcycle['Motorcycle']['maximum_power']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Maximum Torque'); ?></dt>
		<dd>
			<?php echo h($motorcycle['Motorcycle']['maximum_torque']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Top Speed'); ?></dt>
		<dd>
			<?php echo h($motorcycle['Motorcycle']['top_speed']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mileage'); ?></dt>
		<dd>
			<?php echo h($motorcycle['Motorcycle']['mileage']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Curb Weight'); ?></dt>
		<dd>
			<?php echo h($motorcycle['Motorcycle']['curb_weight']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Remarks'); ?></dt>
		<dd>
			<?php echo h($motorcycle['Motorcycle']['remarks']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Isactive'); ?></dt>
		<dd>
			<?php echo h($motorcycle['Motorcycle']['isactive']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($motorcycle['Motorcycle']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($motorcycle['Motorcycle']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Motorcycle'), array('action' => 'edit', $motorcycle['Motorcycle']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Motorcycle'), array('action' => 'delete', $motorcycle['Motorcycle']['id']), array(), __('Are you sure you want to delete # %s?', $motorcycle['Motorcycle']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Motorcycles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Motorcycle'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Points'), array('controller' => 'points', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Point'), array('controller' => 'points', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Place Types'), array('controller' => 'place_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Place Type'), array('controller' => 'place_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Motorcycle Images'), array('controller' => 'motorcycle_images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Motorcycle Image'), array('controller' => 'motorcycle_images', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Motorcycle Prices'), array('controller' => 'motorcycle_prices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Motorcycle Price'), array('controller' => 'motorcycle_prices', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Motorcycle Specifications'), array('controller' => 'motorcycle_specifications', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Motorcycle Specification'), array('controller' => 'motorcycle_specifications', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Motorcycle Images'); ?></h3>
	<?php if (!empty($motorcycle['MotorcycleImage'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Motorcycle Id'); ?></th>
		<th><?php echo __('File'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Source'); ?></th>
		<th><?php echo __('Position'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($motorcycle['MotorcycleImage'] as $motorcycleImage): ?>
		<tr>
			<td><?php echo $motorcycleImage['id']; ?></td>
			<td><?php echo $motorcycleImage['motorcycle_id']; ?></td>
			<td><?php echo $motorcycleImage['file']; ?></td>
			<td><?php echo $motorcycleImage['name']; ?></td>
			<td><?php echo $motorcycleImage['source']; ?></td>
			<td><?php echo $motorcycleImage['position']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'motorcycle_images', 'action' => 'view', $motorcycleImage['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'motorcycle_images', 'action' => 'edit', $motorcycleImage['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'motorcycle_images', 'action' => 'delete', $motorcycleImage['id']), array(), __('Are you sure you want to delete # %s?', $motorcycleImage['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Motorcycle Image'), array('controller' => 'motorcycle_images', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Motorcycle Prices'); ?></h3>
	<?php if (!empty($motorcycle['MotorcyclePrice'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Motorcycle Id'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th><?php echo __('Date'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($motorcycle['MotorcyclePrice'] as $motorcyclePrice): ?>
		<tr>
			<td><?php echo $motorcyclePrice['id']; ?></td>
			<td><?php echo $motorcyclePrice['motorcycle_id']; ?></td>
			<td><?php echo $motorcyclePrice['price']; ?></td>
			<td><?php echo $motorcyclePrice['date']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'motorcycle_prices', 'action' => 'view', $motorcyclePrice['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'motorcycle_prices', 'action' => 'edit', $motorcyclePrice['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'motorcycle_prices', 'action' => 'delete', $motorcyclePrice['id']), array(), __('Are you sure you want to delete # %s?', $motorcyclePrice['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Motorcycle Price'), array('controller' => 'motorcycle_prices', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Motorcycle Specifications'); ?></h3>
	<?php if (!empty($motorcycle['MotorcycleSpecification'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Motorcycle Id'); ?></th>
		<th><?php echo __('Bike Category'); ?></th>
		<th><?php echo __('Bike Origin'); ?></th>
		<th><?php echo __('Assemble'); ?></th>
		<th><?php echo __('Engine Type'); ?></th>
		<th><?php echo __('Engine Displacement'); ?></th>
		<th><?php echo __('Engine Maxpower'); ?></th>
		<th><?php echo __('Engine Maxtorque'); ?></th>
		<th><?php echo __('Engine Topspeed'); ?></th>
		<th><?php echo __('Engine Mileage'); ?></th>
		<th><?php echo __('Engine Bore'); ?></th>
		<th><?php echo __('Engine Strocke'); ?></th>
		<th><?php echo __('Valves Per Cylinder'); ?></th>
		<th><?php echo __('Fuel Delivery System'); ?></th>
		<th><?php echo __('Fuel Type'); ?></th>
		<th><?php echo __('Engine Ignition'); ?></th>
		<th><?php echo __('Engine Spark Plugs'); ?></th>
		<th><?php echo __('Cooling System'); ?></th>
		<th><?php echo __('Gearbox Type'); ?></th>
		<th><?php echo __('No Of Gear'); ?></th>
		<th><?php echo __('Transmission Type'); ?></th>
		<th><?php echo __('Starting Method'); ?></th>
		<th><?php echo __('Oil Grade'); ?></th>
		<th><?php echo __('Gears'); ?></th>
		<th><?php echo __('Clutch'); ?></th>
		<th><?php echo __('Body Dimension'); ?></th>
		<th><?php echo __('Wheel Base'); ?></th>
		<th><?php echo __('Ground Clearance'); ?></th>
		<th><?php echo __('Kerb Weight'); ?></th>
		<th><?php echo __('Overall Length'); ?></th>
		<th><?php echo __('Overall Width'); ?></th>
		<th><?php echo __('Overall Height'); ?></th>
		<th><?php echo __('Seat Height'); ?></th>
		<th><?php echo __('Chassis Type'); ?></th>
		<th><?php echo __('Fuel Tank Capacity'); ?></th>
		<th><?php echo __('Fuel Gauge'); ?></th>
		<th><?php echo __('Digital Fuel Gauge'); ?></th>
		<th><?php echo __('Low Fuel Indicator'); ?></th>
		<th><?php echo __('Low Oil Indicator'); ?></th>
		<th><?php echo __('Suspension Front'); ?></th>
		<th><?php echo __('Suspension Rear'); ?></th>
		<th><?php echo __('Brake Type'); ?></th>
		<th><?php echo __('Brake Front'); ?></th>
		<th><?php echo __('Brake Rear'); ?></th>
		<th><?php echo __('Wheel Front'); ?></th>
		<th><?php echo __('Wheel Rear'); ?></th>
		<th><?php echo __('Tyre Front'); ?></th>
		<th><?php echo __('Tyre Rear'); ?></th>
		<th><?php echo __('Battery'); ?></th>
		<th><?php echo __('Head Lamp'); ?></th>
		<th><?php echo __('Tail Lamp'); ?></th>
		<th><?php echo __('Trun Lamp'); ?></th>
		<th><?php echo __('Speedometer'); ?></th>
		<th><?php echo __('Electric Start'); ?></th>
		<th><?php echo __('Tachometer'); ?></th>
		<th><?php echo __('Electric System'); ?></th>
		<th><?php echo __('Tripmeter'); ?></th>
		<th><?php echo __('Features'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th><?php echo __('Oil Capacity'); ?></th>
		<th><?php echo __('Color'); ?></th>
		<th><?php echo __('Availability'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($motorcycle['MotorcycleSpecification'] as $motorcycleSpecification): ?>
		<tr>
			<td><?php echo $motorcycleSpecification['id']; ?></td>
			<td><?php echo $motorcycleSpecification['motorcycle_id']; ?></td>
			<td><?php echo $motorcycleSpecification['bike_category']; ?></td>
			<td><?php echo $motorcycleSpecification['bike_origin']; ?></td>
			<td><?php echo $motorcycleSpecification['assemble']; ?></td>
			<td><?php echo $motorcycleSpecification['engine_type']; ?></td>
			<td><?php echo $motorcycleSpecification['engine_displacement']; ?></td>
			<td><?php echo $motorcycleSpecification['engine_maxpower']; ?></td>
			<td><?php echo $motorcycleSpecification['engine_maxtorque']; ?></td>
			<td><?php echo $motorcycleSpecification['engine_topspeed']; ?></td>
			<td><?php echo $motorcycleSpecification['engine_mileage']; ?></td>
			<td><?php echo $motorcycleSpecification['engine_bore']; ?></td>
			<td><?php echo $motorcycleSpecification['engine_strocke']; ?></td>
			<td><?php echo $motorcycleSpecification['valves_per_cylinder']; ?></td>
			<td><?php echo $motorcycleSpecification['fuel_delivery_system']; ?></td>
			<td><?php echo $motorcycleSpecification['fuel_type']; ?></td>
			<td><?php echo $motorcycleSpecification['engine_ignition']; ?></td>
			<td><?php echo $motorcycleSpecification['engine_spark_plugs']; ?></td>
			<td><?php echo $motorcycleSpecification['cooling_system']; ?></td>
			<td><?php echo $motorcycleSpecification['gearbox_type']; ?></td>
			<td><?php echo $motorcycleSpecification['no_of_gear']; ?></td>
			<td><?php echo $motorcycleSpecification['transmission_type']; ?></td>
			<td><?php echo $motorcycleSpecification['starting_method']; ?></td>
			<td><?php echo $motorcycleSpecification['oil_grade']; ?></td>
			<td><?php echo $motorcycleSpecification['gears']; ?></td>
			<td><?php echo $motorcycleSpecification['clutch']; ?></td>
			<td><?php echo $motorcycleSpecification['body_dimension']; ?></td>
			<td><?php echo $motorcycleSpecification['wheel_base']; ?></td>
			<td><?php echo $motorcycleSpecification['ground_clearance']; ?></td>
			<td><?php echo $motorcycleSpecification['kerb_weight']; ?></td>
			<td><?php echo $motorcycleSpecification['overall_length']; ?></td>
			<td><?php echo $motorcycleSpecification['overall_width']; ?></td>
			<td><?php echo $motorcycleSpecification['overall_height']; ?></td>
			<td><?php echo $motorcycleSpecification['seat_height']; ?></td>
			<td><?php echo $motorcycleSpecification['chassis_type']; ?></td>
			<td><?php echo $motorcycleSpecification['fuel_tank_capacity']; ?></td>
			<td><?php echo $motorcycleSpecification['fuel_gauge']; ?></td>
			<td><?php echo $motorcycleSpecification['digital_fuel_gauge']; ?></td>
			<td><?php echo $motorcycleSpecification['low_fuel_indicator']; ?></td>
			<td><?php echo $motorcycleSpecification['low_oil_indicator']; ?></td>
			<td><?php echo $motorcycleSpecification['suspension_front']; ?></td>
			<td><?php echo $motorcycleSpecification['suspension_rear']; ?></td>
			<td><?php echo $motorcycleSpecification['brake_type']; ?></td>
			<td><?php echo $motorcycleSpecification['brake_front']; ?></td>
			<td><?php echo $motorcycleSpecification['brake_rear']; ?></td>
			<td><?php echo $motorcycleSpecification['wheel_front']; ?></td>
			<td><?php echo $motorcycleSpecification['wheel_rear']; ?></td>
			<td><?php echo $motorcycleSpecification['tyre_front']; ?></td>
			<td><?php echo $motorcycleSpecification['tyre_rear']; ?></td>
			<td><?php echo $motorcycleSpecification['battery']; ?></td>
			<td><?php echo $motorcycleSpecification['head_lamp']; ?></td>
			<td><?php echo $motorcycleSpecification['tail_lamp']; ?></td>
			<td><?php echo $motorcycleSpecification['trun_lamp']; ?></td>
			<td><?php echo $motorcycleSpecification['speedometer']; ?></td>
			<td><?php echo $motorcycleSpecification['electric_start']; ?></td>
			<td><?php echo $motorcycleSpecification['tachometer']; ?></td>
			<td><?php echo $motorcycleSpecification['electric_system']; ?></td>
			<td><?php echo $motorcycleSpecification['tripmeter']; ?></td>
			<td><?php echo $motorcycleSpecification['features']; ?></td>
			<td><?php echo $motorcycleSpecification['price']; ?></td>
			<td><?php echo $motorcycleSpecification['oil_capacity']; ?></td>
			<td><?php echo $motorcycleSpecification['color']; ?></td>
			<td><?php echo $motorcycleSpecification['availability']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'motorcycle_specifications', 'action' => 'view', $motorcycleSpecification['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'motorcycle_specifications', 'action' => 'edit', $motorcycleSpecification['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'motorcycle_specifications', 'action' => 'delete', $motorcycleSpecification['id']), array(), __('Are you sure you want to delete # %s?', $motorcycleSpecification['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Motorcycle Specification'), array('controller' => 'motorcycle_specifications', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
