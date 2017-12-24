<div class="hotelCategories view">
<h2><?php echo __('Hotel Category'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($hotelCategory['HotelCategory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($hotelCategory['HotelCategory']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Star'); ?></dt>
		<dd>
			<?php echo h($hotelCategory['HotelCategory']['star']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Hotel Category'), array('action' => 'edit', $hotelCategory['HotelCategory']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Hotel Category'), array('action' => 'delete', $hotelCategory['HotelCategory']['id']), array(), __('Are you sure you want to delete # %s?', $hotelCategory['HotelCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Hotel Categories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel Category'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hotels'), array('controller' => 'hotels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hotel'), array('controller' => 'hotels', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Hotels'); ?></h3>
	<?php if (!empty($hotelCategory['Hotel'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Hotel Category Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Image'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('City'); ?></th>
		<th><?php echo __('Country Id'); ?></th>
		<th><?php echo __('Zone Id'); ?></th>
		<th><?php echo __('Postcode'); ?></th>
		<th><?php echo __('Facilities'); ?></th>
		<th><?php echo __('Extrafacilities'); ?></th>
		<th><?php echo __('Facilitydata'); ?></th>
		<th><?php echo __('Extrafacilitydata'); ?></th>
		<th><?php echo __('Maplocation'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Policies'); ?></th>
		<th><?php echo __('Check In From'); ?></th>
		<th><?php echo __('Check Out Until'); ?></th>
		<th><?php echo __('Distance From City'); ?></th>
		<th><?php echo __('Number Of Floor'); ?></th>
		<th><?php echo __('Number Of Restaurant'); ?></th>
		<th><?php echo __('Total Rooms'); ?></th>
		<th><?php echo __('Build Year'); ?></th>
		<th><?php echo __('Lat'); ?></th>
		<th><?php echo __('Lng'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($hotelCategory['Hotel'] as $hotel): ?>
		<tr>
			<td><?php echo $hotel['id']; ?></td>
			<td><?php echo $hotel['hotel_category_id']; ?></td>
			<td><?php echo $hotel['name']; ?></td>
			<td><?php echo $hotel['image']; ?></td>
			<td><?php echo $hotel['address']; ?></td>
			<td><?php echo $hotel['city']; ?></td>
			<td><?php echo $hotel['country_id']; ?></td>
			<td><?php echo $hotel['zone_id']; ?></td>
			<td><?php echo $hotel['postcode']; ?></td>
			<td><?php echo $hotel['facilities']; ?></td>
			<td><?php echo $hotel['extrafacilities']; ?></td>
			<td><?php echo $hotel['facilitydata']; ?></td>
			<td><?php echo $hotel['extrafacilitydata']; ?></td>
			<td><?php echo $hotel['maplocation']; ?></td>
			<td><?php echo $hotel['description']; ?></td>
			<td><?php echo $hotel['policies']; ?></td>
			<td><?php echo $hotel['check_in_from']; ?></td>
			<td><?php echo $hotel['check_out_until']; ?></td>
			<td><?php echo $hotel['distance_from_city']; ?></td>
			<td><?php echo $hotel['number_of_floor']; ?></td>
			<td><?php echo $hotel['number_of_restaurant']; ?></td>
			<td><?php echo $hotel['total_rooms']; ?></td>
			<td><?php echo $hotel['build_year']; ?></td>
			<td><?php echo $hotel['lat']; ?></td>
			<td><?php echo $hotel['lng']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'hotels', 'action' => 'view', $hotel['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'hotels', 'action' => 'edit', $hotel['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'hotels', 'action' => 'delete', $hotel['id']), array(), __('Are you sure you want to delete # %s?', $hotel['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Hotel'), array('controller' => 'hotels', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
